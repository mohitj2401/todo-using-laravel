@extends('todos.layout')
@section('content')
        <div class="flex justify-between border-b border-gray-600 p-4">
            <h1 class="text-2xl pb-4 border-gray-600">{{$todo->title}}</h1>
            <a class="mx-5 py-2 text-gray-600 cursor-pointer" href="{{route('todo.index')}}"><span class="fas fa-arrow-left" /></a>
        </div>

        <div>   
            <div>
                <h3 class="text-lg">Description For This Task</h3>

                <p class="text-lg">{{$todo->description}}</p>
            </div>
            @if($todo->steps->count()>0)
            <div class="py-4">
                <h3 class="text-lg">Steps For This Task</h3>
                @foreach($todo->steps->sortBy('id') as $step)
                    <p>{{'Step '.($loop->index+1).': '.$step->name}}</p>
                @endforeach
            </div>
            @endif
        </div>
        
@endsection
