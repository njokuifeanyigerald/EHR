<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_anaesthetic">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        @include('livewire.nurses-station.includes.anaesthetic_table', ['records' => $records, 'from_ward' => true])
        {{ $records == [] ? '' : $records->links() }}
    </div>

    {{-- add or edit modal --}}

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.anaesthetic.add-or-edit-modal')

    {{-- view --}}
    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.operation.anaesthetic.view')
</div>
