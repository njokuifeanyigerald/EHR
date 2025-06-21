<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" data-sortable="true" data-field="No">No</th>
                <th scope="col" data-field=""></th>
                <th scope="col" data-sortable="true" data-field="Patient">Date Added</th>
                <th scope="col" data-sortable="true" data-field="Receipt No.">Receipt No.</th>
                <th scope="col" data-sortable="true" data-field="Full Name">Full Name</th>
                <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                <th scope="col" data-sortable="true" data-field="Total Amount">Payment Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payment_receipts as $payment_receipt)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        @if ($this->loadItems && $payment_receipt->receipt_number == $this->receipt_number)
                            <a href="#!" wire:click='collapseItems("{{ $payment_receipt->receipt_number }}")'>
                                <i class="fa fa-minus text-primary"></i>
                            </a>
                        @else
                            <a href="#!" wire:click='populateItems("{{ $payment_receipt->receipt_number }}")'>
                                <i class="fa fa-plus text-primary"></i>
                            </a>
                        @endif
                    </td>
                    <td>{{ date('dS F Y h:i A', strtotime($payment_receipt->created_at)) }}</td>
                    <td>{{ $payment_receipt->receipt_number }}</td>
                    <td>
                        {{ $payment_receipt->patient->full_name_title }}
                    </td>
                    <td>
                        {{ $payment_receipt->visit?->serviceType?->name ?? 'N/A' }}
                    </td>
                    <td>
                        {{ $payment_receipt->currency_value?->code ?? config('app.currency') }}
                        {{ $payment_receipt->payment_amount }}
                    </td>
                </tr>
                @if ($this->loadItems && $payment_receipt->receipt_number == $this->receipt_number)
                    @php
                        $visit_details = \App\Models\VisitDetail::where(
                            'receipt_number',
                            $payment_receipt->receipt_number,
                        )
                            ->where('payment_status', 'paid')
                            ->whereNotIn('source', ['outsource', 'external'])
                            ->get();
                    @endphp

                    <tr>
                        <td colspan="10" class="p-3 rx-gray-bg">
                            <table class="table mb-0">
                                <thead class="table-dark text-white">
                                    <tr>
                                        <th class="text-white p-2">
                                            Total Cash: {{ $this->total_cash_to_be_refunded }}
                                        </th>
                                        <th class="p-2">
                                            @if ($this->items->where('refund_status', '!=', 'paid')->count() > 0)
                                                @if ($visit_details->where('refund_status', 'pending')->count() > 0)
                                                    <button
                                                        class="btn btn-success"
                                                        wire:click='confirmRefundApproval("{{ $payment_receipt->receipt_number }}")'
                                                    >
                                                        <i class="fa fa-arrow-rotate-right"></i>
                                                        Approve Refund
                                                    </button>
                                                    <button
                                                        class="btn btn-danger"
                                                        wire:click='confirmRefundRejection("{{ $payment_receipt->receipt_number }}")'
                                                    >
                                                        <i class="fa fa-arrow-rotate-left"></i>
                                                        Reject Refund
                                                    </button>
                                                @else
                                                    <button
                                                        class="btn btn-success"
                                                        wire:click='confirmRefundItems("{{ $payment_receipt->receipt_number }}")'
                                                    >
                                                        <i class="fa fa-arrow-rotate-right"></i>
                                                        Refund
                                                    </button>
                                                @endif
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        @if ($this->items->where('refund_status', '!=', 'paid')->count() > 0)
                                            @if ($visit_details->where('refund_status', 'pending')->count() == 0)
                                                <th class="text-center py-1">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        wire:model.live="selectAll"
                                                    />
                                                </th>
                                            @else
                                                <th class="text-center py-1">
                                                    <input class="form-check-input" type="checkbox" checked disabled />
                                                </th>
                                            @endif
                                        @else
                                            <th class="text-center py-1">
                                                <input class="form-check-input" type="checkbox" checked disabled />
                                            </th>
                                        @endif
                                        <th class="py-1">Item</th>
                                        <th class="py-1">Qty</th>
                                        <th class="py-1">Price</th>
                                        <th class="py-1">Total</th>
                                        <th class="py-1">Payment Mode</th>
                                        <th class="py-1">Refund Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($visit_details as $visit_detail)
                                        <tr>
                                            @if ($visit_detail->refund_status == 'pending')
                                                <td class="text-center">
                                                    <i class="fa fa-clock text-warning"></i>
                                                </td>
                                            @elseif ($visit_detail->refund_status == 'paid')
                                                <td class="text-center">
                                                    <i class="fa fa-check text-success"></i>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        wire:model.live="selectedItems"
                                                        value="{{ $visit_detail->id }}"
                                                        {{-- {{ $visit_detail->refund_status != 'pending' ? '' : 'disabled' }} --}}
                                                    />
                                                </td>
                                            @endif
                                            <td>{{ $visit_detail->item->item_name }}</td>
                                            <td>{{ $visit_detail->quantity }}</td>
                                            <td>{{ $visit_detail->unit_price }}</td>
                                            <td>{{ $visit_detail->quantity * $visit_detail->unit_price }}</td>
                                            <td>{{ $visit_detail->payment_type }}</td>
                                            <td>
                                                @if ($visit_detail->refund_status == 'pending')
                                                    <span class="text-warning">Pending</span>
                                                @elseif ($visit_detail->refund_status == 'paid')
                                                    <span class="text-success">Paid</span>
                                                @elseif ($visit_detail->refund_status == 'rejected')
                                                    <span class="text-danger">Rejected</span>
                                                @else
                                                    <span class="text-info">No Refund Made</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="10" class="text-center">No data found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
