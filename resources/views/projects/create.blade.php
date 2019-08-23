@extends('layout')
@section('title','Edit a Projects')
@section('content')

    <h1>Create a New Projects</h1>

    <form method="POST" action="/projects">

        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Project Title</label>
            <div>
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Project title" value="{{ old('title') }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="description" >Project Description</label>
            <div>
                <textarea class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Project description" >{{ old('description') }}</textarea>
            </div>
            <div>
                <button type="submit" class="button is-link" style="" >Create Project </button>
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
        </div>
    </form>

@endsection
