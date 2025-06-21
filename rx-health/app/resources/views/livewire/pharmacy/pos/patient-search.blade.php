<div>
    <h6>Guest Name:</h6>
    <div class="row my-2">
        <div class="col-lg-10 position-relative">
            <div class="input-icon input-icon-right">
                <input
                    type="search"
                    class="form-control"
                    placeholder="{{ $this->searchQuery == '' ? 'Start typing to search' : 'Searching...' }}"
                    name="searchQuery"
                    id="searchQuery"
                    wire:model.live.debounce.550ms="searchQuery"
                    wire:keydown.escape="resetSearch"
                    wire:click="resetSearch"
                />
                <span><i class="fa fa-search"></i></span>
            </div>

            <div class="position-absolute" style="z-index: 1000; width: 100%; max-height: 300px; overflow-y: auto">
                <div class="list-group" id="searchQuery">
                    @if ($this->searchQuery && $this->patients)
                        @forelse ($this->patients as $patient)
                            <a
                                href="#"
                                class="list-group-item list-group-item-action"
                                wire:click="selectPatient({{ $patient['id'] }}, '{{ $patient['first_name'] . ' ' . $patient['surname'] }}')"
                            >
                                {{ $patient['first_name'] . ' ' . $patient['surname'] }} - {{ $patient['telephone'] }}
                            </a>
                        @empty
                            <div class="list-group mt-2">
                                <a href="#" class="list-group-item list-group-item-action">No results found</a>
                            </div>
                        @endforelse
                    @endif
                </div>

                {{-- @if ($this->searchQuery == '') --}}
                {{-- <div class="list-group mt-2"> --}}
                {{-- <a href="#" class="list-group-item list-group-item-action">Start typing to search</a> --}}
                {{-- </div> --}}
                {{-- @endif --}}
            </div>
        </div>
        <div class="col-lg-2 align-content-center">
            <button
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#add_new_patient"
                title="Add Patient"
            >
                <i class="fa fa-plus me-0"></i>
            </button>
        </div>
    </div>
    <div class="mt-4">
        <h6>Total Items Added: {{ $itemsCount }}</h6>
    </div>

    @include('pharmacy.modals.add-new-patient-modal')
</div>

@script
    <script>
        // close the modal by listening to the event
        window.addEventListener('addedPatient', (event) => {
            $('#add_new_patient').modal('hide');
        });
    </script>
@endscript
