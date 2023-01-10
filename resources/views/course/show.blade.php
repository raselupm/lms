<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- component -->
                <div class="mx-auto flex p-6 text-gray-800">
                    <div class="flex w-full">
                        <figure class="visible">
                            <div class="pt-10 px-2 sm:px-6">
                                <h1 class="font-bold mb-2 underline">
                                    {{$course->name}}
                                </h1>
                                <p class="mb-4 italic">Price: ${{$course->price}}</p>
                                <p class="text-indigo-200 text-base pb-6">{{$course->description}}</p>
                                <div class="flex items-center pt-6 justify-between">
                                    <div class="flex items-center pb-12">
                                        <div class="h-12 w-12">
                                            <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/testimonials/t_1.png"
                                                alt class="h-full w-full object-cover overflow-hidden rounded-full" />
                                        </div>
                                        <p class="text-indigo-200 font-bold ml-3">
                                            Jane Doe <br />
                                            <span class="text-indigo-200 text-base font-light">Apple
                                                Inc</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="sm:block hidden">
                        @if (!empty($course->image) || $course->image != null)
                        <img class="object-cover object-center rounded" alt="hero" src="{{$course->image}}" />
                        @else
                        <img class="object-cover object-center rounded" alt="hero"
                            src="https://dummyimage.com/400x400" />
                        @endif
                    </div>
                </div>
                <div>
                    @if (count($course->curriculumns))
                    <table class="w-full table-auto table-auto text-center w-full">
                        <tr>
                            <th class="border px-4 py-2">SL. </th>
                            <th class="border px-4 py-2">Class Title </th>
                            <th class="border px-4 py-2">Class Time </th>
                            <th class="border px-4 py-2">Day</th>
                            <th class="border px-4 py-2">End Date</th>
                        </tr>

                        @foreach ($course->curriculumns as $curriculumn)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $curriculumn->name }}</td>
                            <td class="border px-4 py-2">{{ $curriculumn->class_time }}</td>
                            <td class="border px-4 py-2">{{ $curriculumn->week_day }}</td>
                            <td class="border px-4 py-2">{{ $curriculumn->end_date }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p class="font-light text-indigo-600 text-xl p-6">No class schedule yet!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>