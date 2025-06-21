<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>Patients In {{ Str::title($this->ward->ward_name) }}</h4>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.patient.patient-search-input')

    @include(
        'livewire.re-usable-components.consultation-patients-cards',
        [
            'visits' => $visits,
            'type' => 'ward_round',
        ]
    )

    {{-- <livewire:consultation.ward-rounds.modals.index /> --}}
</div>
