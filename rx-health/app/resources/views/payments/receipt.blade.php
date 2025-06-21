<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Invoice Receipt</title>
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
        <div class="container rx-print-container">
            <div class="row">
                <div id="pdf_div" class="col-sm-11 printable">
                    <div class="iq-card px-3">
                        <div class="iq-card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img
                                        src="{{ asset('images/logo1.png') }}"
                                        alt="logo"
                                        class="img-fluid"
                                        style="width: 100px"
                                    />
                                </div>
                                <div class="col-6 border rounded-3 p-2">
                                    <h5 class="fw-bold">Address</h5>
                                    <p class="text-dark mb-0">
                                        {{ $payment_record->first()->patient?->residential_address ?? 'No address' }}
                                    </p>
                                </div>
                                <div class="col-sm-12 my-3 border rounded-3 p-3 bg-light">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <span>Patient Name:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ $payment_record->first()->patient?->full_name_title ?? 'N/A' }}
                                            </span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span>Receipt No:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ $payment_record->first()->receipt_number }}
                                            </span>
                                        </div>
                                        <div class="col-sm-4">
                                            <span>Date:</span>
                                            <br />
                                            <span class="text-dark">
                                                {{ date('dS F Y', strtotime($payment_record->first()->created_at)) }}
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
                                                    <th scope="col">Item Type</th>
                                                    {{-- <th scope="col">Unit Price</th> --}}
                                                    <th scope="col">Total Items</th>
                                                    <th scope="col">Total Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($visit_details as $visit_detail)
                                                    <tr>
                                                        <td>
                                                            {{ $visit_detail->category_name ?? 'No Item Specified' }}
                                                        </td>
                                                        {{--
                                                            <td>
                                                            {{ $visit_detail->currency_code ?? 'No currency' }}{{ number_format($visit_detail->unit_price, 2) }}
                                                            </td>
                                                        --}}
                                                        <td>{{ $visit_detail->total_items }}</td>
                                                        <td>
                                                            {{ $visit_detail->currency_code }}{{ number_format($visit_detail->total_amount, 2) }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No item found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h4>Cashier ID:</h4>
                                            <h5>{{ $payment_record->first()->createdBy?->fullName() ?? 'N/A' }}</h5>
                                        </div>
                                        <div class="col-sm-5 border rounded-3 px-2">
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        @php
                                                            $subtotal = $visit_details->reduce(function ($carry, $item) {
                                                                // return $carry + $item->unit_price * $item->quantity;
                                                                return $carry + $item->total_amount;
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
                                                        <tr class="table-secondary">
                                                            <td class="fw-bold h6 rounded-start">Grand Total</td>
                                                            <td class="fw-bold h6 rounded-end">
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
                                <div class="col-sm-12 mt-3 border rounded-3 p-3">
                                    <b class="text-dark fw-bold h6">Additional Info</b>
                                    <p class="text-muted">
                                        Please keep this receipt for your records. For any billing inquiries or
                                        clarifications, please contact our billing department at
                                        <strong>08134556677</strong>
                                        and also, this document is not valid for medico legal cases. If you have
                                        insurance coverage, please submit this receipt to your insurance provider for
                                        reimbursement. Payments can be made at the front desk during our regular
                                        business hours. We value your feedback. If you have any comments or suggestions,
                                        please don't hesitate to let us know. Your satisfaction is important to us.
                                        Thank you for choosing our healthcare services. We appreciate your trust in us.
                                    </p>
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
                    <button
                        class="btn iq-bg-success p-2 text-center shadow-sm mt-2"
                        onclick="generatePDF('Receipt.pdf')"
                        title="Download PDF"
                    >
                        <i class="fa fa-cloud-download-alt icons-base mx-1"></i>
                    </button>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/jsPDF/jspdf.umd.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/html2canvas/html2canvas.min.js') }}"></script>
        <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
    </body>
</html>
