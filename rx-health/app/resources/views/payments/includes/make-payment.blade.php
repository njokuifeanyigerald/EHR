<style>
    .iq-card-body {
        max-height: 500px;
        /* Adjust the height as needed */
        overflow-y: auto;
        /* Enables vertical scrolling */
    }
</style>

<div class="col-lg-7">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h5 class="card-title">Make New Payment</h5>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="form-group my-3">
                <label>Patient</label>
                <input
                    type="text"
                    value="{{ $this->patient?->full_name_title ?? 'Not Provided' }}"
                    class="form-control my-2"
                    disabled=""
                    readonly=""
                />
            </div>
            @if ($this->page_location == 'cashier')
                <div class="row">
                    <div class="col-lg-{{ $over_payment_allowed ? '10' : '12' }}">
                        <div class="form-group my-3">
                            <label>Payment Collected</label>
                            <select
                                class="form-select my-2"
                                name="payment_collected"
                                id="payment_collected"
                                wire:model.live="payment_collected"
                            >
                                <option value="" selected>Select Payment Type Collected</option>
                                <option value="full_payment">Full Payment</option>
                                <option value="partial_payment">Partial Payment</option>
                                {{-- <option value="credit_sales">Credit Sales</option> --}}
                            </select>
                        </div>
                    </div>

                    @if ($over_payment_allowed)
                        <div class="col-lg-2">
                            <div class="form-group my-3">
                                <label>Debit account</label>
                                <br />
                                <div class="form-check form-switch">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="flexSwitchCheckChecked"
                                        checked
                                        wire:model.live="debit_account"
                                    />
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            @if ($this->payment_collected == 'full_payment')
                <div class="btn-group my-3" id="tab" role="tablist">
                    <a
                        wire:ignore.self
                        wire:click="selectedPaymentModeUsed('single')"
                        class="btn btn-outline-primary active"
                        data-bs-toggle="tab"
                        href="#Single"
                        role="tab"
                        aria-controls="Single"
                        aria-selected="true"
                    >
                        Single Payment Mode
                    </a>
                    <a
                        wire:ignore.self
                        wire:click="selectedPaymentModeUsed('multiple')"
                        class="btn btn-outline-primary"
                        data-bs-toggle="tab"
                        href="#Multi"
                        role="tab"
                        aria-controls="Multi"
                        aria-selected="false"
                    >
                        Multi Payment Mode
                    </a>
                </div>
                <div class="tab-content mt-1 mb-3" id="TabContent">
                    <div
                        wire:ignore.self
                        class="tab-pane fade show active"
                        id="Single"
                        role="tabpanel"
                        aria-labelledby="Single-tab"
                    >
                        <div class="form-group">
                            <label>Mode of Payment</label>
                            <select
                                class="form-select my-2"
                                name="payment_channel"
                                id="payment_channel"
                                wire:model.live="payment_channel"
                            >
                                <option value="cash">Cash</option>
                                <option value="pos">POS</option>
                                <option value="cheque">Cheque</option>
                                <option value="momo">Mobile Money</option>
                                <option value="bank">Bank Transfer</option>
                                {{-- <option value="card">Card (Visa/Mastercard)</option> --}}
                            </select>
                        </div>

                        @if ($payment_channel == 'cash')
                            @include('pharmacy.includes.cash_pay')
                        @endif

                        @if ($this->payment_channel == 'pos')
                            @include('pharmacy.includes.pos_pay')
                        @endif

                        @if ($this->payment_channel == 'cheque')
                            @include('pharmacy.includes.cheque_pay')
                        @endif

                        @if ($this->payment_channel == 'momo')
                            @include('pharmacy.includes.momo_pay')
                        @endif

                        @if ($this->payment_channel == 'bank')
                            @include('pharmacy.includes.bank_pay')
                        @endif
                    </div>
                    <div
                        wire:ignore.self
                        class="tab-pane fade my-1"
                        id="Multi"
                        role="tabpanel"
                        aria-labelledby="Multi-tab"
                    >
                        <div class="d-flex gap-3 flex-wrap my-3 justify-content-between">
                            <div class="border rounded px-3">
                                <div class="row">
                                    <div class="col-lg-7 text-center pt-2">
                                        <i class="fa fa-money icons-base text-success mx-auto"></i>
                                    </div>
                                    <div class="col-lg-5 pe-0 pt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="cash"
                                            name="cash"
                                            wire:model.live="multiple_payment_channel.cash"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="text-dark text-center mb-0">Cash</p>
                                </div>
                            </div>
                            <div class="border rounded px-3">
                                <div class="row">
                                    <div class="col-lg-7 text-center pt-2">
                                        <i class="fa fa-credit-card icons-base text-success mx-auto"></i>
                                    </div>
                                    <div class="col-lg-5 pe-0 pt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="pos"
                                            name="pos"
                                            wire:model.live="multiple_payment_channel.pos"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="text-dark text-center mb-0">POS</p>
                                </div>
                            </div>
                            <div class="border rounded px-3">
                                <div class="row">
                                    <div class="col-lg-7 text-center pt-2">
                                        <i class="la la-signature icons-base text-success mx-auto"></i>
                                    </div>
                                    <div class="col-lg-5 pe-0 pt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="cheque"
                                            name="cheque"
                                            wire:model.live="multiple_payment_channel.cheque"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="text-dark text-center mb-0">Cheque</p>
                                </div>
                            </div>
                            <div class="border rounded px-3">
                                <div class="row">
                                    <div class="col-lg-7 text-center pt-2">
                                        <i class="fa fa-mobile-phone icons-base text-success mx-auto"></i>
                                    </div>
                                    <div class="col-lg-5 pe-0 pt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="mobile_money"
                                            name="mobile_money"
                                            wire:model.live="multiple_payment_channel.momo"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="text-dark text-center mb-0">Momo</p>
                                </div>
                            </div>
                            <div class="border rounded px-3">
                                <div class="row">
                                    <div class="col-lg-7 text-center pt-2">
                                        <i class="fa fa-bank icons-base text-success mx-auto"></i>
                                    </div>
                                    <div class="col-lg-5 pe-0 pt-2">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="bank"
                                            name="bank"
                                            wire:model.live="multiple_payment_channel.bank"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="text-dark text-center mb-0">Bank</p>
                                </div>
                            </div>
                        </div>

                        @if ($this->multiple_payment_channel['cash'])
                            @include('pharmacy.includes.cash_pay')
                        @endif

                        @if ($this->multiple_payment_channel['pos'])
                            @include('pharmacy.includes.pos_pay')
                        @endif

                        @if ($this->multiple_payment_channel['cheque'])
                            @include('pharmacy.includes.cheque_pay')
                        @endif

                        @if ($this->multiple_payment_channel['momo'])
                            @include('pharmacy.includes.momo_pay')
                        @endif

                        @if ($this->multiple_payment_channel['bank'])
                            @include('pharmacy.includes.bank_pay')
                        @endif
                    </div>
                </div>
                {{--
                    <div class="form-group row my-3">
                    <label class="col-md-3">Total Paid:</label>
                    <div class="col-md-9">
                    <span class="text-primary">
                    {{ number_format($this->total_amount_paid, 2) }} of
                    {{ number_format($this->amount_to_pay, 2) }}
                    </span>
                    </div>
                    </div>
                    <div class="form-group row my-3">
                    <label class="col-md-3">Change:</label>
                    <div class="col-md-9">
                    <span class="text-primary">
                    {{ number_format($this->total_amount_paid - $this->amount_to_pay, 2) }}
                    </span>
                    </div>
                    </div>
                    <div class="form-group row my-3">
                    <label class="col-md-3">Payment Collected:</label>
                    <div class="col-md-9">
                    <span class="text-primary">
                    {{ Str::headline($this->payment_collected) }}
                    </span>
                    </div>
                    </div>
                --}}
                @if ($page_location != 'show' && $this->approve_payment)
                    @if (

                        ($this->amount_to_pay > 0 && $this->total_amount_paid < $this->amount_to_pay) ||
                        ($this->debit_account && $this->current_bill > 0 && $this->total_amount_paid < $this->current_bill)                    )
                        <div class="form-group d-flex flex-row-reverse">
                            <button
                                wire:loading.remove
                                wire:click="confirmMakePayment({{ $this->total_amount_paid }}, '{{ $this->payment_channel }}', '{{ $this->page_location == 'pos' ? 'cart' : 'cashier' }}')"
                                class="btn btn-primary me-1 mt-2"
                            >
                                Make Payment
                            </button>
                            <button wire:loading wire:target="makePayment" class="btn btn-primary me-1 mt-2" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Processing...
                            </button>
                        </div>
                    @endif
                @endif
            @elseif ($this->payment_collected == 'partial_payment')
                @if (

                    $this->payment_collected == 'partial_payment' &&
                    $this->visit->visitDetails
                        ->whereIn('id', $this->selected_visit_details)
                        ->where('allow_partial', true)
                        ->count() == 0                )
                    <div class="form-group my-3">
                        <label>
                            Amount To Be Paid:
                            <span class="text-danger">*</span>
                        </label>
                        <input
                            class="form-control my-2"
                            type="number"
                            min="0"
                            name="partial_amount"
                            wire:model.live.debounce.550ms="cash_details.partial_amount"
                        />

                        <x-input-error :messages="$errors->get('cash_details.partial_amount')" class="mt-1" />
                    </div>

                    <div class="form-group d-flex flex-row-reverse">
                        <button
                            wire:loading.remove
                            wire:click="confirmSendForApproval()"
                            class="btn btn-primary me-1 mt-2"
                        >
                            Send For Approval
                        </button>
                        <button
                            wire:loading
                            wire:target="confirmSendForApproval"
                            class="btn btn-primary me-1 mt-2"
                            disabled
                        >
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Processing...
                        </button>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
