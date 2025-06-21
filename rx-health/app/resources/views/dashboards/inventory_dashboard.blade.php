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
                <div class="col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Purchase Orders</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">27</span></h3>
                                    <div class="col-md-12 mt-2">
                                        <img class="w-100" src="{{ asset('images/chart/Graph.svg') }}" alt="Chart" />
                                    </div>
                                    <div class="col-md-12 mt-2 text-center font-size-11">
                                        <span class="text-success">
                                            <i class="ri-arrow-right-up-line icons-sm"></i>
                                            40%
                                        </span>
                                        from last month
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Total Requisitions</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">3,100</span></h3>
                                    <div class="col-md-12 mt-2">
                                        <img class="w-100" src="{{ asset('images/chart/Graph.svg') }}" alt="Chart" />
                                    </div>
                                    <div class="col-md-12 mt-2 text-center font-size-11">
                                        <span class="text-success">
                                            <i class="ri-arrow-right-up-line icons-sm"></i>
                                            40%
                                        </span>
                                        from last month
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Returned Items</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">86</span></h3>
                                    <div class="col-md-12 mt-2">
                                        <img class="w-100" src="{{ asset('images/chart/Graph.svg') }}" alt="Chart" />
                                    </div>
                                    <div class="col-md-12 mt-2 text-center font-size-11">
                                        <span class="text-success">
                                            <i class="ri-arrow-right-up-line icons-sm"></i>
                                            40%
                                        </span>
                                        from last month
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Provider Items</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">23</span></h3>
                                    <div class="col-md-12 text-end">
                                        <i class="fa fa-hand-holding-medical text-dark icons-large"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Expiring Items</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">86</span></h3>
                                    <div class="col-md-12 text-end">
                                        <i class="fa fa-triangle-exclamation text-danger icons-large"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="iq-card iq-card-block iq-card-height">
                                <div class="iq-card-body">
                                    <h6>Low Stock Items</h6>
                                    <h3 class="my-2 fw-bold"><span class="counter">34</span></h3>
                                    <div class="col-md-12 text-end">
                                        <i class="fa fa-triangle-exclamation text-warning icons-large"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title fw-bold text-muted">Recent Received Purchase Orders</h4>
                            </div>
                        </div>
                        <div class="iq-card-body rx-dash-lists">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Received Date</th>
                                        <th scope="col">Order No.</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">21st May 2030</td>
                                        <td>1st March 2029</td>
                                        <td>2341342</td>
                                        <td>
                                            <a href="#" class="text-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">21st April</td>
                                        <td>3rd April 2025</td>
                                        <td>123231</td>
                                        <td>
                                            <a href="#" class="text-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">18th May 2010</td>
                                        <td>13th June 2022</td>
                                        <td>4324343</td>
                                        <td>
                                            <a href="#" class="text-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">15h May 2010</td>
                                        <td>5th July 2015</td>
                                        <td>23334448</td>
                                        <td>
                                            <a href="#" class="text-primary">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">30th May 2012</td>
                                        <td>2nd April 2025</td>
                                        <td>12121666</td>
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
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Activities</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="activities" style="height: 350px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Expiring Items</h4>
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
                        <h4 class="card-title fw-bold text-muted">Requisition By Status</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="req_status" style="height: 350px"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Purchase Orders By Status</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="patient_order_status" style="height: 350px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recently Received Requisitions</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Time Created</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Requested By</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">12th May 2024 10:59:29</td>
                                    <td>Main Stores</td>
                                    <td>Pharmacy</td>
                                    <td>Default Admin</td>
                                    <td class="text-center">
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024 10:59:29</td>
                                    <td>Main Stores</td>
                                    <td>Pharmacy</td>
                                    <td>Default Admin</td>
                                    <td class="text-center">
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024 10:59:29</td>
                                    <td>Main Stores</td>
                                    <td>Pharmacy</td>
                                    <td>Default Admin</td>
                                    <td class="text-center">
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024 10:59:29</td>
                                    <td>Main Stores</td>
                                    <td>Pharmacy</td>
                                    <td>Default Admin</td>
                                    <td class="text-center">
                                        <a href="#" class="text-primary">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024 10:59:29</td>
                                    <td>Main Stores</td>
                                    <td>Pharmacy</td>
                                    <td>Default Admin</td>
                                    <td class="text-center">
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
                //inventories activities
                var activityLabels = [
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
                var activityData = [
                    {
                        name: 'Purchase Orders',
                        data: [130, 50, 230, 20, 100, 50, 50, 30, 90, 120, 10, 40],
                    },
                    {
                        name: 'Requisitions',
                        data: [30, 150, 20, 20, 80, 50, 60, 34, 97, 125, 19, 31],
                    },
                    {
                        name: 'Returned Items',
                        data: [13, 90, 130, 45, 150, 70, 28, 34, 87, 145, 120, 90],
                    },
                ];

                display_spline_chart('activities', activityLabels, activityData);

                //Requisition by status
                var data = { Draft: 15, Pending: 20, Approved: 30, Incoming: 45, Received: 20 };
                display_pie_chart('req_status', null, 'Status', Object.entries(data), false);

                //Patient order status
                display_simple_column_chart(
                    'patient_order_status',
                    ['Draft', 'Pending', 'Approved', 'Received'],
                    'Lab Test Results',
                    [15, 56, 20, 47],
                );
            });
        </script>
    @endsection

    {{-- custom js end --}}
@endsection
