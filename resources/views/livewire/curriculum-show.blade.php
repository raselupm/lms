<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{$curriculum->course->name}}</h1>
    <p class="mb-4 italic">Price: ${{$curriculum->course->price}}</p>
    <p class="pb-6">{{$curriculum->course->description}}</p>


    <h2 class="font-bold mb-2">Class</h2>
    <p class="text-gray-600 mb-4"><span>Name: </span>{{$curriculum->name}}</p>
    <h2 class="font-bold mb-2">Students - Present - {{$curriculum->presentStudents()}} | Absent {{$curriculum->course->students()->count() - $curriculum->presentStudents()}}</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2 text-center">Attendance</th>
        </tr>

        @foreach ($curriculum->course->students as $student)
        <tr>
            <td class="border px-4 py-2">{{$student->name}}</td>
            <td class="border px-4 py-2">{{$student->email}}</td>
            <td class="border px-4 py-2">
                <div class="flex items-center justify-center gap-4">
                    @if($student->is_present($curriculum->id))
                        Presented
                    @else
                        <button wire:click="attendance({{$student->id}})" class="py-2 px-3 bg-green-500 text-white">Present</button>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <h3 class="font-bold text-lg my-4">Notes</h3>
    @if (count($notes)>0)
    @foreach($notes as $note)
    <div class="mb-4 border border-gray-100 p-4">{{$note->description}}</div>
    @endforeach
    @else
    <p class="py-4 text-red-400">Not Found Any Note!</p>
    @endif

    <h4 class="font-bold mb-2">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>
</div>
