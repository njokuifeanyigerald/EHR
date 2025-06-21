<div class="row">
    <div class="col-lg-3">
        <div class="iq-card">
            <div class="doc-profile-bg bg-primary rx-profile-bg-large">
                <div class="add-img-user">
                    <img
                        class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                        src="{{ $this->image ? $this->image->temporaryUrl() : ($this->patient->profile_pic ? asset($this->patient->profile_pic) : asset('/images/user/Image2.png')) }}
                        {{-- @if ($this->image) {{ $this->image->temporaryUrl() }}@else{{ asset('/images/user/Image2.png') }} @endif --}}"
                        alt="profile-pic"
                    />
                </div>
            </div>
            <div class="iq-card-body">
                <div class="form-group">
                    <div class="add-img-user">
                        <div class="p-image text-center mt-0">
                            <a href="#!" class="upload-button btn iq-bg-primary" onclick="uploadImage()">File Upload</a>
                            <input
                                class="file-upload"
                                type="file"
                                accept="image/jpg,image/png,image/jpeg,"
                                id="profile_image"
                                wire:model.live="image"
                            />
                        </div>
                    </div>
                    <div class="img-extension mt-3 text-center">
                        <div class="d-inline-block align-items-center">
                            <span>Only</span>
                            <span>.jpg</span>
                            <span>.png</span>
                            <span>.jpeg</span>
                            <span>allowed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Personal Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>
                                Title
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="selectuserrole" required wire:model.live="title">
                                <option value="">Select Title</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                                <option value="Chief">Chief</option>
                                <option value="Alhaji">Alhaji</option>
                                <option value="Alhaja">Alhaja</option>
                                <option value="Hajiya">Hajiya</option>
                                <option value="Mallam">Mallam</option>
                                <option value="Hajji">Hajji</option>
                                <option value="Hajia">Hajia</option>
                                <option value="Engr">Engr</option>
                                <option value="Pastor">Pastor</option>
                                <option value="Barr">Barr</option>
                                <option value="Arch">Arch</option>
                            </select>
                            <x-input-error :messages="$errors->get('title')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fname">
                                Enter Surname
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="fname"
                                placeholder="Surname"
                                required
                                wire:model.live="surname"
                            />
                            <x-input-error :messages="$errors->get('surname')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Oname">
                                Enter Other Names
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="Oname"
                                placeholder="Other Names"
                                required
                                wire:model.live="othernames"
                            />
                            <x-input-error :messages="$errors->get('othernames')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob">
                                Date Of Birth
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="date"
                                class="form-control my-2"
                                id="dob"
                                required
                                wire:model.live="date_of_birth"
                            />
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="add1">Old Folder Number</label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="add1"
                                placeholder="Old Folder Number"
                                wire:model.live="old_folder_number"
                            />
                            <x-input-error :messages="$errors->get('old_folder_number')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="selectcountry">
                                Nationality
                                <span class="text-danger">*</span>
                            </label>
                            <select wire:model.live="nationality" class="form-select my-2" id="selectcountry" required>
                                <option value="">Select a Country</option>
                                @foreach ($this->countries as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('nationality')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cname">
                                Gender
                                <span class="text-danger">*</span>
                            </label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    id="customRadio6"
                                    name="customRadio-1"
                                    class="custom-control-input"
                                    required
                                    wire:model.live="gender"
                                    value="Male"
                                />
                                <label class="custom-control-label" for="customRadio6">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    id="customRadio7"
                                    name="customRadio-1"
                                    class="custom-control-input"
                                    required
                                    wire:model.live="gender"
                                    value="Female"
                                />
                                <label class="custom-control-label" for="customRadio7">Female</label>
                            </div>
                            <x-input-error :messages="$errors->get('gender')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="maritalStatus">
                                Marital Status
                                <span class="text-danger">*</span>
                            </label>
                            <select
                                class="form-select my-2"
                                id="maritalStatus"
                                required
                                wire:model.live="marital_status"
                            >
                                <option value="Single" selected>Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                            <x-input-error :messages="$errors->get('marital_status')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="memberType">
                                Member Type
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="memberType" required wire:model="member_type">
                                @if ($this->patient->principal_id)
                                    <option value="Dependant" selected>Dependant</option>
                                @else
                                    <option value="Principal" selected>Principal</option>
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('member_type')" class="mt-1" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Address & Contact Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="state">
                                State
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="state" wire:model.live="state" required>
                                <option value="">Select a State</option>
                                @foreach ($this->states as $state)
                                    <option value="{{ $state->code }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('state')" class="mt-1" />
                        </div>

                        <div class="form-group col-sm-4">
                            <label for="district">
                                District/LGA
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="district" required wire:model.live="lga">
                                @if ($this->state == null)
                                    <option>Select A State First</option>
                                @elseif (! $this->divisions)
                                    <option>No Divisions Available</option>
                                @endif
                                @if ($this->state != null && $this->divisions)
                                    @foreach ($this->divisions as $division)
                                        <option value="{{ $division->code }}">{{ $division->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('lga')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="sor">
                                State Of Residence
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                wire:model.live="state_of_residence"
                                id="sor"
                                @if ($this->lga == null) disabled placeholder="Select A District First" @endif
                            />
                            <x-input-error :messages="$errors->get('state_of_residence')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="digi">Digital Address</label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="digi"
                                placeholder="Digital Address"
                                wire:model.live="digital_address"
                            />
                            <x-input-error :messages="$errors->get('digital_address')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ward">Ward Of Residence</label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="ward"
                                placeholder="Ward"
                                wire:model.live="ward_of_residence"
                            />
                            <x-input-error :messages="$errors->get('ward_of_residence')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="raddress">
                                Residential Address
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="raddress"
                                placeholder="Address"
                                required
                                wire:model.live="residence_address"
                            />
                            <x-input-error :messages="$errors->get('residence_address')" class="mt-1" />
                        </div>
                        <!-- Occupation -->
                        <div class="form-group col-md-4">
                            <label for="occupation">Occupation</label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="occupation"
                                placeholder="Teacher"
                                wire:model.live="occupation"
                            />
                            <x-input-error :messages="$errors->get('occupation')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email address</label>
                            <input
                                type="email"
                                class="form-control my-2"
                                id="email"
                                placeholder="user@example.com"
                                wire:model.live="email_address"
                            />
                            <x-input-error :messages="$errors->get('email_address')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telephone">
                                Telephone
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="city"
                                placeholder="telephone"
                                required
                                wire:model.live="telephone"
                            />
                            <x-input-error :messages="$errors->get('telephone')" class="mt-1" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Contact Info -->
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Next Of Kin Contact Info</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="fname">
                                Full Name
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="fname"
                                placeholder="Name"
                                required
                                wire:model.live="fullname"
                            />
                            <x-input-error :messages="$errors->get('fullname')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="emergency_relationship">
                                Relationship
                                <span class="text-danger">*</span>
                            </label>
                            <select
                                class="form-select my-2"
                                id="emergency_relationship"
                                required
                                wire:model.live="relationship_type"
                            >
                                <option value="">Select Relationship</option>
                                <option value="Mother">Mother</option>
                                <option value="Father">Father</option>
                                <option value="Sister">Sister</option>
                                <option value="Brother">Brother</option>
                                <option value="Uncle">Uncle</option>
                                <option value="Spouse">Spouse</option>
                                <option value="Son">Son</option>
                                <option value="Daughter ">Daughter</option>
                            </select>

                            <x-input-error :messages="$errors->get('relationship_type')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="emergency_tele">
                                Telephone
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="emergency_tele"
                                placeholder="tel"
                                required
                                wire:model.live="phone_number"
                            />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emergency_address">
                                Address
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="emergency_address"
                                placeholder="Address"
                                required
                                wire:model.live="address"
                            />
                            <x-input-error :messages="$errors->get('address')" class="mt-1" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment info -->
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Provider Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="d-flex gap-2 flex-wrap">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        id="cash"
                                        name="billing_code"
                                        class="custom-control-input"
                                        wire:model.live="payment_type"
                                        value="cash"
                                    />
                                    <label class="custom-control-label" for="cash">Cash Clients</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        id="credit_cooperate"
                                        name="billing_code"
                                        class="custom-control-input"
                                        wire:model.live="payment_type"
                                        value="credit_corporate"
                                    />
                                    <label class="custom-control-label" for="credit_cooperate">
                                        Credit/Coorporate Client
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input
                                        type="radio"
                                        id="insurance"
                                        name="billing_code"
                                        class="custom-control-input"
                                        wire:model.live="payment_type"
                                        value="insurance"
                                    />
                                    <label class="custom-control-label" for="insurance">Insurance Client</label>
                                </div>
                                {{--
                                    <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="staff" name="billing_code"
                                    class="custom-control-input">
                                    <label class="custom-control-label" for="staff"> Staff </label>
                                    </div>
                                --}}
                            </div>
                        </div>
                    </div>

                    <x-input-error :messages="$errors->get('payment_type')" class="mt-1" />
                </div>
                <div class="row">
                    @if ($this->payment_type == 'credit_corporate')
                        <div class="form-group col-md-4">
                            <label for="company_name">
                                Company Name
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="company_name" required wire:model.live="company_name">
                                @if (! $this->company_name)
                                    <option>Select company</option>
                                @endif

                                @foreach ($this->companies as $company)
                                    <option value="{{ $company->id }}">{{ Str::headline($company->name) }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="staff_id">
                                Staff Id
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="staff_id"
                                placeholder="Staff Id"
                                required
                                wire:model.live="staff_id"
                            />
                            <x-input-error :messages="$errors->get('staff_id')" class="mt-1" />
                        </div>
                    @elseif ($this->payment_type == 'insurance')
                        <div class="form-group col-md-4">
                            <label for="insurance_company">
                                Insurance Company
                                <span class="text-danger">*</span>
                            </label>
                            <select
                                class="form-select my-2"
                                id="insurance_company"
                                required
                                wire:model.live="insurance_company"
                            >
                                @if (! $this->insurance_company)
                                    <option>Select Insurance Company</option>
                                @endif

                                @foreach ($this->insuranceCompanies as $company)
                                    <option value="{{ $company->id }}">{{ Str::headline($company->name) }}</option>
                                @endforeach

                                {{-- <option>Select Insurance Company</option> --}}
                            </select>
                            <x-input-error :messages="$errors->get('insurance_company')" class="mt-1" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="member_number">
                                Member Number
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="member_number"
                                placeholder="Member Number"
                                required
                                wire:model.live="member_number"
                            />
                            <x-input-error :messages="$errors->get('member_number')" class="mt-1" />
                        </div>
                    @endif
                </div>
            </div>

            <!-- Medical info -->
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Medical Information</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="blood_grp">Blood Group</label>
                            <select class="form-select my-2" id="blood_grp" wire:model.live="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                            <x-input-error :messages="$errors->get('blood_group')" class="mt-1" />
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="genotype">Genotype</label>
                            <select class="form-select my-2" id="genotype" wire:model.live="genotype">
                                <option value="">Genotype</option>
                                <option value="AA">AA</option>
                                <option value="AS">AS</option>
                                <option value="AC">AC</option>
                                <option value="SS">SS</option>
                                <option value="SC">SC</option>
                            </select>
                            <x-input-error :messages="$errors->get('genotype')" class="mt-1" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" wire:click="save">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function uploadImage() {
        document.getElementById('profile_image').click();
        // console.log('here');
    }
</script>
