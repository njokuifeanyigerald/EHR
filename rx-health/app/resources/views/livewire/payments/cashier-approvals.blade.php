<div>
    {{-- a search input at the left and a button at the right --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <input
                type="text"
                class="form-control mr-2"
                wire:model.live.debounce.500ms="search"
                placeholder="Search by Visit Number"
            />
        </div>

        <div class="d-flex align-items-center">
            <button class="btn btn-primary" wire:click="refreshPage">Refresh Page</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col"></th>
                    <th scope="col">Date Added</th>
                    <th scope="col">Transaction Type</th>
                    <th scope="col">Visit No.</th>
                    <th scope="col">Patient No.</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Visit Type</th>
                    <th scope="col">Waiting Time</th>
                    <th scope="col">Req.</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($visits as $visit)
                    <tr>
                        <th scope="row" class="text-center">1</th>
                        <td class="text-center">
                            @if ($this->visit_number != $visit->visit_number)
                                <button
                                    type="button"
                                    class="btn btn-outline-dark rounded-pill border-0"
                                    wire:click="viewPaymentDetails('{{ $visit->visit_number }}')"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
                            @else
                                <button
                                    type="button"
                                    class="btn btn-outline-dark rounded-pill border-0"
                                    wire:click="collapsePaymentDetails()"
                                >
                                    <i class="fa fa-minus"></i>
                                </button>
                            @endif
                            {{--
                                <button type="button" class="btn btn-outline-dark rounded-pill border-0"
                                wire:click="viewPaymentDetails('{{ $visit->visit_number }}')">
                                <i class="fa fa-minus"></i>
                                </button>
                            --}}
                        </td>
                        <td>{{ date('dS F, Y H:i A', strtotime($visit->created_at)) }}</td>
                        <td>PART PAYMENT</td>
                        <td>{{ $visit->visit_number }}</td>
                        <td>
                            {{ $visit->patient->new_folder_number ?? $visit->patient->folder_number }}
                        </td>
                        <td>
                            {{ $visit->patient->full_name_title }}
                        </td>
                        <td>
                            {{ $visit->serviceType?->name ?? 'None' }}
                        </td>
                        <td>
                            <x-patient-waiting :visit="$visit" :current_location="'cashier'" />
                        </td>
                        <td>
                            @if ($this->visit_number != $visit->visit_number)
                                {{
                                    $visit->visitDetails->reduce(function ($total, $item) {
                                        return number_format($total + $item->partial_amount_to_pay, 2, '.', ',');
                                    })
                                }}
                            @else
                                {{ number_format($this->partial_amount_requested, 2, '.', ',') }}
                            @endif
                        </td>
                        <td>
                            @if (

                                $visit->visitDetails->sum('partial_amount_allowed') > 0 &&
                                $visit->visitDetails->contains('partial_approval_status', 'approved')                            )
                                @if ($this->visit_number != $visit->visit_number)
                                    <i class="fa fa-check text-success"></i>
                                    Approved. AMT:
                                    {{
                                        $visit->visitDetails->reduce(function ($total, $item) {
                                            return number_format($total + $item->partial_amount_allowed, 2, '.', ',');
                                        })
                                    }}
                                @else
                                    <i class="fa fa-check text-success"></i>
                                    Approved. AMT:
                                    {{ number_format($this->partial_amount_allowed, 2, '.', ',') }}
                                @endif
                            @elseif ($visit->visitDetails->contains('partial_approval_status', 'rejected'))
                                <i class="fa fa-times text-danger"></i>
                                Rejected
                            @else
                                <i class="fa fa-clock text-warning"></i>
                                Pending
                            @endif
                        </td>
                    </tr>
                    @if ($this->visit_number == $visit->visit_number)
                        <tr>
                            <td colspan="11" class="p-3 rx-gray-bg">
                                <div class="bg-white p-2">
                                    <span class="me-2">
                                        Status:
                                        @if ($this->partial_approval_status == 'approved')
                                            <i class="fa fa-check text-success"></i>
                                            Approved. AMT:
                                            {{ number_format($this->partial_amount_allowed, 2, '.', ',') }}
                                        @elseif ($this->partial_approval_status == 'rejected')
                                            <i class="fa fa-times text-danger"></i>
                                            Rejected
                                        @else
                                            <i class="fa fa-clock text-warning"></i>
                                            Pending
                                        @endif
                                    </span>

                                    @if (

                                        $this->partial_approval_status == 'pending' &&
                                        (isset($this->partial_amount_allowed) && $this->partial_amount_allowed) > 0                                    )
                                        <button
                                            type="button"
                                            class="btn my-auto me-2 btn-primary rounded-pill"
                                            wire:click="confirmApprovePayment"
                                        >
                                            Approve
                                            <i class="fa fa-check"></i>
                                        </button>
                                    @endif

                                    @if ($this->partial_approval_status == 'pending')
                                        <button
                                            type="button"
                                            class="btn my-auto me-2 btn-danger rounded-pill"
                                            wire:click="confirmRejectPayment"
                                        >
                                            Reject
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @endif

                                    @if ($this->partial_approval_status == 'pending')
                                        |
                                        <span class="me-2">
                                            Authorized Amount To Pay:
                                            <input
                                                type="number"
                                                min="1"
                                                class="form-control d-inline h-auto"
                                                style="width: 120px"
                                                wire:model.live.debounce.500ms="partial_amount_allowed"
                                            />
                                        </span>
                                    @endif

                                    |
                                    <span>
                                        Requested Amount To Pay:
                                        {{ number_format($this->partial_amount_requested, 2, '.', ',') }}
                                    </span>
                                </div>
                                <table class="table mb-0">
                                    <thead class="table-dark text-white">
                                        <tr>
                                            <th class="text-white">Total Cash: {{ $this->total_cash }}</th>
                                            <th class="text-white">
                                                Current patient Balance: {{ $this->current_balance }}
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th class="text-white">Patient Visit No: {{ $visit->visit_number }}</th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($this->visit_details as $visit_detail)
                                            <tr>
                                                <td>{{ $visit_detail->item->item_name }}</td>
                                                <td>{{ $visit_detail->quantity }}</td>
                                                <td>{{ $visit_detail->unit_price }}</td>
                                                <td>{{ $visit_detail->quantity * $visit_detail->unit_price }}</td>
                                                <td>{{ Str::upper($visit_detail->billingCode->code) }}</td>
                                                <td>
                                                    @if ($visit_detail->payment_status == 'paid')
                                                        <span class="text-success">Paid</span>
                                                    @elseif ($visit_detail->payment_status == 'owing')
                                                        <span class="text-danger">Owing</span>
                                                    @elseif ($visit_detail->payment_status == 'partially_paid')
                                                        <span class="text-warning">Partially Paid</span>
                                                    @elseif ($visit_detail->payment_status == 'not_paid')
                                                        <span class="text-danger">Not Paid</span>
                                                    @endif
                                                </td>
                                                {{-- <td></td> --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No data found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="11" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
