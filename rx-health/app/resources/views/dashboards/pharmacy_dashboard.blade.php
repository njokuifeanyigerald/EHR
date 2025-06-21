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
                            <div id="registered_patients" style="height: 200px"></div>
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
                                    <i class="ri-hospital-line"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold"><span class="counter">178</span></h3>
                                    <h6 class="">Total Visits</h6>
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
                                    <i class="fa fa-prescription-bottle-medical"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold"><span class="counter">205</span></h3>
                                    <h6 class="">Drug Sales</h6>
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
                        <h4 class="card-title fw-bold text-muted">Expiring Drugs</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">25 days</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abacavir Syrop</h5>
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
                                        <span class="text-danger">25 days</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Paracetamol Tablets</h5>
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
                                        <span class="text-danger">25 days</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">25 days</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abacavir Drops</h5>
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
                                        <span class="text-danger">25 days</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">25 days</span>
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
                        <h4 class="card-title fw-bold text-muted">Top 10 Medications</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <select class="form-select text-primary fw-bold border border-primary py-1 h-50">
                            <option selected="" disabled="">By Value</option>
                            <option>By Count</option>
                        </select>
                    </div>
                </div>
                <div class="iq-card-body text-center">
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Paracetamol Tablet</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="50"
                                        style="transition: width 2s; width: 50%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">50%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Abacavir</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="10"
                                        style="transition: width 2s; width: 10%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">10%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Abidec Drops</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="10"
                                        style="transition: width 2s; width: 10%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">10%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Aceclofenac Tablet 100mg</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="25"
                                        style="transition: width 2s; width: 25%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">25%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Baclofen Tablet 10mg</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="34"
                                        style="transition: width 2s; width: 34%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">34%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Baby Cough Syrup</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="67"
                                        style="transition: width 2s; width: 67%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">67%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-0">
                            <p class="mb-0 text-dark font-size-14">Artem Suspension</p>
                        </div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="40"
                                        style="transition: width 2s; width: 40%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">40%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recent Refills</h4>
                    </div>
                </div>
                <div class="iq-card-body rx-dash-lists">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Patient</th>
                                <th scope="col">Refill Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">James Park</td>
                                <td>21st August 1990</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Adwoa Sarah</td>
                                <td>1st May 2025</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Felix Atta</td>
                                <td>2nd April 2015</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Ahmed Asante</td>
                                <td>23rd May 2014</td>
                                <td>
                                    <a href="#" class="text-primary">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row">Erica Arthur</td>
                                <td>19th July, 1995</td>
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
                        <h4 class="card-title fw-bold text-muted">Recent Patients</h4>
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
                                    <th scope="col">Location</th>
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
                                    <td>Pharmacy</td>
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
                                    <td>Consultation</td>
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
                                    <td>Discharged</td>
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
                                    <td>Lab</td>
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
                                    <td>Radiology</td>
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
                        <h4 class="card-title fw-bold text-muted">Low Stock Items</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">1 in stock</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abacavir Syrop</h5>
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
                                        <span class="text-danger">2 in stock</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Paracetamol Tablets</h5>
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
                                        <span class="text-danger">3 in stock</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">5 in stock</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abacavir Drops</h5>
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
                                        <span class="text-danger">7 in stock</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 py-2 align-items-center border-bottom">
                            <div class="media-support-info ms-3">
                                <h5>Abidec Drops</h5>
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
                                        <span class="text-danger">3 in stock</span>
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
                //Patients data
                var reg_patients_data = {
                    'In-Patient': 50,
                    'Out-Patient': 200,
                    Guest: 205,
                };

                display_donut_chart(
                    'registered_patients',
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
                    'Payment Modes(POS)',
                    getSubtitle(187, 'Payments'),
                    'Patients',
                    Object.entries(payment_modes),
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
