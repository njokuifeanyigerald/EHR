<div class="row">
    <div class="col-lg-5">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h5 class="card-title">Owing</h5>
                </div>
            </div>
            <div class="iq-card-body">
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <table class="table table-borderless">
                        <thead class="table-light">
                            <tr>
                                @isset($this->visit_details)
                                    @empty(! $this->visit_details)
                                        <th scope="col">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                id="select_all"
                                                wire:model.live="select_all"
                                            />
                                        </th>
                                    @endempty
                                @endisset

                                <th scope="col">Item</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Unit Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($this->visit_details)
                                @forelse ($this->visit_details as $visit_detail)
                                    <tr>
                                        <td scope="row">
                                            <input
                                                type="checkbox"
                                                class="form-check-input"
                                                id="select_all{{ $visit_detail->id }}"
                                                wire:model.live="selected_visit_details"
                                                value="{{ $visit_detail->id }}"
                                            />
                                        </td>
                                        <td scope="row">
                                            {{ $visit_detail->item->item_name }}
                                        </td>
                                        <td>
                                            {{ $visit_detail->quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($visit_detail->unit_price, 2, '.', ',') }}
                                            @if ($visit_detail->allow_partial && $visit_detail->partial_amount_allowed > 0)
                                                {{-- approve --}}
                                                <i class="fa fa-check text-success"></i>
                                                {{--
                                                    @if ($visit_detail->allow_partial)
                                                    ({{ 'PA: ' . number_format($visit_detail->partial_amount_allowed, 2, '.', ',') }})
                                                    @endif
                                                --}}
                                            @elseif ($visit_detail->forwarded_for_approval && $visit_detail->partial_amount_allowed == 0)
                                                <i class="fa fa-clock text-warning"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No item for payment</td>
                                    </tr>
                                @endforelse
                            @endisset

                            @isset($this->carts)
                                @forelse ($this->carts as $cart)
                                    <tr>
                                        <td scope="row">
                                            {{ $cart['item']['item_name'] }}
                                        </td>
                                        <td>
                                            {{ $cart['qty'] }}
                                        </td>
                                        <td>
                                            {{ number_format($cart['price'], 2, '.', ',') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No item for payment</td>
                                    </tr>
                                @endforelse
                            @endisset
                        </tbody>
                    </table>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h5 class="card-title">Bill Summary</h5>
                </div>
            </div>
            <div class="iq-card-body">
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <!--begin::Detail-->
                    <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 font-size-lg">Total Amount</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                                {{ number_format($this->total, 2, '.', ',') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">VAT ({{ $this->tax_percent }}%)</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->tax, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">
                        Total Discount ({{ $this->discount_percent }}%)
                        </span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->discount, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">Total Gratis (Pending)</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->total_gratis, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">Total Insurance (Approved)</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->total_insurance, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">Total Credit (Pending)</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->total_credit, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 font-size-lg">Total Bill (Approved)</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <a href="#" class="text-primary text-hover-primary mb-1 font-size-lg">
                                {{ number_format($this->total_bill, 2, '.', ',') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 font-size-lg">Current Bill</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <a href="#" class="text-primary text-hover-primary mb-1 font-size-lg">
                                {{ number_format($this->current_bill, 2, '.', ',') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    {{--
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                        <span class="text-dark mb-1 font-size-lg">Amount To Deduct</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                        <a href="#" class="text-danger text-hover-primary mb-1 font-size-lg">
                        {{ number_format($this->amount_to_deduct, 2, '.', ',') }}
                        </a>
                        </div>
                        </div>
                    --}}
                    <!--end::Detail-->
                    <!--begin::Detail-->
                    @if ($over_payment_allowed)
                        <div class="d-flex align-items-center mb-2 justify-content-between">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 font-size-lg">Current Balance</span>
                            </div>
                            <div class="d-flex flex-column font-weight-bold">
                                <a href="#" class="text-primary text-hover-primary mb-1 font-size-lg">
                                    {{ number_format($this->current_balance, 2, '.', ',') }}
                                </a>
                            </div>
                        </div>
                    @endif

                    <!--end::Detail-->
                    <!--begin::Detail-->
                    <div class="d-flex align-items-center mb-2 justify-content-between">
                        <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 font-size-lg">Amount To Pay</span>
                        </div>
                        <div class="d-flex flex-column font-weight-bold">
                            <a href="#" class="text-danger text-hover-primary mb-1 font-size-lg">
                                {{ number_format($this->amount_to_pay, 2, '.', ',') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Detail-->
                </div>
                <!--end::Body-->
            </div>
        </div>
    </div>
    @if (! $this->is_successful)
        @include('payments.includes.make-payment')
    @else
        @include('payments.includes.payment-success')
    @endif
</div>
