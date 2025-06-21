<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="add_package"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $this->package ? 'Edit' : 'Add New' }}
                        Package
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row col-12">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="package_name">Package Name</label>
                                <input
                                    id="package_name"
                                    wire:model="package_name"
                                    type="text"
                                    maxlength="99"
                                    class="form-control my-2"
                                    required
                                />
                                <x-input-error :messages="$errors->get('package_name')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="package_gender">Package Gender</label>
                                <select wire:model="package_gender" class="form-select my-2" id="package_gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="unisex">Unisex</option>
                                </select>
                                <x-input-error :messages="$errors->get('package_gender')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="package_price">Package Price</label>
                                <input
                                    id="package_price"
                                    wire:model="package_price"
                                    type="number"
                                    class="form-control my-2"
                                    required
                                />
                                <x-input-error :messages="$errors->get('package_price')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="package_status">Status</label>
                                <select wire:model="package_status" class="form-select my-2" id="package_status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('package_status')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                {{-- <div class="w-75"> --}}
                                <label for="search_query">Package Items</label>

                                <div class="input-icon input-icon-right my-2">
                                    <input
                                        type="search"
                                        class="form-control"
                                        autofocus
                                        wire:model.live.debounce.700ms="search_query"
                                        placeholder="Search for items"
                                        name="search_query"
                                        wire:key="item_search"
                                    />
                                    <span class="input-icon-addon clickable-cursor">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                                <div class="position-relative relative z-20">
                                    <div class="position-absolute absolute z-10 w-100 rounded-xl list-group bg-black">
                                        <div
                                            wire:loading
                                            wire:target="item_search"
                                            class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                        >
                                            <div class="list-item">Searching...</div>
                                        </div>

                                        @if (! empty($this->search_query))
                                            <div
                                                class="absolute w-full rounded-t-none shadow-lg list-group-item bg-white"
                                                style="display: flex; z-index: 100"
                                            >
                                                <div style="flex: 0 0 60%">Item</div>
                                                <div style="flex: 0 0 30%">Item Code</div>
                                                <div style="flex: 0 0 10%">Action</div>
                                            </div>
                                            @forelse ($this->items as $i => $item)
                                                <div
                                                    class="absolute w-full rounded-t-none shadow-lg list-group-item {{-- {{ $this->highlight_index === $i ? 'active' : 'bg-white' }} --}}"
                                                    style="display: flex; z-index: 100"
                                                    {{-- wire:click="saveSelecteditem( {{ $item }} )" --}}
                                                >
                                                    <div class="flex-wrap" style="flex: 0 0 60%">
                                                        {{ $item->item_name }}
                                                    </div>
                                                    <div style="flex: 0 0 30%">
                                                        {{ $item->item_code }}
                                                    </div>
                                                    <div style="flex: 0 0 10%">
                                                        <button
                                                            class="btn btn-sm btn-primary rounded"
                                                            wire:click="addItem( {{ $item->id }} )"
                                                        >
                                                            <i class="fa fa-add"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="list-group-item active text-center">No result</div>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                                {{-- </div> --}}
                                {{--
                                    <div class="input-group-prepend d-flex align-content-center">
                                    <button
                                    type="button"
                                    class="btn btn-primary font-weight-bold my-1"
                                    wire:click="dispatch('newPackageItem')"
                                    >
                                    <i class="fa fa-plus"></i>
                                    Add Item
                                    </button>
                                    </div>
                                --}}
                            </div>

                            <div class="table-responsive">
                                <table class="table table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($package_items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration + $package_items->firstItem() - 1 }}</td>
                                                <td>{{ $item->item_name }}</td>
                                                <td>
                                                    <button
                                                        class="btn btn-sm btn-danger rounded"
                                                        wire:click="removeItem({{ $item->id }})"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No item added</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{ $package_items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="savePackage" class="btn btn-primary">Save Package</button>
                </div>
            </div>
        </div>
    </div>
</div>
