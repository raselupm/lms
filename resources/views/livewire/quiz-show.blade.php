<div>
    <h1 class="text-center text-2xl py-2">{{$quiz->name}}</h1>
    @php
        $i=1
    @endphp
    <div class="flex items-center gap-4 py-4">
        <p class="flex items-center gap-2">Total <span class=" text-sm radius-full text-white flex justify-center items-center w-8 h-8">{{count($quiz->questions)}}</span></p>
        <p class="flex items-center gap-2">Correct <span class=" text-sm radius-full text-white flex justify-center items-center w-8 h-8">{{$count_correct_answer}}</span></p>
        <p class="flex items-center gap-2">Wrong <span class=" text-sm radius-full text-white flex justify-center items-center w-8 h-8">{{$count_incorrect_answer}}</span></p>
    </div>
    @foreach($quiz->questions as $question)
       <div class="border border-gray-300 mb-4 p-4  @if(array_key_exists($question->id,$correct_answers)) {{$correct_answers[$question->id] ? 'bg-green-100': 'bg-red-100'}} @endif}}">
           <h3 class="text-gray-600"> {{$i++}}.{{$question->name}}</h3>
           <div class="flex gap-4">
               @forEach($answerOpitons as $option)
                   <div class="flex items-center pl-4  rounded">
                       <input wire:click="answerUpdate({{$question->id}})" @if(array_key_exists($question->id,$correct_answers)) disabled @endif wire:change="result" wire:model="answer.{{$question->id}}" id="answer-{{$option}}-{{$question->id}}"  type="radio" value="{{explode('_',$option)[1]}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                       <label for="answer-{{$option}}-{{$question->id}}" class="w-full py-4 cursor-pointer ml-2 text-sm font-medium text-gray-900">{{$question->$option}}</label>
                   </div>
               @endforeach
           </div>
       </div>
    @endforeach
</div>
