<div>
    <div class="pt-4 row">
        {{-- Vertical tabs --}}
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link my-1 active"
                    id="v-pills-blood-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-blood"
                    role="tab"
                    aria-controls="v-pills-blood"
                    aria-selected="true"
                >
                    Blood Glucose Monitoring
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-record-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-record"
                    role="tab"
                    aria-controls="v-pills-record"
                    aria-selected="false"
                    tabindex="-1"
                    wire:click="dispatch('slidingScale')"
                >
                    For Sliding Scale Record
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-glucose-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-glucose"
                    role="tab"
                    aria-controls="v-pills-glucose"
                    aria-selected="false"
                    wire:click="dispatch('glucoseMonitoring')"
                    tabindex="-1"
                >
                    Glucose Monitoring
                </a>
            </div>
        </div>
        {{-- Items --}}
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                {{-- Blood Glucose Monitoring --}}
                <div
                    class="tab-pane fade show active"
                    id="v-pills-blood"
                    role="tabpanel"
                    aria-labelledby="v-pills-blood-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.glucose.blood-glucose-monitoring.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- For Sliding Scale Record --}}
                <div class="tab-pane fade" id="v-pills-record" role="tabpanel" aria-labelledby="v-pills-record-tab">
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.glucose.sliding-scale.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Glucose Monitoring --}}
                <div class="tab-pane fade" id="v-pills-glucose" role="tabpanel" aria-labelledby="v-pills-glucose-tab">
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.glucose.glucose-monitoring.index
                        :visit="$this->visit"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
