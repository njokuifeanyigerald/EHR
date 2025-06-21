<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_operation_theatre">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        @include('livewire.nurses-station.includes.operation_theatre_table', ['records' => $records, 'from_ward' => true])
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.operation-theatre.add-or-edit-modal')

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.operation-theatre.view')
</div>
