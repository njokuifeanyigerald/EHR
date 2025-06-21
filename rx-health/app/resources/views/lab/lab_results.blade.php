<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Lab Report</title>
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

        @livewireStyles
        <style>
            .lab-result {
                page-break-after: always;
            }
            .lab-result:last-child {
                page-break-after: auto;
            }
        </style>
    </head>
    <body style="font-size: 12px">
        <div id="loading">
            <div id="loading-center"></div>
        </div>

        <div id="printable">
            @php
                $all_lab_names = $labs
                    ->map(function ($lab) {
                        return $lab->labResults->pluck('lab_test_name')->toArray();
                    })
                    ->flatten()
                    ->unique()
                    ->toArray();

                $approved_labs = $labs->filter(function ($lab) {
                    return $lab->labResults->where('approved_status', 'pending')->count() == 0;
                });
                $filename = Str::headline($approved_labs->first()->labResults->first()->patient->full_name_title) . ' - ' . $labs->first()->lab_number . ' - ' . now()->format('F j, Y, g:i A') . '.pdf';
            @endphp

            @foreach ($approved_labs as $lab)
                {{-- @for ($i = 0; $i < 4; $i++) --}}
                <div class="lab-result" id="lab-{{ $lab->id }}">
                    @include(
                        'lab.individual_lab_results',
                        [
                            'lab' => $lab,
                            'all_lab_requests' => $all_lab_names,
                        ]
                    )
                </div>
                {{-- @endfor --}}
            @endforeach

            {{--
                {{
                dd(
                $labs->filter(function ($lab) {
                return $lab->labResults->where('approved_status', 'pending')->count() == 0;
                }),
                $labs
                ->map(function ($lab) {
                return $lab->labResults->pluck('lab_test_name')->toArray();
                })
                ->flatten()
                ->unique()
                ->toArray(),
                $filename,
                )
                }}
            --}}
        </div>
        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

        {{--
            <script>
            window.jsPDF = window.jspdf.jsPDF;
            var doccPDF = new jsPDF();
            const pdf = new jsPDF();
            
            window.onload = function () {
            const elements = document.querySelectorAll('.lab-result');
            let promises = [];
            // console.log('{{ $filename }}');
            
            elements.forEach((element, index) => {
            promises.push(
            html2canvas(element).then((canvas) => {
            const imgData = canvas.toDataURL('image/png');
            if (index > 0) {
            pdf.addPage();
            }
            pdf.addImage(imgData, 'PNG', 10, 10, 190, 0);
            }),
            );
            });
            
            if ('{{ $type }}' === 'print') {
            Promise.all(promises).then(() => {
            // const pdfData = pdf.output('blob');
            // const pdfUrl = URL.createObjectURL(pdfData);
            // window.open(pdf.output('bloburl'), '_blank');
            window.open(pdf.output('bloburl'));
            
            // dispatch a livewire event
            Livewire.dispatch('labReportsGeneratedSuccessfully');
            if (window.opener) {
            window.opener.dispatchEvent(new CustomEvent('refreshLivewire'));
            }
            window.close();
            });
            } else {
            Promise.all(promises).then(() => {
            // pdf.save('lab-results.pdf');
            pdf.save('{{ $filename }}');
            
            // dispatch a livewire event
            Livewire.dispatch('labReportsGeneratedSuccessfully');
            if (window.opener) {
            window.opener.dispatchEvent(new CustomEvent('refreshLivewire'));
            }
            window.close();
            });
            }
            };
            </script>
        --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

        <script>
            window.onload = function () {
                document.getElementById('loading').style.display = 'none';
                // window.print();
                if ('{{ $type }}' === 'print') {
                    window.print();
                } else {
                    //trigger the save button to download the pdf
                    // window.download();
                    // window.print();
                    var element = document.getElementById('printable');

                    //trigger the save as pdf button click
                    html2pdf().from(element).save('{{ $filename }}');
                }

                Livewire.dispatch('labReportsGeneratedSuccessfully');
            };
            // window.onload = function () {
            //     // specify the package for the pdf generation
            //     window.jsPDF = window.jspdf.jsPDF;

            //     // get all the elements to print
            //     const elements = document.querySelectorAll('.lab-result');

            //     // create the pdf object
            //     const pdf = new jsPDF();

            //     // create a promise so we can wait for all the printable to load the pdf before saving or printing
            //     let promises = [];

            //     // add the canvas to the pdf
            //     const addCanvasToPdf = async (canvas, pdf, x, y, width, height, yOffset) => {
            //         // convert the canvas to an image
            //         const imgData = canvas.toDataURL('image/png');

            //         // create a new image
            //         const image = new Image();

            //         // pass the image to the new image object
            //         image.src = imgData;

            //         // wait for the image to load using a promise
            //         await new Promise((resolve) => {
            //             // wait for the image to load
            //             image.onload = function () {
            //                 // get the pdf page width
            //                 const pdfWidth = pdf.internal.pageSize.getWidth();

            //                 // get the pdf page height for the full image
            //                 const pdfHeightForFullImage = pdf.internal.pageSize.getHeight() - 2 * y;

            //                 // ratio of pdf width to the image width taking into account the margins and padding(offsets)
            //                 const pdfWidthRatio = image.width / (pdfWidth - 2 * x);

            //                 // get the remaining height for the pdf in terms of image height using the ratio
            //                 const remainingHeightForPdf = pdfHeightForFullImage * pdfWidthRatio;

            //                 // get the number of pdf pages needed for this printable section
            //                 const pdfPages = Math.ceil(image.height / remainingHeightForPdf);

            //                 // initializing the main image height
            //                 let remainingImageHeight = image.height;

            //                 // initialize the crop position for the image in x, y coordinates
            //                 const startX = 0;
            //                 let startY = 0;

            //                 // initialize the page number
            //                 let currentPage = 1;

            //                 // get the width of the image
            //                 const imageWidth = image.width;

            //                 // get the max height of the image to crop
            //                 let cropHeight = remainingHeightForPdf;

            //                 while (currentPage <= pdfPages && remainingImageHeight > 0) {
            //                     if (remainingImageHeight > remainingHeightForPdf) {
            //                         let cropHeight = remainingHeightForPdf;
            //                     } else {
            //                         let cropHeight = remainingImageHeight;
            //                     }

            //                     //crop the image to fit the pdf page

            //                     // create a new canvas
            //                     const tempCanvas = document.createElement('canvas');

            //                     // set the canvas width and height
            //                     tempCanvas.width = imageWidth;
            //                     tempCanvas.height = cropHeight;

            //                     // get the canvas context
            //                     const tempContext = tempCanvas.getContext('2d');

            //                     // draw the image to the canvas
            //                     tempContext.drawImage(
            //                         image,
            //                         startX,
            //                         startY,
            //                         imageWidth,
            //                         cropHeight,
            //                         0,
            //                         0,
            //                         imageWidth,
            //                         cropHeight,
            //                     );

            //                     // convert the new canvas to an image
            //                     const croppedImgData = tempCanvas.toDataURL('image/png');

            //                     // add the new image(cropped) to the pdf
            //                     pdf.addImage(croppedImgData, 'PNG', x, y, width, height);

            //                     // if the pdf page is not full then add a new page
            //                     if (currentPage < pdfPages) {
            //                         pdf.addPage();
            //                     }

            //                     // decrement the remaining image height
            //                     remainingImageHeight -= remainingHeightForPdf;

            //                     // update the crop position
            //                     startY = remainingHeightForPdf * currentPage;

            //                     // increment the page number
            //                     currentPage++;
            //                 }

            //                 // resolve the promise
            //                 resolve();
            //             };
            //         });
            //     };

            //     // loop through each element(printable section) and add it to the pdf
            //     elements.forEach((element, index) => {
            //         // add the elements pdf promise to the promise array
            //         promises.push(
            //             // convert the element(html- a given printable section) to a canvas and add it to the pdf
            //             html2canvas(element).then((canvas) => {
            //                 // if the element is not the first element then add a new page
            //                 if (index > 0) {
            //                     pdf.addPage();
            //                 }
            //                 const x = 10; // X-coordinate of the top-left corner of the section
            //                 const y = 10; // Y-coordinate of the top-left corner of the section
            //                 const width = 190; // Width of the section(pdf page)
            //                 const height = 280; // Height of the section(pdf page)
            //                 const yOffset = 0; // Vertical offset if needed

            //                 // add the canvas to the pdf
            //                 return addCanvasToPdf(canvas, pdf, x, y, width, height, yOffset);
            //             }),
            //         );
            //     });

            //     Promise.all(promises).then(() => {
            //         const type = '{{ $type }}';
            //         const filename = '{{ $filename }}';

            //         if (type === 'print') {
            //             const pdfData = pdf.output('bloburl');
            //             window.open(pdfData);

            //             Livewire.dispatch('labReportsGeneratedSuccessfully');
            //             if (window.opener) {
            //                 window.opener.dispatchEvent(new CustomEvent('refreshLivewire'));
            //             }
            //         } else {
            //             pdf.save(filename);

            //             Livewire.dispatch('labReportsGeneratedSuccessfully');
            //             if (window.opener) {
            //                 window.opener.dispatchEvent(new CustomEvent('refreshLivewire'));
            //             }
            //             window.close();
            //         }
            //     });
            // };
        </script>
    </body>
</html>
