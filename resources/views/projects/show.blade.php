@extends('layout')
@section('title','{{ $project->title }}')
@section('content')

    <h1>{{ $project->title }}</h1>
    <div class="content">{{ $project->description }} </div>
    </br>
    <div class="links">
        <a href="/projects/{{ $project->id }}/edit" >Click to Edit Project</a>
    </div>



@endsection
