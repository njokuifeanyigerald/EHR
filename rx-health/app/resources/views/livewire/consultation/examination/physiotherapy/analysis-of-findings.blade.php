<div>
    <div>
        <label class="control-label col-sm-3 align-self-center mb-0" for="analysis_of_findings">
            Analysis of Findings
        </label>

        <textarea class="form-control" name="physical_exams" id="record" wire:model="analysis_of_findings"></textarea>

        {{--
            <x-ck_editor
            :is_array_element="true"
            :component_to_update="'record'"
            wire:model="analysis_of_findings"
            :wire_model="'analysis_of_findings'"
            id="analysis_of_findings"
            />
        --}}

        <x-input-error :messages="$errors->get('analysis_of_findings')" class="mt-1" />
    </div>

    @if ($visit->sign == 'No')
        <div class="d-flex justify-content-end my-2">
            <button class="btn btn-primary" wire:click="saveAnalysisOfFindings">Save</button>
        </div>
    @endif
</div>
