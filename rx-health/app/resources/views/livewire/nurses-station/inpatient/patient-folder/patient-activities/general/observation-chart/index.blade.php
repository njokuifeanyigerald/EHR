<?php

use App\Helpers\ReferenceHelper;
?>

<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#add_or_edit_observation_chart">
            <i class="fa fa-plus"></i>
            Add New
        </button>
        <a href="{{ route('inpatient.graph', $visit->visit_number) }}" class="btn btn-primary" target="_blank">
            View Graph
        </a>
    </div>
    <div class="table-responsive">
        @include('livewire.nurses-station.includes.vitals', ['vitals' => $records, 'from_ward' => true])

        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.general.observation-chart.add-or-edit-modal')
</div>
