<div>
    <form class="p-4" wire:submit.prevent="editQuiz">

        <div class="mb-4">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Question name',
            'required' => 'required',
            ])
        </div>
        <button type="submit" class="lms-btn">Submit </button>


    </form>

    @if (count($questions)>0)
    <form class="p-4" wire:submit.prevent="addQuestion">
        <div class="min-w-max ml-3">
            <label for="question">Add Question</label>
            <select wire:model="question" id="question" class="mb-4">
                @foreach($questions as $question)
                <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
            @error('correct_answer')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="lms-btn">Add </button>
    </form>

    @else
    <h3 class="my-4 text-gray-600 text-lg p-4 ml-3">Add Question</h3>
    <p class="text-red-500 px-4 ml-3">Not Found Any Question!</p>
    @endif
    <div class="p-4">
        <h3 class="my-4 text-gray-600 text-lg ml-3">Question List</h3>
        <div class="table w-full p-2">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="p-2 border-r cursor-pointer text-sm font-thin">
                            <div class="flex items-center justify-center"> Name</div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin">
                            <div class="flex items-center justify-center">Action</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quiz->questions as $question)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="p-2 border-r text-left px-4">{{$question->name}}</td>
                        <td class="flex items-center justify-center">
                            <form wire:submit.prevent="removeQuiz({{$question->id}})"
                                class="bg-red-500 p-2 inline-block text-white hover:shadow-lg text-xs font-thin">
                                <button onclick="return confirm('Are you Sure')" type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>