@extends('layouts.app')

@section('title',$task->title)



@section('content')
<a class="font-medium text-gray-700 underline decoration-pink-500" href="{{route('task.index')}}">⬅️ Back to the Task List</a>

<div>
    <p class="font-sm text-slate-700 my-2">{{$task->description}}</p>
</div>
<div>
    <p class="font-sm text-slate-700 mb-1"> {{$task->long_description}}</p>
</div>
<div>
    <p class="text-red-500 font-bold">{{$task->completed ? 'Completed' : 'Not Completed'}}</p>
</div>
<div>
    <p class="text-xs text-slate-500 my-4">Created : {{$task->created_at->diffForHumans()}} <br> Updated: {{$task->updated_at->diffForHumans()}}</p>
</div>


<div class="flex gap-2">
    <a class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" href=" {{route('task.edit', ['task' => $task]) }}">Edit</a>

   <form action="{{ route('task.iscompleted', ['task'=> $task]) }}" method="POST">
    @csrf
    <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50">Make as {{ $task->completed ? 'Not Completed' : 'completed' }}</button>
   </form>

    <form action="{{ route('task.delete', ['task'=>$task->id]) }}" method="POST" >
        @csrf 
        @method('DELETE')

    <button class="rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50" type="submit">Delete</button>
    </form>
</div>

@endsection