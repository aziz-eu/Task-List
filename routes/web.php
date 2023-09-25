<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('task', function(){

    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('task.index');



Route::view('task/create', 'create' )->name('task.create');



Route::get('task/{task}', function(Task $task){

    return view('show', [
        'task' => $task
    ]);
})->name('task.show');


Route::post('/task', function( TaskRequest $request){



  $task = Task::create($request->validated());

  return redirect()->route('task.show', ['task'=> $task->id])->with('success', 'Task Created Successfully');
    

})->name('task.store');

Route::get('task/{task}/edit', function(Task $task){

   return view('edit',
    [
        'task' => $task
    ]);
})->name('task.edit');

Route::put('/task/{task}', function(Task $task, TaskRequest $request){


   
  
    $task->update($request->validated());
  
    return redirect()->route('task.show', ['task'=>$task->id])->with('success', 'Task Created Successfully');
      
  
  })->name('task.update');


  Route::delete('/task/{task}', function(Task $task){
      $task->delete();
      return redirect()->route('task.index')->with('success', 'Task Deleted Successfully');
  })->name('task.delete');

  Route::post('task/{task}/make-completed', function(Task $task){

    $task->completed = !$task->completed;

    $task->save();

    return redirect()->back();

  })->name('task.iscompleted');