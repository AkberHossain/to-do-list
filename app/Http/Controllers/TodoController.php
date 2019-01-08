<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function store()
    {
        $text = $_POST['text'];

        Todo::create([

            'todo' => $text ,
            'user_id' => auth()->id() ,
            'completed' => 0

        ]);

        //return redirect()->home();
    }
}
