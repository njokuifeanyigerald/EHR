<div>
    {{-- New Vision/IOP modal --}}
    <div wire:ignore.self id="new_vision" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'New' }} Patient Vision/Iop</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new-user-info">
                        <div class="row">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                            Blood Pressure
                                        </label>
                                        <div class="col-sm-4">
                                            <input
                                                wire:model="vision_details.systolic_pressure"
                                                type="number"
                                                value=""
                                                class="form-control my-2"
                                                id="bp"
                                            />
                                        </div>
                                        <div class="col-sm-1">
                                            <h1>/</h1>
                                        </div>
                                        <div class="col-sm-4">
                                            <input
                                                wire:model="vision_details.diastolic_pressure"
                                                type="number"
                                                value=""
                                                class="form-control my-2"
                                                id="bp"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get('vision_details.blood_pressure')"
                                        class="mt-2"
                                    />
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                            Pulse
                                        </label>
                                        <div class="col-sm-9">
                                            <input
                                                wire:model="vision_details.pulse"
                                                type="number"
                                                value=""
                                                class="form-control my-2"
                                                id="pulse"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('vision_details.pulse')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="vision_right">
                                            Vision (Right)
                                        </label>
                                        <div class="col-sm-9">
                                            <input
                                                wire:model="vision_details.vision_right"
                                                type="text"
                                                value=""
                                                class="form-control my-2"
                                                id="vision_right"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get('vision_details.vision_right')"
                                        class="mt-2"
                                    />
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="vision_left">
                                            Vision (Left)
                                        </label>
                                        <div class="col-sm-9">
                                            <input
                                                wire:model="vision_details.vision_left"
                                                type="text"
                                                value=""
                                                class="form-control my-2"
                                                id="vision_left"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get('vision_details.vision_left')"
                                        class="mt-2"
                                    />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="nct_right">
                                            NCT:Iop (right)
                                        </label>
                                        <div class="col-sm-9">
                                            <input
                                                wire:model="vision_details.nct_iop_right"
                                                type="text"
                                                value=""
                                                class="form-control my-2"
                                                id="nct_right"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get('vision_details.nct_iop_right')"
                                        class="mt-2"
                                    />
                                </div>
                                <div class="form-group col-sm-6">
                                    <div class="row">
                                        <label class="control-label col-sm-3 align-self-center mb-0" for="nct_left">
                                            NCT:Iop (left)
                                        </label>
                                        <div class="col-sm-9">
                                            <input
                                                wire:model="vision_details.nct_iop_left"
                                                type="text"
                                                value=""
                                                class="form-control my-2"
                                                id="nct_left"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get('vision_details.nct_iop_left')"
                                        class="mt-2"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="savePatientVision" type="submit" class="btn btn-primary">
                        Save Patient Vision/Iop
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
