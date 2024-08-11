<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Setting;

class Settings extends BaseController
{
    protected $helpers = ['CIFunctions'];

    public function index()
    {
        $data = [
            'title' => 'Pengaturan',
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/settings/index', $data);
    }

    public function updateGeneralSettings()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $validation = \Config\Services::validation();

            $this->validate([
                'blog_title' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Blog title is required'
                    ]
                ],
                'blog_email' => 'required|valid_email',
                'errors' => [
                    'required' => 'Blog email is required',
                    'valid_email' => 'Invalid email address'
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
                $settings = new Setting();
                $setting_id = $settings->asObject()->first()->id;
                $update = $settings->where('id', $setting_id)
                    ->set([
                        'blog_title' => $request->getVar('blog_title'),
                        'blog_email' => $request->getVar('blog_email'),
                        'blog_phone' => $request->getVar('blog_phone'),
                        'blog_meta_keyword' => $request->getVar('blog_meta_keyword'),
                        'blog_meta_description' => $request->getVar('blog_meta_description')
                    ])->update();

                if ($update) {
                    return $this->response->setJSON([
                        'status' => 1,
                        'token' => csrf_hash(),
                        'msg' => 'General settings have been updated successfully.'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 0,
                        'token' => csrf_hash(),
                        'msg' => 'Something went wrong.'
                    ]);
                }
            }
        }
    }

    public function updateBlogLogo()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $settings = new Setting();
            $path = 'images/blog/';
            $file = $request->getFile('blog_logo');
            $setting_data = $settings->asObject()->first();
            $old_blog_logo = $setting_data->blog_logo;
            $new_filename = 'KipBlog' . $file->getRandomName();

            if ($file->move($path, $new_filename)) {
                if ($old_blog_logo != null && file_exists($path . $old_blog_logo)) {
                    unlink($path . $old_blog_logo);
                }

                $update = $settings->where('id', $setting_data->id)
                    ->set(['blog_logo' => $new_filename])
                    ->update();

                if ($update) {
                    return $this->response->setJSON([
                        'status' => 1,
                        'token' => csrf_hash(),
                        'msg' => 'Done!, KipBlog logo has been successfully updated.'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 0,
                        'token' => csrf_hash(),
                        'msg' => 'Something went wrong on uploading new logo info.'
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status' => 0,
                    'token' => csrf_hash(),
                    'msg' => 'Something went wrong on uploading new logo.'
                ]);
            }
        }
    }

    public function updateBlogFavicon()
    {
        $request = \Config\Services::request();

        if ($request->isAJAX()) {
            $settings = new Setting();
            $path = 'images/blog/';
            $file = $request->getFile('blog_favicon');
            $setting_data = $settings->asObject()->first();
            $old_blog_logo = $setting_data->blog_favicon;
            $new_filename = 'KipBlog' . $file->getRandomName();

            if ($file->move($path, $new_filename)) {
                if ($old_blog_logo != null && file_exists($path . $old_blog_logo)) {
                    unlink($path . $old_blog_logo);
                }

                $update = $settings->where('id', $setting_data->id)
                    ->set(['blog_favicon' => $new_filename])
                    ->update();

                if ($update) {
                    return $this->response->setJSON([
                        'status' => 1,
                        'token' => csrf_hash(),
                        'msg' => 'Done!, KipBlog favicon has been successfully updated.'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => 0,
                        'token' => csrf_hash(),
                        'msg' => 'Something went wrong on uploading new blog favicon.'
                    ]);
                }
            } else {
                return $this->response->setJSON([
                    'status' => 0,
                    'token' => csrf_hash(),
                    'msg' => 'Something went wrong on uploading new blog favicon file.'
                ]);
            }
        }
    }
}
