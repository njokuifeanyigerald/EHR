<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="mx-5 px-3 pt-4 py-2">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Purchase Mark Up(%)</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="0"
                                max="100"
                                wire:model="purchase_mark_up"
                                class="form-control"
                                placeholder="Mark Up for all Purchase"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('purchase_mark_up')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Low Stock Qty(%)</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="0"
                                max="100"
                                wire:model="low_stock_qty"
                                class="form-control"
                                placeholder="Low Stock Qty for all Item by %"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('low_stock_qty')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Expiry Date (By Days)</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="1"
                                wire:model="expiry_date_by_days"
                                class="form-control"
                                placeholder="Expiry Date for all Item by Days"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('expiry_date_by_days')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Add Items Without Price</label>
                        <div class="col-md-9 col-sm-12">
                            <select wire:model="allow_add_items_without_price" class="form-select">
                                <option value="">Select from options</option>
                                <option value="allow">Yes</option>
                                <option value="deny">No</option>
                            </select>
                            <x-input-error :messages="$errors->get('allow_add_items_without_prices')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Pharmacy Is Same as Store</label>
                        <div class="col-md-9 col-sm-12">
                            <select wire:model="pharmacy_is_same_as_store" class="form-select">
                                <option value="">Select from options</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <x-input-error :messages="$errors->get('pharmacy_is_same_as_store')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group d-flex flex-row-reverse">
                        <button wire:click="saveSettings" class="btn btn-primary me-1 mt-2">Save Settings</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
