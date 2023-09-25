@extends('layouts.app')




@section('title',  ' Your Task List')


@section('content')

<div class="mt-3 mb-6"><a class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" href="{{ route('task.create')}}">Add New Task</a></div>


@foreach($tasks as $task )

<div class="mb-2">

<a class="underline" href="{{ route('task.show', ['task' => $task->id]) }}">{{$task->title}}</a>

</div>

@endforeach

@if($task->count())

<div>
    {{ $tasks->links() }}
    
</div>

@endif


@endsection