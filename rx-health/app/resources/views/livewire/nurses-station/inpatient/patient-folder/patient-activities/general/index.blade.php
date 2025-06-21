<div>
    <div class="pt-4 row">
        {{-- Vertical tabs --}}
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link my-1 active"
                    id="v-pills-fluid-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-fluid"
                    role="tab"
                    aria-controls="v-pills-fluid"
                    aria-selected="true"
                >
                    Fluid Intake & Output Chart
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-observation-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-observation"
                    role="tab"
                    aria-controls="v-pills-observation"
                    aria-selected="false"
                    tabindex="-1"
                    wire:click="dispatch('observationChart')"
                >
                    Observation chart
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-urine-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-urine"
                    role="tab"
                    aria-controls="v-pills-urine"
                    aria-selected="false"
                    wire:click="dispatch('urineMonitoringChart')"
                    tabindex="-1"
                >
                    Urine Monitoring chart
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-treatment-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-treatment"
                    wire:click="dispatch('treatmentSheet')"
                    role="tab"
                    aria-controls="v-pills-treatment"
                    aria-selected="false"
                    tabindex="-1"
                >
                    Treatment sheet
                </a>
            </div>
        </div>

        {{-- Items --}}
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                {{-- Fuild intake & Output chart --}}
                <div
                    class="tab-pane fade show active"
                    id="v-pills-fluid"
                    role="tabpanel"
                    aria-labelledby="v-pills-fluid-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.fluid-in-take-and-output-chart.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Observation chart --}}
                <div
                    class="tab-pane fade"
                    id="v-pills-observation"
                    role="tabpanel"
                    aria-labelledby="v-pills-observation-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.observation-chart.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Urine Monitoring chart --}}
                <div class="tab-pane fade" id="v-pills-urine" role="tabpanel" aria-labelledby="v-pills-urine-tab">
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.urine-monitoring-chart.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Treatment sheet --}}
                <div
                    class="tab-pane fade"
                    id="v-pills-treatment"
                    role="tabpanel"
                    aria-labelledby="v-pills-treatment-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.treatment-sheet.index
                        :visit="$this->visit"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
