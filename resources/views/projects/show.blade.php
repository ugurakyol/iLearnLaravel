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
        <div class="align-content-around">
            @foreach($project->tasks as $task)

                    <div>
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('PATCH')
                            @csrf
                            <label class="custom-checkbox" for="completed">
                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->description."     ".$task->created_at}}

                            </label>



                        </form>
                    </div>

            @endforeach
        </div>
    @endif



@endsection
