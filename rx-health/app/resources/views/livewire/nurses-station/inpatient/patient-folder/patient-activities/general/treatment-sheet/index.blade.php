<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_treatment">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        @include(
            'livewire.nurses-station.includes.treatment_sheet_table',
            [
                'from_ward' => true,
                'records' => $records,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.general.treatment-sheet.add-or-edit-modal')
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.general.treatment-sheet.view-modal')
</div>
