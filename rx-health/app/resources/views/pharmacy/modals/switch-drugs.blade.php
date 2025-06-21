{{-- Modals for switch drug prescriptions --}}
<div
    wire:ignore.self
    class="modal fade"
    id="switch_drug_prescriptions"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Switch Drug Prescription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @if ($this->visit_detail_id)
                        {{-- Reason input --}}
                        <div class="col-lg-4">
                            <div class="iq-card shadow">
                                <div class="iq-card-body">
                                    <form>
                                        <div class="form-group">
                                            <label>Reason for drug switch</label>
                                            <select
                                                class="form-select my-2"
                                                id="switch_reason"
                                                wire:model="switch_reason"
                                            >
                                                <option value="Drug not available" selected>Drug not available</option>
                                                <option value="Doctor recommendation">Doctor's recommendation</option>
                                                <option value="Patient request">Patient's request</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Table --}}
                        <div class="col-lg-8">
                            @livewire('pharmacy.patient-visit.pharmacy-drug-search', ['patient_visit' => $patient_visit, 'type' => 'switch_drug', 'visit_detail_id' => $this->visit_detail_id, 'location' => $patient_visit->session_location, 'allowPriceChange' => $this->allowPriceChange])
                            {{-- @livewire('pharmacy.patient-visit.switching-drug-search', ['patient_visit' => $patient_visit, 'type' => 'switch_drug', 'visit_detail_id' => $this->visit_detail_id, 'location' => $patient_visit->session_location]) --}}
                        </div>
                    @else
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="spinner-grow" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
