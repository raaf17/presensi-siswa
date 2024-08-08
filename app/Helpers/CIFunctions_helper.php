<?php

use App\Libraries\CIAuth;
use App\Models\UserModel;
use App\Models\Setting;

if (!function_exists('get_user')) {
    function get_user()
    {
        if (CIAuth::check()) {
            $user = new UserModel();

            return $user->asObject()->where('id', CIAuth::id())->first();
        } else {
            return null;
        }
    }
}

if (!function_exists('get_settings')) {
    function get_settings()
    {
        $settings = new Setting();
        $settings_data = $settings->asObject()->first();

        if (!$settings_data) {
            $data = array(
                'blog_title' => 'KipBlog',
                'blog_email' => 'kipblog@gmail.com',
                'blog_phone' => null,
                'blog_meta_keyword' => null,
                'blog_meta_description' => null,
                'blog_logo' => null,
                'blog_favicon' => null
            );

            $settings->save($data);
            $new_settings_data = $settings->asObject()->first();

            return $new_settings_data;
        } else {
            return $settings_data;
        }
    }
}
