<div>
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>
                            {{ in_array($this->item_return->status, ['draft', 'pending']) ? Str::headline($this->type) : 'View' }}
                            Returns from
                            <b>({{ $this->inventory_location->location_name }})</b>
                            to
                            <b>({{ $this->main_store_inventory_location->location_name }})</b>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        @if (in_array($this->item_return->status, ['draft', 'pending']))
            <div class="col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h5>Add Item</h5>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label for="item_name">Item Name</label>
                                    <input
                                        type="search"
                                        class="form-control my-2 shadow"
                                        id="exampleInputText1"
                                        wire:model.live.debounce.500ms="search_query"
                                        placeholder="Search Items..."
                                        wire:key="item_search"
                                    />

                                    <x-input-error :messages="$errors->get('item')" class="mt-1" />

                                    <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                                        <div
                                            wire:loading
                                            wire:target="item_search"
                                            class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                        >
                                            <div class="list-item">Searching...</div>
                                        </div>

                                        @if (! empty($this->search_query) && empty($this->item))
                                            <div class="list-group-item" style="display: flex">
                                                <div style="flex: 0 0 80%">Item</div>
                                                <div style="flex: 0 0 20%">Action</div>
                                            </div>
                                            @forelse ($this->items as $i => $item)
                                                <div
                                                    class="list-group-item pe-auto text-wrap text-break"
                                                    style="display: flex"
                                                    {{-- wire:click="saveSelectedItem( {{ $item }} )" --}}
                                                >
                                                    <div class="flex-wrap" style="flex: 0 0 80%">
                                                        {{ $item->item_name }}
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center align-content-center"
                                                        style="flex: 0 0 20%"
                                                    >
                                                        {{-- <div class="btn btn-sm rounded"> --}}
                                                        <i
                                                            class="fa fa-add text-primary fw-bolder clickable-cursor fa-4 text-bolder"
                                                            wire:click="saveSelectedItem( {{ $item->id }} )"
                                                        ></i>
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="list-group-item active text-center">No result</div>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_code">Item Quantity</label>
                                <input
                                    type="number"
                                    class="form-control my-2"
                                    id="item_code"
                                    min="0"
                                    wire:model.debounce.550ms="quantity"
                                    value=""
                                    {{-- placeholder="Quantity Requested" --}}
                                />
                                <x-input-error :messages="$errors->get('quantity')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="reason_of_return">Reason of Return</label>
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    wire:model.debounce.550ms="reason_of_return"
                                    id="reason_of_return"
                                    placeholder="Reason For Return"
                                />
                                <x-input-error :messages="$errors->get('reason_of_return')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="batch">Batch</label>
                                <select wire:model.debounce.550ms="batch" class="form-select my-2" id="batch">
                                    <option value="">Select Batch</option>
                                    @forelse ($this->batches ?? [] as $batch)
                                        <option value="{{ $batch->batch_id }}">{{ $batch->batch_no }}</option>
                                    @empty
                                        <option value="" disabled>No batch found</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('batch')" class="mt-1" />
                            </div>
                            <div class="form-group d-none">
                                <label for="pack_size">Item Pack Size</label>
                                <input
                                    type="number"
                                    class="form-control my-2"
                                    id="pack_size"
                                    min="0"
                                    wire:model.debounce.550ms="pack_size"
                                    value=""
                                    {{-- placeholder="Pack Size" --}}
                                />
                                <x-input-error :messages="$errors->get('pack_size')" class="mt-1" />
                            </div>
                            <div class="form-group d-none">
                                <label for="remarks">Remark</label>
                                <textarea
                                    wire:model.debounce.550ms="remarks"
                                    class="form-control my-2"
                                    id="remarks"
                                    rows="3"
                                    placeholder="Enter Remarks Here"
                                ></textarea>
                                <x-input-error :messages="$errors->get('remarks')" class="mt-1" />
                            </div>
                            <div class="modal-footer">
                                <button wire:click="addItem" class="btn btn-primary">Add Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-{{ in_array($this->item_return->status, ['draft', 'pending']) ? 8 : 12 }}">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Items To Return</h5>
                    </div>
                    {{--
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_edit_item"
                        class="btn btn-primary me-3 my-2"><i class="fa fa-plus"></i> Add Item</a>
                        </div>
                    --}}
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Batch</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Reason</th>
                                    @if (in_array($this->item_return->status, ['draft', 'pending']))
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->item_return->returnDetails ?? [] as $returnDetail)
                                    <tr>
                                        <td>
                                            {{ $returnDetail->item->item_name }}
                                        </td>
                                        <td>
                                            {{ $returnDetail->batch->batch_no }}
                                        </td>
                                        <td>
                                            @if ($this->items_to_edit[$returnDetail->id])
                                                <div>
                                                    <input
                                                        type="number"
                                                        min="0"
                                                        class="form-control"
                                                        {{-- name="price" --}}
                                                        {{-- id="price" --}}
                                                        wire:model="edit_details.{{ $returnDetail->id }}.quantity"
                                                    />
                                                </div>
                                            @else
                                                {{ $returnDetail->quantity }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($this->items_to_edit[$returnDetail->id])
                                                <div>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        {{-- name="price" --}}
                                                        {{-- id="price" --}}
                                                        wire:model="edit_details.{{ $returnDetail->id }}.reason"
                                                    />
                                                </div>
                                            @else
                                                {{ $returnDetail->reason }}
                                            @endif
                                        </td>
                                        @if (in_array($this->item_return->status, ['draft', 'pending']))
                                            <td>
                                                <div>
                                                    @if ($this->items_to_edit[$returnDetail->id])
                                                        <a
                                                            wire:click="saveReturnDetail({{ $returnDetail->id }},'{{ $returnDetail->item->item_name }}')"
                                                            class="text-dark me-2"
                                                            title="Save Return Detail"
                                                        >
                                                            <i class="fa fa-check-double m-0 icons-sm"></i>
                                                        </a>
                                                    @else
                                                        <a
                                                            wire:click="editReturnDetail({{ $returnDetail->id }})"
                                                            class="text-dark me-2"
                                                            title="Edit Return Detail"
                                                        >
                                                            <i class="ri-pencil-line m-0 icons-sm"></i>
                                                        </a>
                                                    @endif
                                                    <a
                                                        {{-- href="#" --}}
                                                        class="text-danger"
                                                        title="Delete"
                                                        wire:click="deleteReturnDetail({{ $returnDetail->id }},'{{ $returnDetail->item->item_name }}')"
                                                    >
                                                        <i class="ri-delete-bin-line m-0 icons-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- buttons --}}
                    <div class="my-4 d-flex justify-content-end">
                        <a href="{{ route('departmental_inventory.pending') }}" class="btn btn-light me-2">
                            <i class="fa fa-arrow-rotate-left"></i>
                            Return to Pending Returns
                        </a>
                        @if (in_array($this->item_return->status, ['draft', 'pending']))
                            <button type="button" class="btn btn-warning me-2">
                                <i class="fa fa-circle-down"></i>
                                Save Changes
                            </button>
                            @if ($this->item_return->status == 'draft')
                                <button wire:click="submitReturnForApproval" type="button" class="btn btn-primary">
                                    <i class="fa fa-paper-plane"></i>
                                    Submit for Approval
                                </button>
                            @elseif ($this->item_return->status == 'pending')
                                <button type="button" class="btn btn-primary" wire:click="approveReturn">
                                    <i class="fa fa-paper-plane"></i>
                                    Approve this return
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}
    {{-- @include('departmental_inventory.modals.add_edit_return_item') --}}
</div>
