<div>
    <div class="iq-card">
        <div class="iq-card-body">
            <form wire:submit.prevent="addDrug">
                <div class="form-group position-relative">
                    <input
                        type="search"
                        class="form-control my-2 shadow"
                        id="exampleInputText1"
                        placeholder="Search Items..."
                        wire:model.live.debounce.550ms="query"
                        wire:click="resetFields"
                        wire:keydown.escape="hideDropdown"
                        wire:keydown.tab="hideDropdown"
                        wire:keydown.arrow-up="decrementHighlight"
                        wire:keydown.arrow-down="incrementHighlight"
                        wire:keydown.enter.prevent="selectedItem"
                        name="item_name"
                        autofocus
                        autocomplete=""
                    />

                    @error('selectedItem')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    @if ($this->searchItems && $this->query)
                        <div
                            class="position-absolute table-bordered table-responsive"
                            style="z-index: 1000; width: 100%; max-height: 300px; overflow-y: auto"
                        >
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-wrap">Item Name</th>
                                        <th scope="col">PRICE</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->searchItems as $item)
                                        @php
                                            $item_price = \App\Helpers\ItemPriceHelper::getItemPrice($item['id'], $this->selected_billing_mode);
                                            $item_quantity = \App\Helpers\QuantityAvailableHelper::getQuantityAvailableForInventoryStore($item['id']);
                                        @endphp

                                        {{-- <tr class="{{ $item_price === 0 ? 'table-danger' : '' }}"> --}}
                                        <tr>
                                            <td class="text-wrap">{{ $item['item_name'] }}</td>
                                            <td>
                                                {{ $item_price }}
                                            </td>
                                            <td>
                                                {{ $item_quantity }}
                                            </td>
                                            <td>
                                                @if ($item_quantity > 0 && ($item_price > 0 || ($item_price === 0 && $this->allowPriceChange)))
                                                    <a
                                                        href="#!"
                                                        wire:click.prevent="selectItem({{ $item['id'] }})"
                                                        class="text-primary"
                                                    >
                                                        <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">No Item Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- @if ($this->selectedItem) --}}
                {{-- <div class="form-group"> --}}
                {{-- <label>Item Batches</label> --}}
                {{-- <select class="form-select my-2" id="batches"> --}}
                {{-- @foreach ($this->searchBatches as $batch) --}}
                {{-- <option value="{{ $batch->id }}"> --}}
                {{-- No: {{ $batch->batch_no }} - qty: --}}
                {{-- {{ \App\Helpers\QuantityAvailableHelper::getQuantityAvailableForSelectedBatch($batch->item_id, $batch->id) }} --}}
                {{-- - Price: {{ \App\Helpers\ItemPriceHelper::getItemPriceByBatch($batch->id) }} - Ex: --}}
                {{-- {{ $batch->expiry_date }} --}}
                {{-- </option> --}}
                {{-- @endforeach --}}
                {{-- </select> --}}

                {{-- @error('selectedBatch') --}}
                {{-- <div class="text-danger">{{ $message }}</div> --}}
                {{-- @enderror --}}
                {{-- </div> --}}
                {{-- @endif --}}

                <div class="mt-5" id="dvCustom">
                    <div class="form-group row mt-n5">
                        <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                            Frequency
                        </label>

                        @foreach ($this->frequencies as $frequency)
                            <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                                <label class="radio">
                                    <input
                                        type="radio"
                                        id="selected_frequency"
                                        name="selected_frequency"
                                        wire:model="selected_frequency"
                                        class="kt-checkbox kt-checkbox--bold kt-checkbox--success"
                                        value="{{ $frequency->frequency }}"
                                    />
                                    <span></span>
                                    &nbsp;&nbsp; {{ $frequency->frequency }}
                                </label>
                            </div>
                        @endforeach

                        @error('selected_frequency')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row mt-n5">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Dosage Unit</label>
                            <input
                                type="number"
                                min="1"
                                class="form-control"
                                id="dosage_unit"
                                name="dosage_unit"
                                wire:model="dosage_unit"
                            />

                            @error('dosage_unit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Dosage Forms</label>
                            <select
                                class="form-control"
                                name="selected_dosage_form"
                                id="selected_dosage_form"
                                wire:model="selected_dosage_form"
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
                    <div class="form-group row mt-n5">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">#Days</label>
                            <input type="number" min="1" class="form-control" name="days" id="days" wire:model="days" />

                            @error('days')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Qty</label>
                            <input type="number" min="1" class="form-control" id="qty" name="qty" wire:model="qty" />

                            @error('qty')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-n5">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Route</label>
                            <select
                                class="form-control"
                                id="route"
                                name="route"
                                wire:model="selected_route_of_administration"
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

                            @error('selected_route_of_administration')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- @if ($this->type === 'pos') --}}
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Price</label>
                            <input
                                type="number"
                                class="form-control"
                                name="item_price"
                                id="item_price"
                                wire:model="price"
                                {{ $this->allowPriceChange ? '' : 'disabled' }}
                            />

                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- @endif --}}
                    </div>
                </div>

                <div class="form-group">
                    <label>Payment Mode</label>
                    <select class="form-select my-2" id="billing_mode" wire:model.live="selected_billing_mode">
                        @foreach ($this->billing_modes as $billing_mode)
                            <option value="{{ $billing_mode->code }}">
                                {{ $billing_mode->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('selected_billing_mode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if ($this->selected_billing_mode === 'insurance')
                    <div class="form-group row mt-n5">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="col-form-label font-size-base font-weight-bolder">Insurance</label>
                            <select
                                class="form-control"
                                id="insurance"
                                name="insurance"
                                wire:model="selected_insurance"
                            >
                                <option>Select Insurance Company</option>
                                @foreach ($this->insurances as $insurance)
                                    <option value="{{ $insurance->id }}">
                                        {{ $insurance->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('selected_insurance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="col-form-label font-size-base font-weight-bolder">Insurance Number</label>
                            <input
                                type="text"
                                class="form-control"
                                name="insurance_number"
                                id="insurance_number"
                                wire:model="insurance_number"
                            />

                            @error('insurance_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                @if ($this->selected_billing_mode === 'credit_corporate')
                    <div class="form-group row mt-n5">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="col-form-label font-size-base font-weight-bolder">Company</label>
                            <select class="form-control" id="company" name="company" wire:model="selected_company">
                                <option>Select Credit Corporate</option>
                                @foreach ($this->companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('selected_company')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12 col-12">
                            <label class="col-form-label font-size-base font-weight-bolder">Company Number</label>
                            <input
                                type="text"
                                class="form-control"
                                name="company_number"
                                id="company_number"
                                wire:model="company_number"
                            />

                            @error('company_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add Drug
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
