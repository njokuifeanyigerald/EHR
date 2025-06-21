<div class="row">
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
                            <a href="{{ route('patients.show', $this->vital->visit->patient->id) }}" title="View">
                                <p class="text-primary">
                                    {{ $this->vital->visit->patient->title . ' ' . $this->vital->visit->patient->surname . ' ' . $this->vital->visit->patient->first_name }}
                                </p>
                            </a>
                            <b class="text-dark">Age:</b>
                            <p>{{ $this->vital->visit->patient->age }}</p>
                            <b class="text-dark">Visit No:</b>
                            <p>{{ $this->vital->visit->visit_number }}</p>
                            <b class="text-dark">Gender:</b>
                            <p>{{ $this->vital->visit->patient->sex }}</p>
                            <b class="text-dark">Doctor:</b>
                            <p>
                                {{ $this->vital->visit->attendingOfficer->title . ' ' . $this->vital->visit->attendingOfficer->first_name . ' ' . $this->vital->visit->attendingOfficer->last_name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4 mb-2">
                    <a
                        href="tel:{{ $this->vital->visit->patient->telephone }}"
                        class="btn btn-outline-primary rounded-pill me-2 rx-font-size-sm"
                    >
                        <i class="fa fa-phone"></i>
                        Call
                    </a>
                    <a
                        href="{{ route('scheduler.sms') }}"
                        target="_blank"
                        class="btn btn-primary rounded-pill rx-font-size-sm text-white"
                    >
                        <i class="ri-message-2-fill"></i>
                        SMS
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row mt-5 mb-5 mx-3">
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-thermometer-half icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->temperature ? $this->temperature . ' ℃' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Temperature</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-balance-scale icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->weight ? $this->weight . ' kg' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Weight</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-arrows-v icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->height ? $this->height . ' cm' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Height</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-heartbeat icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->oxygen_saturation ? $this->oxygen_saturation . ' bpm' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Pulse</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-heart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->blood_pressure ? $this->blood_pressure . ' mmHg' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Blood Pressure</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-line-chart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->blood_sugar_level ? $this->blood_sugar_level . ' BGL' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Blood Sugar Level</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-area-chart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ Str::Headline($this->bmi_state) }}
                                        </b>
                                    </span>
                                    <span class="text-muted">BMI</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-stethoscope icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ Str::Headline($this->pressure_state) }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Hypertension</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
