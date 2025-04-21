<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index() {
        $person = 'John Doe';
        $friends = ['Susan', 'Richard', 'Ronald'];
        return view('demo.file02', [
            'abc' => $person,
        ])->with('temans', $friends);
    }
}
