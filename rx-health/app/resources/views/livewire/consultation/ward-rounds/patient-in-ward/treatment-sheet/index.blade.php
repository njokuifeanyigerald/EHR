<div class="row">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                @include(
                    'livewire.consultation.includes.back_button',
                    [
                        'title' => 'Treatment Sheet',
                        'tab_name' => 'openTreatmentSheet',
                    ]
                )
                {{-- <h4 class="card-title">Ward Rounds Overview</h4> --}}
            </div>
        </div>
        <div class="iq-card-body">
            @include(
                'livewire.consultation.ward-rounds.patient-in-ward.overview.treatment_sheet',
                [
                    'treatments' => $this->medical_records?->where('record_type', 'Treatment Sheet') ?? [],
                ]
            )
        </div>
    </div>
</div>
