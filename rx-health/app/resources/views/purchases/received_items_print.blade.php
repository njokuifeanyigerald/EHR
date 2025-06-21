<?php
use Rmunate\Utilities\SpellNumber;
// dd(
//     Str::title(
//         SpellNumber::value(1200300.01)
//             ->currency(
//                 auth()
//                     ->user()
//                     ->hospital->currencies->where('pivot.hospital_default', 'yes')
//                     ->first()->name,
//             )
//             ->toMoney(),
//     ),
//     Str::title(
//         str_replace(
//             'cents',
//             '',
//             SpellNumber::value(1200300.5)
//                 ->currency(
//                     auth()
//                         ->user()
//                         ->hospital->currencies->where('pivot.hospital_default', 'yes')
//                         ->first()->name,
//                 )
//                 ->toMoney(),
//         ),
//     ),
// );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Receipt / Invoice</title>
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
    <body style="font-size: 12px">
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <div id="printable">
            <div class="iq-card px-3">
                <div class="iq-card-body">
                    <div class="row align-items-center">
                        <x-print_header :title="'Receipt / Invoice'" />

                        <div class="col-sm-12 mt-5 my-3 border rounded-3 p-3 bg-light">
                            <div class="row">
                                <x-patient_info_lab-results
                                    :title="'Supplier Name'"
                                    :value="$purchase->supplier->name ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Supplier Address'"
                                    :value="$purchase->supplier->address ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Supplier Phone'"
                                    :value="$purchase->supplier->phone_number ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Supplier Email'"
                                    :value="$purchase->supplier->email ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Status'"
                                    :value="Str::upper($purchase->status)"
                                />
                                <x-patient_info_lab-results
                                    :title="'Invoice Number'"
                                    :value="$purchase->po_number ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Received Date'"
                                    :value="now()->parse($purchase->received_date)->format('jS F Y') ?? 'N\A'"
                                />
                                <x-patient_info_lab-results
                                    :title="'Discount'"
                                    :value="number_format($purchase->discount, 2, '.', ',') . ' ' . ($purchase->discount_type == 'percentage' ? '%' : '')"
                                />
                                <x-patient_info_lab-results
                                    :title="'Vat'"
                                    :value="number_format($purchase->vat, 2, '.', ',') . ' ' . ($purchase->vat_type == 'percentage' ? '%' : '')"
                                />
                            </div>
                        </div>

                        <div id="lab-results" class="w-100 table-responsive mt-4">
                            <table id="table" class="w-100 table table-borderless table-striped">
                                <thead class="table-secondary">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Pack Size</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Act. Quantity</th>
                                        <th scope="col">Act. Price</th>
                                        <th scope="col">Act. Pack Size</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Act. Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @forelse ($purchase->purchaseDetails ?? [] as $purchaseItem)
                                        <tr class="{{ $loop->first ? '' : 'border-top' }}">
                                            <td>
                                                {{ $purchaseItem->item->item_name }}
                                            </td>
                                            <td>
                                                {{ $purchaseItem->quantity }}
                                            </td>
                                            <td>
                                                {{ number_format($purchaseItem->unit_price, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                {{ $purchaseItem->pack_size }}
                                            </td>
                                            <td>
                                                {{ number_format($purchaseItem->quantity * $purchaseItem->unit_price, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                {{ $purchaseItem->actual_quantity }}
                                            </td>
                                            <td>
                                                {{ number_format($purchaseItem->actual_price, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                {{ $purchaseItem->actual_pack_size }}
                                            </td>
                                            <td>
                                                {{ now()->parse($purchaseItem->expiry_date)->format('jS F Y') }}
                                            </td>
                                            <td>
                                                {{ number_format($purchaseItem->actual_quantity * $purchaseItem->actual_price, 2, '.', ',') }}
                                            </td>
                                        </tr>

                                        @php
                                            $total += $purchaseItem->actual_quantity * $purchaseItem->actual_price;
                                        @endphp
                                    @empty
                                        <tr>
                                            <td colspan="12" class="text-center">No data found</td>
                                        </tr>
                                    @endforelse
                                    @if ($purchase->purchaseDetails->count() > 0)
                                        <tr>
                                            <td colspan="8" class="text-end">Total Amount</td>
                                            <td colspan="2">
                                                {{ number_format($total - ($purchase->discount_type == 'percentage' ? $total * ($purchase->discount / 100) : $purchase->discount) + ($purchase->vat_type == 'percentage' ? $total * ($purchase->vat / 100) : $purchase->vat), 2, '.', ',') }}
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="col-12">
                                <p class="mb-0">
                                    Amount In Words:
                                    <span class="fw-bolder text-black">
                                        {{
                                            Str::title(
                                                str_replace(
                                                    'cents',
                                                    '',
                                                    SpellNumber::value($total - ($purchase->discount_type == 'percentage' ? $total * ($purchase->discount / 100) : $purchase->discount) + ($purchase->vat_type == 'percentage' ? $total * ($purchase->vat / 100) : $purchase->vat))
                                                        ->currency(
                                                            auth()
                                                                ->user()
                                                                ->hospital->currencies->where('pivot.hospital_default', 'yes')
                                                                ->first()->name,
                                                        )
                                                        ->toMoney(),
                                                ),
                                            ) . ' Only'
                                        }}
                                    </span>
                                </p>
                                <p class="mb-0">
                                    Due Date :
                                    <span class="fw-bold text-black">
                                        {{ now()->parse($purchase->due_date)->format('jS F Y') }}
                                    </span>
                                </p>
                                <p class="mb-0">
                                    Received Date :
                                    <span class="fw-bold text-black">
                                        {{ now()->parse($purchase->received_date)->format('jS F Y') }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div id="footer" class="col-12 mt-5">
                            {{-- date of printing --}}
                            <div class="col-12 mt-3 text-dark text-center">
                                <p class="mb-0 gap-2">
                                    Printed Date / Time:
                                    <span class="fw-bold">
                                        {{ now()->format('F j, Y, g:i A') }}
                                    </span>
                                </p>
                            </div>

                            <div class="text-center col-12 bg-light p-3">
                                <p class="mb-0">
                                    Powered by:
                                    <span class="fw-bold text-primary">RxHealth</span>
                                    &copy;{{ now()->year }}
                                </p>
                            </div>

                            {{-- End of file --}}
                            <div class="col-12 mt-4 mb-4 text-dark text-center border-top border-bottom border-3">
                                <p class="mb-0 -mt-1">End of File</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function () {
                document.getElementById('loading').style.display = 'none';
                window.print();
            };
        </script>
    </body>
</html>
