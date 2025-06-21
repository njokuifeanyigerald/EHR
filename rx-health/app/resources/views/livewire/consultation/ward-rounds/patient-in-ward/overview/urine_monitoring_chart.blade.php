@props([
    'records' => [],
])

<div id="urineCollapse" class="collapse show bg-white rounded bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            @include('livewire.nurses-station.includes.urine_monitoring_chart', ['records' => $records, 'from_ward' => false])
        </div>
    </div>
</div>
