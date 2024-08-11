<?php

namespace App\Libraries;

use App\Models\User;

class CIAuth
{
    public static function setCIAuth($result)
    {
        $session = session();
        $array = ['logged_in' => true];
        $userdata = $result;
        $session_data = [
            'userdata' => $userdata,
            'logged_in' => $array,
        ];
        $session->set($session_data);
    }

    public static function id()
    {
        $session = session();

        if ($session->has('logged_in') && $session->has('userdata')) {
            $userdata = $session->get('userdata');
            return $userdata->id ?? null;
        }

        return null;
    }

    public static function check()
    {
        $session = session();

        return $session->has('logged_in');
    }

    public static function forget()
    {
        $session = session();
        $session->remove('logged_in');
        $session->remove('userdata');
    }

    public static function user()
    {
        $session = session();

        if ($session->has('logged_in')) {
            if ($session->has('userdata')) {
                return $session->get('userdata');
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
