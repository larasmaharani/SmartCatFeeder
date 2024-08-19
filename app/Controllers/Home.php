<?php

namespace App\Controllers;

use Myth\Auth\Config\Auth as AuthConfig;

class Home extends BaseController
{
    public function index()
    {
        $authConfig = new AuthConfig();
        return view('auth/login', ['config' => $authConfig]);
    }

    public function register()
    {
        return view('auth/register');
        return redirect()->to('/login');
    }

    // public function user()
    // {
    //     return view('user/index');
    // }
}
