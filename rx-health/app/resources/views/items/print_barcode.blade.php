<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Print Expiring Items</title>
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
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <div class="card border rounded-3">
                                <div class="card-header d-flex justify-content-between no-print">
                                    <h5 class="my-auto">Product Barcode</h5>
                                    <div class="d-flex align-items-center">
                                        <a
                                            href="{{ route('items.index') }}"
                                            class="btn btn-sm btn-outline-primary py-0 me-2"
                                        >
                                            <i class="ri-arrow-left-line icons-sm m-0"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-secondary py-0" onclick="printBarcode()">
                                            <i class="ri-printer-line icons-sm m-0"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body text-center printable" id="barcode-image">
                                    <h5 class="mb-1">{{ Str::headline($item->item_name) }}</h5>
                                    <img
                                        class="img-fluid"
                                        src="data:image/png;base64,
                                        {{ DNS1D::getBarcodePNG($item->item_code, 'C128', 4, 70, [0, 0, 0], true) }}"
                                        alt="barcode"
                                    />
                                    {{--
                                        <img
                                        class="img-fluid"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAnAAAABQAQMAAACj7tr/AAAABlBMVEX///8BAQE6HLieAAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAALtJREFUWIVjeMBn//ifxeP+H8xAsgHE/t/H8L/P4n//jwd8CBGgAggbk4TIQsxhGDVu1LhR40aNGzVu1LhR40aNGzVu1LhR40aNGzVu1LhR40aNGzVu1LhR40aNGxTGDXXAVvnz8WF+OZuKBOoYd7bZLF1yc9qZB1Qy7jNbNtC4swnUMe7ubLbH0tvz7lDJuDfS7Mmyu8veUMm4M9JsyaCwo45xaWdnm1HROJuKj4/Pn5ezqfxBFeMGEAAAOW7DDdMqndIAAAAASUVORK5CYII="
                                        alt="barcode"
                                        />
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/jsPDF/jspdf.umd.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/html2canvas/html2canvas.min.js') }}"></script>
        <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
        {{-- print barcode --}}
        <script>
            function printBarcode() {
                window.print();
            }
        </script>
    </body>
</html>
