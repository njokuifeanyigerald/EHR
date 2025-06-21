@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-md-flex justify-content-between">
                    <div class="iq-header-title">
                        <h3 class="fw-bold">Dashboard</h3>
                    </div>
                    <div class="iq-card-header-toolbar d-md-flex align-items-center border rx-rounded-3 px-3 my-2">
                        <button class="btn btn-white rx-rounded-5 my-2 me-2">Today</button>
                        <button class="btn btn-white rx-rounded-5 my-2 me-2">This week</button>
                        <button class="btn btn-primary rx-rounded-5 my-2 me-2">This month</button>
                        <button class="btn btn-white rx-rounded-5 my-2 me-2">6 months</button>
                        <button class="btn btn-white rx-rounded-5 my-2">This year</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body p-2">
                            <div id="patients" style="height: 200px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body p-2">
                            <div id="payment_modes" style="height: 200px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body px-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-primary">
                                    <i class="fa fa-rotate-left"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold"><span class="counter">178</span></h3>
                                    <h6 class="">Refund Requests</h6>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <img class="w-100" src="{{ asset('images/chart/Graph.svg') }}" alt="Chart" />
                            </div>
                            <div class="col-md-12 mt-2 text-center">
                                <span class="text-success">
                                    <i class="ri-arrow-right-up-line icons-sm"></i>
                                    40%
                                </span>
                                from last month
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body px-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-success">
                                    <i class="fa fa-money-bill"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold"><span>GHS 5,500</span></h3>
                                    <h6 class="">Revenue Generated</h6>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <img class="w-100" src="{{ asset('images/chart/Graph_low.svg') }}" alt="Chart" />
                            </div>
                            <div class="col-md-12 mt-2 text-center">
                                <span class="text-danger">
                                    <i class="ri-arrow-right-down-line icons-sm"></i>
                                    25%
                                </span>
                                from last month
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Patient Visits By Month</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="patient_visits" style="height: 350px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Pending Payments</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image4.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Chris Doe</h6>
                                <p class="mb-0 font-size-12">Dr. Paul Molive</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton41"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Lab Test</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image5.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Emmanuella Fend</h6>
                                <p class="mb-0 font-size-12">Dr. Barb Dwyer</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton42"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Medication</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image3.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Mason Aki</h6>
                                <p class="mb-0 font-size-12">Dr. Terry Aki</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton43"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Consultation</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image6.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Erica Torn</h6>
                                <p class="mb-0 font-size-12">Dr. Robin Banks</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton44"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Radiology</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image1.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Larry Wine</h6>
                                <p class="mb-0 font-size-12">Dr. Barry Wine</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton45"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Lab Test</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image5.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Gifty Yarn</h6>
                                <p class="mb-0 font-size-12">Dr. Zack Lee</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton46"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Consultation</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid">
                                <img
                                    src="{{ asset('images/user/Image.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ms-3">
                                <h6>Mercy Author</h6>
                                <p class="mb-0 font-size-12">Dr. Otto Matic</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary"
                                        id="dropdownMenuButton47"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">Medication</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Revenue Chart</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="revenue_chart" style="height: 300px"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recent Receipts</h4>
                    </div>
                </div>
                <div class="iq-card-body rx-dash-lists">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Patient</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Mode</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">James Park</td>
                                <td>GHS 300</td>
                                <td>Cash</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Adwoa Sarah</td>
                                <td>GHS 200</td>
                                <td>Mobile Money</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Felix Atta</td>
                                <td>GHS 100</td>
                                <td>POS</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Ahmed Asante</td>
                                <td>GHS 50</td>
                                <td>Bank</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Ricahrd Mills</td>
                                <td>GHS 240</td>
                                <td>Mobile Money</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recent Payments</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Visit No</th>
                                    <th scope="col">Visit type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Cam Payne</td>
                                    <td>167862</td>
                                    <td>
                                        <span class="schedule-icon">
                                            <i class="ri-checkbox-blank-circle-fill text-success"></i>
                                        </span>
                                        <span class="font-weight-bold text-success">In-Patient</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Omar Bagna</td>
                                    <td>177862</td>
                                    <td>
                                        <span class="schedule-icon">
                                            <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                        </span>
                                        <span class="font-weight-bold text-primary">Out-Patient</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Philly Mern</td>
                                    <td>166902</td>
                                    <td>
                                        <span class="schedule-icon">
                                            <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                                        </span>
                                        <span class="font-weight-bold text-warning">Guest</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Steph Curry</td>
                                    <td>161234</td>
                                    <td>
                                        <span class="schedule-icon">
                                            <i class="ri-checkbox-blank-circle-fill text-success"></i>
                                        </span>
                                        <span class="font-weight-bold text-success">In-patient</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Jane Lit</td>
                                    <td>156777</td>
                                    <td>
                                        <span class="schedule-icon">
                                            <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                        </span>
                                        <span class="font-weight-bold text-primary">Out-Patient</span>
                                    </td>
                                    <td>
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Pending Authorizations</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded me-1">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image4.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Chris Doe</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Paul Molive</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton41"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">9:55am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image5.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Emmanuella Fend</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Barb Dwyer</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton42"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">9:25am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image3.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Mason Aki</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Terry Aki</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton43"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">9:05am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image6.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Erica Torn</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Robin Banks</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton44"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">8:30am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image1.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Larry Wine</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Barry Wine</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton45"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">8:20am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image5.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Gifty Yarn</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Zack Lee</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton46"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">8:15am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded">
                            <div class="user-img img-fluid rounded-start p-1">
                                <img
                                    src="{{ asset('images/user/Image.png') }}"
                                    alt="story-img"
                                    class="rounded-circle avatar-40"
                                />
                            </div>
                            <div class="media-support-info ps-3 py-1">
                                <h6>Mercy Author</h6>
                                <p class="mb-0 font-size-12 text-dark">Dr. Otto Matic</p>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                <div class="dropdown show">
                                    <span
                                        class="dropdown-toggle text-primary mx-2"
                                        id="dropdownMenuButton47"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="true"
                                        role="button"
                                    >
                                        <span class="text-dark">8:00am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @section('custom_js')
        <script>
            //charts
            document.addEventListener('DOMContentLoaded', function () {
                //registered patients data
                var reg_patients_data = {
                    'In-Patient': 50,
                    'Out-Patient': 200,
                    Guest: 205,
                };

                display_donut_chart(
                    'patients',
                    'Patients',
                    getSubtitle(455, 'Patients'),
                    'Patients',
                    Object.entries(reg_patients_data),
                );

                //payment modes data
                var payment_modes = {
                    POS: 50,
                    Cheque: 130,
                    'Bank Transfer': 205,
                    Momo: 30,
                    Cash: 70,
                };

                display_donut_chart(
                    'payment_modes',
                    'Payment Modes',
                    getSubtitle('GHS 5,000', 'Payments'),
                    'Patients',
                    Object.entries(payment_modes),
                );

                //Patient locations chart
                display_column_chart(
                    'revenue_chart',
                    '',
                    ['Sun', 'Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat'],
                    '',
                    'Day',
                    [9000, 30000, 20000, 20000, 25000, 30500, 40000],
                );

                //patient visits
                var patientVisitLabels = [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sept',
                    'Oct',
                    'Nov',
                    'Dec',
                ];
                var patientVisitData = [
                    {
                        name: 'In-Patient',
                        data: [130, 50, 230, 20, 100, 50, 50, 30, 90, 120, 10, 40],
                    },
                    {
                        name: 'Out-Patient',
                        data: [30, 150, 20, 20, 80, 50, 60, 34, 97, 125, 19, 31],
                    },
                    {
                        name: 'Guest',
                        data: [13, 90, 130, 45, 150, 70, 28, 34, 87, 145, 120, 90],
                    },
                ];

                display_spline_chart('patient_visits', patientVisitLabels, patientVisitData);
            });
        </script>
    @endsection

    {{-- custom js end --}}
@endsection
