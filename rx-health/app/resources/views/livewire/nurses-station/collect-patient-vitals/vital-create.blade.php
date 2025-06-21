<div class="row">
    <div class="col-lg-2">
        <div class="iq-card">
            <div class="doc-profile-bg bg-primary rx-profile-bg">
                <div class="add-img-user">
                    <img
                        class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill"
                        src="{{ asset('images/user/Image2.png') }}"
                        alt="profile-pic"
                    />
                </div>
            </div>
            <div class="iq-card-body">
                <div class="form-group">
                    <div class="img-extension mt-3">
                        <div class="d-inline-block">
                            <b class="text-dark">Name:</b>
                            <a href="{{ route('patients.show', 1) }}" title="View">
                                <p class="text-primary">
                                    {{ $this->visit->patient->full_name_title }}
                                </p>
                            </a>
                            <b class="text-dark">Age:</b>
                            <p>{{ $this->visit->patient->age }}</p>
                            <b class="text-dark">Visit No:</b>
                            <p>{{ $this->visit->visit_number }}</p>
                            <b class="text-dark">Gender:</b>
                            <p>{{ $this->visit->patient->sex }}</p>
                            <b class="text-dark">Doctor:</b>
                            <p>
                                {{ $this->visit->attendingOfficer->title . ' ' . $this->visit->attendingOfficer->first_name . ' ' . $this->visit->attendingOfficer->last_name }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="new-user-info">
                    <div class="row">
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
                                        <input
                                            type="number"
                                            class="form-control my-2"
                                            id="pulse"
                                            wire:model.live="pulse"
                                        />
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
                                    <label
                                        class="control-label col-sm-3 align-self-center mb-0"
                                        for="oxygen_saturation"
                                    >
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
    </div>
</div>
