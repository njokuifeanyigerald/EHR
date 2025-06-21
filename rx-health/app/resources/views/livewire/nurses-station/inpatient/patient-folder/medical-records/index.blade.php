<div>
    <div class="iq-card">
        <div class="iq-card-body pt-4 row">
            <div class="col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a
                        class="nav-link my-1 active"
                        id="v-pills-DFH-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-DFH"
                        role="tab"
                        aria-controls="v-pills-DFH"
                        aria-selected="true"
                    >
                        Date Specific History
                    </a>
                    <a
                        class="nav-link my-1"
                        id="v-pills-CombinedHistory-tab"
                        data-bs-toggle="pill"
                        href="#v-pills-CombinedHistory"
                        role="tab"
                        aria-controls="v-pills-CombinedHistory"
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Combined History
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="tab-content mt-0" id="v-pills-tabContent">
                    {{-- Date specific history --}}
                    <div
                        class="tab-pane fade show active"
                        id="v-pills-DFH"
                        role="tabpanel"
                        aria-labelledby="v-pills-DFH-tab"
                    >
                        @include(
                            'livewire.re-usable-components.patient.patient-history-date-specific',
                            [
                                'visits' => $visits,
                            ]
                        )
                    </div>
                    {{-- combined history --}}
                    <div
                        class="tab-pane fade"
                        id="v-pills-CombinedHistory"
                        role="tabpanel"
                        aria-labelledby="v-pills-CombinedHistory-tab"
                    >
                        @include(
                            'livewire.re-usable-components.patient.patient-history-combined',
                            [
                                'visits' => $visits,
                            ]
                        )
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
