<div>
    @include('livewire.re-usable-components.patient.patient-search-input')

    @include(
        'livewire.nurses-station.includes.patient-listing-table',
        [
            'type' => 'all',
        ]
    )

    <livewire:nurses-station.inpatient.modals.assign-bed
        :visits="$visits"
        :availableMaleBeds="$availableMaleBeds"
        :availableFemaleBeds="$availableFemaleBeds"
        :availableChildrenBeds="$availableChildrenBeds"
    />
</div>
