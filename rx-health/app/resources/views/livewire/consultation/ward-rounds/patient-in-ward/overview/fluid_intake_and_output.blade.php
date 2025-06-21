@props([
    'records' => [],
])

<div id="fluidCollapse" class="collapse show bg-white rounded bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            @include(
                'livewire.nurses-station.includes.fluid_intake_table',
                [
                    'records' => $records,
                    'from_ward' => false,
                ]
            )
        </div>
    </div>
</div>
