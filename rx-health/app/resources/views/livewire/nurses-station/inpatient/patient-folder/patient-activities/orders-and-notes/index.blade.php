<div>
    <div class="pt-4 row">
        {{-- Vertical tabs --}}
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link my-1 active"
                    id="v-pills-orders-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-orders"
                    role="tab"
                    aria-controls="v-pills-orders"
                    aria-selected="true"
                >
                    Doctors Orders
                </a>
                <a
                    class="nav-link my-1"
                    id="v-pills-notes-tab"
                    data-bs-toggle="pill"
                    href="#v-pills-notes"
                    wire:click="dispatch('nursesNotes')"
                    role="tab"
                    aria-controls="v-pills-notes"
                    aria-selected="false"
                    tabindex="-1"
                >
                    Nurses Notes
                </a>
            </div>
        </div>
        {{-- Items --}}
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                {{-- Doctors Orders --}}
                <div
                    class="tab-pane fade show active"
                    id="v-pills-orders"
                    role="tabpanel"
                    aria-labelledby="v-pills-orders-tab"
                >
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.orders.index
                        :visit="$this->visit"
                    />
                </div>
                {{-- Nurses Notes --}}
                <div class="tab-pane fade" id="v-pills-notes" role="tabpanel" aria-labelledby="v-pills-notes-tab">
                    <livewire:nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.notes.index
                        :visit="$this->visit"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
