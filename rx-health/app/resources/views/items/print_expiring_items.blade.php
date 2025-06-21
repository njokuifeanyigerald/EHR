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
    <body class="bg-white" id="printable" style="font-size: 8px">
        <div class="container rx-print-container-full">
            <div class="row">
                <div id="pdf_div" class="col-sm-12 printable">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>Expiring Items</h3>
                        </div>
                        <div class="col-6 p-2">
                            <h1 class="text-end">LOGO</h1>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive rounded-3">
                            <table class="table table-bordered">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Item name</th>
                                        <th>Rx Item Code</th>
                                        <th>Rx Item Name</th>
                                        <th>Item Category</th>
                                        <th>Expiry Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expiring_items as $item)
                                        <tr>
                                            <th scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td>
                                                {{ $item->item_name }}
                                            </td>
                                            <td>
                                                {{ $item->item_code }}
                                            </td>
                                            <td>
                                                {{ $item->rx_item_name }}
                                            </td>
                                            <td>
                                                {{ $item->category->category_name }}
                                            </td>
                                            <td>
                                                {{ now()->parse($item?->batches?->first()?->expiry_date)->format('jS F Y') }}
                                                <span
                                                    class="badge {{
                                                        now()->parse($item?->batches?->first()?->expiry_date) < now()
                                                            ? 'badge-danger'
                                                            : 'badge-warning'
                                                    }}"
                                                >
                                                    {{ now()->parse($item?->batches?->first()?->expiry_date)->diffForHumans() }}
                                                </span>
                                            </td>
                                            {{--
                                                <td class="text-center">
                                                <a href="#" class="text-secondary"><i class="fa fa-dumpster icons-sm"></i></a>
                                                </td>
                                            --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--
            <script src="{{ asset('js/jquery.min.js') }}"></script>
            <script src="{{ asset('packages/tableExport/libs/jsPDF/jspdf.umd.min.js') }}"></script>
            <script src="{{ asset('packages/tableExport/libs/html2canvas/html2canvas.min.js') }}"></script>
            <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
        --}}
        {{--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        --}}
        {{-- print on page load and when cancelled, close the browsing tab --}}
        {{--
            <script>
            window.print();
            window.onafterprint = function () {
            window.close();
            };
            </script>
        --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
        <script>
            // window.jsPDF = window.jspdf.jsPDF;
            // var docPDF = new jsPDF();

            window.onload = function () {
                var elementHTML = document.querySelector('#printable');

                // html2canvas(elementHTML).then((canvas) => {
                //     docPDF.canvas = canvas;

                //     window.open(docPDF.output('bloburl'));
                // });
                // window.open(html2pdf().from(elementHTML).output('dataurlnewwindow'));
                // console.log(html2pdf().from(elementHTML).output());
                html2pdf()
                    .from(elementHTML)
                    .toPdf() // Generate PDF
                    .output('blob') // Convert to blob
                    .then(function (blob) {
                        // Create a URL for the blob
                        var url = URL.createObjectURL(blob);

                        // Create a new window to print the PDF
                        var printWindow = window.open(url);

                        // Print the PDF
                        printWindow.onload = function () {
                            printWindow.print();
                        };

                        // Release the URL object
                        URL.revokeObjectURL(url);
                    });

                // docPDF.html(elementHTML, {
                //     callback: function (docPDF) {
                //         window.open(docPDF.output('bloburl'));
                //     },
                //     x: 5,
                //     y: 5,
                //     width: 200,
                //     windowWidth: 700,
                // });
            };
        </script>
    </body>
</html>
