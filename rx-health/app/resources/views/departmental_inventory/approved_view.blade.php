@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Approved Returns</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Approved</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <div class="form-group row mb-4">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="from">
                                From
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <p class="my-auto ms-2">Nurse Department</p>
                            </div>
                        </div>
                        <div class="form-group row my-5">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="to">
                                To
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <p class="my-auto ms-2">Pharmacy</p>
                            </div>
                        </div>
                        <div class="form-group row my-5">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="to">Status</label>
                            <div class="col-sm-10">
                                <p class="my-auto ms-2">Approved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Items To Return</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aceclofenac Tablet 100mg</td>
                                    <td>50</td>
                                    <td>Item has expired.</td>
                                </tr>
                                <tr>
                                    <td>Esomeprazole Tablet 40mg</td>
                                    <td>30</td>
                                    <td>Item is exceeding stock.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- buttons --}}
                    <div class="my-4 d-flex justify-content-end">
                        <a href="{{ route('departmental_inventory.approved') }}" class="btn btn-light me-2">
                            <i class="fa fa-arrow-rotate-left"></i>
                            Return to Approved Returns
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
