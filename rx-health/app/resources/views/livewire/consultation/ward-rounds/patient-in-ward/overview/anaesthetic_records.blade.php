@props([
    'records' => [],
])

<div id="anaestheticCollapse" class="collapse show bg-white rounded bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            @include(
                'livewire.nurses-station.includes.anaesthetic_table',
                [
                    'records' => $records,
                    'from_ward' => false,
                ]
            )
        </div>
    </div>
</div>
