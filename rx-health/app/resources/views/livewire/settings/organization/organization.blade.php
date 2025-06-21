<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="mx-5 px-3 pt-4 py-2">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Company Name</label>
                        <div class="col-md-9 col-sm-12">
                            <input
                                type="text"
                                wire:model="company_name"
                                class="form-control"
                                placeholder="Company Name"
                                required=""
                            />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Country</label>
                        <div class="col-md-9 col-sm-12">
                            <select wire:model.live="country" class="form-select my-2" id="selectcountry" required>
                                <option value="">Select a Country</option>
                                @foreach ($this->countries as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Region or State</label>
                        <div class="col-md-9 col-sm-12">
                            <select class="form-select my-2" id="state" wire:model.live="state" required>
                                <option value="">Select a State</option>
                                @forelse ($this->states ?? [] as $state)
                                    <option value="{{ $state->code }}">{{ $state->name }}</option>
                                @empty
                                    @if ($this->country)
                                        <option value="">No States Available</option>
                                    @else
                                        <option value="">Select a Country To See States</option>
                                    @endif
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('state')" class="mt-1" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">District</label>
                        <div class="col-md-9 col-sm-12">
                            <select wire:model.live="district" class="form-select">
                                <option value="">Select a District</option>
                                @forelse ($this->administrative_divisions ?? [] as $division)
                                    <option value="{{ $division->code }}">{{ $division->name }}</option>
                                @empty
                                    @if ($this->state)
                                        <option value="">No District Available</option>
                                    @else
                                        <option value="">Select a State To See District</option>
                                    @endif
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('district')" class="mt-1" />
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
