<?php

namespace App\Controllers;

use App\Core\App;

class PagesController
{
    public function index()
    {
        $tasks = App::get('database')->selectAll('tasks');

        return view('index', [
            "tasks" => $tasks
        ]);
    }

    public function addName()
    {
        App::get('database')->insert('tasks', [
            'user_id'    => 5,
            'name'       => $_POST['username'],
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);

        return redirect('/');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
