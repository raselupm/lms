<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-left">Role</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td class="border px-4 py-2">{{$user->name}}</td>
            <td class="border px-4 py-2">{{$user->email}}</td>
            <td class="border px-4 py-2">
                @foreach ($user->roles as $role)
                <span class="bg-gray-800 p-2 px-2 py-1 rounded text-sm text-white">{{$role->name}}</span>
                @endforeach
            </td>
            <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($user->created_at))}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="mr-1" href="{{route('user.edit', $user->id)}}">
                        @include('components.icons.edit')
                    </a>

                    <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="userDelete({{$user->id}})">
                        <button type="submit">
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{-- {{$user->links()}} --}}
    </div>
</div>