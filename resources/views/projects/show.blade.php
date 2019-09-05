@extends('layout')
@section('title')
    {{ $project->title }}
    @endsection
@section('content')

    <h1>{{ $project->title }}</h1>
{{--    this is for authentication --}}
{{--    @can('update',$project)--}}
{{--        <a href="">Update</a>--}}
{{--    @endcan--}}

    <div class="align-content-center" style="font-size: larger">{{ $project->description }}</div>
    <div class="links" >
        <a href="{{url("/projects/$project->id")}}/edit" >Click to Edit Project</a>
    </div>
    </br>
    @if($project->tasks->count())
        <h5>Project task list</h5>
        <div  class="box">
            @foreach($project->tasks as $task)

                    <div>
                        <form method="POST" action="{{url("/tasks/$task->id") }}">
                            @method('PATCH')
                            @csrf
                            <label class="custom-checkbox" for="completed">
                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                {{ $task->description."     ".$task->created_at}}
                                <a href="{{url("/tasks/$task->id/remove")}}" >Click to Delete Task</a>

                            </label>



                        </form>
                    </div>

            @endforeach
        </div>
    @endif

    <form method="POST" action="{{url("/projects/$project->id/tasks")}}"  class="box">
        @csrf
        {{ csrf_field() }}

        <div class="field">
            <label class="label" for="description"> New Tasks</label>
            <div>
                <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="" >
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include('errors')

    </form>




@endsection
