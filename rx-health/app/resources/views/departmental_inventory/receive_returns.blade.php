@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List Of Returned Items To Receive</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="PendingConfirmation-tab"
                                data-bs-toggle="tab"
                                href="#PendingConfirmation"
                                role="tab"
                                aria-controls="pills-PendingConfirmation"
                                aria-selected="true"
                            >
                                Pending Confirmation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="Confirmed-tab"
                                data-bs-toggle="tab"
                                href="#Confirmed"
                                role="tab"
                                aria-controls="pills-Confirmed"
                                aria-selected="false"
                            >
                                Confirmed
                            </a>
                        </li>
                    </ul>
                    <div class="mt-4">
                        {{-- Search --}}
                        <p>
                            Search for Purchase Order -
                            <small>using Destination/Source/The Requestor</small>
                        </p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                    <div class="input-icon input-icon-right">
                                        <input
                                            type="search"
                                            class="form-control"
                                            placeholder="Search..."
                                            name="item_name"
                                        />
                                        <span><i class="fa fa-search"></i></span>
                                        <input type="hidden" name="visit_number" id="visit_number" value="0" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="tab-content" id="pills-tabContent-2">
                        {{-- Pending Confirmation --}}
                        <div
                            class="tab-pane fade show active"
                            id="PendingConfirmation"
                            role="tabpanel"
                            aria-labelledby="PendingConfirmation-tab"
                        >
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Time Created</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Requested By</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nurse Department</td>
                                            <td>Pharmacy</td>
                                            <td>2023-10-23 01:23:34</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>Default Admin</td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('departmental_inventory.returns_order', 1) }}"
                                                    class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                    title="View Approved"
                                                >
                                                    <i class="ri-eye-line m-0 icons-sm"></i>
                                                    Receive Items
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Confirmed --}}
                        <div class="tab-pane fade" id="Confirmed" role="tabpanel" aria-labelledby="Confirmed-tab">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Time Created</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Requested By</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nurse Department</td>
                                            <td>Pharmacy</td>
                                            <td>2023-10-23 01:23:34</td>
                                            <td><span class="badge badge-success">Confirmed</span></td>
                                            <td>Default Admin</td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('departmental_inventory.returns_order', 1) }}"
                                                    class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                    title="View Approved"
                                                >
                                                    <i class="ri-eye-line m-0 icons-sm"></i>
                                                    View Order
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
