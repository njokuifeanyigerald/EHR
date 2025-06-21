<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="row my-2 col-12">
                    @forelse ($this->wards as $ward)
                        <div class="col-sm-4 rounded">
                            <div class="card iq-mb-3 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h4 class="card-title fw-bold">{{ Str::headline($ward->ward_name) }}</h4>
                                        </div>
                                        @if (! $this->from_doctor)
                                            <div class="col-lg-3 d-flex justify-content-end align-items-start">
                                                <a
                                                    class="me-2"
                                                    title="Edit"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#switch_room{{ $ward->id }}"
                                                    {{-- wire:click='openUpdateWardModal({{ $ward->id }})' --}}
                                                >
                                                    <i class="ri-repeat-line text-success icons-sm"></i>
                                                </a>
                                                <a
                                                    class="me-2"
                                                    title="Edit"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#add_ward"
                                                    wire:click="dispatch('openUpdateWardModal',[{{ $ward->id }}])"
                                                    {{-- wire:click='openUpdateWardModal({{ $ward->id }})' --}}
                                                >
                                                    <i class="ri-pencil-line text-warning icons-sm"></i>
                                                </a>
                                                <a
                                                    {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                                    wire:click='deleteWardRequest({{ $ward->id }},"{{ $ward->ward_name }}")'
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <span class="schedule-icon">
                                            <i
                                                class="ri-checkbox-blank-circle-fill {{ $ward->status == 'active' ? 'text-success' : 'text-danger' }}"
                                            ></i>
                                        </span>
                                        <span
                                            class="font-weight-bold {{ $ward->status == 'active' ? 'text-success' : 'text-danger' }}"
                                        >
                                            {{ Str::Headline($ward->status) }}
                                        </span>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <p class="text-dark">
                                                FLOOR: {{ Str::headline($ward->floor->floor_name) }}
                                            </p>
                                            <p class="text-dark">Type: {{ Str::headline($ward->ward_type) }}</p>
                                            <p class="text-dark">
                                                BEDS:
                                                {{ count($ward->beds->where('status', 'active')) }}
                                            </p>
                                            <p class="text-dark">TOTAL PATIENTS: {{ count($ward->patients) }}</p>
                                        </div>
                                        <div class="col-lg-6 ward-bed"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            @if (! $this->from_doctor)
                                                <button
                                                    type="button"
                                                    class="btn {{
                                                        count($ward->patients) == count($ward->beds->where('status', 'active'))
                                                            ? 'btn-outline-danger'
                                                            : (count($ward->patients) >= count($ward->beds->where('status', 'active')) / 2
                                                                ? 'btn-outline-warning'
                                                                : 'btn-outline-success')
                                                    }} mb-1"
                                                >
                                                    {{
                                                        count($ward->patients) == count($ward->beds->where('status', 'active'))
                                                            ? 'Full Capacity'
                                                            : (count($ward->patients) >= count($ward->beds->where('status', 'active')) / 2
                                                                ? 'Available'
                                                                : 'Empty')
                                                    }}
                                                </button>
                                            @else
                                                <a
                                                    href="{{ route('consultation.ward-patients', $ward->id) }}"
                                                    class="btn btn-primary mb-1"
                                                >
                                                    Go to Ward
                                                </a>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 d-flex justify-content-end">
                                            <p class="text-primary">
                                                <small class="text-dark">{{ $this->currency_symbol }}</small>
                                                <b class="h5">{{ number_format($ward->price, 2, '.', ',') }}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-content-center">No ward Available</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @if (! $this->from_doctor)
        {{-- <livewire:nurses-station.ward.modals.edit-ward :floors="$this->floors" :ward_id="$ward->id" :ward="$ward" /> --}}
        {{--
            <livewire:nurses-station.ward.modals.edit-ward
            :floors="$this->floors"
            :wards="$this->wards"
            :blocks="$this->blocks"
            :departmentUnits="$this->departmentUnits"
            />
        --}}
        <livewire:nurses-station.ward.modals.add-ward
            :floors="$this->floors"
            :blocks="$this->blocks"
            :wards="$this->wards"
            :departmentUnits="$this->departmentUnits"
        />
        <livewire:nurses-station.ward.modals.add-block />
        <livewire:nurses-station.ward.modals.add-floor :blocks="$this->blocks" />
        <livewire:nurses-station.ward.modals.add-bed :wards="$this->wards->where('status', 'active')" />
    @endif
</div>
@script
    <script>
        $wire.on('open_ward_edit_modal', function () {
            $('#update_ward').modal('show');
        });
    </script>
@endscript
