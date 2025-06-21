<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> --}}
        <!-- Required meta tags -->
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
        {{--
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
        --}}
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-icons/font/bootstrap-icons.css') }}" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />
        <!--High-charts custom css-->
        <link href="{{ asset('css/custom/custom-highcharts.css') }}" rel="stylesheet" type="text/css" />

        @livewireStyles
    </head>

    <body>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- Sidebar  -->
            @include('layouts.sidebar')

            <livewire:auth.first-time-login-reset-password />

            <!-- Page Content  -->
            <div id="content-page" class="content-page">
                <!-- TOP Nav Bar -->
                @include('layouts.top_nav')
                <!-- TOP Nav Bar END -->

                <!-- Page Contents -->
                <div class="container-fluid">
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="bg-white iq-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Help</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-9 text-end">
                                Copyright &copy; {{ now()->year }}
                                <a href="https://rxhealthinfosystems.com/" target="_blank">RX Health Info Systems</a>
                                And
                                <a href="https://mobihealthinternational.com/" target="_blank">
                                    MobiHealth International
                                </a>
                                All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- Footer END -->
            </div>
        </div>
        <!-- Wrapper END -->

        <!-- Optional JavaScript -->
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
        <script src="{{ asset('packages/bootstrap-table/src/extensions/print/bootstrap-table-print.js') }}"></script>
        <!-- Custom JavaScript -->
        <script src="{{ asset('js/custom.js') }}"></script>
        <!-- Full calendar js -->
        <script src="{{ asset('packages/fullcalendar-6.1.10/index.global.min.js') }}"></script>
        <!-- Rx Custom JavaScript -->
        <script src="{{ asset('js/custom/rx-custom.js') }}"></script>
        <!-- High Charts js -->

        <script src="{{ asset('packages/highcharts/highcharts.js') }}"></script>
        <script src="{{ asset('packages/highcharts/modules/exporting.js') }}"></script>
        <script src="{{ asset('packages/highcharts/modules/export-data.js') }}"></script>
        <script src="{{ asset('packages/highcharts/modules/offline-exporting.js') }}"></script>
        <script src="{{ asset('packages/highcharts/modules/accessibility.js') }}"></script>

        <!--High-charts custom css-->
        <script src="{{ asset('js/custom/custom-highcharts.js') }}"></script>
        <!-- highcharts cdn -->
        {{--
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        --}}
        <script>
            //display real-time current system date and time
            document.addEventListener('alpine:init', () => {
                Alpine.data('liveTime', () => ({
                    time: null,
                    init() {
                        setInterval(() => {
                            const date = new Date();
                            const options = {
                                dateStyle: 'full',
                                timeStyle: 'medium',
                            };
                            this.time = date.toLocaleString('en-US', options);
                        }, 1000);
                    },
                    getTime() {
                        return this.time;
                    },
                }));
            });
        </script>

        <script src="{{ asset('packages/ckeditor5-build-classic/ckeditor.js') }}"></script>

        @yield('custom_js')
        @stack('scripts')

        @livewireScripts

        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script src="{{ asset('packages/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

        <x-livewire-alert::scripts />
    </body>
</html>
