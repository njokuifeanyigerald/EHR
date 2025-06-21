<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Print Global Low Stocks</title>
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
    <body class="bg-white">
        <div class="container rx-print-container-full">
            <div class="row">
                <div id="pdf_div" class="col-sm-12 printable">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>Low Stocks Items</h3>
                        </div>
                        <div class="col-6 p-2">
                            <h1 class="text-end">LOGO</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive rounded-3">
                            @include('items.includes.table_of_low_stock_items', ['items' => $items])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/jsPDF/jspdf.umd.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/html2canvas/html2canvas.min.js') }}"></script>
        <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
        {{-- print on page load and when cancelled, close the browsing tab --}}
        <script>
            window.print();
            window.onafterprint = function () {
                window.close();
            };
        </script>
    </body>
</html>
