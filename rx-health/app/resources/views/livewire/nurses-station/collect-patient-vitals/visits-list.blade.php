<div>
    <!-- Search -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Search for a patient using folder number,telephone,visit number,visit date.</p>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    placeholder="Enter Folder Number/Tel/Vist Number/Visit Date"
                                    name="item_name"
                                    wire:model.live="search"
                                />
                                <span><i class="fa fa-search"></i></span>
                                <input type="hidden" name="diagnosis_id" id="diagnosis_id" value="0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="mb-3 w-100 table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>PATIENT</th>
                                <th>VISIT No</th>
                                <th>VISIT TYPE</th>
                                <th>VISIT DATE</th>
                                <th>STATUS</th>
                                <th>Forward To</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits as $visit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>
                                        {{ $visit->patient->full_name_title }}
                                    </td>
                                    <td>{{ $visit->visit_number }}</td>
                                    <td>
                                        @if ($visit->serviceType->code == 'INP')
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                                            </span>
                                            <span class="font-weight-bold text-warning">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @elseif ($visit->serviceType->code == 'OUTP')
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-success"></i>
                                            </span>
                                            <span class="font-weight-bold text-success">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @else
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                            </span>
                                            <span class="font-weight-bold text-primary">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @endif

                                        @if ($visit->emergency_service)
                                            <i
                                                class="ri-alert-fill text-danger"
                                                data-bs-toggle="tooltip"
                                                title="Emergency Service"
                                            ></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ now()->parse($visit->visit_date)->format('jS F Y') }}
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $visit->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($visit->status) }}
                                        </button>
                                    </td>
                                    <td>
                                        <livewire:re-usable-components.visit-session-location-change
                                            :visit="$visit"
                                            :locations="$this->locations"
                                            :key="$visit->id"
                                        />
                                    </td>
                                    <td>
                                        <a
                                            href="#?"
                                            title="Create Vital"
                                            {{-- data-bs-toggle="modal" --}}
                                            {{-- data-bs-target="#add_vital{{ $visit->id }}" --}}
                                            wire:click="showAddVitalModal('{{ $visit->visit_number }}','{{ $visit->patient->id }}')"
                                        >
                                            <i class="ri-add-line text-success icons-base"></i>
                                        </a>
                                        <a
                                            href="#?"
                                            title="View Latest Vital"
                                            {{-- data-bs-toggle="modal" --}}
                                            {{-- data-bs-target="#show_vital{{ $visit->vitals->first()->id }}" data-bs-target="#show_vital{{ $visit->id }}" --}}
                                            wire:click="openShowLatestVitalModal('{{ $visit->visit_number }}')"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                        <a
                                            href="#?"
                                            title="Edit Latest Vital"
                                            data-bs-toggle="modal"
                                            {{-- data-bs-target="#edit_vital{{ $visit->vitals->first()->id }}" data-bs-target="#edit_vital{{ $visit->id }}" --}}
                                            wire:click="openEditLatestVitalModal('{{ $visit->visit_number }}')"
                                        >
                                            <i class="me-2 ri-edit-line text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- modals --}}
                                {{--
                                    <livewire:nurses-station.collect-patient-vitals.modals.vital-create :visit="$visit" />
                                    <livewire:nurses-station.collect-patient-vitals.modals.vital-show :vital="$visit->vitals->first()"
                                    :visit="$visit" />
                                    <livewire:nurses-station.collect-patient-vitals.modals.vital-edit :vital="$visit->vitals->first()"
                                    :visit="$visit" />
                                --}}
                            @empty
                                <tr class="text-center">
                                    <td colspan="12" class="w-100 text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $visits->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}

    {{-- add vital --}}
    <div wire:ignore.self id="add_vital" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <form class="form-horizontal" wire:submit="saveVital">
                        @csrf
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                    Blood Pressure (mmHg)
                                </label>
                                <div class="col-sm-4">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="bp"
                                        wire:model.live="systolic_pressure"
                                    />
                                </div>
                                <div class="col-sm-1">
                                    <h1>/</h1>
                                </div>
                                <div class="col-sm-4">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="bp"
                                        wire:model.live="diastolic_pressure"
                                    />
                                </div>
                                {{--
                                    <x-input-error :messages="$errors->get('systolic_pressure')" class="mt-1" />
                                    <x-input-error :messages="$errors->get('diastolic_pressure')" class="mt-1" />
                                --}}
                                <x-input-error
                                    :messages="$errors->get('blood_pressure')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">
                                    Temperature (°C)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="temperature"
                                        wire:model.live="temperature"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('temperature')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">
                                    Respiratory Rate
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="respiratory Rate"
                                        wire:model.live="respiratory_rate"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('respiratory_rate')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                    Pulse (bpm)
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control my-2" id="pulse" wire:model.live="pulse" />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('pulse')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                    Height (Cm)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="height"
                                        wire:model.live="height"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('height')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                    Weight (Kg)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="weight"
                                        id="height"
                                        wire:model.live="weight"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('weight')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                    Blood Sugar Level
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="sugar_level"
                                        wire:model.live="blood_sugar_level"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('blood_sugar_level')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="oxygen_saturation">
                                    Oxygen Saturation
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="oxygen_saturation"
                                        wire:model.live="oxygen_saturation"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('oxygen_saturation')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="form-group d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary me-1 mt-2">Create New Vital</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- show vital --}}
    <div wire:ignore.self id="show_vital" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Latest Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mt-5 mb-5 mx-3">
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-thermometer-half icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->temperature ? $this->temperature . ' ℃' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Temperature</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-balance-scale icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->weight ? $this->weight . ' kg' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Weight</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-arrows-v icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->height ? $this->height . ' cm' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Height</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center mb-5">
                                <div class="me-3">
                                    <i class="text-primary fa fa-heartbeat icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->oxygen_saturation ? $this->oxygen_saturation . ' bpm' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Pulse</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-heart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->blood_pressure ? $this->blood_pressure . ' mmHg' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Blood Pressure</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-line-chart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ $this->blood_sugar_level ? $this->blood_sugar_level . ' BGL' : 'N/A' }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Blood Sugar Level</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-area-chart icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ Str::Headline($this->bmi_state) }}
                                        </b>
                                    </span>
                                    <span class="text-muted">BMI</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="text-primary fa fa-stethoscope icons-base"></i>
                                </div>
                                <div class="d-flex flex-column font-weight-bold">
                                    <span class="text-dark mb-1 rx-font-size-lg">
                                        <b>
                                            {{ Str::Headline($this->pressure_state) }}
                                        </b>
                                    </span>
                                    <span class="text-muted">Hypertension</span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="mt-5"></div> --}}
                        {{--
                            <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                            <div class="me-3">
                            <i class="text-primary fa fa-stethoscope icons-base">
                            </i>
                            </div>
                            <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 rx-font-size-lg">
                            <b>
                            {{ Str::Headline($this->pressure_state) }}
                            </b>
                            </span>
                            <span class="text-muted">Respiratory Rate</span>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3 col-6">
                            <div class="d-flex align-items-center">
                            <div class="me-3">
                            <i class="text-primary fa fa-stethoscope icons-base">
                            </i>
                            </div>
                            <div class="d-flex flex-column font-weight-bold">
                            <span class="text-dark mb-1 rx-font-size-lg">
                            <b>
                            {{ Str::Headline($this->pressure_state) }}
                            </b>
                            </span>
                            <span class="text-muted">Oxygen Saturation</span>
                            </div>
                            </div>
                            </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- edit vitals --}}
    <div wire:ignore.self id="edit_vital" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <form class="form-horizontal" wire:submit="updateVital">
                        @csrf
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                    Blood Pressure (mmHg)
                                </label>
                                <div class="col-sm-4">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="bp"
                                        wire:model.live="systolic_pressure"
                                    />
                                </div>
                                <div class="col-sm-1">
                                    <h1>/</h1>
                                </div>
                                <div class="col-sm-4">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="bp"
                                        wire:model.live="diastolic_pressure"
                                    />
                                </div>
                                {{--
                                    <x-input-error :messages="$errors->get('systolic_pressure')" class="mt-1" />
                                    <x-input-error :messages="$errors->get('diastolic_pressure')" class="mt-1" />
                                --}}
                                <x-input-error
                                    :messages="$errors->get('blood_pressure')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">
                                    Temperature (°C)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="temperature"
                                        wire:model.live="temperature"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('temperature')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">
                                    Respiratory Rate
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="respiratory Rate"
                                        wire:model.live="respiratory_rate"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('respiratory_rate')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                    Pulse (bpm)
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control my-2" id="pulse" wire:model.live="pulse" />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('pulse')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                    Height (Cm)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="height"
                                        wire:model.live="height"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('height')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                    Weight (Kg)
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="weight"
                                        id="height"
                                        wire:model.live="weight"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('weight')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                    Blood Sugar Level
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="sugar_level"
                                        wire:model.live="blood_sugar_level"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('blood_sugar_level')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="oxygen_saturation">
                                    Oxygen Saturation
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="number"
                                        class="form-control my-2"
                                        id="oxygen_saturation"
                                        wire:model.live="oxygen_saturation"
                                    />
                                </div>
                                <x-input-error
                                    :messages="$errors->get('oxygen_saturation')"
                                    class="mt-1 d-flex justify-content-center"
                                />
                            </div>
                        </div>
                        <div class="form-group d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary me-1 mt-2">Update Vital</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('close_add_vital_modal', function () {
            $('#add_vital').modal('hide');
        });
        $wire.on('open_add_vital_modal', function () {
            $('#add_vital').modal('show');
        });
        $wire.on('close_edit_vital_modal', function () {
            $('#edit_vital').modal('hide');
        });
        $wire.on('open_edit_vital_modal', function () {
            $('#edit_vital').modal('show');
        });
        $wire.on('open_show_vital_modal', function () {
            $('#show_vital').modal('show');
        });
    </script>
@endscript
