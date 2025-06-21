@extends('layouts.guest')
@section('content')
    <div>
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- loader END -->
        <!-- Sign in Start -->
        <div class="container-xl p-5 m-auto" style="max-width: 1200px">
            <div class="row mt-5">
                <div class="col-md-6 mb-5 mb-md-0 align-content-end curved-line px-0 mt-2">
                    <div class="pe-0 pe-md-5 rx-signup-width">
                        <a class="sign-in-logo" href="{{ route('login') }}">
                            <img
                                src="{{ App\Helpers\GeneralHelper::applicationLogo() }}"
                                class="img-fluid"
                                alt="logo"
                            />
                        </a>
                        <h2 class="mt-2 fw-bold">Welcome</h2>
                        <p x-data="TextSwitch" x-init="init" class="overflow-hidden">
                            Log in to your account and
                            <a href="{{ route('login') }}" x-text="getText" id="rx-change"></a>
                        </p>
                        <livewire:auth.login />
                    </div>
                    <div class="mt-5 pt-3 d-flex justify-content-between pe-0 pe-md-5 rx-signup-width">
                        <small>
                            Copyright &copy; {{ now()->year }}
                            <a href="https://rxhealthinfosystems.com/" target="_blank">RX Health Info Systems</a>
                            And
                            <a href="https://mobihealthinternational.com/" target="_blank">MobiHealth International</a>
                            All Rights Reserved.
                        </small>
                        {{--
                            <small>
                            <a href="https://rxhealthinfosystems.com/" target="_blank">Privacy Policy</a>
                            </small>
                        --}}
                    </div>
                </div>
                <div class="col-md-6 text-center px-0">
                    <div class="text-white">
                        <div id="login" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button
                                    type="button"
                                    data-bs-target="#login"
                                    data-bs-slide-to="0"
                                    class="active shadow"
                                ></button>
                                <button
                                    type="button"
                                    data-bs-target="#login"
                                    data-bs-slide-to="1"
                                    class="shadow"
                                ></button>
                                <button
                                    type="button"
                                    data-bs-target="#login"
                                    data-bs-slide-to="2"
                                    class="shadow"
                                ></button>
                                <button
                                    type="button"
                                    data-bs-target="#login"
                                    data-bs-slide-to="3"
                                    class="shadow"
                                ></button>
                            </div>

                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        src="images/login/medium-shot-female-nurse-hospital.jpg"
                                        alt="Health worker"
                                        class="d-block"
                                        style="width: 100%"
                                    />
                                    <div class="carousel-caption w-100 px-5">
                                        <h3 class="fw-bolder text-white">
                                            Enhance Patient care by providing effortless access to their medical records
                                        </h3>
                                        <p>
                                            Effortlessly manage patient and hospital data, appointments and
                                            communications digitally, giving you control and convenience
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img
                                        src="images/login/biotechnology.jpg"
                                        alt="Health activities"
                                        class="d-block"
                                        style="width: 100%"
                                    />
                                    <div class="carousel-caption w-100 px-5">
                                        <h3 class="fw-bolder text-white">
                                            Enhance Patient care by providing effortless access to their medical records
                                        </h3>
                                        <p>
                                            Effortlessly manage patient and hospital data, appointments and
                                            communications digitally, giving you control and convenience
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img
                                        src="images/login/health-worker.jpg"
                                        alt="Health worker"
                                        class="d-block"
                                        style="width: 100%"
                                    />
                                    <div class="carousel-caption w-100 px-5">
                                        <h3 class="fw-bolder text-white">
                                            Enhance Patient care by providing effortless access to their medical records
                                        </h3>
                                        <p>
                                            Effortlessly manage patient and hospital data, appointments and
                                            communications digitally, giving you control and convenience
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img
                                        src="images/login/front-view-female-doctor-wearing-white-coat.jpg"
                                        alt="Health worker"
                                        class="d-block"
                                        style="width: 100%"
                                    />
                                    <div class="carousel-caption w-100 px-5">
                                        <h3 class="fw-bolder text-white">
                                            Enhance Patient care by providing effortless access to their medical records
                                        </h3>
                                        <p>
                                            Effortlessly manage patient and hospital data, appointments and
                                            communications digitally, giving you control and convenience
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
