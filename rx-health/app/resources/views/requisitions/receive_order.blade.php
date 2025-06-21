@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Confirm Requisition Order</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Confirmed</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form action="">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="from">
                                    From
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" wire:model.lazy="requisition_from" required="">
                                        <option value="">Select from options</option>
                                        <option value="1" selected>Main Stores</option>
                                        <option value="2">Central Medical Stores</option>
                                        <option value="3">Pharmacy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="requisition_to">
                                    To
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="requisition_to" required="">
                                        <option value="">Select from options</option>
                                        <option value="1">Main Stores</option>
                                        <option value="2">Central Medical Stores</option>
                                        <option value="3" selected>Pharmacy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="Remarks">
                                    Remarks
                                </label>
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control"
                                        wire:model="requisition_remarks"
                                        placeholder="Remarks (Optional)"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0">Status</label>
                                <div class="col-sm-10">
                                    <span class="form-control">Approved</span>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0">Receive Status</label>
                                <div class="col-sm-10">
                                    <span class="form-control">Confirmed</span>
                                    {{-- for open order --}}
                                    {{-- <span class="form-control">Pending</span> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Requisition Details</h5>
                    </div>
                    {{-- for open order --}}
                    {{--
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_edit_item" class="btn btn-primary me-3 my-2">Approve Received Requisition</a>
                        </div>
                    --}}
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Batch no</th>
                                    <th>Item</th>
                                    <th>Pack Size</th>
                                    <th>Qty</th>
                                    <th>Qty Supplied</th>
                                    <th>Qty Received</th>
                                    <th>Expiry Date</th>
                                    <th class="text-center">
                                        {{-- for open order --}}
                                        {{-- Approve all --}}
                                        {{-- <i class="fa fa-check-double cursor-pointer" style="color: #0BB7AF"></i> --}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 250px !important">
                                        <select
                                            name="batch_no"
                                            id="batch_no"
                                            class="form-control"
                                            wire:model.defer="batch.0"
                                        >
                                            <option value="5">M01A0100004-1 (Qty: 3) (Expire Date: 18 Jan 2025)</option>
                                            <option value="10">
                                                M01A0100004-2 (Qty: 0) (Expire Date: 03 Jan 2025)
                                            </option>
                                        </select>
                                    </td>
                                    <td>Aceclofenac Tablet 100mg</td>
                                    <td>5</td>
                                    <td>
                                        <input
                                            type="text"
                                            min="0"
                                            style="width: 50px"
                                            class="form-control"
                                            disabled=""
                                            value="50"
                                        />
                                    </td>
                                    <td>30</td>
                                    <td>
                                        <input
                                            type="text"
                                            min="0"
                                            style="width: 50px"
                                            class="form-control"
                                            disabled=""
                                            value="30"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            style="width: 150px"
                                            class="form-control"
                                            disabled=""
                                            value="2024-05-05"
                                        />
                                    </td>
                                    <td>
                                        {{-- for open order --}}
                                        {{-- Approve all --}}
                                        {{-- <i class="fa fa-check cursor-pointer" style="color: #0BB7AF"></i> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 250px !important">
                                        <select name="batch_no" id="batch_no" class="form-control">
                                            <option value="9">A02B0201402-1 (Qty: 3) (Expire Date: 03 Jan 2026)</option>
                                        </select>
                                    </td>
                                    <td>Esomeprazole Tablet 40mg</td>
                                    <td>50</td>
                                    <td>
                                        <input
                                            type="text"
                                            min="0"
                                            style="width: 50px"
                                            class="form-control"
                                            disabled=""
                                            value="30"
                                        />
                                    </td>
                                    <td>10</td>
                                    <td>
                                        <input
                                            type="text"
                                            min="0"
                                            style="width: 50px"
                                            class="form-control"
                                            disabled=""
                                            value="10"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            style="width: 150px"
                                            class="form-control"
                                            disabled=""
                                            value="2024-05-01"
                                        />
                                    </td>
                                    <td>
                                        {{-- for open order --}}
                                        {{-- Approve all --}}
                                        {{-- <i class="fa fa-check cursor-pointer" style="color: #0BB7AF"></i> --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
