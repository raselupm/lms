<div>
    <div class="table w-full p-2">
        <table class="w-full border">
            <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer" > Name</div>
                </th>
                <th class="p-2 border-r cursor-pointer ">
                    <div class="flex items-center justify-center"> Action</div>
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($quizzes as $quiz)
                <tr class="bg-gray-100 text-center border-b ">
                    <td class="p-2 border-r text-left px-4">{{$quiz->name}}</td>
                    <td class="flex items-center justify-center">
                        <a href="{{route('quiz.edit',$quiz->id)}}" class="ml-2 pt-2">@include('components.icons.edit')</a>
                        <a href="{{route('quiz.show',$quiz->id)}}" class="ml-2 pt-2">@include('components.icons.eye')</a>
                        <form class="ml-2 pt-3" wire:submit.prevent="deleteQuiz({{$quiz->id}})" ><button onclick="return confirm('Are you sure?');" type="submit" > @include('components.icons.trash')
                        </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{$quizzes->links()}}
        </div>
    </div>


