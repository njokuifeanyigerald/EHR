<div class="row">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                @include(
                    'livewire.consultation.includes.back_button',
                    [
                        'title' => 'Prescriptions',
                        'tab_name' => 'openPrescriptions',
                    ]
                )
                {{-- <h4 class="card-title">Ward Rounds Overview</h4> --}}
            </div>
        </div>
        <div class="iq-card-body">
            <div class="my-2">
                <a onclick="$('.addDrug').fadeToggle('slow')" class="btn btn-sm btn-primary px-3">
                    <i class="fa fa-plus m-0"></i>
                    Add Pescription
                </a>
            </div>
            @include(
                'livewire.consultation.ward-rounds.patient-in-ward.overview.prescriptions',
                [
                    'prescriptions' => $this->prescriptions ?? [],
                ]
            )
        </div>
    </div>
</div>
