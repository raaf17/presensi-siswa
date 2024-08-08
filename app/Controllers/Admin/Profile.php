<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\User;

class Profile extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil Pengguna',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/profile/index', $data);
    }

    public function updatePersonalDetails()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $user_id = CIAuth::id();

        if ($request->isAJAX()) {
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Full name is required'
                    ]
                ],
                'username' => [
                    'rules' => 'required|min_length[4]|is_unique[users.username,id,' . $user_id . ']',
                    'errors' => [
                        'required' => 'Username is required',
                        'min_length' => 'Username must have minimum of characters',
                        'is_unique' => 'Username is already taken!'
                    ]
                ]
            ]);

            if ($validation->run() == FALSE) {
                $errors = $validation->getErrors();

                return json_encode([
                    'status' => 0,
                    'error' => $errors
                ]);
            } else {
                $user = new User();
                $update = $user->where('id', $user_id)
                    ->set([
                        'name' => $request->getVar('name'),
                        'username' => $request->getVar('username'),
                        'bio' => $request->getVar('bio'),
                    ])->update();

                if ($update) {
                    $user_info = $user->find($user_id);

                    return json_encode([
                        'status' => 1,
                        'user_info' => $user_info,
                        'msg' => 'Your personal details have been successfully updated.'
                    ]);
                } else {
                    return json_encode([
                        'status' => 0,
                        'msg' => 'Something went wrong'
                    ]);
                }
            }
        }
    }

    public function updateProfilePicture()
    {
        $request = \Config\Services::request();
        $user_id = CIAuth::id();
        $user = new User();
        $user_info = $user->asObject()->where('id', $user_id)->first();

        $path = 'images/users/';
        $file = $request->getFile('user_profile_file');
        $old_picture = $user_info->picture;
        $new_filename = 'UIMG_' . $user_id . $file->getRandomName();

        // Image manipulation
        $upload_image = \Config\Services::image()
            ->withFile($file)
            ->resize(450, 450, true, 'height')
            ->save($path . $new_filename);

        if ($upload_image) {
            if ($old_picture != null && file_exists($path . $new_filename)) {
                unlink($path . $old_picture);
            }

            $user->where('id', $user_info->id)
                ->set(['picture' => $new_filename])
                ->update();

            echo json_encode([
                'status' => 1,
                'msg' => 'Done, Your profile picture has been successfully updated.'
            ]);
        } else {
            echo json_encode([
                'status' => 0,
                'msg' => 'Something went wrong'
            ]);
        }
    }

    public function changePassword()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();
            $user_id = CIAuth::id();
            $user = new User();
            $user_info = $user->asObject()->where('id', $user_id)->first();

            // Validation the form
            $this->validate([
                'current_password' => [
                    'rules' => 'required|min_length[5]|check_current_password[current_password]',
                    'errors' => [
                        'required' => 'Enter current password',
                        'min_length' => 'Password must have atleast 5 characters',
                        'check_current_password' => 'The current password incorrect'
                    ]
                ],
                'new_password' => [
                    'rules' => 'required|min_length[5]|max_length[20]|is_password_strong[new_password]',
                    'errors' => [
                        'required' => 'New password is required',
                        'min_length' => 'New password must have atleast 5 characters',
                        'max_length' => 'New password must not excess more than 20 characters',
                        'is_password_strong' => 'Password must contains atleast 1 uppercase, 1 lowercase, 1 number and 1 special character.'
                    ]
                ],
                'confirm_new_password' => [
                    'rules' => 'required|matches[new_password]',
                    'errors' => [
                        'required' => 'Confirm new password',
                        'matches' => 'Password mismatch'
                    ]
                ]
            ]);

            if ($validation->run() === FALSE) {
                $errors = $validation->getErrors();

                return $this->response->setJSON([
                    'status' => 0,
                    'token' => csrf_hash(),
                    'error' => $errors
                ]);
            } else {
                // Update user(admin) password in DB
                $user->where('id', $user_info->id)
                    ->set(['password' => Hash::make($request->getVar('new_password'))])
                    ->update();

                // Send email
                $mail_data = array(
                    'user' => $user_info,
                    'new_password' => $request->getVar('new_password')
                );

                $view = \Config\Services::renderer();
                $mail_body = $view->setVar('mail_data', $mail_data)->render('email-templates/password-changed-email-template');

                $mailConfig = array(
                    'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                    'mail_from_name' => env('EMAIL_FROM_NAME'),
                    'mail_recipient_email' => $user_info->email,
                    'mail_recipient_name' => $user_info->name,
                    'mail_subject' => 'Password Changed',
                    'mail_body' => $mail_body,
                );

                sendEmail($mailConfig);

                return $this->response->setJSON([
                    'status' => 1,
                    'token' => csrf_hash(),
                    'msg' => 'Done! Your password has been successfully updated'
                ]);
            }
        }
    }
}
