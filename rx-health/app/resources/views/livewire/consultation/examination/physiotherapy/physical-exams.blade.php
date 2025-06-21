<div>
    <div>
        <h4>Examinations</h4>
    </div>
    <div class="row">
        {{--
            @foreach ($exam_sections as $key => $exam_section)
            <div class="form-group mt-2 col-6">
            <label for="physical_exams.{{ $key }}">{{ $exam_section }}</label>
            <textarea
            class="form-control"
            name="physical_exams.{{ $key }}"
            id="physical_exams.{{ $key }}"
            wire:model="physical_exams.{{ $key }}"
            ></textarea>
            <small class="text-danger">NOTE: Saving empty value will delete all previous data</small>
            </div>
            @endforeach
        --}}
        <div class="form-group mt-2 col-12">
            {{-- <label for="physical_exams">Examinations</label> --}}
            <textarea
                class="form-control"
                name="physical_exams"
                id="physical_exams"
                wire:model="physical_exams"
            ></textarea>
            <small class="text-danger">NOTE: Saving empty value will delete all previous data</small>
        </div>
    </div>

    @if ($visit->sign == 'No')
        <div class="d-flex justify-content-end my-2">
            <button class="btn btn-primary" wire:click="savePhysicalExams">Save</button>
        </div>
    @endif
</div>
