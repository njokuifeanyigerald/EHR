<div>
    <!-- Add purchase order Modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="add_item"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 row">
                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Code</label>
                                <div class="col-md-9 col-sm-12">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="item_code"
                                        disabled=""
                                        readonly=""
                                        value=""
                                        placeholder="Item code will generate after creation"
                                    />
                                    <x-input-error :messages="$errors->get('item_code')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Name</label>
                                <div class="col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="item_name" wire:model="item_name" />
                                    <x-input-error :messages="$errors->get('item_name')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Price</label>
                                <div class="col-md-9 col-sm-12">
                                    <input type="number" class="form-control" name="item_cost" wire:model="item_cost" />
                                    <x-input-error :messages="$errors->get('item_cost')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Category</label>
                                <div class="col-md-9 col-sm-12">
                                    <select
                                        wire:model.live="item_category"
                                        class="form-select"
                                        name="item_category"
                                        id="item_category"
                                    >
                                        <option value="">Select a Category</option>
                                        @foreach ($this->categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('item_category')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Generic Name</label>
                                {{-- <div class="col-md-9 col-sm-12"> --}}
                                <div class="col-md-9 col-sm-12">
                                    <div wire:ignore>
                                        <select
                                            wire:model="item_generic_name"
                                            class="form-control"
                                            name="generic_names_add"
                                            id="generic_names_add"
                                        >
                                            <option value="">Please Select Generic Name</option>
                                            @forelse ($this->generic_names ?? [] as $genericName)
                                                <option
                                                    wire:key="generic_name_{{ $genericName->id }}"
                                                    value="{{ $genericName->generic_name }}"
                                                >
                                                    {{ Str::limit($genericName->generic_name, 42, '...') }}
                                                </option>
                                            @empty
                                                <option selected="" disabled>No Generic Names Available</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <x-input-error :messages="$errors->get('item_generic_name')" class="mt-1" />
                                </div>
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Stocking Unit</label>
                                <div class="col-md-9 col-sm-12">
                                    <select
                                        class="form-select"
                                        id="kt_select2_2"
                                        name="unit_of_measurement"
                                        id="unit_of_measurement"
                                        wire:model="item_stocking_unit"
                                    >
                                        <option value="">Please Select Stocking Unit</option>
                                        @forelse ($this->dosage_forms ?? [] as $unit)
                                            <option
                                                wire:key="dosage_form_{{ $unit->id }}"
                                                value="{{ $unit->dosage_form }}"
                                            >
                                                {{ Str::upper($unit->dosage_form) }}
                                            </option>
                                        @empty
                                            <option selected="" disabled>No Units Available</option>
                                        @endforelse
                                    </select>
                                    <x-input-error :messages="$errors->get('item_stocking_unit')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Opening Stock</label>
                                <div class="col-md-9 col-sm-12">
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="opening_stock"
                                        id="opening_stock"
                                        wire:model="item_opening_stock"
                                    />
                                    <x-input-error :messages="$errors->get('item_opening_stock')" class="mt-1" />
                                </div>
                            </div>

                            <div class="form-group row col-md-6">
                                <label class="col-md-3 col-sm-12 col-form-label">Status</label>
                                <div class="col-md-9 col-sm-12">
                                    <select
                                        class="form-select"
                                        name="item_status"
                                        id="item_status"
                                        wire:model="item_status"
                                    >
                                        <option value="">Please Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('item_status')" class="mt-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="addNewItem" class="btn btn-primary">Add Item</button>
                </div>
            </div>
        </div>
    </div>
</div>
