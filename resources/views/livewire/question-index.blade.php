<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">SL.</th>
            <th class="border px-4 py-2 text-left">Question</th>
            <th class="border px-4 py-2 text-left">Answer A</th>
            <th class="border px-4 py-2 text-left">Answer B</th>
            <th class="border px-4 py-2 text-left">Answer C</th>
            <th class="border px-4 py-2 text-left">Answer D</th>
            <th class="border px-4 py-2 text-left">Correct Answer</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
        @foreach($questions as $question)
        <tr>
            <td class="border px-4 py-2">{{$loop->iteration}}</td>
            <td class="border px-4 py-2">{{$question->name}}</td>
            <td class="border px-4 py-2">{{$question->answer_a}}</td>
            <td class="border px-4 py-2">{{$question->answer_b}}</td>
            <td class="border px-4 py-2">{{$question->answer_c}}</td>
            <td class="border px-4 py-2">{{$question->answer_d}}</td>
            <td class="border px-4 py-2">{{$question->correct_answer}}</td>

            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="mr-1" href="{{route('question.edit', $question->id)}}">
                        @include('components.icons.edit')
                    </a>

                    <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="questionDelete({{$question->id}})">
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
        {{$questions->links()}}
    </div>
</div>