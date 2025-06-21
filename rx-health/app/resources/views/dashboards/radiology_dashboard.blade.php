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
                            <div id="scan_requests" style="height: 200px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body p-3">
                            <h6 class="fw-bold">Clients Status</h6>
                            <div class="progress mt-4" style="height: 40px">
                                <div
                                    class="progress-bar me-2 rx-bg-warning"
                                    role="progressbar"
                                    style="width: 10%"
                                    aria-valuenow="10"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                                <div
                                    class="progress-bar me-2 bg-primary"
                                    role="progressbar"
                                    style="width: 40%"
                                    aria-valuenow="40"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                                <div
                                    class="progress-bar bg-success"
                                    role="progressbar"
                                    style="width: 50%"
                                    aria-valuenow="50"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                ></div>
                            </div>
                            <div class="mt-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-1"><i class="fa fa-circle text-warning"></i></div>
                                        <div class="col-md-8 text-dark">Pending Clients</div>
                                        <div class="col-md-2 text-dark">10%</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><i class="fa fa-circle text-primary"></i></div>
                                        <div class="col-md-8 text-dark">Uncompleted Clients</div>
                                        <div class="col-md-2 text-dark">40%</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"><i class="fa fa-circle text-success"></i></div>
                                        <div class="col-md-8 text-dark">Completed Clients</div>
                                        <div class="col-md-2 text-dark">50%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="iq-card iq-card-block iq-card-height">
                        <div class="iq-card-body px-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="fa fa-x-ray"></i></div>
                                <div>
                                    <h3 class="mb-0 fw-bold"><span class="counter">178</span></h3>
                                    <h6 class="">Radiology Tests</h6>
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
            </div>
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Patients By Month</h4>
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
                        <h4 class="card-title fw-bold text-muted">Outsourced Scans</h4>
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
                                        <span class="text-dark">9:55am</span>
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
                                        <span class="text-dark">9:25am</span>
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
                                        <span class="text-dark">9:05am</span>
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
                                        <span class="text-dark">8:30am</span>
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
                                        <span class="text-dark">8:20am</span>
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
                                        <span class="text-dark">8:15am</span>
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
                                        <span class="text-dark">8:00am</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recent Scans</h4>
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
                                    <th scope="col">Type</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Cam Payne</td>
                                    <td>167862</td>
                                    <td>X-ray</td>
                                    <td>Sample Collected</td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Omar Bagna</td>
                                    <td>177862</td>
                                    <td>CT scan</td>
                                    <td>Results Entered</td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Philly Mern</td>
                                    <td>166902</td>
                                    <td>CT scan</td>
                                    <td>Approved</td>
                                </tr>
                                <tr>
                                    <td scope="row">12th May 2024</td>
                                    <td>Steph Curry</td>
                                    <td>161234</td>
                                    <td>MRI scan</td>
                                    <td>Approved</td>
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
                        <h4 class="card-title fw-bold text-muted">Pending Clients</h4>
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

        <div class="col-md-6">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Top 10 Scans</h4>
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
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">X-ray Scan</p></div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="70"
                                        style="transition: width 2s; width: 70%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">70%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">CT Scan</p></div>
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
                    <div class="row mb-4">
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">CT Scan</p></div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="45"
                                        style="transition: width 2s; width: 45%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">45%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">MRI Scan</p></div>
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
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">PET Scan</p></div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="18"
                                        style="transition: width 2s; width: 18%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">18%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">Blood Test</p></div>
                        <div class="col-6 my-auto">
                            <div class="iq-progress-bar-linear d-inline-block w-100">
                                <div class="iq-progress-bar rx-progress-bar-h">
                                    <span
                                        class="bg-success"
                                        data-percent="39"
                                        style="transition: width 2s; width: 39%"
                                    ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <span class="text-dark font-size-14">39%</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-2 mb-0"><p class="mb-0 text-dark font-size-14">Blood Test</p></div>
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
                        <h4 class="card-title fw-bold text-muted">Scan Status</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div id="lab_test_results" style="height: 350px"></div>
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
                };

                display_donut_chart(
                    'patients',
                    'Patients',
                    getSubtitle(455, 'Patients'),
                    'Patients',
                    Object.entries(reg_patients_data),
                );

                //total appointments data
                var scan_requests_data = {
                    'External Outsource': 200,
                    Insource: 205,
                    'Internal Outsource': 80,
                };

                display_donut_chart(
                    'scan_requests',
                    'Scan Requests',
                    getSubtitle(187, 'Requests'),
                    'Patients',
                    Object.entries(scan_requests_data),
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
                ];

                display_spline_chart('patient_visits', patientVisitLabels, patientVisitData);

                //scan status
                display_simple_column_chart(
                    'lab_test_results',
                    ['Pending', 'Sample Collected', 'Results Entered', 'Approved'],
                    'Lab Test Results',
                    [15, 56, 20, 47],
                );
            });
        </script>
    @endsection

    {{-- custom js end --}}
@endsection
