@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Refillable Items</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="iq-card">
                <div class="doc-profile-bg bg-primary rx-profile-bg">
                    <div class="add-img-user">
                        <img
                            class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill"
                            src="{{ asset('images/user/Image2.png') }}"
                            alt="profile-pic"
                        />
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="form-group">
                        <div class="img-extension mt-1">
                            <div class="d-inline-block">
                                <b class="text-dark">Name:</b>
                                <a href="{{ route('patients.show', 1) }}" title="View">
                                    <p class="text-primary">{{ $visit->patient?->full_name_title ?? 'N/A' }}</p>
                                </a>
                                <b class="text-dark">Age:</b>
                                <p>{{ $visit->patient?->age ?? '0 day' }}</p>
                                <b class="text-dark">Visit No:</b>
                                <p>{{ $visit->visit_number ?? 'N/A' }}</p>
                                <b class="text-dark">Gender:</b>
                                <p>{{ $visit->patient?->sex ?? 'N/A' }}</p>
                                <b class="text-dark">Doctor:</b>
                                <p>{{ $visit->attendingOfficer?->full_name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-10">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table
                            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                        >
                            <thead class="">
                                <tr>
                                    <th style="width: 250px">Prescription</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Refill</th>
                                    <th>Days</th>
                                    <th>Next Refill Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div
                                            class="ps-3 pe-3 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                            role="alert"
                                        >
                                            <span>Paracetamol Tablet 500mg:</span>
                                            <span class="text-muted">2 Tab tid 5 days Oral</span>
                                        </div>
                                    </td>
                                    <td>665.50</td>
                                    <td>
                                        <input
                                            disabled=""
                                            type="number"
                                            min="1"
                                            class="form-control"
                                            name="quantity"
                                            id="quantity"
                                            value="4"
                                            style="width: 60px"
                                        />
                                    </td>
                                    <td>2,662.00</td>
                                    <td>
                                        <select class="form-control" name="refill" style="width: 60px" disabled="">
                                            <option value="0">No</option>
                                            <option selected="" value="1">Yes</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                            type="number"
                                            name="fill_days"
                                            id="refill_days"
                                            value="10"
                                            class="form-control"
                                            style="width: 60px"
                                        />
                                    </td>
                                    <td>
                                        <span>12th October 2023</span>
                                        <br />
                                        <span class="iq-bg-danger ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">
                                            5 months ago
                                        </span>
                                    </td>
                                    <td>
                                        {{--
                                            <form action="{{ route('visits.createvisit_pharmacy', 1) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="unique_refill" id="unique_refill" value="24">
                                            
                                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> New Refill </button>
                                            </form>
                                        --}}
                                        <a
                                            href="{{ route('visits.createvisit_pharmacy', [1, 24]) }}"
                                            class="btn btn-outline-primary"
                                        >
                                            <i class="fa fa-plus"></i>
                                            New Refill
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            class="ps-3 pe-3 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                            role="alert"
                                        >
                                            <span>Abidec Drops:</span>
                                            <span class="text-muted">10 Ml bid 7 days Oral</span>
                                        </div>
                                    </td>
                                    <td>2,359.50</td>
                                    <td>
                                        <input
                                            disabled=""
                                            type="number"
                                            min="1"
                                            class="form-control"
                                            name="quantity"
                                            id="quantity"
                                            value="1"
                                            style="width: 60px"
                                        />
                                    </td>
                                    <td>2,359.50</td>
                                    <td>
                                        <select class="form-control" name="refill" style="width: 60px" disabled="">
                                            <option value="0">No</option>
                                            <option selected="" value="1">Yes</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                            type="number"
                                            name="fill_days"
                                            id="refill_days"
                                            value="5"
                                            class="form-control"
                                            style="width: 60px"
                                        />
                                    </td>
                                    <td>
                                        <span>4th October 2023</span>
                                        <br />
                                        <span class="iq-bg-danger ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">
                                            5 months ago
                                        </span>
                                    </td>
                                    <td>
                                        {{--
                                            <form action="{{ route('visits.createvisit_pharmacy', 1) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="unique_refill" id="unique_refill" value="18">
                                            
                                            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-plus"></i> New Refill </button>
                                            </form>
                                        --}}
                                        <a
                                            href="{{ route('visits.createvisit_pharmacy', [1, 18]) }}"
                                            class="btn btn-outline-primary"
                                        >
                                            <i class="fa fa-plus"></i>
                                            New Refill
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end my-3">
                        <a href="{{ route('visits.create', 2) }}" class="btn btn-primary">Refill All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
