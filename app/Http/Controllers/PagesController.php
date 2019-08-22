<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class PagesController extends Controller
{
    public function home()
    {
        $tasks = [
            'Go to the store',
            'Go to the market',
            'Go to work',
            'Go to concert'
        ];

//        return view('welcome', [
//        'tasks' => $tasks,
//        'foo' => 'foobar'
//    ]);
        return view ('welcome')->withTasks($tasks)->withFoo('laravel');

    }

    public function about(){

        return view('about');
    }
    public function contact(){

        return view('contact');
    }

}
