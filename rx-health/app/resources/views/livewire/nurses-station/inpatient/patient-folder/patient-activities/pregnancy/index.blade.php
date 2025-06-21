<div>
    <div class="pt-4 row">
        {{-- Vertical tabs --}}
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link my-1 active"
                    id="v-pills-foetal-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-foetal"
                    role="tab"
                    aria-controls="v-pills-foetal"
                    aria-selected="true"
                >
                    Foetal Kick Count
                </a>
            </div>
        </div>
        {{-- Items --}}
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                {{-- Foetal Kick Count --}}
                <div
                    class="tab-pane fade show active"
                    id="v-pills-foetal"
                    role="tabpanel"
                    aria-labelledby="v-pills-foetal-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.pregnancy.foetal-kick-count.index
                        :visit="$this->visit"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
