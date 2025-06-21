<div>
    {{-- New Diet Plan --}}
    <div
        wire:key="new_diet_plan"
        wire:ignore.self
        id="new_diet_plan"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Update' : 'New' }} Diet Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new-user-info">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="control-label align-self-center mb-0" for="Diet_Type">
                                        Diet Type
                                    </label>
                                    {{--
                                        <input type="text" value="" class="form-control my-2" id="Diet_Type" />
                                    --}}

                                    <select wire:model.live="diet_plan_type" class="form-select my-2" id="Diet_Type">
                                        <option selected="">Select Option</option>
                                        @forelse ($this->diet_plan_for_types ?? [] as $diet_plan)
                                            <option value="{{ $diet_plan }}">{{ $diet_plan }}</option>
                                        @empty
                                            <option value="">No Diet Plan Found</option>
                                        @endforelse
                                    </select>

                                    <x-input-error :messages="$errors->get('diet_plan_type')" class="mt-1" />
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="control-label align-self-center mb-0" for="Special_Diet_Name">
                                        Special Diet Name
                                    </label>

                                    <input
                                        wire:model="special_diet_name"
                                        type="text"
                                        value=""
                                        class="form-control my-2"
                                        id="Special_Diet_Name"
                                        {{ $this->diet_plan_type != 'Other (Special Diet)' ? 'disabled' : '' }}
                                    />

                                    <x-input-error :messages="$errors->get('special_diet_name')" class="mt-1" />
                                </div>

                                <div>
                                    <label
                                        class="control-label col-sm-3 align-self-center mb-0"
                                        for="diet_plan_details"
                                    >
                                        Diet Plan Details
                                    </label>

                                    <x-ck_editor
                                        :is_array_element="true"
                                        :component_to_update="'record'"
                                        wire:model="diet_plan_details"
                                        :wire_model="'diet_plan_details'"
                                        id="diet_plan_details"
                                    />

                                    <x-input-error :messages="$errors->get('record')" class="mt-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveDietPlan" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
