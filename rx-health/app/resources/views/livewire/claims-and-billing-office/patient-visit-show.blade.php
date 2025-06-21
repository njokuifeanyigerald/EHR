<div>
    {{--
        <div class="col-sm-12">
        <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
        <h4>CLAIMS: VORMAWOR ANITA (AMC-A2048-24)</h4>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
        <a href="" class="btn btn-success px-1 py-1 me-2" title="Refresh">
        <i class="fa fa-arrows-rotate"></i>
        Refresh
        </a>
        </div>
        </div>
        </div>
        </div>
    --}}

    <x-patient_info :visit="$this->selected_visit" />

    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3">
                @include('livewire.re-usable-components.patient.add-charges', ['from_claims_and_billing_office' => true])
            </div>

            <div class="col-lg-9">
                <div class="iq-card">
                    <div class="iq-card-body">
                        @include('livewire.re-usable-components.patient.visit_details_table', ['visit_details' => $this->selected_visit->visitDetails, 'from_billing_office' => true, 'visit' => $this->selected_visit])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
