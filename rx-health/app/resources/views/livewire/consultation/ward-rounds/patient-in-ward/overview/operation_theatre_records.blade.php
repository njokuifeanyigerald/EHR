@props([
    'records' => [],
    'from_ward' => false,
])

<div id="operationCollapse" class="collapse show bg-white rounded bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            @include(
                'livewire.nurses-station.includes.operation_theatre_table',
                [
                    'records' => $records,
                    'from_ward' => false,
                ]
            )
        </div>
    </div>
</div>
