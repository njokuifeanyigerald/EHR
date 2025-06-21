<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <!-- Required meta tags -->
        {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> --}}
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>{{ config('app.name') }}</title>
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
        <!-- Full calendar -->
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-icons/font/bootstrap-icons.css') }}" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />
        <!--High-charts custom css-->
        <link href="{{ asset('css/custom/custom-highcharts.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-white">
        @yield('content')

        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
        <x-livewire-alert::flash />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
        <!-- Sign in END -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Appear JavaScript -->
        <script src="{{ asset('js/jquery.appear.js') }}"></script>
        <!-- Countdown JavaScript -->
        <script src="{{ asset('js/countdown.min.js') }}"></script>
        <!-- Counterup JavaScript -->
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <!-- Wow JavaScript -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <!-- Apexcharts JavaScript -->
        <script src="{{ asset('js/apexcharts.js') }}"></script>
        <!-- Swiper Slider JavaScript -->
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <!-- Select2 JavaScript -->
        <script src="{{ asset('js/select2.min.js') }}"></script>
        <!-- Owl Carousel JavaScript -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <!-- Magnific Popup JavaScript -->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Smooth Scrollbar JavaScript -->
        <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
        <!-- lottie JavaScript -->
        <script src="{{ asset('js/lottie.js') }}"></script>
        <!-- am core JavaScript -->
        <script src="{{ asset('js/core.js') }}"></script>
        <!-- am charts JavaScript -->
        <script src="{{ asset('js/amcharts.js') }}"></script>
        <!-- am animated JavaScript -->
        <script src="{{ asset('js/animated.js') }}"></script>
        <!-- am kelly JavaScript -->
        <script src="{{ asset('js/kelly.js') }}"></script>
        <!-- Flatpicker Js -->
        <script src="{{ asset('js/flatpickr.js') }}"></script>
        <!-- Chart Custom JavaScript -->
        <script src="{{ asset('js/chart-custom.js') }}"></script>
        <!-- tableExport -->
        <script src="{{ asset('packages/tableExport/tableExport.min.js') }}"></script>
        <script src="{{ asset('packages/tableExport/libs/jsPDF/jspdf.umd.min.js') }}"></script>
        <!-- Bootstrap-table Javascript -->
        <script src="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
        <script src="{{ asset('packages/bootstrap-table/dist/extensions/export/bootstrap-table-export.min.js') }}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('js/custom.js') }}"></script>
        <!-- Full calendar js -->
        <script src="{{ asset('packages/fullcalendar-6.1.10/index.global.min.js') }}"></script>
        <!-- Rx Custom JavaScript -->
        <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
        <!-- alpine.js cdn -->
        {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
        <script>
            //Create a text switch component
            document.addEventListener('alpine:init', () => {
                Alpine.data('TextSwitch', () => ({
                    text: ['manage patient records.', 'manage communications.', 'manage appointments.'],
                    nextText: 'manage appointments.',

                    init() {
                        let i = 0;

                        //Swap text with given time intervals.
                        setInterval(() => {
                            if (i >= this.text.length) i = 0;

                            this.nextText = this.text[i++];
                        }, 2300);
                    },

                    getText() {
                        return this.nextText;
                    },
                }));
            });
        </script>

        @stack('scripts')
    </body>
</html>
