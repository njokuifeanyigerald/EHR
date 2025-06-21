<div>
    <div class="pt-4 row">
        {{-- Vertical tabs --}}
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link my-1 active"
                    id="v-pills-anaesthetic-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-anaesthetic"
                    role="tab"
                    aria-controls="v-pills-anaesthetic"
                    aria-selected="true"
                >
                    Anaesthetic Record
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-theatre-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-theatre"
                    role="tab"
                    wire:click="dispatch('operatingTheatre')"
                    aria-controls="v-pills-theatre"
                    aria-selected="false"
                    tabindex="-1"
                >
                    Operating Theatre
                </a>
            </div>
        </div>
        {{-- Items --}}
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                {{-- Anaesthetic Record --}}
                <div
                    class="tab-pane fade show active"
                    id="v-pills-anaesthetic"
                    role="tabpanel"
                    aria-labelledby="v-pills-anaesthetic-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.operation.anaesthetic.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Operating Theatre --}}
                <div class="tab-pane fade" id="v-pills-theatre" role="tabpanel" aria-labelledby="v-pills-theatre-tab">
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.operation.operation-theatre.index
                        :visit="$this->visit"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
