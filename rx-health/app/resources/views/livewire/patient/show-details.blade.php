<div class="row">
    <div class="col-lg-3">
        <div class="iq-card">
            <div class="doc-profile-bg bg-primary rx-profile-bg-large">
                <div class="add-img-user">
                    @if ($this->patient->profile_pic)
                        <img
                            class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                            src="{{ asset($this->patient->profile_pic) }}"
                            alt="profile-pic"
                        />
                    @else
                        <img
                            class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                            src="{{ asset('images/user/Image2.png') }}"
                            alt="profile-pic"
                        />
                    @endif
                </div>
            </div>
            <div class="iq-card-body">
                <div class="row">
                    <div class="text-center mt-1 ps-3 pe-3">
                        {{-- <h4><b>Ajah, Mr Barnabas</b></h4> --}}
                        <h4>
                            <b>
                                {{ $this->patient->title . ' ' . $this->patient->first_name . ' ' . $this->patient->surname }}
                            </b>
                        </h4>

                        <button type="button" class="btn iq-bg-primary mt-1">
                            {{ $this->patient->member_type }}
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
                    {{--
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
                    --}}
                    @if (! $this->patient->principal_id)
                        @if ($patient->member_type != 'Guest')
                            <a
                                class="nav-link"
                                id="dependants-tab"
                                data-bs-toggle="pill"
                                href="#dependants"
                                role="tab"
                                aria-controls="dependants"
                                aria-selected="false"
                            >
                                Dependants
                            </a>
                        @endif
                    @else
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
                    @endif
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
                {{-- Visit Overview --}}
                <div class="tab-pane fade show active" id="visit" role="tabpanel" aria-labelledby="visit-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Visit Overview</h4>
                        </div>
                        <div>
                            <a href="{{ route('visits.create', $this->patient->id) }}" class="btn btn-primary me-2">
                                <i class="fa fa-plus-circle"></i>
                                New Visit
                            </a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive overflow-x-visible mt-1">
                            <table
                                class="table table-hover {{-- table-borderless --}}"
                            >
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
                                    @forelse ($this->patient->visits as $visit)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $visit->visit_date }}</td>
                                            <td>{{ $visit->visit_number ? $visit->visit_number : 'N/A' }}</td>
                                            <td>{{ $visit->serviceType->name }}</td>
                                            <td>{{ $visit->billingCode->name }}</td>
                                            <td>{{ Str::headline($visit->location->name) }}</td>

                                            <td>
                                                <button
                                                    type="button"
                                                    class="btn {{ $visit->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                                >
                                                    {{ Str::headline($visit->status) }}
                                                </button>
                                            </td>
                                            <td>
                                                <div class="btn-group dropdown" role="group">
                                                    <button
                                                        id="btnGroupDrop{{ $loop->iteration }}"
                                                        type="button"
                                                        class="btn btn-primary dropdown-toggle"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="true"
                                                    >
                                                        Action
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-end"
                                                        style="z-index: 999 !important"
                                                        aria-labelledby="btnGroupDrop{{ $loop->iteration }}"
                                                    >
                                                        <a
                                                            class="dropdown-item"
                                                            {{-- data-bs-toggle="modal" --}}
                                                            {{-- data-bs-target="#add_charges" --}}
                                                            wire:click.prevent="showAddChargesModal({{ $visit->id }})"
                                                        >
                                                            <i class="fa fa-plus me-1"></i>
                                                            Add Charges
                                                        </a>
                                                        <a
                                                            class="dropdown-item"
                                                            {{-- data-bs-toggle="modal" --}}
                                                            {{-- data-bs-target="#changePaymentMode" --}}
                                                            wire:click.prevent="showChangePaymentModal({{ $visit->id }})"
                                                        >
                                                            <i class="fa fa-refresh me-1"></i>
                                                            Change payment Mode
                                                        </a>
                                                        <a
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            {{-- data-bs-target=".patientActivities" --}}
                                                            wire:click.prevent="showPatientActivityModal({{ $visit->id }})"
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Payment Overview --}}
                <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                    <livewire:payments.payment-history
                        :visit="$patient?->visits?->first()"
                        :show_patient_details="false"
                    />
                </div>

                @if (! $this->patient->principal_id)
                    {{-- New Dependent --}}
                    <div class="tab-pane fade" id="dependants" role="tabpanel" aria-labelledby="dependants-tab">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Dependents</h4>
                            </div>

                            @if ($this->patient->dependants->count() < $this->patient->no_of_dependants)
                                <a href="{{ route('patients.create_dependant', ['id' => $this->patient->id]) }}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i>
                                        New Dependent
                                    </button>
                                </a>
                            @endif
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                @forelse ($this->patient->dependants as $dependant)
                                    {{-- @dd($dependant) --}}
                                    <div class="col-lg-4">
                                        <div class="iq-card shadow-lg">
                                            <div class="iq-card-body ps-0 pe-0 pt-0">
                                                <div class="docter-details-block">
                                                    <div class="doc-profile-bg bg-primary" style="height: 150px"></div>
                                                    <div class="docter-profile text-center">
                                                        <img
                                                            src="{{ asset($dependant->profile_pic ? $dependant->profile_pic : 'images/user/Image3.png') }}"
                                                            alt="profile-img"
                                                            class="avatar-130 img-fluid rounded"
                                                        />
                                                    </div>
                                                    <div class="text-center mt-3 ps-3 pe-3">
                                                        <h4>
                                                            <b>
                                                                {{ $dependant->title . ' ' . $dependant->first_name . ' ' . $dependant->surname }}
                                                            </b>
                                                        </h4>
                                                    </div>
                                                    <hr />
                                                    <ul
                                                        class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0"
                                                    >
                                                        <li class="text-center">
                                                            <h6>
                                                                {{ $dependant->folder_number ? $dependant->folder_number : 'N/A' }}
                                                            </h6>
                                                            <span>Folder No</span>
                                                        </li>
                                                        <li class="text-center">
                                                            <h6>{{ $dependant->age }}</h6>
                                                            <span>Age</span>
                                                        </li>
                                                        <li class="text-center">
                                                            <h6>{{ $dependant->sex }}</h6>
                                                            <span>Gender</span>
                                                        </li>
                                                    </ul>
                                                    <ul
                                                        class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-3"
                                                    >
                                                        <li class="text-center">
                                                            <h6>{{ $dependant->genotype }}</h6>
                                                            <span>Genotype</span>
                                                        </li>
                                                        <li class="text-center">
                                                            <h6>{{ $dependant->blood_group }}</h6>
                                                            <span>Blood Group</span>
                                                        </li>
                                                    </ul>
                                                    <div
                                                        class="d-flex align-items-center justify-content-center px-6 mt-4 mb-2"
                                                    >
                                                        <div>
                                                            <a
                                                                href="{{ route('patients.show', ['id' => $dependant->id]) }}"
                                                                {{-- href="{{ route('patients.show_dependent', ['patient_id' => $patient->id, 'dependant_id' => $dependant->id]) }}" --}}
                                                                class="btn btn-outline-primary rounded-pill me-2"
                                                            >
                                                                View
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a
                                                                href="{{ route('visits.create', $dependant->id) }}"
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
                                @empty
                                    <div class="w-100 text-center">No Dependants</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
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
                                                        src="{{ asset($this->principal->profile_pic ? $this->principal->profile_pic : 'images/user/Image3.png') }}"
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
                                                        <h6>{{ $this->principal->sex }}</h6>
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
                                                            href="{{ route('patients.show', ['id' => $patient->id]) }}"
                                                            {{-- href="{{ route('patients.show_dependent', ['patient_id' => $patient->id, 'dependant_id' => $this->principal->id]) }}" --}}
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
                @endif

                {{-- Profile Overview --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Profile Overview</h4>
                        </div>
                        <div>
                            {{-- @if ($patient->member_type != 'Guest') --}}
                            <a href="{{ route('patients.edit', $this->patient->id) }}" class="btn btn-primary">
                                <i class="fa fa-edit"></i>
                                Edit Patient Info
                            </a>
                            {{-- @endif --}}
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
                                                <span class="col-sm-6">{{ $this->patient->title ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Surname:</label>
                                                <span class="col-sm-6">{{ $this->patient->surname ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Other names:</label>
                                                <span class="col-sm-6">{{ $this->patient->first_name ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Date Of Birth:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->date_of_birth ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Old Folder Number:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->new_folder_number ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Nationality:</label>
                                                <span class="col-sm-6">{{ $this->nationality ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Gender:</label>
                                                <span class="col-sm-6">{{ $this->patient->sex ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Marital Status:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->marital_status ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Member Type:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->member_type ?? 'N/A' }}
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
                                                    {{ $this->patient->state_of_residence ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Digital Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->postal_address ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Ward Of Residence:</label>
                                                <span class="col-sm-6">to get later</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">residential Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->residential_address ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <!-- Occupation -->
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Occupation:</label>
                                                <span class="col-sm-6">
                                                    {{ Str::headline($this->patient->occupation ?? 'N/A') }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Email Address:</label>
                                                <span class="col-sm-6">{{ $this->patient->email ?? 'N/A' }}</span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Telephone:</label>
                                                <span class="col-sm-6">{{ $this->patient->telephone ?? 'N/A' }}</span>
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
                                                    {{ $this->patient->emergency_name ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Relationship:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->emergency_relation ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label class="col-sm-4">Telephone:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->emergency_tel ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="col-sm-4">Address:</label>
                                                <span class="col-sm-6">
                                                    {{ $this->patient->emergency_address ?? 'N/A' }}
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
                                            @if ($this->patient->patient_type == 'cash')
                                                <div class="form-group col-sm-6">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->patient->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                            @elseif ($this->patient->patient_type == 'insurance')
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->patient->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Insurance Company:</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->patient->defaultCompany?->company->code ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Member Number</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->patient->defaultCompany->member_id ?? 'N/A' }}
                                                    </span>
                                                </div>
                                            @elseif ($this->patient->patient_type == 'credit_corporate')
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Payment Type:</label>
                                                    <span class="col-sm-6">
                                                        {{ Str::headline($this->patient?->patient_type ?? 'N/A') }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">Company:</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->patient?->defaultCompany?->company->code ?? 'N/A' }}
                                                    </span>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label class="col-sm-4">NPA Number</label>
                                                    <span class="col-sm-6">
                                                        {{ $this->patient?->defaultCompany?->member_id ?? 'N/A' }}
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
                                                    {{ $this->patient->blood_group ?? 'N/A' }}
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label class="col-sm-4">Genotype:</label>
                                                <span class="col-sm-6">{{ $this->patient->genotype ?? 'N/A' }}</span>
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

    {{-- modals --}}

    {{-- Modals for visit details --}}
    <!-- Add charges Modal -->
    @include('livewire.patient.modals.add_charges')

    {{-- Change Payment Method --}}
    @include('livewire.patient.modals.payment_method')

    <!-- Patient Activities modal -->
    @include('livewire.patient.modals.patient_activities')

    @script
        <script>
            //show modals
            $wire.on('show_add_charges_modal', () => {
                $('#add_charges').modal('show');
            });
            $wire.on('show_charge_payments_modal', () => {
                $('#changePaymentMode').modal('show');
            });
            $wire.on('show_patient_activity_modal', () => {
                $('.patientActivities').modal('show');
            });

            //close modals
            $wire.on('close_add_charges_modal', () => {
                $('#add_charges').modal('hide');
            });
            $wire.on('close_charge_payments_modal', () => {
                $('#changePaymentMode').modal('hide');
            });
            $wire.on('close_patient_activity_modal', () => {
                $('.patientActivities').modal('hide');
            });
        </script>
    @endscript

    <script>
        function stopPropagation(event) {
            event.stopPropagation(); // Prevent event propagation
        }
    </script>
</div>
