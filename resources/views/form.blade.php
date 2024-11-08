@extends('layouts.app')
@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" 
                @class(['border-red-500' => $errors->has('title')])
            
            value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Description</label>
            <textarea name="description" id="description"
            @class(['border-red-500' => $errors->has('description')])
             rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" 
            @class(['border-red-500' => $errors->has('long_description')])
            rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="rounded-md px-2 py-1 text-center font--medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 text-slate-700">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{route('tasks.index')}}" class="font-medium text-grey-700 underline decoration-pink-500">Cancel</a>
        </div>
    </form>
@endsection
