<?php

namespace App\Http\Controllers;


use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;

use App\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        
        $todos=auth()->user()->todos->sortBy('completed');
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {   return $todo->steps;
        return view('todos.edit',compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {   
        // $user_id=auth()->id();
        // $request['user_id']=$user_id;
        // Todo::create($request->all());
     dd($request->all());
        
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){

            foreach($request->step as $step){
                $todo->steps()->create(['name'=>$step]);
            }
        }
        
        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }

    public function update(TodoCreateRequest $request,Todo $todo)
    {   
        $todo->update(['title'=>$request->title,'description'=>$request->description]);
        return redirect(route('todo.index'))->with('message','Updated SucessFully');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message','Task Marked as Completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message','Task Marked as Incompleted');
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task Removed');
    }

    public function show(Todo $todo)
    {
       
        
        return view('todos.show',compact('todo'));
    }
}
