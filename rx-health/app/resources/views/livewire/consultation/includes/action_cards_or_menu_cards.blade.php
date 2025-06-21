<div x-show="mainDiv" x-transition class="row">
    @if ($tele_health_allowed)
        <div
            @click="mainDiv = !mainDiv; openTeleHealth = !openTeleHealth"
            class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
        >
            <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
                <div class="iq-bg-primary rounded-circle d-flex" style="width: 88px; height: 88px">
                    <i class="text-primary fa fa-headset icons-large text-dark m-auto"></i>
                    {{-- <i class="fa-solid fa-headset"></i> --}}
                </div>
                <div class="d-flex flex-column font-weight-bold mt-3">
                    <h5>Tele Health</h5>
                </div>
            </div>
        </div>
    @endif

    <div
        @click="mainDiv = !mainDiv; openMedicalNotes = !openMedicalNotes"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-primary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-notes-medical icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Medical Notes</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openDiagnosis = !openDiagnosis"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-success rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-stethoscope icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Diagnosis</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openInvestigations = !openInvestigations"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-danger rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-microscope icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Investigations</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openPrescriptions = !openPrescriptions"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-secondary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-prescription-bottle-medical icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Prescriptions</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openProcedure = !openProcedure"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-success rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-clipboard-list icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Procedure</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openNursesOrder = !openNursesOrder"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-primary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-note-sticky icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Nurses Order</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openDoctorDrawing = !openDoctorDrawing"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-warning rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-pencil icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Doctor's Drawing</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openPatientStatus = !openPatientStatus"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-dark rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-bed-pulse icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Patient Status</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openOccupationalHealth = !openOccupationalHealth"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-success rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary fa fa-file-waveform icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Occupational Health</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openPhysioTherapy = !openPhysioTherapy"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-warning rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-primary bi bi-person-wheelchair icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Physiotherapy</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openEye = !openEye"
        wire:click="dispatch('loadVisionRecords');"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-secondary rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-secondary fa fa-eye icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Eye</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openDental = !openDental"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-info rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-secondary fa fa-tooth icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Dental</h5>
            </div>
        </div>
    </div>

    <div
        @click="mainDiv = !mainDiv; openDiet = !openDiet"
        class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer mt-4"
    >
        <div class="d-flex flex-column align-items-center iq-card-body shadow rounded-4">
            <div class="iq-bg-info rounded-circle d-flex" style="width: 88px; height: 88px">
                <i class="text-secondary fa fa-spoon icons-large text-dark m-auto"></i>
            </div>
            <div class="d-flex flex-column font-weight-bold mt-3">
                <h5>Diet</h5>
            </div>
        </div>
    </div>
</div>
