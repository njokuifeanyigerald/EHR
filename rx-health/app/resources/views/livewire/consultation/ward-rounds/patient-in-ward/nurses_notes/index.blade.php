<div class="row">
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                @include(
                    'livewire.consultation.includes.back_button',
                    [
                        'title' => 'Nurses Notes',
                        'tab_name' => 'openNursesNotes',
                    ]
                )
                {{-- <h4 class="card-title">Ward Rounds Overview</h4> --}}
            </div>
        </div>
        <div class="iq-card-body">
            @include(
                'livewire.consultation.ward-rounds.patient-in-ward.overview.nurses-notes',
                [
                    'nurses_notes' => $this->medical_records?->where('record_type', 'Nurses Notes') ?? [],
                ]
            )
        </div>
    </div>
</div>
