<div>
    <!-- Add purchase order Modal -->
    {{-- {{ dd($this->purchase_orders) }} --}}
    <div
        wire:ignore.self
        class="modal fade"
        id="view_po"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Purchase Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- Supplier and delivery information --}}
                        <div class="col-lg-4">
                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-light">
                                    <div class="iq-header-title me-1">
                                        <h5 class="card-title">Supplier & Delivery Information</h5>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Supplier</label>
                                            <p>{{ $this->purchase_order?->supplier?->name ?? 'N/A' }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="order_memo_add_po">Memo</label>
                                            <p>
                                                {{ $this->purchase_order?->memo ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Supplied Order ID</label>
                                            <p>
                                                {{ $this->purchase_order?->po_number ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="form-group mt-3">
                                            <span class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">
                                                Dispatch not available
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label>Deliver To</label>
                                            <p>
                                                {{ $this->purchase_order?->hospital->name }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label>Due Date</label>
                                            <p>
                                                {{ now()->parse($this->purchase_order?->due_date)->format('Y-m-d') }}
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Table --}}
                        <div class="col-lg-8">
                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-light">
                                    <div class="iq-header-title me-1">
                                        <h5 class="card-title">Item Information</h5>
                                    </div>
                                </div>
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
                                                    {{-- <th scope="col">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($this->purchase_order?->purchaseDetails ?? [] as $purchaseItem)
                                                    <tr>
                                                        <td>
                                                            {{ $purchaseItem->item->item_name }}
                                                        </td>
                                                        <td>
                                                            {{ $purchaseItem->unit_price }}
                                                        </td>
                                                        <td>
                                                            {{ $purchaseItem->quantity }}
                                                        </td>
                                                        <td>
                                                            {{ $purchaseItem->pack_size }}
                                                        </td>
                                                        <td>
                                                            {{ number_format($purchaseItem->unit_price * $purchaseItem->quantity, 2, '.', ',') }}
                                                        </td>
                                                        {{--
                                                            <td>
                                                            <div>
                                                            <a
                                                            href="#"
                                                            class="text-dark me-2"
                                                            title="Edit Purchase Order"
                                                            >
                                                            <i class="ri-pencil-line m-0 icons-sm"></i>
                                                            </a>
                                                            <a href="#" class="text-danger" title="Delete">
                                                            <i class="ri-delete-bin-line m-0 icons-sm"></i>
                                                            </a>
                                                            </div>
                                                            </td>
                                                        --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="12">No Item Selected for Purchase</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
