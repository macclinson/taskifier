<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    // Return view for creating new tasks
    public function create(){
      return view('tasks.create');
    }

    // Create a new task
    public function store(){
      $this->validate(request(),[
        'title' => 'required',
        'body' => 'required'
      ]);

      Task::create([
        'title' => request('title'),
        'body' => request('body'),
        'user_id' => auth()->id()
      ]);

      return redirect('/dashboard');
    }

    // Display individual task details
    public function show(Task $task){
      return view('tasks.show', compact('task'));
    }

    // Delete a task
    public function delete($id){
      Task::where('id', $id)->delete();
      session()->flash('warningMessage', 'Task Has Been Deleted');
      return back();
    }

    // Mark a task as completed
    public function complete($id){
      Task::where('id', $id)->update(['status' => '1']);
      session()->flash('successMessage', 'Task has been completed');
      return back();
    }

    // Mark a task as incompleted
    public function incomplete($id){
      Task::where('id', $id)->update(['status' => '0']);
      session()->flash('infoMessage', 'Task is still pending');
      return back();
    }

    // Return view for editing a task
    public function edit($id){
      $task = Task::find($id);
      return view('tasks.edit', compact('task'));
    }

    // Edit and update a task
    public function update($id){
      Task::where('id', $id)->update([
        'title' => request('title'),
        'body' => request('body')
      ]);
      return redirect('/dashboard');
    }
}
