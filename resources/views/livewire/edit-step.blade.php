<div>
    @if(count($steps)>0)
    <div class="flex justify-center">
        <h2 class="text-lg">Add steps if required </h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer" />
    </div>
    
    @for($i =0;$i<count($steps);$i++)
        <div class="flex justify-center py-1" wire:key="{{$i}}">
            <input type="text" name="step[]"  value="{{$steps[$i]['name']}}" placeholder="{{'Describe Steps '.($i+1)}}" class="py-2 px-2 border rounded">
            <span wire:click="remove({{$i}})" class="cursor-pointer fas fa-times p-4 text-red-500" />
        </div>
    @endfor
    @else
     No Step for this Todo
    @endif

</div>
