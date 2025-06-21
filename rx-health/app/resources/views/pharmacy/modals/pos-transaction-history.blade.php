{{-- Pos trransaction modal --}}
<div wire:ignore.self id="pos-transaction-history" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col-5">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control" wire:model.blur="recent_transactions_from" />
                    </div>

                    <div class="col-5">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" wire:model.blur="recent_transactions_to" />
                    </div>
                    <div class="col-2 align-content-end">
                        <button type="button" class="btn btn-primary" wire:click="filterTransactions">Filter</button>
                    </div>
                </div>
                <div class="table-responsive my-4">
                    <table class="table table-head-custom cursor text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Receipt Number</th>
                                <th>Client Info</th>
                                <th>Payment Mode</th>
                                <th>Amt Paid</th>
                                <th>Status</th>
                                <th>Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->recent_transactions as $recent_transaction)
                                @php
                                    $visit_detail_drugs = \App\Models\VisitDetail::query()
                                        ->where('receipt_number', $recent_transaction->receipt_number)
                                        ->whereHas('itemCategory', function ($query) {
                                            $query->where('category_name', 'Drugs');
                                        })
                                        ->get();
                                @endphp

                                <tr onclick="$('.transact_details_{{ $recent_transaction->id }}').fadeToggle('slow')">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ date('dS F Y H:iA', strtotime($recent_transaction->created_at)) }}</td>
                                    <td>{{ $recent_transaction->receipt_number }}</td>
                                    <td>
                                        {{ \Illuminate\Support\Str::headline($recent_transaction->full_name_title) ?? 'GUEST' }}
                                    </td>
                                    <td>{{ $recent_transaction->payment_methods ?? 'CASH' }}</td>
                                    <td>
                                        @php
                                            $payment_amounts = 0;
                                            $transactions_payments = \App\Models\PaymentRecord::whereIn(
                                                'id',
                                                explode(',', $recent_transaction->ids),
                                            )->get();
                                            $payment_amounts = $transactions_payments->sum('payment_amount');

                                            echo number_format($payment_amounts, 2);
                                        @endphp

                                        {{--
                                            {{ $visit_detail_drugs->reduce(function ($carry, $item) {
                                            return $carry + $item->quantity * $item->unit_price;
                                            }) }}
                                        --}}
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $recent_transaction->is_partially_paid ? 'bg-warning' : 'bg-success' }}"
                                        >
                                            {{ $recent_transaction->is_partially_paid ? 'Partial' : 'Paid' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('payments.receipt', $recent_transaction->receipt_number) }}"
                                            class="btn btn-outline-dark px-1 py-0 me-1"
                                            title="Receipt"
                                            target="_blank"
                                        >
                                            <i class="ri-printer-fill m-0 icons-sm"></i>
                                        </a>
                                        <a
                                            href="{{ route('payments.pos_receipt', $recent_transaction->receipt_number) }}"
                                            class="btn btn-outline-danger px-1 py-0"
                                            title="POS Receipt"
                                            target="_blank"
                                        >
                                            <i class="ri-printer-line m-0 icons-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr style="display: none" class="transact_details_{{ $recent_transaction->id }}">
                                    <td class="datatable-detail" colspan="8">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table
                                                                class="table table-responsive-lg table-responsive-md table-responsive-sm"
                                                            >
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th style="text-align: left !important">
                                                                            Item
                                                                        </th>
                                                                        <th>Unit Price</th>
                                                                        <th>Quantity</th>
                                                                        <th>Total</th>
                                                                        <th>Payment Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($visit_detail_drugs as $visit_detail)
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td style="text-align: left !important">
                                                                                {{ $visit_detail->item?->item_name ?? 'Item not found' }}
                                                                            </td>
                                                                            <td>{{ $visit_detail->unit_price }}</td>
                                                                            <td>{{ $visit_detail->quantity }}</td>
                                                                            <td>
                                                                                {{ $visit_detail->quantity * $visit_detail->unit_price }}
                                                                            </td>
                                                                            <td>
                                                                                <span
                                                                                    class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block"
                                                                                >
                                                                                    {{ $visit_detail->payment_status }}
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">
                                                                                No transaction found
                                                                            </td>
                                                                        </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No transaction found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- load more and less button here --}}
                    @if ($this->recent_transactions_perPage < $this->recent_transactions_count)
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary" wire:click="loadMoreTransactions">Load More</button>
                        </div>
                    @endif

                    {{-- load more and less button here --}}
                    @if ($this->recent_transactions_count > $this->recent_transactions_perPage)
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-secondary" wire:click="loadLessTransactions">Load Less</button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
