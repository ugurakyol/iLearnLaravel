<?php

namespace App\Http\Controllers;


use App\Project;
use http\Env\Request;

class ProjectsController extends Controller
{
    public function index(){

        $projects =Project::all();


        return view('projects.index' , compact('projects'));


    }

    public function create(){

        return view('projects.create');
    }

//    public function show($id){
//
//        $project = Project::findOrFail($id);
//        return view('projects.show',compact('project'));
//
//    }

    public function show(Project $project){

        return view('projects.show',compact('project'));

    }

    public function edit(Project $project){

        return view('projects.edit',compact('project'));
    }

    public function update(Project $project){

      //  dd('Hello!');//debugging
        //dd(request()->all());

        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');
    }

    public function destroy(Project $project){

     //   dd('Hello! ' . $id  );
        $project->delete();
        return redirect('/projects');
    }


    public function store(){
        //return request()->all();
        //return request('title');
        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');
    }



}
