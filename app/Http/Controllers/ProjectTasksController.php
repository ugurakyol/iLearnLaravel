<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Task $task){

       // dd(request()->all());

        $task->update([
            'completed' => request()-> has('completed')
        ]);
        return back();
    }

    public function store(Project $project){


     //   dd(request()->all());

//        $project->addTask(

//          request()->validate(['description' => 'required'])

//        );
        $attributes = request()->validate(['description' => 'required']);
        $project->addTask($attributes);

        return back();

    }
    public function remove(Task $task){
        //dd($task->id);
        Task::destroy($task->id);
        return back();
    }
}
