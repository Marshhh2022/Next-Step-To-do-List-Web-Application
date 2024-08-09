<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();  // Filter by user
        return view('todos.index', ['todos' => $todos]);
    }
    

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => 0,
            'user_id' => auth()->id(), // Add this line to associate the todo with the current user
        ]);
        $request->session()->flash('alert-success', 'Step Created Successfully');
    
        return to_route('todos.index');
    }

    public function edit($id)
    {
        $todo = Todo::where('id', $id)->where('user_id', auth()->id())->first();
    
        if (!$todo) {
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index');
        }
    
        return view('todos.edit', ['todo' => $todo]);
    }
    
    public function update(TodoRequest $request)
    {
        $todo = Todo::where('id', $request->todo_id)->where('user_id', auth()->id())->first();
    
        if (!$todo) {
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index');
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
        $todo = Todo::where('id', $id)->where('user_id', auth()->id())->first();
    
        if (!$todo) {
            request()->session()->flash('error', 'Unable to locate Step');
            return to_route('todos.index');
        }
    
        $todo->delete();
        request()->session()->flash('alert-danger', 'Step Deleted Successfully');
        return to_route('todos.index');
    }
    


    
}
