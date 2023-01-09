<div class="p-6">
    <form wire:submit.prevent="courseUpdate">
        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required',
            ])
        </div>

        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'placeholder' => 'Enter name',
            'required' => 'required',
            ])
        </div>

        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' => 'Add price',
            'required' => 'required',
            ])
        </div>

        <div class="flex mb-6 items-center">
            <div class="w-full mr-4">
                <label class="lms-label" for="days">Days</label>
                <div class="flex flex-wrap -mx-4">
                    @foreach ($days as $day)
                    <div class="min-w-max flex items-center px-4">
                        <input wire:model.lazy="selectedDays" class="mr-2" type="checkbox" value="{{ $day }}"
                            id="{{ $day }}"> <label for="{{ $day }}">{{ ucfirst($day) }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="min-w-max mr-4">
                <div class="mb-6">
                    @include('components.form-field', [
                    'name' => 'time',
                    'label' => 'Time',
                    'type' => 'time',
                    'placeholder' => 'Enter time',
                    'required' => 'required',
                    ])
                </div>
            </div>

            <div class="min-w-max">
                <div class="mb-6">
                    @include('components.form-field', [
                    'name' => 'end_date',
                    'label' => 'End date',
                    'type' => 'date',
                    'placeholder' => 'Enter end date',
                    'required' => 'required',
                    ])
                </div>
            </div>
        </div>



        @include('components.wire-loading-btn')
    </form>
</div>