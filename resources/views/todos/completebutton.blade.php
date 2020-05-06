@if($todo->completed)
    <span onclick="event.preventDefault();
        document.getElementById('form-incomplete-{{$todo->id}}').submit()" 
        class="fas fa-check text-green-600 p-2 cursor-pointer"></span>
    <form action="{{route('todo.incomplete',$todo->id)}}" style="display:none" method="post" id="{{'form-incomplete-'.$todo->id}}">
        @csrf
        @method('delete')
    </form>
        @else
    <span onclick="event.preventDefault();
        document.getElementById('form-complete-{{$todo->id}}').submit()" 
        class="fas fa-check text-gray-400 p-2 cursor-pointer"></span>
    <form action="{{route('todo.complete',$todo->id)}}" style="display:none" method="post" id="{{'form-complete-'.$todo->id}}">
        @csrf
        @method('put')
    </form>
@endif

