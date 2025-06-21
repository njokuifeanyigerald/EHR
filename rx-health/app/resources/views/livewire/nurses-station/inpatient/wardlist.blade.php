<div>
    @include('livewire.re-usable-components.patient.patient-search-input')

    @include(
        'livewire.nurses-station.includes.patient-listing-table',
        [
            'type' => $this->type,
        ]
    )
</div>
