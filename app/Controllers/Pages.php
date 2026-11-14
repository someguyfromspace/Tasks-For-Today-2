<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Pages extends BaseController
{
    public function welcome()
    {
        return view('pages/welcome', [
            'title' => 'Welcome',
            'tasks' => (new TaskModel())->activeTasks(),
        ]);
    }

    public function profile()
    {
        return view('pages/profile', ['title' => 'Profile']);
    }

    public function about()
    {
        return view('pages/about', ['title' => 'About']);
    }
}
