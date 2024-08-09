<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index',[
            'todos' => $todos
        ]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        // $request->validated();
        Todo::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_completed' => 0
        ]);
        $request->session()->flash('alert-success', 'Step Created Successfully');

        return to_route('todos.index');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index')->Errors([
                'error' => 'Unable to locate the Step.'
            ]);
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request)
    {
      
        $todo = Todo::find($request->todo_id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index')->Errors([
                'error' => 'Unable to locate the Step.'
            ]);
        }

        $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed,
        ]);
        $request->session()->flash('alert-info', 'Step Updated Successfully');
        return to_route('todos.index');
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        if(! $todo){
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index');
        }
    
        $todo->delete();
        request()->session()->flash('alert-danger', 'Step Deleted Successfully');
        return to_route('todos.index');
    }
    


    
}
