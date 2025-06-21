@props([
    'records' => [],
])

<div id="bloodGluCollapse" class="collapse show bg-white rounded bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            @include(
                'livewire.nurses-station.includes.blood_glucose_monitoring',
                [
                    'records' => $records,
                    'from_ward' => false,
                ]
            )
        </div>
    </div>
</div>
