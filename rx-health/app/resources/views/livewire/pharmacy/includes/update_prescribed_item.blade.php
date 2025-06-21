<div
    wire:ignore.self
    id="edit-prescribedItemDetails-{{ $visitDetail->id }}"
    class="accordion-collapse collapse"
    aria-labelledby="edit-prescribedItemDetailsHeading-{{ $visitDetail->id }}"
    data-bs-parent="#accordionFlushExample"
>
    <div class="accordion-body p-3">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                        Frequency
                    </label>

                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        <select class="form-select" id="selected_frequency" wire:model="selected_frequency.{{ $key }}">
                            @foreach ($this->frequencies as $frequency)
                                <option
                                    value="{{ $frequency->frequency }}"
                                    {{ $selected_frequency === $frequency->frequency ? 'selected' : '' }}
                                >
                                    {{ Str::title($frequency->frequency) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('selected_frequency')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">Days</label>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        <input type="number" min="1" class="form-control" id="days" wire:model="days.{{ $key }}" />
                    </div>
                    @error('days')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                        Dosage Form
                    </label>
                    <select
                        class="form-control"
                        name="selected_dosage_form"
                        id="selected_dosage_form"
                        wire:model="selected_dosage_form.{{ $key }}"
                    >
                        <option></option>
                        @foreach ($this->dosage_forms as $dosage_form)
                            <option value="{{ $dosage_form->dosage_form }}">
                                {{ $dosage_form->dosage_form }}
                            </option>
                        @endforeach
                    </select>

                    @error('selected_dosage_form')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                        Dosage Unit
                    </label>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        <input
                            type="number"
                            min="1"
                            class="form-control"
                            id="dosage_unit"
                            name="dosage_unit"
                            wire:model="dosage_unit.{{ $key }}"
                        />

                        @error('dosage_unit')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">Route</label>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        <select
                            class="form-control"
                            id="route"
                            name="route"
                            wire:model="selected_route_of_administration.{{ $key }}"
                        >
                            <option></option>
                            @forelse ($this->route_of_administrations as $route_of_administration)
                                <option value="{{ $route_of_administration->route }}">
                                    {{ $route_of_administration->route }}
                                </option>
                            @empty
                                <option>No Route Found</option>
                            @endforelse
                        </select>
                    </div>
                    @error('selected_route_of_administration')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row mt-n5">
                    <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">Quantity</label>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        <input
                            class="form-control"
                            id="qty"
                            name="qty"
                            type="number"
                            min="1"
                            wire:model="qty.{{ $key }}"
                        />
                    </div>
                    @error('qty')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <button
                    type="button"
                    class="btn mb-3 btn-success rounded-pill"
                    title="Update"
                    wire:click="updatePrescribedItemDetails({{ $visitDetail->id }}, {{ $key }})"
                >
                    <i class="fa fa-save me-0"></i>
                    Update
                </button>
                <button
                    type="button"
                    {{-- collapse the accordion --}}
                    data-bs-toggle="collapse"
                    data-bs-target="#edit-prescribedItemDetails-{{ $visitDetail->id }}"
                    class="btn mb-3 btn-danger rounded-pill"
                    title="Cancel"
                    wire:click="cancelEditPrescribedItemDetails({{ $visitDetail->id }})"
                >
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
