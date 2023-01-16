<div>
    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input wire:model.lazy="search" type="text" class="lms-input" placeholder="Search" required>
        <div class="ml-4"><button type="submit" class="lms-btn">Search</button></div>
    </form>

    @if(count($leads) > 0)
        <form wire:submit.prevent="admit">
            <div class="mb-4">
                <select wire:model.lay="lead_id" class="lms-input">
                    <option value="">Select lead</option>
                    @foreach($leads as $lead)
                        <option value="{{$lead->id}}">{{$lead->name}} - {{$lead->phone}}</option>
                    @endforeach
                </select>
            </div>

            @if(!empty($lead_id))
                <div class="mb-4">
                    <select wire:change="courseSelected" wire:model.lay="course_id" class="lms-input">
                        <option value="">Select course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(!empty($selectedCourse))
                <p class="mb-4">Price: ${{number_format($selectedCourse->price, 2)}}</p>

                <div class="mb-4">
                    <input wire:model.lazy="payment" type="number" step=".01" max="{{number_format($selectedCourse->price, 2)}}" class="lms-input" placeholder="Payment now">
                </div>

                @include('components.wire-loading-btn')
            @endif
        </form>
    @elseif(count($leads) === 0 && $notFound)
        <form class="mt-6" wire:submit.prevent="addStudent">
            <div class="mt-6 mb-3 w-full flex items-center gap-4">
                <div>
                    @include('components.form-field', [
                        'name' => 'name',
                        'label' => 'Name',
                        'type' => 'text',
                        'placeholder' => 'Enter name',
                        'required' => 'required',
                    ])
                </div>
                <div>
                    @include('components.form-field', [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'placeholder' => 'Enter Email',
                        'required' => 'required',
                    ])
                </div>

                <div>
                    @include('components.form-field', [
                        'name' => 'password',
                        'label' => 'Password',
                        'type' => 'password',
                        'placeholder' => 'Enter password',
                        'required' => 'required',
                    ])
                </div>

            </div>

          <div class="mt-3">
              @if (empty($user_id))
                  @include('components.wire-loading-btn')
              @endif
          </div>
        </form>

        <form class="mt-4" wire:submit.prevent="studentAdmit">
            @if(!empty($user_id))
                <div class="mb-4">
                    <select wire:change="courseSelected" wire:model.lay="course_id" class="lms-input">
                        <option value="">Select course</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(!empty($selectedCourse))
                <p class="mb-4">Price: ${{number_format($selectedCourse->price, 2)}}</p>

                <div class="mb-4">
                    <input wire:model.lazy="payment" type="number" step=".01" max="{{number_format($selectedCourse->price, 2)}}" class="lms-input" placeholder="Payment now">
                </div>

                @include('components.wire-loading-btn')
            @endif
        </form>

    @endif
</div>
