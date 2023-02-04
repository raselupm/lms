<div>
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex -mx-4 mb-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input wire:model="name" type="text" class="lms-input">

                @error('name')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model="email" type="email" class="lms-input">

                @error('email')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input wire:model="phone" type="tel" class="lms-input">

                @error('phone')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @include('components.wire-loading-btn')
    </form>

    <h3 class="font-bold text-lg mb-4">Notes</h3>
    @foreach($notes as $note)
        <div class="flex justify-between mb-4 border border-gray-100 p-4">
            {{$note->description}}
            <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="noteDelete({{$note->id}})">
                <button type="submit">
                    @include('components.icons.trash')
                </button>
            </form>
        </div>
    @endforeach


    <h4 class="font-bold mb-2">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>


</div>
