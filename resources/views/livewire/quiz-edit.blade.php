<div>
    <h2>Questions</h2>
    <!-- list -->

    <h2>Add question</h2>
    <form wire:submit.prevent="addQuestion">
        <div class="mb-4">
            <label for="question_id" class="lms-label">Question</label>
            <select class="lms-input" wire:model.lazy="question_id" id="question_id">
                <option value="">Select a question</option>
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">{{ $question->name }}</option>
                @endforeach
            </select>
        </div>

        @include('components.wire-loading-btn')
    </form>
</div>
