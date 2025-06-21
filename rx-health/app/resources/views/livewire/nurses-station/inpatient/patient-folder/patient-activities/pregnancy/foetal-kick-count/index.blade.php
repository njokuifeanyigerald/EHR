<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_foetal_kick_count">
            <i class="fa fa-plus"></i>
            New Record
        </button>
    </div>
    <div class="table-responsive">
        @include(
            'livewire.nurses-station.includes.foetal_kick_count_table',
            [
                'records' => $records,
                'from_ward' => true,
                'kick_check_types' => $this->kick_check_types,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.pregnancy.foetal-kick-count.add-or-edit-modal')
</div>
