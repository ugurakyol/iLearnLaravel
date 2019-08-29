<?php

namespace App\Http\Controllers;


use App\Project;
use App\Services\Twitter;
use App\Task;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( ){

        //$projects =Project::all();

       // auth()->user()->can('view',$project);

        if (auth()->id() == 1){

            $projects =Project::all();

        }else{

            $projects = Project::where('owner_id' , auth()->id())->get(); //select * from projects where owner_id = 4

        }

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

   // public function show(Project $project, Twitter $twitter){
    public function show(Project $project){
       // $twitter = app('twitter');
      //  dd($twitter);


//        if($project->owner_id != auth()->id()){
//            abort(403);
//        }
       // abort_if($project->owner_id !== auth()->id(),403);
        //abort_unless(auth()->user()->owns($project),403);
//
//        if(\Gate::denies('view',$project)){
//            abort(403);
//        }
        //auth()->user()->cannot('view', $project);
      //  $this->authorize('view',$project);

        return view('projects.show',compact('project'));

    }


    public function edit(Project $project){

        return view('projects.edit',compact('project'));
    }

    public function update(Project $project){
       // $this->authorize('view',$project);

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

        //$this->authorize('view',$project);

     //   dd('Hello! ' . $id  );
        $project->delete();
        Task::where('project_id',$project->id)->delete();

        return redirect('/projects');
    }


    public function store(){

        $attributes = request()->validate([
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


        //Project::create(request(['title','description']));
        Project::create($attributes + ['owner_id' => auth()->id()]);

        return redirect('/projects');
    }



}
