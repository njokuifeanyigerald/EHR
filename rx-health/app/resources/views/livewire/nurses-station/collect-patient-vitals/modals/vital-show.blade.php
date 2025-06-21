<div>
    <div
        wire:ignore.self
        id="show_vital{{ $this->visit->id }}"
        class="modal fade"
        tabindex="-1"
        aria-modal="true"
        role="dialog"
    >
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Latest Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
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
