<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{$course->name}}</h1>
    <p class="mb-4 italic">Price: ${{$course->price}}</p>
    <p class="pb-6">{{$course->description}}</p>


    <h2 class="font-bold mb-2">Classes</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Actions</th>
        </tr>

        @foreach ($curriculums as $class)
        <tr>
            <td class="border px-4 py-2">{{$class->name}}</td>
            <td class="border px-4 py-2">
                <div class="flex items-center justify-center">
                    <a class="mr-1" href="{{route('class.edit',$class->id)}}">
                        @include('components.icons.edit')
                    </a>

                    <a class="mr-1" href="{{route('class.show', $class->id)}}">
                        @include('components.icons.eye')
                    </a>

                    <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="curriculamDelete({{$class->id}})">
                        <button type="submit">
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>