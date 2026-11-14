<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) return redirect()->to('/');
        return view('auth/login', ['title' => 'Login']);
    }

    public function attempt()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required',
        ];
        if (! $this->validate($rules)) {
            return view('auth/login', ['title' => 'Login', 'validation' => $this->validator]);
        }

        $user = (new UserModel())->where('email', $this->request->getPost('email'))->first();
        if (! $user || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        session()->regenerate();
        session()->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'logged_in' => true,
        ]);
        return redirect()->to('/')->with('success', 'Welcome back!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'You have been logged out.');
    }
}
