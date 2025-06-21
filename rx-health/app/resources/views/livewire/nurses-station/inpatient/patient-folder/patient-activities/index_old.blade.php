<div>
    <div class="iq-card">
        <div class="iq-card-body pt-4 row">
            <div class="col-sm-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a
                        class="nav-link my-1 active"
                        id="v-pills-general-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-general"
                        role="tab"
                        aria-controls="v-pills-general"
                        aria-selected="true"
                    >
                        General
                    </a>
                    <a
                        class="nav-link my-1"
                        id="v-pills-glucose-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-glucose"
                        role="tab"
                        aria-controls="v-pills-glucose"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Glucose
                    </a>
                    <a
                        class="nav-link my-1"
                        id="v-pills-pregnancy-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-pregnancy"
                        role="tab"
                        aria-controls="v-pills-pregnancy"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Pregnancy
                    </a>
                    <a
                        class="nav-link my-1"
                        id="v-pills-operation-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-operation"
                        role="tab"
                        aria-controls="v-pills-operation"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Operation
                    </a>
                    <a
                        class="nav-link my-1"
                        id="v-pills-orders-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-orders"
                        role="tab"
                        aria-controls="v-pills-orders"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Orders & Notes
                    </a>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="tab-content mt-0" id="v-pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="v-pills-general"
                        role="tabpanel"
                        aria-labelledby="v-pills-general-tab"
                    >
                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.index
                            :visit="$this->visit"
                        />
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-pills-glucose"
                        role="tabpanel"
                        aria-labelledby="v-pills-glucose-tab"
                    >
                        <div class="accordion" id="fluid">
                            <livewire:nurses-station.inpatient.patient-folder.patient-activities.glucose.index
                                :visit="$this->visit"
                            />
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-pills-pregnancy"
                        role="tabpanel"
                        aria-labelledby="v-pills-pregnancy-tab"
                    >
                        <div class="accordion" id="fluid">
                            <livewire:nurses-station.inpatient.patient-folder.patient-activities.pregnancy.index
                                :visit="$this->visit"
                            />
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-pills-operation"
                        role="tabpanel"
                        aria-labelledby="v-pills-operation-tab"
                    >
                        <div class="accordion" id="fluid">
                            <livewire:nurses-station.inpatient.patient-folder.patient-activities.operation.index
                                :visit="$this->visit"
                            />
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                        <div class="accordion" id="fluid">
                            <livewire:nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.index
                                :visit="$this->visit"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
