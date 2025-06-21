<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="iq-header-title mb-4">
                            <h4>Supply & Delivery Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder">Supplier</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="address2"
                                            disabled=""
                                            wire:model="supplier"
                                        />
                                    @else
                                        <br />
                                        {{ $this->supplier ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bolder">Memo</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="address2"
                                            disabled=""
                                            wire:model="memo"
                                        />
                                    @else
                                        <br />
                                        {{ $this->memo ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Deliver To</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input type="text" class="form-control" disabled="" wire:model="receiver" />
                                    @else
                                        <br />
                                        {{ $this->receiver ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Delivery Memo</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="delivery_memo"
                                            wire:model="delivery_memo"
                                        />
                                    @else
                                        <br />
                                        {{ $this->delivery_memo ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="iq-header-title mb-4">
                            <h4>Order Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="font-weight-bolder">Invoice Number</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="invoice_number"
                                            id="invoice_number"
                                            disabled=""
                                            wire:model="invoice_number"
                                        />
                                    @else
                                        <br />
                                        {{ $this->invoice_number ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="font-weight-bolder">Discount</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <div class="rx-input-flex">
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="discount"
                                                style="width: 60px"
                                                wire:model="discount"
                                            />
                                            &nbsp;
                                            <select
                                                name="discount_type"
                                                class="form-select"
                                                style="width: 110px"
                                                wire:model="discount_type"
                                            >
                                                <option value="">Choose options</option>
                                                <option value="percentage" selected>Percentage</option>
                                                <option value="amount">Amount</option>
                                            </select>
                                        </div>
                                    @else
                                        <br />
                                        {{ number_format($this->discount, 2, '.', ',') . ' ' . ($this->discount_type == 'percentage' ? '%' : '') ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="font-weight-bolder">VAT</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <div class="rx-input-flex">
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="vat"
                                                style="width: 60px"
                                                wire:model="vat"
                                            />
                                            &nbsp;
                                            <select
                                                name="vat_type"
                                                class="form-select"
                                                style="width: 110px"
                                                wire:model="vat_type"
                                            >
                                                <option value="">Choose options</option>
                                                <option value="percentage" selected>Rate</option>
                                                <option value="amount">Amount</option>
                                            </select>
                                        </div>
                                    @else
                                        <br />
                                        {{ number_format($this->vat, 2, '.', ',') . ' ' . ($this->vat_type == 'percentage' ? '%' : '') ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Order Date</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input type="text" class="form-control" disabled="" wire:model="order_date" />
                                    @else
                                        <br />
                                        {{ $this->order_date ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Due Date</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input type="text" class="form-control" disabled="" wire:model="due_date" />
                                    @else
                                        <br />
                                        {{ $this->due_date ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date Received</label>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input
                                            type="date"
                                            class="form-control"
                                            name="receive_date"
                                            id="receive_date"
                                            {{-- readonly="" --}}
                                            wire:model="received_date"
                                        />
                                    @else
                                        <br />
                                        {{ now()->parse($this->received_date)->format('jS F Y') ?? 'N/A' }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                @if ($this->purchase_order->received_status == 'pending')
                    <div class="iq-header-title">
                        <h4>Pending Approval</h4>
                        {{-- for approved --}}
                        {{-- <h4>Approved</h4> --}}
                    </div>

                    @if ($this->approve_po)
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <button
                                wire:click="approvePurchaseOrder"
                                class="btn btn-primary my-2"
                                data-bs-toggle="modal"
                                data-bs-target="#add_po"
                            >
                                Approve Order
                            </button>
                        </div>
                    @endif
                @else
                    <div class="iq-header-title">
                        <h4>Approved</h4>
                        {{-- for approved --}}
                        {{-- <h4>Approved</h4> --}}
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a
                            href="{{ route('purchases.print.received_order', ['id' => $this->purchase_order->id]) }}"
                            target="_blank"
                            {{-- wire:click="approvePurchaseOrder" --}}
                            class="btn btn-primary my-2"
                        >
                            <i class="fa fa-print"></i>
                            Print
                        </a>
                    </div>
                @endif
                {{-- for approved --}}
                {{--  --}}
            </div>
            <div class="iq-card-body">
                <div class="col-lg-12 table-responsive">
                    <table class="table cursor-pointer custom-sticky-table nowrap text-nowrap">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Batch</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Act. Price</th>
                                <th>Act. Qty</th>
                                <th>Act. Total</th>
                                <th>Pack Size</th>
                                <th>Actual Pack Size</th>
                                <th>
                                    Mkp(%)
                                    <br />
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <input type="checkbox" id="global" wire:model.lazy="use_global_mkp" />
                                        <label for="global">Global</label>
                                    @endif
                                </th>
                                <th>Mkp Cost</th>
                                <th>Free Qty</th>
                                <th>Expiry Date</th>
                                @if ($this->purchase_order->received_status == 'pending')
                                    <th>
                                        <a title="Save All" wire:click="updateAllPurchaseDetails">
                                            <i class="fa fa-check-double cursor-pointer" style="color: #0bb7af"></i>
                                        </a>
                                        {{-- for approved --}}
                                        {{--  --}}
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->purchase_order->purchaseDetails
                                    ->sortBy(function ($detail) {
                                        return $detail->item_id;
                                    })
                                    ->groupBy('item_id')
                                    ->flatMap(function ($group) {
                                        return $group->sortBy('id');
                                    })
                                as $purchaseDetail)
                                <tr wire:key="{{ $purchaseDetail->id }}">
                                    <td>
                                        {{ $purchaseDetail->item->item_name }}
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="text"
                                                style="width: 100px"
                                                class="form-control uppercase"
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.batch"
                                            />
                                        @else
                                            {{ $purchaseDetail->batch->batch_no }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ number_format($purchaseDetail->unit_price, 2, '.', ',') }}
                                    </td>
                                    <td>
                                        {{ $purchaseDetail->quantity }}
                                    </td>
                                    <td>
                                        {{ number_format($purchaseDetail->unit_price * $purchaseDetail->quantity, 2, '.', ',') }}
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="number"
                                                min="0"
                                                style="width: 80px"
                                                class="form-control"
                                                {{ $purchaseDetail->duplicate ? 'disabled' : '' }}
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.actual_price"
                                            />
                                        @else
                                            {{ number_format($purchaseDetail->unit_price, 2, '.', ',') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="number"
                                                min="0"
                                                style="width: 70px"
                                                class="form-control"
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.actual_quantity"
                                            />
                                        @else
                                            {{ $purchaseDetail->quantity }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            {{ number_format($editable_details[$purchaseDetail->id]['actual_price'] * $editable_details[$purchaseDetail->id]['actual_quantity'], 2, '.', ',') }}
                                        @else
                                            {{ number_format($purchaseDetail->actual_price * $purchaseDetail->actual_quantity, 2, '.', ',') }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $purchaseDetail->pack_size }}
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="number"
                                                min="0"
                                                style="width: 70px"
                                                class="form-control"
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.actual_pack_size"
                                            />
                                        @else
                                            {{ $purchaseDetail->pack_size }}
                                        @endif
                                    </td>

                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="number"
                                                min="0"
                                                class="form-control"
                                                {{-- style="background-color: #ffffff" --}}
                                                {{ $purchaseDetail->duplicate ? 'disabled' : '' }}
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.mkp"
                                            />
                                        @else
                                            {{ $purchaseDetail->mkp }}
                                        @endif
                                    </td>

                                    <td>
                                        {{ number_format($this->sellingPrice($purchaseDetail->id), 2, '.', ',') }}
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="number"
                                                min="0"
                                                style="width: 60px"
                                                class="form-control"
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.free_quantity"
                                            />
                                        @else
                                            {{ $purchaseDetail->free_quantity }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($this->purchase_order->received_status == 'pending')
                                            <input
                                                type="date"
                                                style="width: 120px"
                                                class="form-control"
                                                wire:model="editable_details.{{ $purchaseDetail->id }}.expiry_date"
                                            />
                                        @else
                                            {{ $purchaseDetail->expiry_date }}
                                        @endif
                                    </td>
                                    @if ($this->purchase_order->received_status == 'pending')
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a
                                                    wire:click="updatePurchaseDetail({{ $purchaseDetail->id }},'{{ $purchaseDetail->item->item_name }}')"
                                                >
                                                    <i class="fa fa-check cursor-pointer" style="color: #0bb7af"></i>
                                                </a>

                                                &nbsp;&nbsp;&nbsp;

                                                @if ($purchaseDetail->expiry_date)
                                                    <a
                                                        wire:click="duplicatePurchaseDetail({{ $purchaseDetail->id }},'{{ $purchaseDetail->item->item_name }}')"
                                                    >
                                                        <i class="fa fa-add cursor-pointer" style="color: #0bb7af"></i>
                                                    </a>
                                                @endif

                                                &nbsp;&nbsp;&nbsp;

                                                @if ($purchaseDetail->duplicate)
                                                    <a wire:click="deletePurchaseDetail({{ $purchaseDetail->id }})">
                                                        <i
                                                            class="fa fa-trash cursor-pointer"
                                                            style="color: #bb0202"
                                                        ></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15">
                                        <div class="w-full text-center">No Record Found</div>
                                    </td>
                                </tr>
                            @endforelse
                            {{-- Cost summary --}}
                            {{--
                                <tr class="fw-bolder">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @if ($this->purchase_order->received_status == 'pending')
                                <td></td>
                                @endif
                                
                                <td colspan="2">
                                <span>Total Cost: {{ number_format($this->totalCost(), 2, '.', ',') }}</span>
                                <br />
                                <span>Discount: {{ number_format($this->discount(), 2, '.', ',') }}</span>
                                <br />
                                <span>Vat: {{ number_format($this->vat(), 2, '.', ',') }}</span>
                                <br />
                                <span>Actual Cost: {{ number_format($this->actualCost(), 2, '.', ',') }}</span>
                                </td>
                                </tr>
                            --}}
                        </tbody>
                    </table>
                </div>
                @include(
                    'livewire.purchases.price_component',
                    [
                        'total_cost' => $this->totalCost(),
                        'discount' => $this->discount(),
                        'vat' => $this->vat(),
                        'actual_cost' => $this->actualCost(),
                    ]
                )
            </div>
        </div>
    </div>

    {{-- Errors --}}
    @if ($errors->get('editable_details.*.expiry_date') || $errors->get('editable_details.*.batch'))
        {{
            $this->alert('error', array_values($errors->get('editable_details.*.expiry_date'))[0][0] ?? array_values($errors->get('editable_details.*.batch'))[0][0], [
                'position' => 'center',
                'toast' => false,
            ])
        }}
    @endif
</div>
