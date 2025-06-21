<div>
    <div
        wire:ignore.self
        id="add_vital{{ $this->visit->id }}"
        class="modal fade"
        tabindex="-1"
        aria-modal="true"
        role="dialog"
    >
        <div class="modal-dialog modal-lg modal-dialog-centered">
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
</div>
@script
    <script>
        $wire.on('close_add_vital_modal{{ $visit->id }}', function () {
            $('#add_vital{{ $visit->id }}').modal('hide');
        });
    </script>
@endscript
