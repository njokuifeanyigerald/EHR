<div class="row">
    <div class="col-lg-3">
        <div class="iq-card">
            <div class="doc-profile-bg bg-primary rx-profile-bg-large">
                <div class="add-img-user">
                    <img
                        class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                        src="{{ asset($this->dependant->profile_pic ? $this->dependant->profile_pic : '/images/user/Image3.png') }}"
                        alt="profile-pic"
                    />
                </div>
            </div>
            <div class="iq-card-body">
                <div class="row">
                    <div class="text-center mt-1 ps-3 pe-3">
                        <h4>
                            <b>
                                {{ $this->dependant->title . ' ' . $this->dependant->first_name . ' ' . $this->dependant->surname }}
                            </b>
                        </h4>

                        <button type="button" class="btn iq-bg-success mt-1">
                            {{ $this->dependant->member_type }}
                        </button>
                    </div>
                </div>

                <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a
                        class="nav-link active"
                        id="visit-tab"
                        data-bs-toggle="pill"
                        href="#visit"
                        role="tab"
                        aria-controls="visit"
                        aria-selected="true"
                    >
                        Visits
                    </a>
                    <a
                        class="nav-link"
                        id="payments-tab"
                        data-bs-toggle="pill"
                        href="#payments"
                        role="tab"
                        aria-controls="payments"
                        aria-selected="false"
                    >
                        Payments
                    </a>
                    <a
                        class="nav-link"
                        id="principal-tab"
                        data-bs-toggle="pill"
                        href="#principal"
                        role="tab"
                        aria-controls="principal"
                        aria-selected="false"
                    >
                        Principal
                    </a>
                    <a
                        class="nav-link"
                        id="profile-tab"
                        data-bs-toggle="pill"
                        href="#profile"
                        role="tab"
                        aria-controls="profile"
                        aria-selected="false"
                    >
                        Profile Overview
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="iq-card">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="visit" role="tabpanel" aria-labelledby="visit-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Visit Overview</h4>
                        </div>
                        <div>
                            <a href="{{ route('visits.create', $this->dependant->id) }}" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                New Visit
                            </a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">VISIT DATE</th>
                                        <th scope="col">VISIT NUMBER</th>
                                        <th scope="col">TYPE OF SERVICE</th>
                                        <th scope="col">BILLING CODE</th>
                                        <th scope="col">LOCATION</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->dependant->visits as $visit)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $visit->visit_date }}</td>
                                            <td>{{ $visit->visit_number ? $visit->visit_number : 'N/A' }}</td>
                                            <td>{{ $visit->serviceType->name }}</td>
                                            <td>{{ $visit->billingCode->name }}</td>
                                            <td>{{ Str::headline($visit->location->name) }}</td>
                                            <td>{{ Str::headline($visit->status) }}</td>
                                            <td>
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
                                                        <a
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#add_charges"
                                                            href="#"
                                                        >
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
                                            </td>
                                        </tr>
                                    @empty
                                        {{-- </tbody> --}}
                                        <table class="w-100">
                                            <tr class="text-center">
                                                <td class="w-100">No Visits Yet</td>
                                            </tr>
                                        </table>
                                    @endforelse
                                    {{--
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>2023-10-02</td>
                                        <td>1000009</td>
                                        <td>OUT</td>
                                        <td>CASH</td>
                                        <td>FrontDesk</td>
                                        <td>In Use</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('visits.show', 1) }}">View
                                        Details</a>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>2023-10-02</td>
                                        <td>1000008</td>
                                        <td>INP</td>
                                        <td>CASH</td>
                                        <td>CASHIER</td>
                                        <td>In Use</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('visits.show', 1) }}">View
                                        Details</a>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>2023-09-29</td>
                                        <td>1000007</td>
                                        <td>OUT</td>
                                        <td>CASH</td>
                                        <td>FrontDesk</td>
                                        <td>In Use</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('visits.show', 1) }}">View
                                        Details</a>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">4</th>
                                        <td>2023-09-29</td>
                                        <td>1000006</td>
                                        <td>OUT</td>
                                        <td>CASH</td>
                                        <td>FrontDesk</td>
                                        <td>In Use</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('visits.show', 1) }}">View
                                        Details</a>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">5</th>
                                        <td>2023-09-27</td>
                                        <td>1000009</td>
                                        <td>OUT</td>
                                        <td>CASH</td>
                                        <td>LAB</td>
                                        <td>In Use</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button"
                                        class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="{{ route('visits.show', 1) }}">View
                                        Details</a>
                                        </div>
                                        </div>
                                        </td>
                                        </tr>
                                    --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Payments Overview</h4>
                        </div>
                        <div>
                            <button class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i>
                                New Payment
                            </button>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive mt-3">
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">CHANNEL</th>
                                        <th scope="col">AMOUNT</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->dependant->payments as $payment)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $payment->payment_method }}</td>
                                            <td>
                                                {{ $payment->currency . ' ' . number_formant($payment->payment_amount) }}
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-outline-primary rounded-pill mb-3">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <table class="w-100">
                                            <tr class="text-center">
                                                <td class="w-100">No Payments Yet</td>
                                            </tr>
                                        </table>
                                    @endforelse

                                    {{--
                                        <tr>
                                        <th scope="row">2</th>
                                        <td>Cash</td>
                                        <td>NGN 972.90</td>
                                        <td>
                                        <a href="#"
                                        class="btn btn-outline-primary rounded-pill mb-3">View</a>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Cash</td>
                                        <td>NGN 18120.00</td>
                                        <td>
                                        <a href="#"
                                        class="btn btn-outline-primary rounded-pill mb-3">View</a>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">4</th>
                                        <td>Cash</td>
                                        <td>NGN 120.00</td>
                                        <td>
                                        <a href="#"
                                        class="btn btn-outline-primary rounded-pill mb-3">View</a>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">5</th>
                                        <td>Cash</td>
                                        <td>NGN 3274.00</td>
                                        <td>
                                        <a href="#"
                                        class="btn btn-outline-primary rounded-pill mb-3">View</a>
                                        </td>
                                        </tr>
                                    --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="principal" role="tabpanel" aria-labelledby="principal-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Principal</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="iq-card shadow-lg">
                                    <div class="iq-card-body ps-0 pe-0 pt-0">
                                        <div class="docter-details-block">
                                            <div class="doc-profile-bg bg-primary" style="height: 150px"></div>
                                            <div class="docter-profile text-center">
                                                <img
                                                    src="{{ asset($this->principal->profile_pic ? $this->principal->profile_pic : 'images/user/Image2.png') }}"
                                                    alt="profile-img"
                                                    class="avatar-130 img-fluid rounded"
                                                />
                                            </div>
                                            <div class="text-center mt-3 ps-3 pe-3">
                                                <h4>
                                                    <b>
                                                        {{ $this->principal->title . ' ' . $this->principal->first_name . ' ' . $this->principal->surname }}
                                                    </b>
                                                </h4>
                                            </div>
                                            <hr />
                                            <ul
                                                class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0"
                                            >
                                                <li class="text-center">
                                                    <h6>
                                                        {{ $this->principal->folder_number ? $this->principal->folder_number : 'N/A' }}
                                                    </h6>
                                                    <span>Folder No</span>
                                                </li>
                                                <li class="text-center">
                                                    <h6>{{ $this->principal->age }}</h6>
                                                    <span>Age</span>
                                                </li>
                                                <li class="text-center">
                                                    <h6>{{ $principal->sex }}</h6>
                                                    <span>Gender</span>
                                                </li>
                                            </ul>
                                            <ul
                                                class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-3"
                                            >
                                                <li class="text-center">
                                                    <h6>{{ $this->principal->genotype }}</h6>
                                                    <span>Genotype</span>
                                                </li>
                                                <li class="text-center">
                                                    <h6>{{ $this->principal->blood_group }}</h6>
                                                    <span>Blood Group</span>
                                                </li>
                                            </ul>
                                            <div
                                                class="d-flex align-items-center justify-content-center px-6 mt-4 mb-2"
                                            >
                                                <div>
                                                    <a
                                                        href="{{ route('patients.show', $this->principal->id) }}"
                                                        class="btn btn-outline-primary rounded-pill me-2"
                                                    >
                                                        View
                                                    </a>
                                                </div>
                                                <div>
                                                    <a
                                                        href="{{ route('visits.create', $this->principal->id) }}"
                                                        class="btn btn-primary rounded-pill ms-2"
                                                    >
                                                        New Visit
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Profile Overview</h4>
                        </div>
                        <div>
                            <a href="{{ route('patients.edit', $this->dependant->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                                Edit Patient Info
                            </a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="col-lg-12">
                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-warning">
                                    <div class="iq-header-title">
                                        <h4 class="card-title text-white">Personal Information</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Title:</label>
                                                <span class="col-sm-6">{{ $this->dependant->title ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Surname:</label>
                                                <span class="col-sm-6">{{ $this->dependant->surname ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Other names:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->first_name ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Date Of Birth:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->date_of_birth ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Old Folder Number:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->folder_number ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Nationality:</label>
                                                <span class="col-sm-6">{{ $this->nationality ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Gender:</label>
                                                <span class="col-sm-6">{{ $this->dependant->sex ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Marital Status:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->marital_status ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Member Type:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->member_type ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-primary">
                                    <div class="iq-header-title">
                                        <h4 class="card-title text-white">Address & Contact Information</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">State:</label>
                                                <span class="col-sm-6">{{ $this->state ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">District/LGA:</label>
                                                <span class="col-sm-6">{{ $this->division ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">State Of Residence:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->state_of_residence ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Digital Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->postal_address ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Ward Of Residence:</label>
                                                <span class="col-sm-6">tobedone</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Residential Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->residential_address ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <!-- Occupation -->
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Occupation:</label>
                                                <span class="col-sm-6">
                                                    {{ Str::headline($this->dependant->occupation ?? 'N/A') }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Email Address:</label>
                                                <span class="col-sm-6">{{ $this->dependant->email ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Telephone:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->telephone ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="iq-card shadow">
                                <div class="iq-card-header d-flex justify-content-between bg-danger">
                                    <div class="iq-header-title">
                                        <h4 class="card-title text-white">Next Of Kin Contact Info</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Full Name:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->emergency_name ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Relationship:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->emergency_relation ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Telephone:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->emergency_tel ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->emergency_address ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="iq-card shadow">
                                <!-- Payment info -->
                                <div class="iq-card-header d-flex justify-content-between bg-success">
                                    <div class="iq-header-title">
                                        <h4 class="card-title text-white">Provider Information</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            @if ($this->dependant->patient_type == 'cash')
                                                <div class="form-group col-sm-6">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->dependant->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                            @elseif ($this->dependant->patient_type == 'insurance')
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->dependant->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Insurance Company:</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->dependant->defaultCompany?->company->code ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Member Number</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->dependant->defaultCompany->member_id ?? 'N/A' }}
                                                    </span>
                                                </div>
                                            @elseif ($this->dependant->patient_type == 'credit_corporate')
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->dependant->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Company:</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->dependant->defaultCompany?->company->code ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">NPA Number</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->dependant->defaultCompany->member_id ?? 'N/A' }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="iq-card shadow">
                                <!-- Medical info -->
                                <div class="iq-card-header d-flex justify-content-between bg-dark">
                                    <div class="iq-header-title text-white">
                                        <h4 class="card-title text-white">Medical Information</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label class="col-sm-4">Blood Group:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->dependant->blood_group ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="col-sm-4">Genotype:</label>
                                                <span class="col-sm-6">{{ $this->dependant->genotype ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
