<div>
    <!-- Add purchase order Modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="edit_po"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Purchase Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- Supplier and delivery information --}}
                        <div class="col-lg-12">
                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-light">
                                    <div class="iq-header-title me-1">
                                        <h5 class="card-title">Supplier & Delivery Information</h5>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-6 row">
                                                <div class="form-group col-md-6">
                                                    <label>Supplier</label>
                                                    <select
                                                        wire:model="supplier"
                                                        class="form-select my-2"
                                                        id="supplier_add_po"
                                                    >
                                                        <option value="">Select a Supplier</option>
                                                        @foreach ($suppliers as $supplier)
                                                            <option value="{{ $supplier->id }}">
                                                                {{ Str::title($supplier->name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <x-input-error :messages="$errors->get('supplier')" class="mt-1" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="order_memo_add_po">Memo</label>
                                                    <input
                                                        type="text"
                                                        class="form-control my-2"
                                                        id="order_memo_add_po"
                                                        wire:model="memo"
                                                    />
                                                    <x-input-error :messages="$errors->get('memo')" class="mt-1" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 row">
                                                {{--
                                                    <div class="form-group col-md-6">
                                                    <label>Deliver To</label>
                                                    <select
                                                    name="delivery_location_add_po"
                                                    class="form-select my-2"
                                                    id="delivery_location_add_po"
                                                    >
                                                    <option selected="" value="1">KADUNA STATE HOSPITAL</option>
                                                    </select>
                                                    </div>
                                                --}}
                                                <div class="form-group col-md-6">
                                                    <label>Order Date</label>
                                                    <input
                                                        type="date"
                                                        class="form-control my-2"
                                                        name="item_order_date_add_po"
                                                        id="item_order_date_add_po"
                                                        wire:model="order_date"
                                                    />
                                                    <x-input-error
                                                        :messages="$errors->get('order_date')"
                                                        class="mt-1"
                                                    />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Due Date</label>
                                                    <input
                                                        type="date"
                                                        class="form-control my-2"
                                                        name="item_due_date_add_po"
                                                        id="item_due_date_add_po"
                                                        wire:model="due_date"
                                                    />
                                                    <x-input-error :messages="$errors->get('due_date')" class="mt-1" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-light">
                                    <div class="iq-header-title me-1">
                                        <h5 class="card-title">Item Information</h5>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <span class="me-2">
                                            Order Date: {{ now()->parse($this->order_date)->format('F j, Y') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="row">
                                        {{-- Add item --}}
                                        <div class="col-lg-4">
                                            <div class="iq-card shadow">
                                                <div class="iq-card-body">
                                                    {{-- <form> --}}
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input
                                                                type="search"
                                                                class="form-control my-2 shadow"
                                                                id="exampleInputText1"
                                                                wire:model.live.debounce.500ms="search_query"
                                                                placeholder="Search Items..."
                                                                wire:key="item_search"
                                                            />

                                                            <x-input-error
                                                                :messages="$errors->get('item')"
                                                                class="mt-1"
                                                            />

                                                            <div
                                                                class="position-absolute z-10 w-100 rounded-xl list-group bg-black"
                                                            >
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
                                                                            <div
                                                                                class="flex-wrap"
                                                                                style="flex: 0 0 80%"
                                                                            >
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
                                                                        <div class="list-group-item active text-center">
                                                                            No result
                                                                        </div>
                                                                    @endforelse
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pack Size</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            name="pack_size"
                                                            id="pack_size"
                                                            wire:model="pack_size"
                                                            class="form-control"
                                                        />

                                                        <x-input-error
                                                            :messages="$errors->get('pack_size')"
                                                            class="mt-1"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            class="form-control"
                                                            name="quantity"
                                                            id="quantity"
                                                            wire:model="quantity"
                                                        />

                                                        <x-input-error
                                                            :messages="$errors->get('quantity')"
                                                            class="mt-1"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            class="form-control"
                                                            name="price"
                                                            id="price"
                                                            wire:model="unit_price"
                                                        />

                                                        <x-input-error
                                                            :messages="$errors->get('unit_price')"
                                                            class="mt-1"
                                                        />
                                                    </div>
                                                    <button wire:click="addItem" class="btn btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                        Add Item
                                                    </button>
                                                    {{-- </form> --}}
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Table --}}
                                        {{-- Table --}}
                                        <div class="col-lg-8">
                                            <div class="iq-card shadow">
                                                <div class="iq-card-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Item</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Pack Size</th>
                                                                    <th scope="col">Total</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($this->purchase_order->purchaseDetails ?? [] as $purchase_detail)
                                                                    <tr>
                                                                        <td>
                                                                            {{ $purchase_detail->item->item_name }}
                                                                        </td>
                                                                        <td>
                                                                            @if ($this->items_to_edit[$purchase_detail->id])
                                                                                <div>
                                                                                    <input
                                                                                        type="number"
                                                                                        min="0"
                                                                                        class="form-control"
                                                                                        name="price"
                                                                                        id="price"
                                                                                        wire:model="edit_details.{{ $purchase_detail->id }}.unit_price"
                                                                                    />
                                                                                </div>
                                                                                {{--
                                                                                    <x-input-error
                                                                                    :messages="$errors->get('edit_details.{{ $purchase_detail->id }}.unit_price')"
                                                                                    class="mt-1"
                                                                                    />
                                                                                --}}
                                                                            @else
                                                                                {{ number_format($purchase_detail->unit_price, 2, '.', ',') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($this->items_to_edit[$purchase_detail->id])
                                                                                <div>
                                                                                    <input
                                                                                        type="number"
                                                                                        min="0"
                                                                                        class="form-control"
                                                                                        name="quantity"
                                                                                        id="quantity"
                                                                                        wire:model="edit_details.{{ $purchase_detail->id }}.quantity"
                                                                                    />
                                                                                </div>
                                                                                {{--
                                                                                    <x-input-error
                                                                                    :messages="$errors->get('edit_details.{{ $purchase_detail->id }}.quantity')"
                                                                                    class="mt-1"
                                                                                    />
                                                                                --}}
                                                                            @else
                                                                                {{ $purchase_detail->quantity }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if ($this->items_to_edit[$purchase_detail->id])
                                                                                <div>
                                                                                    <input
                                                                                        type="number"
                                                                                        min="1"
                                                                                        class="form-control"
                                                                                        name="pack_size"
                                                                                        id="pack_size"
                                                                                        wire:model="edit_details.{{ $purchase_detail->id }}.pack_size"
                                                                                    />
                                                                                </div>
                                                                                {{--
                                                                                    <x-input-error
                                                                                    :messages="$errors->get('edit_details.{{ $purchase_detail->id }}.pack_size')"
                                                                                    class="mt-1"
                                                                                    />
                                                                                --}}
                                                                            @else
                                                                                {{ $purchase_detail->pack_size }}
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            {{
                                                                                number_format(
                                                                                    $purchase_detail->unit_price * $purchase_detail->quantity,
                                                                                    2,
                                                                                    '.',
                                                                                    ',',
                                                                                )
                                                                            }}
                                                                        </td>
                                                                        <td>
                                                                            <div>
                                                                                @if ($this->items_to_edit[$purchase_detail->id])
                                                                                    <a
                                                                                        wire:click="savePurchaseOrderDetail({{ $purchase_detail->id }},'{{ $purchase_detail->item->item_name }}')"
                                                                                        class="text-dark me-2"
                                                                                        title="Save Purchase Order Detail"
                                                                                    >
                                                                                        <i
                                                                                            class="fa fa-check-double m-0 icons-sm"
                                                                                        ></i>
                                                                                    </a>
                                                                                @else
                                                                                    <a
                                                                                        wire:click="editPurchaseOrderDetail({{ $purchase_detail->id }})"
                                                                                        class="text-dark me-2"
                                                                                        title="Edit Purchase Order Detail"
                                                                                    >
                                                                                        <i
                                                                                            class="ri-pencil-line m-0 icons-sm"
                                                                                        ></i>
                                                                                    </a>
                                                                                @endif
                                                                                <a
                                                                                    {{-- href="#" --}}
                                                                                    class="text-danger"
                                                                                    title="Delete"
                                                                                    wire:click="deletePurchaseOrderDetail({{ $purchase_detail->id }},'{{ $purchase_detail->item->item_name }}')"
                                                                                >
                                                                                    <i
                                                                                        class="ri-delete-bin-line m-0 icons-sm"
                                                                                    ></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        <td colspan="12" class="text-center">
                                                                            No item added
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                                {{--
                                                                    <tr>
                                                                    <td>Abidec Drops</td>
                                                                    <td>
                                                                    100.00
                                                                    </td>
                                                                    <td>
                                                                    5
                                                                    </td>
                                                                    <td>1</td>
                                                                    <td>500.00</td>
                                                                    <td>
                                                                    <div>
                                                                    <a href="#" class="text-dark me-2" title="Edit Purchase Order"><i class="ri-pencil-line m-0 icons-sm"></i></a>
                                                                    <a href="#" class="text-danger" title="Delete"><i class="ri-delete-bin-line m-0 icons-sm"></i></a>
                                                                    </div>
                                                                    </td>
                                                                    </tr>
                                                                --}}
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                    @if ($this->type == 'pending')
                        <button wire:click="approvePurchaseOrder" class="btn btn-primary my-2">
                            Approve Purchase Order
                        </button>
                    @elseif ($this->type == 'index')
                        <button wire:click="submitPurchaseOrderForApproval" class="btn btn-primary my-2">
                            Submit For Approval
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @script
        <script>
            $wire.on('closeModal', function () {
                $('#edit_po').modal('hide');
            });
        </script>
    @endscript
</div>
