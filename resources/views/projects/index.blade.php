@extends('layout')
@section('title','Edit a Projects')
@section('content')
        <h1>Projects</h1>

        @foreach($projects as $project)
            <div class="links">
                <a href="/projects/{{ $project->id }}" >{{ $project->title }}</a>
            </div>
        @endforeach

@endsection
