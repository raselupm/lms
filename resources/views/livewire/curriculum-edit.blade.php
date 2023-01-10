<div class="p-6">
    <form wire:submit.prevent="curriculumUpdate">
        <div class="mb-6">
            @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required',
            ])
        </div>

        @include('components.wire-loading-btn')
    </form>
</div>
