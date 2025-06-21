@props([
    'treatments' => [],
])

<div>
    <div wire:ignore.self id="treatCollapse" class="collapse show bg-white rounded bg-white rounded">
        <div class="card-body">
            <div class="table-responsive">
                @include(
                    'livewire.nurses-station.includes.treatment_sheet_table',
                    [
                        'from_ward' => false,
                        'records' => $treatments,
                    ]
                )
            </div>
        </div>
    </div>
</div>
