@props([
    'observations' => [],
])

<div>
    <div id="observecCollapse" class="collapse show bg-white rounded bg-white rounded">
        <div class="card-body">
            <div class="d-flex justify-content-end my-2">
                <a href="{{ route('inpatient.graph', $this->visit_number) }}" class="btn btn-primary" target="_blank">
                    View Graph
                </a>
            </div>
            <div class="table-responsive">
                @include('livewire.nurses-station.includes.vitals', ['vitals' => $observations, 'from_ward' => false])
            </div>
        </div>
    </div>
</div>
