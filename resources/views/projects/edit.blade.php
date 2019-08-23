@extends('layout')
@section('title','Edit a Projects')
@section('content')

<h1>Edit a Projects</h1>

<div class="field">
<form method="POST" action="/projects/{{ $project->id }}">
{{--    {{ method_field('PATCH') }}--}}
{{--    {{ csrf_field() }}--}}

{{--    @method('DELETE')--}}
    @method('PATCH')
    @csrf

    <div class="field">
        <label class="label" for="title">Project Title</label>

        <div>
            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ $project->title }}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="description" >Project Description</label>
        <div class="control">
            <textarea class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="description" class="textarea">{{$project->description}}</textarea>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link" >Update Project</button>
        </div>
    </div>

</form>
<form method="POST" action="/projects/{{$project->id}}">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link" style="background-color: #c51f1a; color: #cce3f6" > Delete Project </button>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert-danger">
            <div class="link">
                @foreach($errors->all() as $error)
                    <font color="red"><li>{{ $error }}</li></font>
                @endforeach
            </div>
        </div>
    @endif
</form>
</div>

@endsection
