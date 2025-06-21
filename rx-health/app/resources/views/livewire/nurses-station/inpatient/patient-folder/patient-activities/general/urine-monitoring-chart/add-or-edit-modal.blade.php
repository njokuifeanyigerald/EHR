<div>
    <div
        wire:ignore.self
        id="add_or_edit_urine_monitoring"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Urine Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="urine_protein">Urine Protein</label>
                                <input
                                    wire:model="urine_protein"
                                    type="number"
                                    class="form-control my-2"
                                    id="urine_protein"
                                    value=""
                                />
                                <x-input-error :messages="$errors->get('urine_protein')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="urine_sugar">Urine Sugar</label>
                                <input
                                    wire:model="urine_sugar"
                                    type="number"
                                    class="form-control my-2"
                                    id="urine_sugar"
                                    value=""
                                />
                                <x-input-error :messages="$errors->get('urine_sugar')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="other">Other</label>
                                <input wire:model="other" type="number" class="form-control my-2" id="other" value="" />
                                <x-input-error :messages="$errors->get('other')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kerotones">Kerotones</label>
                                <input
                                    wire:model="kerotones"
                                    type="number"
                                    class="form-control my-2"
                                    id="kerotones"
                                    value=""
                                />
                                <x-input-error :messages="$errors->get('kerotones')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <div class="input-group my-2">
                                    <input
                                        wire:model="weight"
                                        type="number"
                                        class="form-control"
                                        id="weight"
                                        name="weight"
                                        value=""
                                    />
                                    <span class="input-group-text" id="weight">kg</span>
                                </div>
                                <x-input-error :messages="$errors->get('weight')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveUrineDetails" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
