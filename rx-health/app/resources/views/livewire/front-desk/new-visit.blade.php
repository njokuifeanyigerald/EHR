<div class="row">
    <div class="col-md-3 col-lg-3">
        <div class="iq-card">
            <div class="doc-profile-bg bg-primary rx-profile-bg-large">
                <div class="add-img-user">
                    <img
                        class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill-large"
                        src="{{ asset($this->patient->profile_pic ?? 'images/user/Image2.png') }}"
                        alt="profile-pic"
                    />
                </div>
            </div>
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-card-body">
                    <div class="about-info mt-3 p-0">
                        <div class="row">
                            <div class="col-6">Patient Name:</div>
                            <div class="col-6">
                                {{ $this->patient->title . ' ' . $this->patient->first_name . ' ' . $this->patient->surname }}
                            </div>
                            <div class="col-6">Folder Number:</div>
                            <div class="col-6">{{ $this->patient->new_folder_number ?? 'N/A' }}</div>
                            <div class="col-6">Member Type:</div>
                            <div class="col-6">{{ Str::headline($this->patient->patient_type ?? 'N/A') }}</div>
                            <div class="col-6">Age/Sex:</div>
                            <div class="col-6">
                                ({{ $this->patient->age }},
                                <i
                                    class="{{ $this->patient->sex == 'Male' ? 'fa fa-mars text-primary ml-2' : 'fa fa-venus text-primary ml-2' }}"
                                ></i>
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
                        {{-- <form> --}}
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Attending Officer:</label>
                                <select class="form-select my-2" id="selectcountry" wire:model.live="attending_officer">
                                    @if (! $this->attending_officer)
                                        <option selected>Choose Attending Officer</option>
                                    @endif

                                    @forelse ($this->doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->title . ' ' . $doctor->last_name . ', ' . $doctor->first_name }}
                                        </option>
                                    @empty
                                        <option value="">No Attending Officer Available</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('attending_officer')" class="mt-1" />
                            </div>
                            {{-- @dd($this->visit_date) --}}
                            <div class="form-group col-md-6">
                                <label for="pno">Visit Date:</label>
                                <input
                                    type="date"
                                    class="form-control my-2"
                                    id="pno"
                                    placeholder="Visit Date"
                                    wire:model.live="visit_date"
                                    readonly
                                />
                                <x-input-error :messages="$errors->get('visit_date')" class="mt-1" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Visit Type:</label>
                                <select class="form-select my-2" id="selectcountry" wire:model.live="visit_type">
                                    @if ($this->patient->member_type == 'Guest')
                                        <option>Guest/Walk-In</option>
                                    @else
                                        <option selected>Select service type</option>
                                        @foreach ($this->services as $service)
                                            <option
                                                value="{{ $service->id }}"
                                                {{ $this->visit_type == $service->id ? 'selected' : '' }}
                                            >
                                                {{ $service->name }}
                                            </option>
                                            {{-- <option value="in_patient">In-Patient</option> --}}
                                        @endforeach
                                    @endif
                                </select>
                                <x-input-error :messages="$errors->get('visit_type')" class="mt-1" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="occupational_health_visit">Occupation Health Visit:</label>
                                <select
                                    class="form-select my-2"
                                    id="occupational_health_visit"
                                    wire:model.live="occupational_health_visit"
                                >
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                <x-input-error :messages="$errors->get('occupational_health_visit')" class="mt-1" />
                            </div>

                            @if ($this->occupational_health_visit == 'yes')
                                <div class="form-group col-md-6">
                                    <label for="occupational_health_package">Package:</label>
                                    <select
                                        class="form-select my-2"
                                        id="occupational_health_package"
                                        wire:model.live="occupational_health_package"
                                    >
                                        <option value="" selected>Select package</option>
                                        @foreach ($this->occupational_health_packages as $package)
                                            <option
                                                value="{{ $package->id }}"
                                                {{ $this->occupational_health_package == $package->id ? 'selected' : '' }}
                                            >
                                                {{ $package->name . ' - (' . $package->gender . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error
                                        :messages="$errors->get('occupational_health_package')"
                                        class="mt-1"
                                    />
                                </div>
                            @endif

                            <div class="form-group col-md-6">
                                <label>Payment Type:</label>
                                <select class="form-select my-2" id="selectcountry" wire:model.live="payment_type">
                                    @if (! $this->payment_type)
                                        <option selected>Select payment type</option>
                                    @endif

                                    @foreach ($this->payment_types as $payment_type)
                                        <option value="{{ $payment_type->code }}">{{ $payment_type->name }}</option>
                                        {{-- <option value="in_patient">In-Patient</option> --}}
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('payment_type')" class="mt-1" />
                            </div>

                            @if ($this->payment_type == 'credit_corporate')
                                <div class="form-group col-md-6">
                                    <label for="company_name">
                                        Company Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        class="form-select my-2"
                                        id="company_name"
                                        required
                                        wire:model.live="company_name"
                                    >
                                        {{-- @if (! $this->company_name) --}}
                                        <option>Select company</option>
                                        {{-- @endif --}}

                                        @foreach ($this->companies as $company)
                                            <option value="{{ $company->code }}">
                                                {{ Str::headline($company->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="staff_id">
                                        NPA Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control my-2"
                                        id="staff_id"
                                        placeholder="NPA Number"
                                        required
                                        wire:model.live="staff_id"
                                    />
                                    <x-input-error :messages="$errors->get('staff_id')" class="mt-1" />
                                </div>
                            @elseif ($this->payment_type == 'insurance')
                                <div class="form-group col-md-6">
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
                                        {{-- @if (! $this->insurance_company) --}}
                                        <option>Select Insurance Company</option>
                                        {{-- @endif --}}

                                        @foreach ($this->insuranceCompanies as $company)
                                            <option value="{{ $company->code }}">
                                                {{ Str::headline($company->name) }}
                                            </option>
                                        @endforeach

                                        {{-- <option>Select Insurance Company</option> --}}
                                    </select>
                                    <x-input-error :messages="$errors->get('insurance_company')" class="mt-1" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="member_number">
                                        Member Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="row col-12 my-2">
                                        <div class="col-md-9">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="member_number"
                                                placeholder="Member Number"
                                                required
                                                wire:model.live="member_number"
                                            />
                                        </div>
                                        <div class="col-md-3 align-content-center">
                                            <button
                                                wire:target="verifyMemberInsurance"
                                                wire:loading.attr="disabled"
                                                wire:click="verifyMemberInsurance"
                                                class="btn text-nowrap btn-{{ $this->member_verification['check'] ?? false ? ($this->member_verification['status'] == 'active' ?? false ? 'success' : 'danger') : 'warning' }}"
                                            >
                                                <i
                                                    class="fa fa-{{ $this->member_verification['check'] ?? false ? ($this->member_verification['status'] == 'active' ?? false ? 'check' : 'ban') : 'ban' }}"
                                                    wire:loading.remove
                                                    wire:target="verifyMemberInsurance"
                                                ></i>
                                                <i
                                                    class="fa fa-spinner fa-spin"
                                                    wire:loading
                                                    wire:target="verifyMemberInsurance"
                                                ></i>
                                                {{ $this->member_verification['check'] ?? false ? ($this->member_verification['status'] == 'active' ?? false ? 'Verified' : 'Not-Verified') : 'Verify' }}
                                            </button>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('member_number')" class="mt-1" />
                                </div>
                            @else
                                {{-- <div class="col-md-12"> --}}
                                <div class="form-group col-6">
                                    <label for="currency">
                                        Currency
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select my-2" id="currency" required wire:model.live="currency">
                                        @foreach ($this->currencies as $currency)
                                            <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                        @endforeach

                                        {{-- <option>Select Insurance Company</option> --}}
                                    </select>
                                    <x-input-error :messages="$errors->get('currency')" class="mt-1" />
                                </div>
                                {{-- </div> --}}
                            @endif

                            <div class="gap-2 d-flex align-items-center">
                                <div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox custom-control-inline mb-2">
                                            <input
                                                wire:model.live="emergency_visit"
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="customCheck5"
                                            />
                                            <label class="custom-control-label" for="customCheck5">
                                                Emergency Visit?
                                            </label>
                                            <x-input-error :messages="$errors->get('emergency_visit')" class="mt-1" />
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            wire:target="save,verifyMemberInsurance"
                                            wire:loading.attr="disabled"
                                            wire:click="save"
                                            class="btn btn-primary mr-4"
                                        >
                                            <i
                                                class="fa fa-spinner fa-spin"
                                                wire:loading
                                                wire:target="save,verifyMemberInsurance"
                                            ></i>
                                            Create Visit
                                        </button>
                                    </div>
                                </div>
                                @if ($this->visitExists)
                                    <div class="ml-4 text-danger pr-4">A visit already exists</div>
                                    <a href="{{ route('patients.show', $patient->id) }}" class="ml-2 btn btn-danger">
                                        View Visits
                                    </a>
                                @endif
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
