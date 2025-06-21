{{-- drug serving modal --}}
<div wire:ignore.self id="drug-serving-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Serving Drugs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-2">
                    <div class="col-10">
                        <label for="">Search</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search by receipt number"
                            wire:model.blur="search_drug_serving"
                        />
                    </div>
                    <div class="col-2 align-content-end">
                        <button type="button" class="btn btn-primary" wire:click="getDrugToServe">Filter</button>
                    </div>
                </div>
                @if ($this->serving_drugs)
                    <div class="table-responsive my-4">
                        <table class="table table-head-custom cursor text-center table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Receipt Number</th>
                                    <th>Client Info</th>
                                    <th>Payment Mode</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->serving_drugs as $serving_drug)
                                    @php
                                        $visit_detail_drugs = \App\Models\VisitDetail::where(
                                            'receipt_number',
                                            $serving_drug->receipt_number,
                                        )
                                            ->where('source', '!=', 'outsource')
                                            ->where('receipt_number', '!=', '')
                                            ->where('payment_status', 'paid')
                                            ->get();
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('dS F Y H:iA', strtotime($serving_drug->created_at)) }}</td>
                                        <td>{{ $serving_drug->receipt_number }}</td>
                                        <td>
                                            {{ \Illuminate\Support\Str::headline($serving_drug->full_name_title) ?? 'GUEST' }}
                                        </td>
                                        <td>{{ $serving_drug->payment_method ?? 'CASH' }}</td>
                                        <td>
                                            {{
                                                $visit_detail_drugs->reduce(function ($carry, $item) {
                                                    return $carry + $item->quantity * $item->unit_price;
                                                })
                                            }}
                                        </td>
                                        <td class="text-center">
                                            <a
                                                href="#!"
                                                wire:click="serveDrugConfirmation({{ $serving_drug->id }})"
                                                class="btn btn-outline-dark px-1 py-0 me-1"
                                                title="Serve Drugs"
                                            >
                                                <i class="fas fa-quidditch m-0 icons-sm"></i>
                                            </a>
                                            <a
                                                href="#!"
                                                onclick="$('.serving_details_{{ $serving_drug->id }}').fadeToggle('slow')"
                                                class="btn btn-primary px-1 py-0"
                                            >
                                                <i class="fas fa-arrow-down m-1 icons-sm"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr style="display: none" class="serving_details_{{ $serving_drug->id }}">
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
                                                                            <th>Status</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @forelse ($visit_detail_drugs as $visit_detail)
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td style="text-align: left !important">
                                                                                    {{ $visit_detail->item?->item_name ?? 'Item not found' }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $visit_detail->unit_price }}
                                                                                </td>
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
                                        <td colspan="7" class="text-center">No drug to serve at the moment!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    {{-- loading --}}
                    '
                    <div class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
