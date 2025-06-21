<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_glucose">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        @include(
            'livewire.nurses-station.includes.glucose_monitoring_table',
            [
                'records' => $records,
                'from_ward' => true,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.glucose.glucose-monitoring.add-or-edit-modal')

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.glucose.glucose-monitoring.view-modal')
</div>
