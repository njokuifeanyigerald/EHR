<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Search for Purchase Order - using Order Number/Supplier Name</p>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    placeholder="Search"
                                    wire:model.live.debounce.500ms="search"
                                />
                                <span><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div wire:ignore.self class="table-responsive">
                    <table class="table table-striped table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Purchase Order.No</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Expected Date</th>
                                <th scope="col">Received Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($purchase_orders as $key => $purchaseOrder)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td scope="row">
                                        {{ now()->parse($purchaseOrder->order_date)->format('jS F Y') }}
                                    </td>
                                    <td>
                                        {{ $purchaseOrder->po_number }}
                                    </td>
                                    <td>
                                        {{ Str::headline($purchaseOrder?->supplier?->name ?? 'N/A') }}
                                    </td>
                                    <td>
                                        {{ $purchaseOrder->due_date ? now()->parse($purchaseOrder->due_date)->format('jS F Y') : 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $purchaseOrder->received_date ? now()->parse($purchaseOrder->received_date)->format('jS F Y') : 'N/A' }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{
                                                $purchaseOrder->status == 'draft'
                                                    ? 'badge-secondary'
                                                    : ($purchaseOrder->status == 'pending'
                                                        ? 'badge-info'
                                                        : ($purchaseOrder->status == 'approved'
                                                            ? 'badge-success'
                                                            : 'badge-primary'))
                                            }}"
                                        >
                                            {{ Str::headline($purchaseOrder->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if (! in_array($this->type, ['pending_confirmation', 'confirmed']))
                                            <a
                                                wire:click="dispatch('viewPurchaseOrder',[{{ $purchaseOrder->id }}])"
                                                data-bs-toggle="modal"
                                                data-bs-target="#view_po"
                                                class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                title="View Purchase Order"
                                            >
                                                <i class="ri-eye-line m-0 icons-sm"></i>
                                            </a>
                                            @if (in_array($this->type, ['index', 'pending']))
                                                <a
                                                    wire:click="dispatch('editPurchaseOrder',[{{ $purchaseOrder->id }}])"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_po"
                                                    class="btn btn-outline-dark px-1 py-0 me-1 me-2"
                                                    title="Edit Purchase Order"
                                                >
                                                    <i class="ri-pencil-line m-0 icons-sm"></i>
                                                </a>
                                                <a
                                                    wire:click="deletePurchaseOrder({{ $purchaseOrder->id }})"
                                                    {{-- href="#" --}}
                                                    class="btn btn-outline-danger px-1 py-0 me-1"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line m-0 icons-sm"></i>
                                                </a>
                                            @endif

                                            <a
                                                href="{{ route('purchases.invoice', ['id' => $purchaseOrder->id]) }}"
                                                target="_blank"
                                                class="btn btn-outline-warning px-1 py-0 me-1"
                                                title="Download"
                                            >
                                                <i class="ri-download-2-line m-0 icons-sm"></i>
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('purchases.receive_order', ['id' => $purchaseOrder->id]) }}"
                                                class="btn btn-outline-primary px-1 py-1 me-1 me-2"
                                                title="View Purchase Order"
                                            >
                                                Open Order
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="w-full text-center">No Purchase Orders Available</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $purchase_orders->links() }}
            </div>
        </div>
    </div>

    {{-- modals --}}
    {{-- add purchase order modal --}}
    <livewire:purchases.modals.add-purchase-order :type="$this->type" :suppliers="$suppliers" />

    {{-- edit purchase order modal --}}
    <livewire:purchases.modals.edit-purchase-order
        :type="$this->type"
        :purchase_orders="$purchase_orders"
        :suppliers="$suppliers"
    />

    {{-- view purchase order modal --}}
    <livewire:purchases.modals.view-purchase-order :type="$this->type" :purchase_orders="$purchase_orders" />
</div>
