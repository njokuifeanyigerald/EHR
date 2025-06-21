<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="add_supplier"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $this->supplier ? 'Edit' : 'Add' }} Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="form-group col-6">
                        <label for="supplier_name">Supplier Name</label>
                        <input
                            wire:model="supplier_name"
                            id="supplier_name"
                            type="text"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('supplier_name')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="supplier_contact">Contact</label>
                        <input
                            wire:model="supplier_contact"
                            id="supplier_contact"
                            type="text"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('supplier_contact')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="supplier_address">Address</label>
                        <input
                            wire:model="supplier_address"
                            id="supplier_address"
                            type="text"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('supplier_address')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="supplier_email">Email</label>
                        <input
                            wire:model="supplier_email"
                            id="supplier_email"
                            type="email"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('supplier_email')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="dispatch_endpoint">Dispatch Endpoint</label>
                        <input
                            wire:model="dispatch_endpoint"
                            id="dispatch_endpoint"
                            type="text"
                            class="form-control my-2"
                            required
                        />
                        <x-input-error :messages="$errors->get('dispatch_endpoint')" class="mt-1" />
                    </div>
                    <div class="form-group col-6">
                        <label for="supplier_status">Status</label>
                        <select wire:model="supplier_status" class="form-select my-2">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->get('supplier_status')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveSupplier" class="btn btn-primary">Save Supplier</button>
                </div>
            </div>
        </div>
    </div>
</div>
