<div class="max-w-xl w-full">
    @foreach($inputs as $key => $input)
    <div class="mt-12">
        <div class="w-full">
            <label for="input_{{$key}}_email" class="sr-only">Email</label>
            <input type="email" id="input_{{$key}}_email" wire:model.defer="inputs.{{$key}}.email" class="shadow-sm border-0 focus:outline-none p-3 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com" autocomplete="off">
            @error('inputs.'.$key.'.email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
        </div>
        @if($key > 0)
        <div wire:click="removeInput({{$key}})" class="flex items-center justify-end text-red-600 text-sm w-full cursor-pointer">

            <p>Remove Input</p>
        </div>
        @endif
    </div>
    @endforeach

    <div wire:click="addInput" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">

        <p class="ml-2 p-2 bg-slate-500">Add New Input</p>
    </div>

    <div class="w-full flex justify-end mt-12">
        <button wire:click="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg">Submit</button>
    </div>
</div>
