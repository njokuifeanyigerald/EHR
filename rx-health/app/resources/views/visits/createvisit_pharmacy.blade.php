@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Create New Pharmacy Visit</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="iq-card">
                <div class="doc-profile-bg bg-primary rx-profile-bg-large">
                    <div class="add-img-user">
                        <img
                            class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                            src="http://127.0.0.1:8000/images/user/Image2.png"
                            alt="profile-pic"
                        />
                    </div>
                </div>
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-card-body">
                        <div class="about-info mt-3 p-0">
                            <div class="row">
                                <div class="col-6">Patient Name:</div>
                                <div class="col-6">AJAH MR BARNABAS</div>
                                <div class="col-6">Folder Number:</div>
                                <div class="col-6">1003-23</div>
                                <div class="col-6">Member Type:</div>
                                <div class="col-6">CASH</div>
                                <div class="col-6">Age/Sex:</div>
                                <div class="col-6">
                                    (35 Years,
                                    <i class="fa fa-venus text-primary ml-2"></i>
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-lg-9">
            <div class="iq-card">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <form>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Attending Officer:</label>
                                        <select class="form-select my-2" id="selectcountry">
                                            <option>Choose Attending Officer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pno">Visit Date:</label>
                                        <input
                                            type="date"
                                            class="form-control my-2"
                                            id="pno"
                                            placeholder="Visit Date"
                                        />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Visit Type:</label>
                                        <select class="form-select my-2" id="selectcountry">
                                            <option value="OUT">Out-Patient</option>
                                            <option value="INP">In-Patient</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Payment Type:</label>
                                        <select class="form-select my-2" id="selectcountry">
                                            <option value="CASH">Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom-control custom-checkbox custom-control-inline mb-4">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5" />
                                            <label class="custom-control-label" for="customCheck5">
                                                Emergency Visit?
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Visit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
