<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
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
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-icons/font/bootstrap-icons.css') }}" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />
        <!--High-charts custom css-->
        <link href="{{ asset('css/custom/custom-highcharts.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 mb-md-5 mb-0 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="index.html">
                                <img src="images/logo-white.png" class="img-fluid" alt="logo" />
                            </a>
                            <div
                                class="owl-carousel"
                                data-autoplay="true"
                                data-loop="true"
                                data-nav="false"
                                data-dots="true"
                                data-items="1"
                                data-items-laptop="1"
                                data-items-tab="1"
                                data-items-mobile="1"
                                data-items-mobile-sm="1"
                                data-margin="0"
                            >
                                <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo" />
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable
                                        content.
                                    </p>
                                </div>
                                <div class="item">
                                    <img src="images/login/2.png" class="img-fluid mb-4" alt="logo" />
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable
                                        content.
                                    </p>
                                </div>
                                <div class="item">
                                    <img src="images/login/3.png" class="img-fluid mb-4" alt="logo" />
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable
                                        content.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="mb-2">Email address</label>
                                    <input
                                        type="email"
                                        class="form-control mb-0"
                                        id="exampleInputEmail1"
                                        placeholder="Enter email"
                                    />
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <label for="exampleInputPassword1">Password</label>
                                    <a href="pages-recoverpw.html" class="float-end">Forgot password?</a>
                                </div>
                                <input
                                    type="password"
                                    class="form-control mb-0"
                                    id="exampleInputPassword1"
                                    placeholder="Password"
                                />
                                <div class="d-flex w-100 justify-content-between align-items-center mt-3 w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Sign in</button>
                                </div>
                                <div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">
                                        Don't have an account?
                                        <a href="sign-up.html">Sign up</a>
                                    </span>
                                    <ul class="iq-social-media">
                                        <li>
                                            <a href="#"><i class="ri-facebook-box-line"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ri-twitter-line"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ri-instagram-line"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    </body>
</html>
