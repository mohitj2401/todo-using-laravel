@extends('todos.layout')
@section('content')
        <div class="flex justify-between border-b border-gray-600 p-4">
            <h1 class="text-2xl">ALL Your To-Do's</h1>

            <a class="mx-5 py-2 text-blue-400 cursor-pointer" href="{{route('todo.create')}}"><span class="fas fa-plus-circle"></span></a>
        </div>
        <x-alert />
        <ul class="my-5">
        @forelse($todos as $todo)
            <li class="p-2 flex justify-between">
              <div>  @include('todos.completebutton')</div>

            @if($todo->completed)

                <p class="line-through">{{$todo->title}}</p>
                @else
                <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
            @endif
            <div>
                

                <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 cursor-pointer text-white">
                <span class="fas fa-pen px-2" /></a>

                <span class="fas fa-times text-red-600 p-2 cursor-pointer"     onclick="event.preventDefault();
                    if(confirm('Are you really want to delete')){
                        document.getElementById('form-delete-{{$todo->id}}').submit()
                    }
                    "/>

                <form action="{{route('todo.destroy',$todo->id)}}"          style="display:none" method="post" id="{{'form-delete-'.$todo->id}}">
                     @csrf
                     @method('delete')
                </form>
                
            </div>
            </li>
        @empty
                    <p>No tast available, create one </p>
        @endforelse
        </ul>
@endsection
