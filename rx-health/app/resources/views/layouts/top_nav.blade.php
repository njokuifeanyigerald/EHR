<!-- TOP Nav Bar -->
<div class="iq-top-navbar header-top-sticky">
    <div class="iq-navbar-custom">
        <div class="iq-sidebar-logo">
            <div class="top-logo">
                <a href="index.html" class="logo">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="" />
                    <span>XRay</span>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                href="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="ri-more-fill"></i></div>
                    <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- show system date and time in real-time --}}
                {{-- <div class="rx-seablue-bar" x-cloak> --}}
                <div class="rx-seablue-bar">
                    <div class="text-muted rx-bg-seablue-color" x-data="liveTime" x-init="init">
                        <span x-text="getTime"></span>
                    </div>
                </div>
                {{-- show facility --}}
                <div class="rx-seablue-bar mb-4 mb-md-0">
                    <div class="text-muted rx-bg-seablue-color">
                        <i class="fa fa-clinic-medical"></i>
                        <span class="mx-1"></span>
                        {{ Str::headline(auth()->user()->hospital->name) }}
                    </div>
                </div>
                {{-- Scheduler --}}
                <div
                    data-bs-toggle="modal"
                    data-bs-target="#duty_roaster"
                    class="rx-seablue-bar mb-4 mb-md-0 cursor-pointer"
                >
                    <div class="text-muted rx-bg-seablue-color">
                        <i class="fa fa-calendar"></i>
                        <span class="mx-1"></span>
                        My Schedule
                    </div>
                </div>

                <ul class="navbar-nav ms-auto navbar-list align-items-center">
                    <li class="nav-item iq-full-screen">
                        <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="search-toggle iq-waves-effect">
                            <i class="ri-notification-3-fill"></i>
                            <span class="bg-danger dots"></span>
                        </a>
                        <div class="iq-sub-dropdown">
                            <div class="iq-card shadow-none m-0">
                                <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                        <h5 class="mb-0 text-white d-flex justify-content-between">
                                            All Notifications
                                            <small class="badge badge-dark float-end pt-1">4</small>
                                        </h5>
                                    </div>

                                    <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center d-flex">
                                            <div class="">
                                                <img
                                                    class="avatar-40 rounded"
                                                    src="{{ asset('images/user/01.jpg') }}"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="media-body ms-3">
                                                <h6 class="mb-0">Coming Soon</h6>
                                            </div>
                                        </div>
                                    </a>
                                    {{--
                                        <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center d-flex">
                                        <div class="">
                                        <img
                                        class="avatar-40 rounded"
                                        src="{{ asset('images/user/01.jpg') }}"
                                        alt=""
                                        />
                                        </div>
                                        <div class="media-body ms-3">
                                        <h6 class="mb-0">Emma Watson Bini</h6>
                                        <small class="float-end font-size-12">Just Now</small>
                                        <p class="mb-0">95 MB</p>
                                        </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center d-flex">
                                        <div class="">
                                        <img
                                        class="avatar-40 rounded"
                                        src="{{ asset('images/user/02.jpg') }}"
                                        alt=""
                                        />
                                        </div>
                                        <div class="media-body ms-3">
                                        <h6 class="mb-0">New customer is join</h6>
                                        <small class="float-end font-size-12">5 days ago</small>
                                        <p class="mb-0">Jond Bini</p>
                                        </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center d-flex">
                                        <div class="">
                                        <img
                                        class="avatar-40 rounded"
                                        src="{{ asset('images/user/03.jpg') }}"
                                        alt=""
                                        />
                                        </div>
                                        <div class="media-body ms-3">
                                        <h6 class="mb-0">Two customer is left</h6>
                                        <small class="float-end font-size-12">2 days ago</small>
                                        <p class="mb-0">Jond Bini</p>
                                        </div>
                                        </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                        <div class="media align-items-center d-flex">
                                        <div class="">
                                        <img
                                        class="avatar-40 rounded"
                                        src="{{ asset('images/user/04.jpg') }}"
                                        alt=""
                                        />
                                        </div>
                                        <div class="media-body ms-3">
                                        <h6 class="mb-0">New Mail from Fenny</h6>
                                        <small class="float-end font-size-12">3 days ago</small>
                                        <p class="mb-0">Jond Bini</p>
                                        </div>
                                        </div>
                                        </a>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="navbar-list">
                <li>
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img
                            src="{{
                                auth()->user()->profile_pic ??
                                    //  asset('images/user/' . array_rand(array_flip(['kelvin', 'eben']), 1) . '.png')
                                    asset('images/user/Image2.png')
                            }}"
                            class="img-fluid rounded me-2"
                            alt="user"
                        />

                        <div class="caption">
                            <h6 class="mb-0 line-height">{{ auth()->user()->first_name }}</h6>
                            <span class="font-size-12">Available</span>
                        </div>
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello {{ auth()->user()->first_name }}</h5>
                                    {{-- <span class="text-white font-size-12">Available</span> --}}
                                </div>
                                {{--
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center d-flex">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-file-user-line"></i>
                                    </div>
                                    <div class="media-body ms-3">
                                    <h6 class="mb-0">My Profile</h6>
                                    <p class="mb-0 font-size-12">View personal profile details.</p>
                                    </div>
                                    </div>
                                    </a>
                                    <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center d-flex">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                    <i class="ri-profile-line"></i>
                                    </div>
                                    <div class="media-body ms-3">
                                    <h6 class="mb-0">Change Password</h6>
                                    <p class="mb-0 font-size-12">Modify your password.</p>
                                    </div>
                                    </div>
                                    </a>
                                --}}
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" role="button">
                                        Sign out
                                        <i class="ri-login-box-line ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
@include('layouts.modals.schedular_modal')
