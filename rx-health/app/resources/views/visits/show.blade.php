@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Visit Overview</h4>
                    </div>
                    <div class="btn-group" role="group">
                        <button
                            id="btnGroupDrop1"
                            type="button"
                            class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#add_charges" href="#">
                                <i class="fa fa-plus me-1"></i>
                                Add Charges
                            </a>
                            <a
                                class="dropdown-item"
                                data-bs-toggle="modal"
                                data-bs-target="#changePaymentMode"
                                href="#"
                            >
                                <i class="fa fa-refresh me-1"></i>
                                Change payment Mode
                            </a>
                            <a
                                class="dropdown-item"
                                data-bs-toggle="modal"
                                data-bs-target=".patientActivities"
                                href="#"
                            >
                                <i class="fa fa-user me-1"></i>
                                Patient Activities
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-print me-1"></i>
                                Print Bill
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('visits.actions.modals')

        <!-- page sections -->
        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-body ps-0 pe-0 pt-0">
                    <div class="docter-details-block">
                        <div class="doc-profile-bg bg-primary" style="height: 150px"></div>
                        <div class="docter-profile text-center">
                            <img
                                src="{{ asset('images/user/11.png') }}"
                                alt="profile-img"
                                class="avatar-130 img-fluid"
                            />
                        </div>
                        <div class="text-center mt-3 ps-3 pe-3">
                            <h4><b>Visit Details</b></h4>
                        </div>
                        <hr />
                        <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                            <li class="text-center">
                                <h5>2023-10-10</h5>
                                <span>Visit Date</span>
                            </li>
                            <li class="text-center">
                                <h5 class="counter">1000010</h5>
                                <span>Visit Number</span>
                            </li>
                            <li class="text-center">
                                <h5>David, Chief Adeleke</h5>
                                <span>Patient</span>
                            </li>
                        </ul>
                        <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-3">
                            <li class="text-center">
                                <h5>Out-Patient</h5>
                                <span>Type Of Service</span>
                            </li>
                            <li class="text-center">
                                <h5>Cash Clients</h5>
                                <span>Payment Mode</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col">PAYMENT MODE</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>obstetric usg scan report</td>
                                    <td>1</td>
                                    <td>120.00</td>
                                    <td>120</td>
                                    <td>Cash Clients</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Chlorpheniramine/Paracetamol Tablet</td>
                                    <td>30</td>
                                    <td>4620.00</td>
                                    <td>138600</td>
                                    <td>Cash Clients</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Aceclofenac Tablet 100mg</td>
                                    <td>100</td>
                                    <td>5620.00</td>
                                    <td>562000</td>
                                    <td>Cash Clients</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Betatop Tablet 12.5mg</td>
                                    <td>30</td>
                                    <td>780.00</td>
                                    <td>23400</td>
                                    <td>Cash Clients</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rocephine injection 2g</td>
                                    <td>40</td>
                                    <td>146.20</td>
                                    <td>5848</td>
                                    <td>Cash Clients</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-card bg-primary">
                <div class="iq-card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <p>
                                Last Visit:
                                <b>71 Days</b>
                            </p>
                            <p>
                                Total:
                                <b>4,740.00</b>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <b>GP Consultation Charge Applicable</b>
                            </p>
                            <p>
                                CASH:
                                <b>138,720.00</b>
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label class="text-white">
                                <i class="fa fa-forward"></i>
                                <b>Forward to</b>
                            </label>
                            <select class="form-select my-2 bg-white" id="location">
                                <option value="FRONTDESK">Front Desk</option>
                                <option value="VITALS">Nurses Station</option>
                                <option selected="" value="CONSULT">Consulting Room</option>
                                <option value="PHARM">Pharmacy</option>
                                <option value="LAB">Laboratory</option>
                                <option value="CASHIER">Cashier</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
