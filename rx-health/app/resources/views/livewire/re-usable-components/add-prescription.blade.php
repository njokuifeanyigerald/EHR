<div>
    <form wire:submit="savePrescription">
        @csrf

        <div class="form-group">
            @if ($this->selected_drug_name)
                <input
                    type="text"
                    class="form-control my-2 shadow"
                    wire:model.live="selected_drug_name"
                    wire:click="resetSelectedDrug"
                    autofocus
                />
            @else
                <input
                    type="search"
                    class="form-control my-2 shadow"
                    id="exampleInputText1"
                    placeholder="Search Drug..."
                    wire:key="drug_search"
                    wire:model.live="drug_search"
                    {{-- wire:keydown.arrow-up="decrementDrugsHighlight" --}}
                    {{-- wire:change="updateDrugSearch($event.target.value)" --}}
                    {{-- wire:keydown.arrow-down="incrementDrugsHighlight" --}}
                    {{-- wire:keydown.enter="selectDrug" --}}
                    autofocus="on"
                    autocomplete="off"
                />
            @endif

            <x-input-error :messages="$errors->get('drug')" class="mt-1" />
            <div class="position-relative relative z-20" style="z-index: 100">
                <div class="position-absolute absolute z-10 w-100 rounded-xl list-group bg-black">
                    <div
                        wire:loading
                        wire:target="drug_search"
                        class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                    >
                        <div class="list-item">Searching...</div>
                    </div>

                    @if (! empty($this->drug_search) && ! $this->selected_drug_name)
                        <div
                            class="absolute z-10 w-full rounded-t-none shadow-lg list-group-item bg-white"
                            style="display: flex"
                        >
                            <div style="flex: 0 0 70%">Item</div>
                            <div style="flex: 0 0 30%">Item Code</div>
                        </div>
                        @forelse ($this->drugs as $i => $drug)
                            <div
                                class="absolute z-20 w-full rounded-t-none shadow-lg list-group-item {{ $this->highlight_index === $i ? 'active' : 'bg-white' }}"
                                style="display: flex"
                                wire:click="saveSelectedDrug( {{ $drug }} )"
                            >
                                <div class="flex-wrap" style="flex: 0 0 70%">
                                    {{ $drug->item_name }}
                                </div>
                                <div style="flex: 0 0 30%">
                                    {{ $drug->item_code }}
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item active text-center">No result</div>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">Frequency</label>
            <div class="row">
                @forelse ($this->frequencies as $frequency)
                    <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                        <div
                            class="{{-- custom-control  custom-radio custom-control-inline --}} d-flex align-items-center gap-2"
                        >
                            <input
                                type="radio"
                                {{-- id="{{ $frequency->frequency }}" --}}
                                name="cb_name"
                                {{-- class="custom-control-input" --}}
                                value="{{ $frequency->frequency }}"
                                wire:model.defer="frequency"
                            />
                            <label
                                {{-- class="custom-control-label" --}}
                                {{-- for="{{ $frequency->frequency }}" --}}
                            >
                                {{ $frequency->frequency }}
                            </label>
                        </div>
                    </div>
                @empty
                    <div class="col-12 mt-2">
                        <div class="custom-control">No Frequency Found</div>
                    </div>
                @endforelse
            </div>
            <x-input-error :messages="$errors->get('frequency')" class="mt-1 col-md-12 col-sm-12" />
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-6 col-6">
                <label class="col-form-label font-size-base font-weight-bolder">Dose</label>
                <input type="number" class="form-control" id="dose" name="dose" wire:model.defer="dose" />
                <x-input-error :messages="$errors->get('dose')" class="mt-1" />
            </div>

            <div class="col-md-6 col-sm-6 col-6">
                <label class="col-form-label font-size-base font-weight-bolder">Unit</label>
                <select class="form-select" name="dosage_form" id="dosage_form" wire:model.defer="unit">
                    <option value="">Select Unit</option>
                    @forelse ($this->units as $unit)
                        <option value="{{ $unit->dosage_form }}">{{ $unit->dosage_form }}</option>
                    @empty
                        <option>No Unit available</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('unit')" class="mt-1" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 col-sm-6 col-6">
                <label class="col-form-label font-size-base font-weight-bolder">#Days</label>
                <input type="number" class="form-control" name="days" id="days" wire:model.defer="number_of_days" />
                <x-input-error :messages="$errors->get('number_of_days')" class="mt-1" />
            </div>
            @if (! $this->fromDoctor)
                <div class="col-md-6 col-sm-6 col-6">
                    <label class="col-form-label font-size-base font-weight-bolder">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" wire:model.defer="quantity" />
                    <x-input-error :messages="$errors->get('quantity')" class="mt-1" />
                </div>
            @endif

            <div class="col-md-6 col-sm-6 col-6">
                <label class="col-form-label font-size-base font-weight-bolder">Route</label>
                <select class="form-select" id="route" name="route" wire:model.defer="route">
                    <option value="">Select route</option>
                    @forelse ($this->routes as $route)
                        <option value="{{ $route->route }}">{{ $route->route }}</option>
                    @empty
                        <option>No Route available</option>
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('route')" class="mt-1" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">Payment Mode</label>
            <div class="col-md-6 col-sm-12 col-lg-12 col-12">
                <div>
                    {{ $this->billingCodeName($this->billing_code) }}
                    {{--
                        <select class="form-select" name="payment_mode" id="payment_mode">
                        <option value="CASH"> Cash Clients </option>
                        </select>
                    --}}
                </div>
            </div>
            <x-input-error :messages="$errors->get('billing_code')" class="mt-1" />
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
