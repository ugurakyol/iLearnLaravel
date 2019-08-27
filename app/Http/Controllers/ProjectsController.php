<?php

namespace App\Http\Controllers;


use App\Project;
use App\Services\Twitter;
use App\Task;
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

//    public function show(Project $project){
//
//        return view('projects.show',compact('project'));
//
//    }

    public function show(Project $project, Twitter $twitter){

       // $twitter = app('twitter');
        dd($twitter);

       // return view('projects.show',compact('project'));

    }


    public function edit(Project $project){

        return view('projects.edit',compact('project'));
    }

    public function update(Project $project){

      //  dd('Hello!');//debugging
        //dd(request()->all());
        request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        //Project::update(request(['title','description']));
        return redirect('/projects');
    }

    public function destroy(Project $project){

     //   dd('Hello! ' . $id  );
        $project->delete();
        Task::where('project_id',$project->id)->delete();

        return redirect('/projects');
    }


    public function store(){

        request()->validate([
            'title' => ['required','min:3','max:255'],
            'description' => ['required','min:3','max:255']
        ]);

        //return request()->all();
        //return request('title');
//        dd(request(['title','description']));
//        dd([
//            'title' => request(''),
//            'description' => request('description')
//        ]);

//        $project = new Project();
//        $project->title = request('title');
//        $project->description = request('description');
//        $project->save();


        Project::create(request(['title','description']));

        return redirect('/projects');
    }



}
