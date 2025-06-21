<div>
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>{{ Str::title($this->type) }} Requisition</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('requisitions.index') }}" class="btn btn-light me-3 my-2">
                            <i class="fa fa-circle-chevron-left"></i>
                            Go back
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (in_array($this->requisition_status, ['draft', 'pending']))
            <div class="col-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h5>{{ Str::title($this->type) }} Requisition</h5>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info col-12 row">
                            <div class="form-group col-6">
                                <div class="row">
                                    <label class="control-label col-sm-3 align-self-center" for="from">
                                        Request From
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-select" wire:model.lazy="requisition_from" disabled>
                                            <option value="">Select from options</option>
                                            @forelse ($this->inventory_locations as $location)
                                                <option value="{{ $location->id }}">
                                                    {{ Str::headline($location->location_name) }}
                                                </option>
                                            @empty
                                                <option value="" @readonly(true)>No inventory locations found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('requisition_from')" class="mt-2" />
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="to">
                                        Request To
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-select" wire:model.lazy="requisition_to" required="">
                                            <option value="">Select from options</option>
                                            @forelse ($this->inventory_locations->except($this->requisition_from) as $location)
                                                <option value="{{ $location->id }}">
                                                    {{ Str::headline($location->location_name) }}
                                                </option>
                                            @empty
                                                <option value="" @readonly(true)>No inventory locations found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('requisition_to')" class="mt-2" />
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Remarks">
                                        Remarks
                                    </label>
                                    <div class="col-sm-9">
                                        <textarea
                                            class="form-control"
                                            wire:model="requisition_remarks"
                                            placeholder="Remarks (Optional)"
                                        ></textarea>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('requisition_remarks')" class="mt-2" />
                            </div>
                            <div class="form-group col-6">
                                <div class="row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="to">Status</label>
                                    <div class="col-sm-9">
                                        {{-- <span class="form-control">{{ Str::upper($this->requisition_status) }}</span> --}}
                                        <input
                                            type="text"
                                            class="form-control uppercase"
                                            wire:model="requisition_status"
                                            readonly
                                            disabled
                                        />
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('requisition_status')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h5>Add Requisition Item</h5>
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
        @else
            <div class="col-lg-4">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h5>Approved</h5>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <div class="form-group row mb-4">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="from">
                                    From
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <p class="my-auto ms-2">
                                        {{ Str::title($this->requisition->requestSource->location_name ?? 'Not Specified') }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="to">
                                    To
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <p class="my-auto ms-2">
                                        {{ Str::title($this->requisition->requestDestination->location_name ?? 'Not Specified') }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="Remarks">
                                    Remarks
                                </label>
                                <div class="col-sm-10">
                                    <p class="my-auto ms-2">
                                        {{ $this->requisition->remark ?? 'Not Specified' }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="to">Status</label>
                                <div class="col-sm-10">
                                    <p class="my-auto ms-2">Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Requisition Details</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Qty</th>
                                    {{-- <th scope="col">Pack Size</th> --}}
                                    @if (in_array($this->requisition_status, ['draft', 'pending']))
                                        <th scope="col">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->requisition->requisitionDetails ?? [] as $requisionDetail)
                                    <tr>
                                        <td>{{ $requisionDetail->item->item_name }}</td>
                                        <td>
                                            @if ($this->items_to_edit[$requisionDetail->id])
                                                <div>
                                                    <input
                                                        type="number"
                                                        min="0"
                                                        class="form-control"
                                                        {{-- name="price" --}}
                                                        {{-- id="price" --}}
                                                        wire:model="edit_details.{{ $requisionDetail->id }}.quantity"
                                                    />
                                                </div>
                                            @else
                                                {{ $requisionDetail->quantity }}
                                            @endif
                                            {{-- {{ $requisionDetail->quantity }} --}}
                                        </td>
                                        {{--
                                            <td>
                                            {{ $requisionDetail->pack_size }}
                                            </td>
                                        --}}
                                        @if (in_array($this->requisition_status, ['draft', 'pending']))
                                            <td>
                                                <div>
                                                    @if ($this->items_to_edit[$requisionDetail->id])
                                                        <a
                                                            wire:click="saveRequisitionDetail({{ $requisionDetail->id }},'{{ $requisionDetail->item->item_name }}')"
                                                            class="text-dark me-2"
                                                            title="Save Purchase Order Detail"
                                                        >
                                                            <i class="fa fa-check-double m-0 icons-sm"></i>
                                                        </a>
                                                    @else
                                                        <a
                                                            wire:click="editPurchaseOrderDetail({{ $requisionDetail->id }})"
                                                            class="text-dark me-2"
                                                            title="Edit Purchase Order Detail"
                                                        >
                                                            <i class="ri-pencil-line m-0 icons-sm"></i>
                                                        </a>
                                                    @endif
                                                    <a
                                                        {{-- href="#" --}}
                                                        class="text-danger"
                                                        title="Delete"
                                                        wire:click="deletePurchaseOrderDetail({{ $requisionDetail->id }},'{{ $requisionDetail->item->item_name }}')"
                                                    >
                                                        <i class="ri-delete-bin-line m-0 icons-sm"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No data Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- buttons --}}
                    <div class="my-4 d-flex justify-content-end">
                        <a href="{{ route('requisitions.index') }}" class="btn btn-light me-2">
                            <i class="fa fa-arrow-rotate-left"></i>
                            Return to Requisitions
                        </a>
                        @if (in_array($this->requisition_status, ['draft', 'pending']))
                            <button class="btn btn-warning me-2" wire:click="saveChanges">
                                <i class="fa fa-circle-down"></i>
                                Save Changes
                            </button>
                            @if ($this->requisition->status == 'draft')
                                <button wire:click="submitRequisitionForApproval" type="button" class="btn btn-primary">
                                    <i class="fa fa-paper-plane"></i>
                                    Submit for Approval
                                </button>
                            @elseif ($this->requisition->status == 'pending')
                                <button wire:click="approveRequisition" type="button" class="btn btn-primary">
                                    <i class="fa fa-paper-plane"></i>
                                    Approve Requisition
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
