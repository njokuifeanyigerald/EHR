<div>
    {{-- fluid intake and output chart modal --}}
    <div
        wire:ignore.self
        id="add_or_edit_fluid_intake_and_output"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $this->medical_record ? 'Edit' : 'Add' }} Fluid Intake & Output Record
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="type_of_oral">
                                    Type Of Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_oral"
                                    name="type_of_oral"
                                    value=""
                                    wire:model="type_of_oral"
                                    placeholder=""
                                />
                                <x-input-error :messages="$errors->get('type_of_oral')" class="mt-1" />
                                {{-- <p>No fluid type added yet</p> --}}
                            </div>
                            <div class="form-group">
                                <label for="type_of_iv">
                                    Type Of IV
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_iv"
                                    name="type_of_iv"
                                    value=""
                                    wire:model="type_of_iv"
                                    placeholder=""
                                />
                                {{-- <p>No IV type added yet</p> --}}
                                <x-input-error :messages="$errors->get('type_of_iv')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="in_chloride_in_urine"
                                        name="in_chloride_in_urine"
                                        value=""
                                        placeholder="10-12"
                                        wire:model="in_chloride_in_urine"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="in_chloride_in_urine">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('in_chloride_in_urine')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="oral">
                                    Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="oral"
                                        name="oral"
                                        wire:model="oral"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="oral">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('oral')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="iv">
                                    IV
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        wire:model="iv"
                                        id="iv"
                                        name="iv"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="iv">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('iv')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="out_chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        wire:model="out_chloride_in_urine"
                                        id="out_chloride_in_urine"
                                        name="out_chloride_in_urine"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="out_chloride_in_urine">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('out_chloride_in_urine')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label>
                            Output Route
                            <span class="text-danger">*</span>
                        </label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="urine"
                                        name="urine"
                                        wire:model="urine"
                                        value=""
                                        placeholder="Urine(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="urine">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('urine')" class="mt-1" />
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="tube"
                                        wire:model="tube"
                                        name="tube"
                                        value=""
                                        placeholder="Tube(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="tube">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('tube')" class="mt-1" />
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="vomit"
                                        name="vomit"
                                        wire:model="vomit"
                                        value=""
                                        placeholder="Vomit(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="vomit">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('vomit')" class="mt-1" />
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="other"
                                        name="other"
                                        wire:model="other"
                                        value=""
                                        placeholder="Other(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="other">mml</span>
                                </div>
                                <x-input-error :messages="$errors->get('other')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveFluid" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
