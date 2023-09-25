@extends('layouts.app')

@section('style')


    <style>
        .error-message{
            color: red;
            font-size: .8rem;
        }
        
    </style>


@endsection

@section('title', isset($task)? 'Edit Task' : 'Add New Task')

@section('content')

<form action="{{ isset($task)? route('task.update', ['task'=>$task->id]) : route('task.store')}}" method="post">
    <!-- {{$errors}} -->
    @csrf
    @isset($task)

    @method('PUT')

    @endisset
    <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" id="title" value="{{ $task->title ?? old('title')}}">
        @error('title')

        <p class="error-message">{{$message}}</p>

        @enderror
    </div>
    <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" rows="4">{{ $task->description ?? old('description')}}</textarea>
        @error('description')
        <p class="error-message">{{$message}}</p>
        @enderror
        
    </div>
    <div class="mb-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="long_description">Long Description</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="long_description" id="long_description" rows="4">{{ $task->long_description ?? old('long_description')}}</textarea>
        
    </div>

    @isset($task)

    <div class="mb-2">
    <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" type="submit">Edit</button>
    @else
    <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" type="submit">Add Task</button>
    @endisset

   <a class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" href="{{ route('task.index')}}">Cancel</a>

    

</form>


@endsection