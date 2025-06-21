<div>
    <div wire:ignore.self id="ward_rounds_overview" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ward Rounds Overview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
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
                            class="tab-pane fade show active"
                            id="doctors"
                            role="tabpanel"
                            aria-labelledby="doctors-tab"
                        >
                            <div class="row">
                                <div class="col-lg-2">
                                    <div id="doctors-items" class="list-group">
                                        <a
                                            href="#medicalTab"
                                            {{-- wire:click="dispatch('viewMedicalNotes',[{{ $this->medicalNotes }}])" --}}
                                            class="list-group-item list-group-item-action active"
                                        >
                                            Medical Notes
                                        </a>
                                        <a href="#diagnosisTab" class="list-group-item list-group-item-action">
                                            Diagnosis
                                        </a>
                                        <a href="#labTab" class="list-group-item list-group-item-action">Lab</a>
                                        <a href="#procedureTab" class="list-group-item list-group-item-action">
                                            Procedure
                                        </a>
                                        <a href="#medicationTab" class="list-group-item list-group-item-action">
                                            Medication
                                        </a>
                                        <a href="#nursesOrdersTab" class="list-group-item list-group-item-action">
                                            Nurses Orders
                                        </a>
                                        <a href="#doctorsNoteTab" class="list-group-item list-group-item-action">
                                            Doctors Notes
                                        </a>
                                        <a href="#drawingsTab" class="list-group-item list-group-item-action">
                                            Drawings
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-10 rounded rx-bg-silver py-3"
                                    style="height: 70vh; overflow-y: scroll"
                                >
                                    <div
                                        data-bs-spy="scroll"
                                        data-bs-target="#doctors-items"
                                        data-bs-offset="0"
                                        tabindex="0"
                                    >
                                        <h4 id="medicalTab"></h4>
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
                                            <div
                                                id="medicalCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>
                                                                    Cholera,&nbsp; Shigellosis,&nbsp;
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    Cholera,&nbsp;
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    History Presenting Complaints
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    2 weeks
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    ok
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    ulcer in 2020
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    Paracetamol Tablet 500mg
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Introvert and always indoors
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span style="font-weight: bolder">
                                                                    Allergy:
                                                                    <br />
                                                                </span>
                                                                Aspirin
                                                                <span
                                                                    class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                >
                                                                    2nd October 2023
                                                                </span>
                                                                <br />
                                                                <span style="font-weight: bolder">Reaction:</span>
                                                                <span>
                                                                    <li>Vomiting</li>
                                                                </span>
                                                                <span style="font-weight: bolder">Severity:</span>
                                                                <span>Mild</span>
                                                                <br />

                                                                <span style="font-weight: bolder">Status:</span>
                                                                <span>Inactive</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                        ></div>

                                                        <div class="row d-flex justify-content-between">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">Diagnosis</h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        Peptic ulcer, site unspecified
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>

                                                                    <li style="list-style: none">
                                                                        Peptic ulcer, site unspecified: Acute with
                                                                        haemorrhage
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>

                                                                    <li style="list-style: none">
                                                                        Typhoid and paratyphoid fevers
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Investigation
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        Widal Test
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        Urine C/S
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        Widal Test
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        BF for Malaria Parasites
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Prescriptions
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Abidec Drops:
                                                                        </span>
                                                                        days
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Paracetamol Tablet 500mg:
                                                                        </span>
                                                                        2 Tab tid 5 days Oral
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Abidec Drops:
                                                                        </span>
                                                                        days
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">Procedure</h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        DENTAL-TWEEZERS
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        physio-Polar Ice gel
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        dental-upper premolar forceps
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Nurses Notes
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <p>Patient has been vommiting</p>
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Doctors Note
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <p>Please check BP regularly</p>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                    </li>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Patient Status
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="diagnosisTab"></h4>
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
                                            <div id="diagCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <table
                                                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                                                    >
                                                        <thead class="">
                                                            <tr>
                                                                <th class="text-muted">NO</th>
                                                                <th class="text-muted">DATE TIME ADDED</th>
                                                                <th class="text-muted">DIAGNOSIS</th>
                                                                <th class="text-muted">ADDED BY</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>02-10-2023 1:13pm</td>
                                                                <td>
                                                                    Cholera due to Vibrio cholerae 01, biovar cholerae
                                                                </td>
                                                                <td>Default Admin</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="labTab"></h4>
                                        <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                            <div
                                                class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                                data-toggle="collapse"
                                                data-target="#labCollapse"
                                            >
                                                <div class="card-title mb-0">
                                                    <h4 class="card-label text-dark">Lab</h4>
                                                </div>
                                                <div>
                                                    <a
                                                        onclick="$('.addLab').fadeToggle('slow')"
                                                        class="btn btn-sm btn-primary px-3"
                                                    >
                                                        <i class="fa fa-plus m-0"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="labCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <div
                                                        style="display: none"
                                                        class="card card-custom card-stretch addLab shadow-lg mb-5"
                                                    >
                                                        <div class="card-header bg-white">
                                                            <div class="card-title mb-0">
                                                                <h4 class="card-label fw-bold text-dark">Add Lab</h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group col-12 my-2">
                                                                <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                                                                    <div class="input-icon input-icon-right">
                                                                        <input
                                                                            type="search"
                                                                            class="form-control"
                                                                            placeholder="Search for Lab"
                                                                            name="item_name"
                                                                            id="item_name"
                                                                        />
                                                                        <span><i class="fa fa-search"></i></span>
                                                                    </div>
                                                                    <br />
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button class="btn btn-sm btn-primary">Add Lab</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                                                        >
                                                            <thead class="">
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME ADDED</th>
                                                                    <th class="text-muted">DIAGNOSTICS ADDED</th>
                                                                    <th class="text-muted">ADDED BY</th>
                                                                    <th class="text-muted">ACTION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="4">No data found</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="procedureTab"></h4>
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
                                            <div id="procCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                                                        >
                                                            <thead class="">
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME ADDED</th>
                                                                    <th class="text-muted">PROCEDURE ADDED</th>
                                                                    <th class="text-muted">ADDED BY</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>02-10-2023 1:13pm</td>
                                                                    <td>Dental-upper premolar forceps</td>
                                                                    <td>Mercy Iburuoma</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 id="medicationTab"></h4>
                                        <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                            <div
                                                class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                                data-toggle="collapse"
                                                data-target="#medCollapse"
                                            >
                                                <div class="card-title mb-0">
                                                    <h4 class="card-label text-dark">Medications</h4>
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
                                            <div id="medCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    @include('consultation.ward.includes.add_prescription')
                                                    <div class="table-responsive">
                                                        <table class="table cursor table-hover table-responsive-lg">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME</th>
                                                                    <th class="text-muted">MEDICATION</th>
                                                                    <th class="text-muted">ACTION</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            10:58:52
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div
                                                                            class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5 w-75"
                                                                            role="alert"
                                                                        >
                                                                            :2 Tab tid 5 days Oral
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-outline-success">
                                                                            <i class="fa fa-hand-paper-o m-0"></i>
                                                                        </a>
                                                                        <a href="#" class="btn btn-outline-danger">
                                                                            <i class="fa fa-hand-paper-o m-0"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="nursesOrdersTab"></h4>
                                        <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                            <div
                                                class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                                data-toggle="collapse"
                                                data-target="#nurseCollapse"
                                            >
                                                <div class="card-title mb-0">
                                                    <h4 class="card-label text-dark">Nurses Order</h4>
                                                </div>
                                                <div>
                                                    <a
                                                        onclick="$('.addNursesOrder').fadeToggle('slow')"
                                                        class="btn btn-sm btn-primary px-3"
                                                    >
                                                        <i class="fa fa-plus m-0"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="nurseCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <div
                                                        style="display: none"
                                                        class="card card-custom card-stretch addNursesOrder shadow-lg mb-5"
                                                    >
                                                        <div class="card-header bg-white">
                                                            <div class="card-title mb-0">
                                                                <h4 class="card-label fw-bold text-dark">
                                                                    Add Nurses order
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <textarea
                                                                        class="form-control my-2"
                                                                        id="content_insert"
                                                                        name="content_insert"
                                                                        rows="5"
                                                                        placeholder="Nurse note"
                                                                    ></textarea>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table
                                                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                                                    >
                                                        <thead class="">
                                                            <tr>
                                                                <th class="text-muted">DATE</th>
                                                                <th class="text-muted">NOTE</th>
                                                                <th class="text-muted">ADDED BY</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>02-10-2023 2:21pm</td>
                                                                <td>Monitor patient closely</td>
                                                                <td>Default Admin</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="doctorsNoteTab"></h4>
                                        <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                            <div
                                                class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                                data-toggle="collapse"
                                                data-target="#doctorCollapse"
                                            >
                                                <div class="card-title mb-0">
                                                    <h4 class="card-label text-dark">Doctors Note</h4>
                                                </div>
                                                <div>
                                                    <a
                                                        onclick="$('.addDoctorsNote').fadeToggle('slow')"
                                                        class="btn btn-sm btn-primary px-3"
                                                    >
                                                        <i class="fa fa-plus m-0"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="doctorCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <div
                                                        style="display: none"
                                                        class="card card-custom card-stretch addDoctorsNote shadow-lg mb-5"
                                                    >
                                                        <div class="card-header bg-white">
                                                            <div class="card-title mb-0">
                                                                <h4 class="card-label fw-bold text-dark">
                                                                    Add Doctors Note
                                                                </h4>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <textarea
                                                                        class="form-control my-2"
                                                                        id="doctors_note"
                                                                        name="doctors_note"
                                                                        rows="5"
                                                                        placeholder="Doctor's note"
                                                                    ></textarea>
                                                                </div>
                                                                <div class="d-flex justify-content-end">
                                                                    <button class="btn btn-primary" type="submit">
                                                                        Save
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <table
                                                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                                                    >
                                                        <thead class="">
                                                            <tr>
                                                                <th class="text-muted">DATE</th>
                                                                <th class="text-muted">NOTE</th>
                                                                <th class="text-muted">ADDED BY</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3">No data found</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="drawingsTab"></h4>
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
                                            <div id="drawCollapse" class="collapse show bg-white rounded">
                                                <div class="card-body">
                                                    <table class="table table-responsive-md table-head-custom">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-muted">DATE TIME ADDED</th>
                                                                <th class="text-muted">DRAWING</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="2">No drawing found</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nurses" role="tabpanel" aria-labelledby="nurses-tab">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div id="nurses-items" class="list-group">
                                        <a href="#observationTab" class="list-group-item list-group-item-action active">
                                            Vitals
                                        </a>
                                        <a href="#treatmentTab" class="list-group-item list-group-item-action">
                                            Treatment
                                        </a>
                                        <a href="#fluidTab" class="list-group-item list-group-item-action">
                                            Fluid Balance
                                        </a>
                                        <a href="#urineTab" class="list-group-item list-group-item-action">
                                            Urine Chart
                                        </a>
                                        <a href="#bloodGluTab" class="list-group-item list-group-item-action">
                                            Glycaemia
                                        </a>
                                        <a href="#forSlidingTab" class="list-group-item list-group-item-action">
                                            For Sliding
                                        </a>
                                        <a href="#glucoseTab" class="list-group-item list-group-item-action">Glucose</a>
                                        <a href="#foetalTab" class="list-group-item list-group-item-action">
                                            Foetal Kick
                                        </a>
                                        <a href="#anaestheticTab" class="list-group-item list-group-item-action">
                                            Anaesthetic
                                        </a>
                                        <a href="#operationTab" class="list-group-item list-group-item-action">
                                            Operation
                                        </a>
                                        <a href="#nurseNotesTab" class="list-group-item list-group-item-action">
                                            Nurses Notes
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-10 rounded rx-bg-silver py-3"
                                    style="height: 70vh; overflow-y: scroll"
                                >
                                    <div
                                        data-bs-spy="scroll"
                                        data-bs-target="#nurses-items"
                                        data-bs-offset="0"
                                        tabindex="1"
                                    >
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
                                            <div
                                                id="observecCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-end my-2">
                                                        <a
                                                            href="{{ route('inpatient.graph', 1) }}"
                                                            class="btn btn-primary"
                                                            target="_blank"
                                                        >
                                                            View Graph
                                                        </a>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 100px !important">DATE</th>
                                                                    <th class="text-muted">TEMP</th>
                                                                    <th class="text-muted">WT</th>
                                                                    <th class="text-muted">HT</th>
                                                                    <th class="text-muted">PULSE</th>
                                                                    <th style="width: 70px !important">BP</th>
                                                                    <th class="text-muted">SUGAR</th>
                                                                    <th class="text-muted">BMI REMARK</th>
                                                                    <th class="text-muted">HTN</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            10:58:52
                                                                        </span>
                                                                    </td>
                                                                    <td>37</td>
                                                                    <td>103</td>
                                                                    <td>180</td>
                                                                    <td>59</td>
                                                                    <td>120/80</td>
                                                                    <td>72</td>
                                                                    <td>
                                                                        <span>OBESE</span>
                                                                    </td>
                                                                    <td>
                                                                        <div>
                                                                            <span>High</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>Default Admin</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="treatCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center">PRESCRIPTION</th>
                                                                    <th style="text-align: center">DATE</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div
                                                                            class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5"
                                                                            role="alert"
                                                                        >
                                                                            Paracetamol Tablet 500mg 2 Tab Oral
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div
                                                                                            class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5"
                                                                                            role="alert"
                                                                                        >
                                                                                            2nd Oct,2023
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span
                                                                                            class="badge badge-primary badge-sm"
                                                                                        >
                                                                                            12:00pm -
                                                                                            <span
                                                                                                style="color: #000000"
                                                                                            >
                                                                                                (DA)
                                                                                            </span>
                                                                                            <a
                                                                                                href="#"
                                                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                                                title="Delete"
                                                                                            >
                                                                                                <i
                                                                                                    class="ri-delete-bin-line text-danger"
                                                                                                ></i>
                                                                                            </a>
                                                                                        </span>
                                                                                        ,
                                                                                        <span
                                                                                            class="badge badge-primary badge-sm"
                                                                                        >
                                                                                            6:00pm -
                                                                                            <span
                                                                                                style="color: #000000"
                                                                                            >
                                                                                                (DA)
                                                                                            </span>
                                                                                            <a
                                                                                                href="#"
                                                                                                onclick="return confirm('Are you sure you want to delete?')"
                                                                                                title="Delete"
                                                                                            >
                                                                                                <i
                                                                                                    class="ri-delete-bin-line text-danger"
                                                                                                ></i>
                                                                                            </a>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="fluidCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-bordered table-head-custom table-striped cursor table-hover"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted"></th>
                                                                    <th colspan="5">INTAKE ROUTE</th>
                                                                    <th colspan="5">OUTPUT ROUTE</th>
                                                                    <th colspan="3"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME</th>
                                                                    <th class="text-muted">ORAL</th>
                                                                    <th class="text-muted">IV</th>
                                                                    <th class="text-muted">CHLORIDE IN URINE</th>
                                                                    <th class="text-muted">IN-TAKE TOTAL</th>
                                                                    <th class="text-muted"></th>
                                                                    <th class="text-muted">URINE</th>
                                                                    <th class="text-muted">TUBE</th>
                                                                    <th class="text-muted">VOMIT</th>
                                                                    <th class="text-muted">OTHER</th>
                                                                    <th class="text-muted">CHLORIDE IN URINE</th>
                                                                    <th class="text-muted">OUTPUT TOTAL</th>
                                                                    <th class="text-muted">BALANCE</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            10:56:25
                                                                        </span>
                                                                    </td>
                                                                    <td>100 ml of ORT Suspension</td>
                                                                    <td>1000 ml of Normal Saline</td>
                                                                    <td>11 ml</td>
                                                                    <td>1111 ml</td>
                                                                    <td></td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>12</td>
                                                                    <td>0</td>
                                                                    <td>0 ml</td>
                                                                    <td>12 ml</td>
                                                                    <td>
                                                                        <span class="badge badge-success badge-sm">
                                                                            1099
                                                                        </span>
                                                                    </td>
                                                                    <td>Default Admin</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="urineCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-striped cursor table-hover"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME</th>
                                                                    <th class="text-muted">URINE PROTEIN</th>
                                                                    <th class="text-muted">URINE SUGAR</th>
                                                                    <th class="text-muted">WEIGHT</th>
                                                                    <th class="text-muted">KEROTONES</th>
                                                                    <th class="text-muted">OTHER</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            10:59:29
                                                                        </span>
                                                                    </td>
                                                                    <td>23</td>
                                                                    <td>22</td>
                                                                    <td>103</td>
                                                                    <td>22</td>
                                                                    <td>-</td>
                                                                    <td>Default Admin</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="bloodGluCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th class="text-muted"></th>
                                                                    <th colspan="3">
                                                                        <span class="badge badge-primary badge-sm">
                                                                            BREAKFAST
                                                                        </span>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <span class="badge badge-warning badge-sm">
                                                                            LUNCH
                                                                        </span>
                                                                    </th>
                                                                    <th colspan="3">
                                                                        <span class="badge badge-success badge-sm">
                                                                            SUPPER
                                                                        </span>
                                                                    </th>
                                                                    <th class="text-muted"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-muted">DATE</th>
                                                                    <th class="text-muted">FASTING</th>
                                                                    <th class="text-muted">AFTER EATING</th>
                                                                    <th class="text-muted">2 HRS POST</th>
                                                                    <th class="text-muted">FASTING</th>
                                                                    <th class="text-muted">AFTER EATING</th>
                                                                    <th class="text-muted">2 HRS POST</th>
                                                                    <th class="text-muted">FASTING</th>
                                                                    <th class="text-muted">AFTER EATING</th>
                                                                    <th class="text-muted">2 HRS POST</th>
                                                                    <th class="text-muted">SUGAR LEVEL</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 id="forSlidingTab"></h4>
                                        <div class="card card-custom card-collapsed mt-4 rx-bg-silver" data-card="true">
                                            <div
                                                class="card-header d-flex rx-bg-azure rounded mb-2 justify-content-between rx-border-light-silver"
                                                data-toggle="collapse"
                                                data-target="#forSlidCollapse"
                                            >
                                                <div class="card-title mb-0 mb-0">
                                                    <h4 class="card-label text-dark">
                                                        For Sliding Scale Blood Glucose
                                                    </h4>
                                                </div>
                                            </div>
                                            <div
                                                id="forSlidCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted"></th>
                                                                    <th class="text-muted"></th>
                                                                    <th colspan="4">
                                                                        <span class="badge badge-primary badge-sm">
                                                                            PRE BREAKFAST
                                                                        </span>
                                                                    </th>
                                                                    <th colspan="4">
                                                                        <span class="badge badge-warning badge-sm">
                                                                            PRE LUNCH
                                                                        </span>
                                                                    </th>
                                                                    <th colspan="4">
                                                                        <span class="badge badge-success badge-sm">
                                                                            PRE SUPPER
                                                                        </span>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-muted">DATE</th>
                                                                    <th class="text-muted">SL TIME</th>
                                                                    <th class="text-muted">SL</th>
                                                                    <th class="text-muted">ATP TIME</th>
                                                                    <th class="text-muted">ATP</th>
                                                                    <th class="text-muted">SL TIME</th>
                                                                    <th class="text-muted">SL</th>
                                                                    <th class="text-muted">ATP TIME</th>
                                                                    <th class="text-muted">ATP</th>
                                                                    <th class="text-muted">SL TIME</th>
                                                                    <th class="text-muted">SL</th>
                                                                    <th class="text-muted">ATP TIME</th>
                                                                    <th class="text-muted">ATP</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="gluCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME</th>
                                                                    <th class="text-muted">FBS</th>
                                                                    <th class="text-muted">RBS</th>
                                                                    <th class="text-muted">REMARKS</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="5">no data found</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="foetalCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted"></th>
                                                                    <th colspan="3">2HRS AFTER BREAKFAST</th>
                                                                    <th colspan="3">2HRS AFTER SUPPER</th>
                                                                    <th class="text-muted">TOTAL</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-muted">DATE</th>
                                                                    <th class="text-muted">START TIME</th>
                                                                    <th class="text-muted">END TIME</th>
                                                                    <th class="text-muted">KICK COUNT</th>
                                                                    <th class="text-muted">START TIME</th>
                                                                    <th class="text-muted">END TIME</th>
                                                                    <th class="text-muted">KICK COUNT</th>
                                                                    <th class="text-muted">TOTAL KICK COUNT</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="anaestheticCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE</th>
                                                                    <th class="text-muted">DIAGNOSIS</th>
                                                                    <th class="text-muted">CURRENT MEDICATION</th>
                                                                    <th class="text-muted">OPERATION</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="6">No data found</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="operationCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE TIME</th>
                                                                    <th class="text-muted">OPERATION</th>
                                                                    <th class="text-muted">SURGEON</th>
                                                                    <th class="text-muted">ANAESTHETIST</th>
                                                                    <th class="text-muted">NURSE</th>
                                                                    <th class="text-muted">USER</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            11:12:19
                                                                        </span>
                                                                    </td>
                                                                    <td></td>
                                                                    <td>Mercy Iburuoma</td>
                                                                    <td>No nurse available</td>
                                                                    <td>No nurse available</td>
                                                                    <td>Default Admin</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <div
                                                id="nurNotesCollapse"
                                                class="collapse show bg-white rounded bg-white rounded"
                                            >
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-head-custom table-striped cursor table-hover table-responsive-lg"
                                                        >
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-muted">DATE</th>
                                                                    <th class="text-muted">NOTE</th>
                                                                    <th class="text-muted">ADDED BY</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        2nd October 2023
                                                                        <span class="badge badge-primary badge-sm">
                                                                            11:12:19
                                                                        </span>
                                                                    </td>
                                                                    <td>Patient has been vomiting</td>
                                                                    <td>Default Admin</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
