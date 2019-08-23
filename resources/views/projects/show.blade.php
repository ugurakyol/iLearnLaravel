@extends('layout')
@section('title')
    {{ $project->title }}
    @endsection
@section('content')

    <h1>{{ $project->title }}</h1>
    <div class="align-content-center" style="font-size: larger">{{ $project->description }}</div>
    <div class="links" >
        <a href="/projects/{{ $project->id }}/edit" >Click to Edit Project</a>
    </div>
    </br>
    @if($project->tasks->count())
        <h5>Project task list</h5>
        <div class="links">
            @foreach($project->tasks as $task)

                    <li  class="links"><a href="#" >{{ $task->description }}</a></li>

            @endforeach
        </div>
    @endif



@endsection
