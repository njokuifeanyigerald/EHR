<div>
    <div class="iq-card">
        <div class="iq-card-body pt-4 row">
            <div class="col-sm-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a
                        class="nav-link my-1 active"
                        id="curAdmission-tab"
                        data-bs-toggle="pill"
                        href="#curAdmission"
                        role="tab"
                        aria-controls="curAdmission"
                        aria-selected="true"
                    >
                        Current
                    </a>
                    <a
                        class="nav-link my-1"
                        id="prevAdmission-tab"
                        data-bs-toggle="pill"
                        href="#prevAdmission"
                        role="tab"
                        aria-controls="prevAdmission"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Previous
                    </a>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="tab-content mt-0" id="v-pills-tabContent">
                    {{-- current --}}
                    <div
                        class="tab-pane fade show active"
                        id="curAdmission"
                        role="tabpanel"
                        aria-labelledby="curAdmission-tab"
                    >
                        @include(
                            'livewire.nurses-station.inpatient.patient-folder.includes.admissions-table',
                            [
                                'type' => 'current',
                                'admissions' => $current_admissions,
                            ]
                        )
                    </div>
                    {{-- Pevious --}}
                    <div class="tab-pane fade" id="prevAdmission" role="tabpanel" aria-labelledby="prevAdmission-tab">
                        @include(
                            'livewire.nurses-station.inpatient.patient-folder.includes.admissions-table',
                            [
                                'type' => 'previous',
                                'admissions' => $previous_admissions,
                            ]
                        )
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
