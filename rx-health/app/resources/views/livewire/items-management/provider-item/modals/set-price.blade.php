<div>
    <!-- Price settings modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="price_settings"
        tabindex="-1"
        aria-labelledby="outsource"
        aria-hidden="true"
    >
        <div wire:ignore.self class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outsource request">
                        <h5>
                            Price Setting -
                            <small class="fw-semibold">{{ $this->item_name }}</small>
                        </h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12 px-3">
                        {{--
                            @if ($this->drugs_category_id == ($this->item->item_category_id ?? null))
                            <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Batch</label>
                            <div class="col-md-12 col-sm-12">
                            <select class="form-select" name="batch" wire:model="batch">
                            @forelse ($this->item->batches ?? [] as $batch)
                            <option value="{{ $batch->id }}">
                            {{ Str::headline($batch->name) }}
                            </option>
                            @empty
                            <option value="" disabled="" selected="">No Batches Available</option>
                            @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('batch')" class="mt-1" />
                            </div>
                            </div>
                            @endif
                        --}}

                        <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Billing Type</label>
                            <div class="col-md-12 col-sm-12">
                                <select class="form-select" name="billing_code" wire:model.live="billing_code">
                                    <option value="">Select Billing Mode</option>
                                    @forelse ($this->billing_modes as $billing_mode)
                                        <option value="{{ $billing_mode->id }}">
                                            {{ Str::Headline($billing_mode->name) }}
                                        </option>
                                    @empty
                                        <option value="" disabled="" selected="">No Billing Mode Available</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('billing_code')" class="mt-1" />
                            </div>
                        </div>

                        <div
                            class="form-group row {{ in_array($this->billing_code, [$this->billing_modes->where('code', 'credit_corporate')->first()->id, $this->billing_modes->where('code', 'insurance')->first()->id]) ? '' : 'd-none' }}"
                        >
                            <label class="col-md-3 col-sm-12 col-form-label">Company</label>
                            <div class="col-md-12 col-sm-12">
                                <select class="form-select" name="company" wire:model="company">
                                    <option value="">Any Company</option>
                                    @forelse ($this->companies as $company)
                                        <option value="{{ $company->id }}">
                                            {{ Str::headline($company->name) }}
                                        </option>
                                    @empty
                                        <option value="" disabled="" selected="" hidden="">
                                            No Companies Available
                                        </option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('company')" class="mt-1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Currency</label>
                            <div class="col-md-12 col-sm-12">
                                <select class="form-select" name="currency" wire:model="currency">
                                    @forelse ($this->currencies as $currency)
                                        <option value="{{ $currency->id }}">
                                            {{ Str::headline($currency->name) . ' (' . $currency->code . ')' }}
                                        </option>
                                    @empty
                                        <option value="" disabled="" selected="" hidden="">
                                            No Currencies Available
                                        </option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('currency')" class="mt-1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Price</label>
                            <div class="col-md-12 col-sm-12">
                                <input type="number" class="form-control" name="price" wire:model="price" />
                                <x-input-error :messages="$errors->get('price')" class="mt-1" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Status</label>
                            <div class="col-md-12 col-sm-12">
                                <select class="form-select" name="currency" wire:model="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="savePrice" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
{{--
    @script
    <script>
    $wire.on('openSetPriceModal', () => {
    $('#price_settings').modal('show');
    });
    $wire.on('closeSetPriceModal', () => {
    $('#price_settings').modal('hide');
    });
    </script>
    @endscript
--}}
