<div>
    <div>
        <h4>Goals</h4>
    </div>
    <div class="row">
        @foreach ($treatment_plan_types as $key => $treatment_plan_type)
            <div class="form-group mt-2 col-12">
                <label for="treatment_plan.{{ $key }}">{{ $treatment_plan_type }}</label>
                <textarea
                    class="form-control"
                    name="treatment_plan.{{ $key }}"
                    id="treatment_plan.{{ $key }}"
                    wire:model="treatment_plan.{{ $key }}"
                ></textarea>
                <small class="text-danger">NOTE: Saving empty value will delete all previous data</small>
            </div>
        @endforeach
    </div>

    @if ($visit->sign == 'No')
        <div class="d-flex justify-content-end my-2">
            <button class="btn btn-primary" wire:click="saveTreatmentPlan">Save</button>
        </div>
    @endif
</div>
