<div>
    <div class="d-flex justify-content-end my-2">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_or_edit_urine_monitoring">
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        @include(
            'livewire.nurses-station.includes.urine_monitoring_chart',
            [
                'records' => $records,
                'from_ward' => true,
            ]
        )
        {{ $records == [] ? '' : $records->links() }}
    </div>

    {{--
        <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.urine-monitoring-chart.add-or-edit-modal
        :visit="$this->visit"
        />
    --}}

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.general.urine-monitoring-chart.add-or-edit-modal')
</div>
