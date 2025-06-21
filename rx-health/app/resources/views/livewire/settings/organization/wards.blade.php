<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="mx-5 px-3 pt-4 py-2">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Allow Children In Adult Ward</label>
                        <div class="col-md-9 col-sm-12">
                            <select wire:model="allow_children_in_adult_ward" class="form-select">
                                <option value="">Select from options</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                            <x-input-error :messages="$errors->get('allow_children_in_adult_ward')" class="mt-1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Child Age Minimum</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="0"
                                max="3"
                                disabled
                                wire:model.live="child_age_minimum"
                                class="form-control"
                                placeholder="Child Age Minimum"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('child_age_minimum')" class="mt-1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Child Age Maximum</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="{{ $this->child_age_minimum }}"
                                max="20"
                                wire:model.live="child_age_maximum"
                                class="form-control"
                                placeholder="Child Age Maximum"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('child_age_maximum')" class="mt-1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Adult Age Minimum</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="0"
                                max="20"
                                wire:model.live="adult_age_minimum"
                                disabled
                                class="form-control"
                                placeholder="Adult Age Minimum"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('adult_age_minimum')" class="mt-1" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Adult Age Maximum</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="number"
                                min="{{ $this->adult_age_minimum }}"
                                max="20"
                                wire:model.live="adult_age_maximum"
                                class="form-control"
                                placeholder="Adult Age Maximum"
                                disabled
                                required=""
                            />
                            <x-input-error :messages="$errors->get('adult_age_maximum')" class="mt-1" />
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
