<form wire:submit.prevent="updateRole">
    <div class="mb-4">
        <label for="name" class="lms-label">Name</label>
        <input wire:model.lazy="name" id="name" type="text"
            class="rounded-md w-full shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        @error('name')
        <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
        @enderror
    </div>

    <h3 class="font-semibold mb-2">Permissions</h3>

    <div class="flex flex-wrap -mx-4">
        @foreach($permissions as $permission)
        <div class="w-1/3 px-4 mb-4">
            <label class="inline-flex items-center">
                <input wire:model.lazy="selectedPermissions" type="checkbox" value="{{$permission->name}}">
                <span class="ml-2">{{$permission->name}}</span>
            </label>
        </div>
        @endforeach

    </div>
    @error('selectedPermissions')
    <div class="text-red-600 text-sm mt-2 px-4 mb-4">{{ $message }}</div>
    @enderror
    <button
        class="bg-gray-800 hover:bg-yellow-800 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">Submit</button>
</form>