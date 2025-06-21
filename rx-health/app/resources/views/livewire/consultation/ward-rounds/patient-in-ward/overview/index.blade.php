<div class="row">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                @include(
                    'livewire.consultation.includes.back_button',
                    [
                        'title' => 'Medical Overview',
                        'tab_name' => 'openWardOverview',
                    ]
                )
                {{-- <h4 class="card-title">Ward Rounds Overview</h4> --}}
            </div>
        </div>
        <div class="iq-card-body">
            <ul wire:ignore class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a
                        wire:ignore.self
                        class="nav-link active"
                        id="pills-doctors-tab"
                        data-bs-toggle="pill"
                        href="#doctors"
                        role="tab"
                        aria-controls="pills-doctors"
                        aria-selected="true"
                    >
                        Doctors
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        wire:ignore.self
                        class="nav-link"
                        id="pills-nurses-tab"
                        data-bs-toggle="pill"
                        href="#nurses"
                        role="tab"
                        aria-controls="pills-nurses"
                        aria-selected="false"
                    >
                        Nurses
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent-2">
                <div
                    wire:ignore.self
                    class="tab-pane fade show active"
                    id="doctors"
                    role="tabpanel"
                    aria-labelledby="doctors-tab"
                >
                    <div class="row">
                        <div class="col-lg-2">
                            <div wire:ignore.self id="doctors-items" class="list-group">
                                <a
                                    href="#medicalTab"
                                    {{-- wire:click="dispatch('viewMedicalNotes',[{{ $this->medicalNotes }}])" --}}
                                    wire:ignore.self
                                    class="list-group-item list-group-item-action active"
                                >
                                    Medical Notes
                                </a>
                                <a wire:ignore.self href="#diagnosisTab" class="list-group-item list-group-item-action">
                                    Diagnosis
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#InvestigationsTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Investigations
                                </a>
                                <a wire:ignore.self href="#procedureTab" class="list-group-item list-group-item-action">
                                    Procedure
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#medicationTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Prescriptions
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#nursesOrdersTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Nurses Notes
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#doctorsNoteTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Doctors Orders
                                </a>
                                <a wire:ignore.self href="#drawingsTab" class="list-group-item list-group-item-action">
                                    Drawings
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 rounded rx-bg-silver py-3" style="height: 70vh; overflow-y: scroll">
                            <div
                                wire:ignore.self
                                data-bs-spy="scroll"
                                data-bs-target="#doctors-items"
                                data-bs-offset="0"
                                tabindex="0"
                            >
                                <h4 wire:ignore.self id="medicalTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#medicalCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Medical Notes</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.re-usable-components.patient.medical_records',
                                        [
                                            'visit' => $this->visit,
                                            'show_medical_notes_heading' => false,
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="diagnosisTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#diagCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Diagnosis</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.diagnosis',
                                        [
                                            'diagnoses' => $this->visit?->visitDiagnosis ?? [],
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="InvestigationsTab"></h4>
                                <div
                                    style="z-index: 1"
                                    class="card card-custom card-collapsed mt-4 rx-bg-silver"
                                    data-card="true"
                                >
                                    <div
                                        wire:ignore.self
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#labCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Investigations</h4>
                                        </div>
                                        <div>
                                            <a
                                                wire:ignore.self
                                                onclick="$('.addLab').fadeToggle('slow')"
                                                class="btn btn-sm btn-primary px-3"
                                            >
                                                <i class="fa fa-plus m-0"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.investigations',
                                        [
                                            'investigations' => $this->investigations ?? [],
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="procedureTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#procCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Procedure</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.procedure',
                                        [
                                            'procedures' => $this->visit?->visitDetails?->where('item.category.category_name', 'Medical') ?? [],
                                        ]
                                    )
                                </div>

                                <h4 wire:ignore.self id="medicationTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#medCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Prescriptions</h4>
                                        </div>
                                        <div>
                                            <a
                                                onclick="$('.addDrug').fadeToggle('slow')"
                                                class="btn btn-sm btn-primary px-3"
                                            >
                                                <i class="fa fa-plus m-0"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.prescriptions',
                                        [
                                            'prescriptions' => $this->prescriptions ?? [],
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="nursesOrdersTab"></h4>
                                <div
                                    wire:ignore.self
                                    class="card card-custom card-collapsed mt-4 rx-bg-silver"
                                    data-card="true"
                                >
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#nurseCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Nurses Notes</h4>
                                        </div>
                                        {{--
                                            <div>
                                            <a
                                            onclick="$('.addNursesOrder').fadeToggle('slow')"
                                            class="btn btn-sm btn-primary px-3"
                                            >
                                            <i class="fa fa-plus m-0"></i>
                                            </a>
                                            </div>
                                        --}}
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.nurses-notes',
                                        [
                                            'nurses_notes' => $this->medical_records?->where('record_type', 'Nurses Notes') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="doctorsNoteTab"></h4>
                                <div
                                    wire:ignore.self
                                    class="card card-custom card-collapsed mt-4 rx-bg-silver"
                                    data-card="true"
                                >
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#doctorCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Doctors Orders</h4>
                                        </div>
                                        <div>
                                            <a
                                                onclick="$('.addDoctorsNote').fadeToggle('slow')"
                                                wire:click="resetMedicalRecord"
                                                class="btn btn-sm btn-primary px-3"
                                            >
                                                <i class="fa fa-plus m-0"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.doctors_notes',
                                        [
                                            'doctors_orders' => $this->medical_records?->where('record_type', 'Nurses Order') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 wire:ignore.self id="drawingsTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#drawCollapse"
                                    >
                                        <div class="card-title mb-0">
                                            <h4 class="card-label text-dark">Doctor's Drawings</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.doctors_drawing',
                                        [
                                            'drawings' => $this->medical_records?->where('record_type', 'Doctors Drawing') ?? [],
                                        ]
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="tab-pane fade" id="nurses" role="tabpanel" aria-labelledby="nurses-tab">
                    <div class="row">
                        <div class="col-lg-2">
                            <div id="nurses-items" class="list-group">
                                <a
                                    wire:ignore.self
                                    href="#observationTab"
                                    class="list-group-item list-group-item-action active"
                                >
                                    Vitals
                                </a>
                                <a wire:ignore.self href="#treatmentTab" class="list-group-item list-group-item-action">
                                    Treatment
                                </a>
                                <a wire:ignore.self href="#fluidTab" class="list-group-item list-group-item-action">
                                    Fluid Balance
                                </a>
                                <a wire:ignore.self href="#urineTab" class="list-group-item list-group-item-action">
                                    Urine Chart
                                </a>
                                <a wire:ignore.self href="#bloodGluTab" class="list-group-item list-group-item-action">
                                    Glycaemia
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#forSlidingTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    For Sliding
                                </a>
                                <a wire:ignore.self href="#glucoseTab" class="list-group-item list-group-item-action">
                                    Glucose
                                </a>
                                <a wire:ignore.self href="#foetalTab" class="list-group-item list-group-item-action">
                                    Foetal Kick
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#anaestheticTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Anaesthetic
                                </a>
                                <a wire:ignore.self href="#operationTab" class="list-group-item list-group-item-action">
                                    Operation
                                </a>
                                <a
                                    wire:ignore.self
                                    href="#nurseNotesTab"
                                    class="list-group-item list-group-item-action"
                                >
                                    Nurses Notes
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 rounded rx-bg-silver py-3" style="height: 70vh; overflow-y: scroll">
                            <div data-bs-spy="scroll" data-bs-target="#nurses-items" data-bs-offset="0" tabindex="1">
                                <h4 id="observationTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#observecCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Observation Chart</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.observation_chart',
                                        [
                                            'observations' => $this->medical_records?->where('record_type', 'Vitals'),
                                        ]
                                    )
                                </div>
                                <h4 id="treatmentTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#treatCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Treatment Sheet</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.treatment_sheet',
                                        [
                                            'treatments' => $this->medical_records?->where('record_type', 'Treatment Sheet') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="fluidTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#fluidCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Fluid intake & Output</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.fluid_intake_and_output',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Fluid In Take And Output') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="urineTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#urineCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Urine Monitoring Chart</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.urine_monitoring_chart',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Urine Monitoring Chart') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="bloodGluTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#bloodGluCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Blood Glucose Monitoring</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.blood_glucose_monitoring',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Blood Glucose Monitoring') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="forSlidingTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#forSlidCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">For Sliding Scale Blood Glucose</h4>
                                        </div>
                                    </div>

                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.sliding_scale_glucose_monitoring',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Sliding Scale Monitoring') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="glucoseTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#gluCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Glucose Monitoring</h4>
                                        </div>
                                    </div>

                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.glucose_monitoring',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Glucose Monitoring') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="foetalTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#foetalCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Foetal Kick Count</h4>
                                        </div>
                                    </div>

                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.foetal_kick_count',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Foetal Kick Count Monitoring') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="anaestheticTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#anaestheticCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Anaesthetic Records</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.anaesthetic_records',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Anaesthetic') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="operationTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#operationCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Operation Theatre</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.operation_theatre_records',
                                        [
                                            'records' => $this->medical_records?->where('record_type', 'Operating Theatre') ?? [],
                                        ]
                                    )
                                </div>
                                <h4 id="nurseNotesTab"></h4>
                                <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                    <div
                                        class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                        data-toggle="collapse"
                                        data-target="#nurNotesCollapse"
                                    >
                                        <div class="card-title mb-0 mb-0">
                                            <h4 class="card-label text-dark">Nurses Notes</h4>
                                        </div>
                                    </div>
                                    @include(
                                        'livewire.consultation.ward-rounds.patient-in-ward.overview.nurses-notes',
                                        [
                                            'nurses_notes' => $this->medical_records?->where('record_type', 'Nurses Notes') ?? [],
                                        ]
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}
    {{-- nurses notes --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.notes.view')
    {{-- doctor orders --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.orders.view')
    {{-- treatment sheet view --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.general.treatment-sheet.view-modal')
    {{-- glucose monitoring --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.glucose.glucose-monitoring.view-modal')
    {{-- anaesthetic --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.anaesthetic.view')
    {{-- operation theatre --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.operation-theatre.view')
</div>
