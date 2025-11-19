<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;

class MentorAuthController extends BaseController
{
    public function login()
    {
        return view('auth/login_mentor');
    }

    public function attemptLogin()
    { 
        helper('auth');
        $login = $this->request->getPost('login'); // input dari form

        $auth = service('authentication');

        // Cek apakah inputnya email atau username
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $login,
            'password' => $this->request->getPost('password'),
        ];

        if (!$auth->attempt($credentials)) {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }

        // Cek role mentor
        if (!in_groups('mentor')) {
            $auth->logout();
            return redirect()->back()->with('error', 'Akses ditolak, login ini khusus mentor.');
        }

        return redirect()->to('/mentor/dashboard');

    }
}
