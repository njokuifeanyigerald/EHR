<div class="row">
    @include(
        'livewire.nurses-station.includes.patient-info',
        [
            'patient' => $this->visit?->patient ?? null,
            'visit_number' => $this->visit?->visit_number ?? null,
        ]
    )

    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link active"
                                id="activiies-tab"
                                data-bs-toggle="pill"
                                href="#patient-activities"
                                role="tab"
                                aria-controls="pills-activiies"
                                aria-selected="true"
                            >
                                Patient Activities
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link"
                                id="patient-billing-tab"
                                data-bs-toggle="pill"
                                href="#patient-billing"
                                role="tab"
                                wire:click="$dispatch('loadPatientBilling'); $dispatch('loadVisitDetails', { visit_id: {{ $this->visit->id }} })"
                                aria-controls="pills-patient-billing"
                                aria-selected="false"
                                tabindex="-1"
                            >
                                Patient Billing
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link"
                                id="medical-records-tab"
                                data-bs-toggle="pill"
                                href="#medical-records"
                                role="tab"
                                wire:click="dispatch('loadMedicalRecords')"
                                aria-controls="pills-medical-records"
                                aria-selected="false"
                                tabindex="-1"
                            >
                                Medical Records
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a
                                class="nav-link"
                                id="admissions-tab"
                                data-bs-toggle="pill"
                                href="#admissions"
                                role="tab"
                                aria-controls="pills-admissions"
                                aria-selected="false"
                                tabindex="-1"
                            >
                                Admissions
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <livewire:re-usable-components.visit-session-location-change :visit="$this->visit" />
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="tab-content mt-0" id="v-pills-tabContent">
            {{-- Patient Activities --}}
            <div
                class="row tab-pane fade show active"
                id="patient-activities"
                role="tabpanel"
                aria-labelledby="patient-activities-tab"
            >
                <livewire:nurses-station.inpatient.patient-folder.patient-activities.index :visit="$this->visit" />
            </div>
            {{-- Patient billing --}}
            <div class="row tab-pane fade" id="patient-billing" role="tabpanel" aria-labelledby="patient-billing-tab">
                <livewire:nurses-station.inpatient.patient-folder.patient-billing.index :visit="$this->visit" />
            </div>
            {{-- medical records --}}
            <div
                class="row mx-2 tab-pane fade"
                id="medical-records"
                role="tabpanel"
                aria-labelledby="medical-records-tab"
            >
                {{-- {{ $this->visit->patient_id }} --}}
                <livewire:nurses-station.inpatient.patient-folder.medical-records.index
                    :patient_id="$this->visit->patient_id"
                />
            </div>
            {{-- admissions --}}
            <div class="row mx-2 tab-pane fade" id="admissions" role="tabpanel" aria-labelledby="admissions-tab">
                <livewire:nurses-station.inpatient.patient-folder.admissions.index :visit="$this->visit" />
            </div>
        </div>
    </div>
</div>
