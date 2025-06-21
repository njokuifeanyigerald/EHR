<div>
    <div id="PatientHistory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4">
                    <ul class="nav nav-pills mb-4" id="myTab-1" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="DateSpecificHistory-tab"
                                data-bs-toggle="tab"
                                href="#DateSpecificHistory"
                                role="tab"
                                aria-controls="DateSpecificHistory"
                                aria-selected="true"
                            >
                                Date Specific History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="CombinedHistory-tab"
                                data-bs-toggle="tab"
                                href="#CombinedHistory"
                                role="tab"
                                aria-controls="CombinedHistory"
                                aria-selected="false"
                            >
                                Combined History
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent-2">
                        {{-- Date Specific History --}}
                        <div
                            class="tab-pane fade show active"
                            id="DateSpecificHistory"
                            role="tabpanel"
                            aria-labelledby="DateSpecificHistory-tab"
                        >
                            @include('livewire.re-usable-components.patient.patient-history-date-specific', ['visits' => $visits])
                        </div>
                        {{-- Combined History --}}
                        <div
                            class="tab-pane fade"
                            id="CombinedHistory"
                            role="tabpanel"
                            aria-labelledby="CombinedHistory-tab"
                        >
                            @include('livewire.re-usable-components.patient.patient-history-combined', ['visits' => $visits])
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
