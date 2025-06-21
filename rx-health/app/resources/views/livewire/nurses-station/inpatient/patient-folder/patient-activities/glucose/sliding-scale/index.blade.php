<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_sliding_scale">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive overflow-x-auto">
        @include(
            'livewire.nurses-station.includes.sliding_scale_glucose_monitoring',
            [
                'records' => $records,
                'from_ward' => true,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.glucose.sliding-scale.add-or-edit-modal')
</div>
