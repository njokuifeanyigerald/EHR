<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Print POS Receipt</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
        <!-- Bootstrap CSS -->
        <link id="bootstrap-css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('css/typography.css') }}" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <!-- Rx style -->
        <link rel="stylesheet" href="{{ asset('css/rx-style.css') }}" />
        <!-- Style-Rtl CSS -->
        <link rel="stylesheet" href="{{ asset('css/style-rtl.css') }}" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-icons/font/bootstrap-icons.css') }}" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />
    </head>

    <body>
        <div class="container rx-print-pos-container">
            <div class="row">
                <div class="col-sm-11 printable">
                    <div class="iq-card px-3">
                        <div class="iq-card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-12">
                                    <img
                                        src="{{ asset('images/logo1.png') }}"
                                        alt="logo"
                                        class="img-fluid"
                                        style="width: 50px"
                                    />
                                </div>
                                <hr class="my-2" />
                                <p class="text-center mb-0">Thank You For Choosing Us</p>
                                <div class="col-sm-12 my-2 border rounded-3 p-3 bg-light">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span>Receipt#:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ $payment_record->first()->receipt_number }}
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span>Payment Mode:</span>
                                            <br />
                                            <span class="text-dark">
                                                @php
                                                    $payment_methods = $payment_record->map(function ($payment_record) {
                                                        return $payment_record->payment_method ?? 'N/A';
                                                    });
                                                @endphp

                                                {{ implode(', ', $payment_methods->toArray()) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span>Receipt Date:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ date('Y-m-d', strtotime($payment_record->first()->created_at)) }}
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span>Cashier ID:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ $payment_record->first()->createdBy?->fullName() ?? 'N/A' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 mb-3">
                                <div class="col-sm-12 border rounded-3 px-0">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead class="table-secondary">
                                                <tr>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Unit Price</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($visit_details as $visit_detail)
                                                    <tr>
                                                        <td>
                                                            {{ $visit_detail->item?->item_name ?? 'No Item Specified' }}
                                                        </td>
                                                        <td>
                                                            {{ $visit_detail->currency->code ?? 'No currency' }}{{ number_format($visit_detail->unit_price, 2) }}
                                                        </td>
                                                        <td>{{ $visit_detail->quantity }}</td>
                                                        <td>
                                                            {{ $visit_detail->currency->code ?? 'No currency' }}
                                                            {{ number_format($visit_detail->unit_price * $visit_detail->quantity, 2) }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No transaction found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <p>Generated: {{ date('Y-m-d H:i:s') }}</p>
                                        </div>
                                        <div class="col-sm-7 border rounded-3 px-2">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        @php
                                                            $subtotal = $visit_details->reduce(function ($carry, $item) {
                                                                return $carry + $item->unit_price * $item->quantity;
                                                            }, 0);
                                                            $vat = ($visit->vat / 100) * $subtotal;
                                                            $discount = ($visit->discount / 100) * $subtotal;
                                                            $grandTotal = $subtotal + $vat - $discount;
                                                            $amountPaid = $payment_record->sum('payment_amount');
                                                        @endphp

                                                        <tr>
                                                            <td class="">Subtotal</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($subtotal, 2) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="">VAT</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($vat ?? 0, 2) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="">Discount</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($discount ?? 0, 2) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="">Grand Total</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($grandTotal, 2) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="">Amount Paid</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($amountPaid, 2) }}
                                                            </td>
                                                        </tr>
                                                        {{--
                                                            <tr>
                                                            <td class="">Change</td>
                                                            <td class="">
                                                            {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                            {{ number_format($amountPaid - $grandTotal, 2) }}
                                                            </td>
                                                            </tr>
                                                        --}}
                                                    </tbody>
                                                </table>
                                                <hr />
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td class="">Balance Before</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($balance_before, 2) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="">Balance After</td>
                                                            <td class="">
                                                                {{ $payment_record->first()->currency_value?->code ?? 'No currency' }}
                                                                {{ number_format($balance_after, 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="mb-0">Powered by: RxHealth</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 no-print">
                    <button class="btn iq-bg-primary p-2 text-center shadow-sm" onclick="window.print();" title="Print">
                        <i class="fa fa-print icons-base mx-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
