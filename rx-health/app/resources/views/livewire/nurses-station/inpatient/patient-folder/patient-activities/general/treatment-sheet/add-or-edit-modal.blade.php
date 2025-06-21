<div>
    <div wire:ignore.self id="add_or_edit_treatment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Treatment Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    @if (! $this->medical_record)
                        <div class="form-group">
                            <div class="rx-custom-alert-dark" role="alert">
                                @forelse ($this->prescriptions as $prescription)
                                    <div class="text-dark d-flex justify-content-between py-1">
                                        <span class="my-auto">
                                            <span class="text-dark">{{ $prescription->item->item_name }}:</span>
                                            <x-dosage-interpretation :prescription="$prescription" />
                                        </span>
                                        <span
                                            wire:click="addPrescription({{ $prescription->id }})"
                                            class="btn btn-sm btn-primary h-full"
                                        >
                                            <i class="fa fa-plus m-auto"></i>
                                            {{-- Add --}}
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-dark d-flex justify-content-between py-1">
                                        <span class="my-auto">No Prescriptions</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="prescription_name">Prescription</label>
                        <input
                            type="text"
                            wire:model="prescription_name"
                            class="form-control my-2"
                            id="prescription_name"
                            value=""
                            readonly
                        />
                        <x-input-error :messages="$errors->get('prescription_name')" class="mt-1" />
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input
                                    type="date"
                                    class="form-control my-2"
                                    id="date"
                                    wire:model="date"
                                    name="date"
                                    value="2019-12-18"
                                    readonly
                                />
                                <x-input-error :messages="$errors->get('date')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input
                                    type="time"
                                    wire:model="time"
                                    class="form-control my-2"
                                    id="time"
                                    name="time"
                                    value=""
                                />
                                <x-input-error :messages="$errors->get('time')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Select Input</label>
                        <select wire:model="status" class="form-select my-2" id="status" name="status">
                            <option selected="" value="">-- select status--</option>
                            <option value="taken">Taken</option>
                            <option value="refused">Refused</option>
                            <option value="vommited">Vommited</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-1" />
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
                    <button wire:click="saveTreatment" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
