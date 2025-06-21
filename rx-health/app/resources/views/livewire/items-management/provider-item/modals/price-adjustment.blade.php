<div>
    <!-- Price adjustment Modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="price_adjustment"
        tabindex="-1"
        aria-labelledby="outsource"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outsource request">Set all Item Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="flex flex-col mb-3">
                            <label for="item_category">Item Category</label>
                            <select class="form-select" name="item_category" id="item_category" wire:model="category">
                                <option value="all">All</option>
                                @foreach ($this->categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-1" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="flex flex-col mb-3">
                            <label for="price_percent">Price Percent(%)</label>
                            <input
                                class="form-control"
                                type="number"
                                min="0"
                                max="100"
                                wire:model="price_percentage"
                                placeholder="Change all item price by percent"
                            />
                            <x-input-error :messages="$errors->get('price_percentage')" class="mt-1" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="flex flex-col mb-3">
                            <label for="price_percent">Billing Code</label>
                            <select
                                wire:model.live="billing_code"
                                class="form-select"
                                name="billing_code"
                                id="billing_code"
                            >
                                {{-- <option value="" disabled="" selected="">Please Select Billing type</option> --}}
                                @foreach ($this->billing_modes as $billing_mode)
                                    <option value="{{ $billing_mode->id }}">
                                        {{ Str::Headline($billing_mode->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('billing_code')" class="mt-1" />
                        </div>
                    </div>

                    <div
                        class="col-12 {{ in_array($this->billing_code, [$this->billing_modes->where('code', 'credit_corporate')?->first()?->id, $this->billing_modes->where('code', 'insurance')?->first()?->id]) ? '' : 'd-none' }}"
                    >
                        <div class="flex flex-col mb-3">
                            <label for="price_percent">Company</label>
                            <select class="form-select" name="company" id="company" wire:model="company">
                                @foreach ($this->companies as $company)
                                    <option value="{{ $company->id }}">
                                        {{ Str::headline($company->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('company')" class="mt-1" />
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="flex flex-col mb-3">
                            <label for="price_change_type">Price Change Type</label>
                            <div class="d-flex gap-2 flex-wrap">
                                <div
                                    class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                >
                                    <input
                                        type="radio"
                                        id="increment"
                                        name="customRadio-10"
                                        class="custom-control-input bg-success me-1"
                                        value="increase"
                                        wire:model="price_change_type"
                                    />
                                    <label class="custom-control-label" for="increment">Increase Price</label>
                                </div>
                                <div
                                    class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                >
                                    <input
                                        type="radio"
                                        id="decrement"
                                        name="customRadio-10"
                                        class="custom-control-input bg-danger"
                                        value="decrease"
                                        wire:model="price_change_type"
                                    />
                                    <label class="custom-control-label" for="decrement">Decrease Price</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('price_change_type')" class="mt-1" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="savePriceAdjustment" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
