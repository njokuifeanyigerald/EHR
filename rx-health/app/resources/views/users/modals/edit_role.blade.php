{{-- edit role modal --}}
<div id="edit_role_" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-sm-12 my-auto">
                        Role
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-md-10 col-sm-12">
                        <p class="text-dark my-auto">Super Admin</p>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label class="col-md-2 col-sm-12 my-auto">Description</label>
                    <div class="col-md-10 col-sm-12">
                        <textarea class="form-control my-2" id="exampleFormControlTextarea1" rows="2">
This is an example</textarea
                        >
                    </div>
                </div>
                <div class="row h-50 mt-3">
                    <div class="col-md-4 overflow-auto" style="max-height: 250px">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a
                                class="list-group-item list-group-item-action active"
                                id="list-consult-list"
                                data-bs-toggle="list"
                                href="#list-consult-e"
                                role="tab"
                                aria-controls="consult"
                            >
                                Consult
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-consultation-list"
                                data-bs-toggle="list"
                                href="#list-consultation-e"
                                role="tab"
                                aria-controls="consultation"
                            >
                                Consultation
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-dashboard-list"
                                data-bs-toggle="list"
                                href="#list-dashboard-e"
                                role="tab"
                                aria-controls="dashboard"
                            >
                                Dashboard
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-inpatient-list"
                                data-bs-toggle="list"
                                href="#list-inpatient-e"
                                role="tab"
                                aria-controls="inpatient"
                            >
                                Inpatient
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-insurance-list"
                                data-bs-toggle="list"
                                href="#list-insurance-e"
                                role="tab"
                                aria-controls="insurance"
                            >
                                Insurance
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-items-list"
                                data-bs-toggle="list"
                                href="#list-items-e"
                                role="tab"
                                aria-controls="items"
                            >
                                Items
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-laboratory-list"
                                data-bs-toggle="list"
                                href="#list-laboratory-e"
                                role="tab"
                                aria-controls="laboratory"
                            >
                                Laboratory
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-patients-list"
                                data-bs-toggle="list"
                                href="#list-patients-e"
                                role="tab"
                                aria-controls="patients"
                            >
                                Patients
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-payments-list"
                                data-bs-toggle="list"
                                href="#list-payments-e"
                                role="tab"
                                aria-controls="payments"
                            >
                                Payments
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-pharmacy-list"
                                data-bs-toggle="list"
                                href="#list-pharmacy-e"
                                role="tab"
                                aria-controls="pharmacy"
                            >
                                Pharmacy
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-purchases-list"
                                data-bs-toggle="list"
                                href="#list-purchases-e"
                                role="tab"
                                aria-controls="purchases"
                            >
                                Purchases
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-reconcile-list"
                                data-bs-toggle="list"
                                href="#list-reconcile-e"
                                role="tab"
                                aria-controls="reconcile"
                            >
                                Reconcile
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-reports-list"
                                data-bs-toggle="list"
                                href="#list-reports-e"
                                role="tab"
                                aria-controls="reports"
                            >
                                Reports
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-requisitions-list"
                                data-bs-toggle="list"
                                href="#list-requisitions-e"
                                role="tab"
                                aria-controls="requisitions"
                            >
                                Requisitions
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-scheduler-list"
                                data-bs-toggle="list"
                                href="#list-scheduler-e"
                                role="tab"
                                aria-controls="scheduler"
                            >
                                Scheduler
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-select2-list"
                                data-bs-toggle="list"
                                href="#list-select2-e"
                                role="tab"
                                aria-controls="select2"
                            >
                                Select2
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-settings-list"
                                data-bs-toggle="list"
                                href="#list-settings-e"
                                role="tab"
                                aria-controls="settings"
                            >
                                Settings
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-stock-list"
                                data-bs-toggle="list"
                                href="#list-stock-e"
                                role="tab"
                                aria-controls="stock"
                            >
                                Stock
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-users-list"
                                data-bs-toggle="list"
                                href="#list-users-e"
                                role="tab"
                                aria-controls="users"
                            >
                                Users
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-visits-list"
                                data-bs-toggle="list"
                                href="#list-visits-e"
                                role="tab"
                                aria-controls="visits"
                            >
                                Visits
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-vitals-list"
                                data-bs-toggle="list"
                                href="#list-vitals-e"
                                role="tab"
                                aria-controls="vitals"
                            >
                                Vitals
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-ward-list"
                                data-bs-toggle="list"
                                href="#list-ward-e"
                                role="tab"
                                aria-controls="ward"
                            >
                                Ward
                            </a>
                            <a
                                class="list-group-item list-group-item-action"
                                id="list-xray-list"
                                data-bs-toggle="list"
                                href="#list-xray-e"
                                role="tab"
                                aria-controls="xray"
                            >
                                Xray
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 overflow-auto" style="max-height: 300px">
                        <div class="tab-content" id="nav-tabContent">
                            <div
                                class="tab-pane fade show active ms-4"
                                id="list-consult-e"
                                role="tabpanel"
                                aria-labelledby="list-consult-list"
                            >
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            multiple=""
                                            name="permission_consult[]"
                                            class="custom-control-input"
                                            id="customCheck"
                                        />
                                        <label class="custom-control-label fw-bold text-primary" for="customCheck">
                                            Check all Permissions
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">
                                            Create (create.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked />
                                        <label class="custom-control-label" for="customCheck2">
                                            Destroy (destroy.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" />
                                        <label class="custom-control-label" for="customCheck3">
                                            Edit (edit.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5" checked />
                                        <label class="custom-control-label" for="customCheck5">
                                            Index (index.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck6" checked />
                                        <label class="custom-control-label" for="customCheck6">
                                            Referrals (referrals.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customChec7" checked />
                                        <label class="custom-control-label" for="customCheck7">
                                            Show (show.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8" checked />
                                        <label class="custom-control-label" for="customCheck8">
                                            Store (store.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9" />
                                        <label class="custom-control-label" for="customCheck9">
                                            Update (update.consult)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade ms-4"
                                id="list-consultation-e"
                                role="tabpanel"
                                aria-labelledby="list-consultation-list"
                            >
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input
                                            type="checkbox"
                                            multiple=""
                                            name="permission_consult[]"
                                            class="custom-control-input"
                                            id="customCheck1"
                                        />
                                        <label class="custom-control-label fw-bold text-primary" for="customCheck1">
                                            Check all Permissions
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                        <label class="custom-control-label" for="customCheck1">
                                            Create (create.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked />
                                        <label class="custom-control-label" for="customCheck2">
                                            Destroy (destroy.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3" checked />
                                        <label class="custom-control-label" for="customCheck3">
                                            Edit (edit.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" checked />
                                        <label class="custom-control-label" for="customCheck4">
                                            Index (index.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" />
                                        <label class="custom-control-label" for="customCheck4">
                                            Referrals (referrals.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" />
                                        <label class="custom-control-label" for="customCheck4">
                                            Show (show.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" />
                                        <label class="custom-control-label" for="customCheck4">
                                            Store (store.consult)
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4" />
                                        <label class="custom-control-label" for="customCheck4">
                                            Update (update.consult)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
