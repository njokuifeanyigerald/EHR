<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_blood_glucose_monitoring">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive overflow-auto">
        @include(
            'livewire.nurses-station.includes.blood_glucose_monitoring',
            [
                'feeding_types' => $feeding_types,
                'records' => $records,
                'from_ward' => true,
                'check_times' => $check_times,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.glucose.blood-glucose-monitoring.add-or-edit-modal')
</div>
