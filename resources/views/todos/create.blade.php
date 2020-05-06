@extends('todos.layout')
@section('content')
        <div class="flex justify-between border-b border-gray-600 p-4">
            <h1 class="text-2xl pb-4 border-gray-600">What next you need To-Do</h1>
            <a class="mx-5 py-2 text-gray-600 cursor-pointer" href="{{route('todo.index')}}"><span class="fas fa-arrow-left" /></a>
        </div>
                
        <x-alert />
        <form method="post" action="{{route('todo.store',)}}" class="py-5">
            @csrf
            <div class="py-1">
                <input type="text" name="title" placeholder="title" class="py-2 px-2 border rounded">
            </div>
            <div class="py-1">
                <textarea name="description" placeholder="description" class="p-2 rounded border"></textarea>
            </div>

            <div class="py-2">
                 @livewire('step')
            </div>
            <div class="py-1">
                <input type="submit" value="create" class="p-2 border rounded">
            </div>
        </form>
        
@endsection
