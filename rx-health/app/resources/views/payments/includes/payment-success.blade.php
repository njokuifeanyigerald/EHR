<div class="col-lg-7">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h5 class="card-title">Make New Payment</h5>
            </div>
            <div class="iq-header-title">
                <a href="#!" wire:click="goBackFromSuccess" class="btn btn-dark me-2">
                    <i class="ri-arrow-left-line m-0"></i>
                    Go Back
                </a>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="m-auto text-center">
                {{-- <span class="h3 text-success"><i class="fa fa-circle-check"></i></span> --}}
                <img
                    class="user-image rounded table-img"
                    src="{{ asset('images/icon/green-check.png') }}"
                    alt="profile pic"
                    style="height: 100px"
                />
                <h5 class="fw-bolder text-success">Payment Saved Successfully</h5>

                <table class="table my-4">
                    <tbody>
                        <tr class="fw-bold">
                            <td class="text-start">Payment Type</td>
                            <td class="text-end">{{ Str::headline($this->payment_mode_used) }} Payment</td>
                        </tr>
                        @foreach ($this->payment_modes_amount as $mode => $amount)
                            @if ($amount > 0)
                                <tr class="fw-bold">
                                    <td class="text-start">{{ Str::upper($mode) }}</td>
                                    <td class="text-end">
                                        {{ $this->visit->currency?->code ?? config('app.currency') }}{{ $amount }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        <tr class="fw-bolder h6">
                            <td class="text-start text-success">Total Payment</td>
                            <td class="text-end text-success">
                                {{ $this->visit->currency?->code ?? config('app.currency') }}
                                {{ $this->total_amount_paid == 0 ? $this->is_successful_total : $this->total_amount_paid }}
                            </td>
                        </tr>
                        <tr class="fw-bold">
                            <td class="text-start">Payment Receipt</td>
                            <td class="text-end">{{ $this->receipt_number }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <a
                    href="{{ route('payments.receipt', $this->receipt_number) }}"
                    class="btn btn-dark me-2"
                    target="_blank"
                >
                    <i class="ri-printer-fill m-0"></i>
                    Receipt
                </a>
                <a
                    href="{{ route('payments.pos_receipt', $this->receipt_number) }}"
                    class="btn btn-danger"
                    target="_blank"
                >
                    <i class="ri-printer-line"></i>
                    POS Receipt
                </a>
            </div>
        </div>
    </div>
</div>
