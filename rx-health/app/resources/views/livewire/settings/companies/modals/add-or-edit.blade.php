<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="add_company_{{ $this->type }}"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $this->company ? 'Edit' : 'Add New' }}
                        {{
                            $this->company
                                ? ($this->type == 'company'
                                    ? 'Corporate'
                                    : ($this->type == 'insurance'
                                        ? 'Insurance'
                                        : 'Corporate/Insurance'))
                                : 'Corporate/Insurance'
                        }}
                        Company
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-6">
                        <label for="company_name">Company Name</label>
                        <input
                            id="company_name"
                            wire:model.defer="company_name"
                            type="text"
                            maxlength="99"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_code">Company Code</label>
                        <input
                            id="company_code"
                            wire:model.defer="company_code"
                            type="text"
                            maxlength="10"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_code')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_telephone">Company Telephone</label>
                        <input
                            id="company_telephone"
                            wire:model.defer="company_telephone"
                            type="text"
                            maxlength="20"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_telephone')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_email">Company Email</label>
                        <input
                            id="company_email"
                            wire:model.defer="company_email"
                            type="email"
                            maxlength="40"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_email')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_address">Company Address</label>
                        <input
                            id="company_address"
                            wire:model.defer="company_address"
                            type="text"
                            maxlength="130"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_address')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_id">Company ID</label>
                        <input
                            id="company_id"
                            maxlength="10"
                            wire:model.defer="company_id"
                            type="number"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('company_id')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_type">Company Type</label>
                        <select wire:model.defer="company_type" id="company_type" class="form-select my-2">
                            <option value="" @readonly(true)>Select Company Type</option>
                            <option value="company">Corporate Company</option>
                            <option value="insurance">Insurance Company</option>
                        </select>
                        <x-input-error :messages="$errors->get('company_type')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="company_status">Status</label>
                        <select wire:model.defer="company_status" id="company_status" class="form-select my-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('company_status')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveCompany" class="btn btn-primary">Save Company</button>
                </div>
            </div>
        </div>
    </div>
</div>
