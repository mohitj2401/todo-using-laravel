<div>
    <div class="flex justify-center">
        <h2 class="text-lg">Add steps if required </h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer" />
    </div>
    
    @foreach($steps as $step)
        <div class="flex justify-center py-1" wire:key="{{$step}}">
            <input type="text" name="step[]" placeholder="{{'Describe Steps '.($step+1)}}" class="py-2 px-2 border rounded">
            <span wire:click="remove({{$step}})" class="cursor-pointer fas fa-times p-4 text-red-500" />
        </div>
    @endforeach
</div>
