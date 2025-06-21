<div>
    <div wire:ignore.self id="add_or_edit_glucose" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Glucose Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    wire:model="date"
                                    type="date"
                                    class="form-control my-2"
                                    id="date"
                                    name="date"
                                    {{-- value="" --}}
                                />
                                <x-input-error :messages="$errors->get('date')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    wire:model="time"
                                    type="time"
                                    class="form-control my-2"
                                    id="time"
                                    name="time"
                                    {{-- value="" --}}
                                />
                                <x-input-error :messages="$errors->get('time')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FBS">
                                    FBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    wire:model="fbs"
                                    type="number"
                                    class="form-control my-2"
                                    id="FBS"
                                    {{-- value="" --}}
                                />
                                <x-input-error :messages="$errors->get('fbs')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sugar_level">
                                    RBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    wire:model="rbs"
                                    type="number"
                                    class="form-control my-2"
                                    id="RBS"
                                    {{-- value="" --}}
                                />
                                <x-input-error :messages="$errors->get('rbs')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea
                            wire:model="remarks"
                            class="form-control my-2"
                            id="remarks"
                            cols="6"
                            rows="3"
                        ></textarea>
                        <x-input-error :messages="$errors->get('remarks')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveGlucoseMonitoringData" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
