<div>
    {{-- New Anthropometric modal --}}
    <div
        wire:ignore.self
        id="new_anthropometric_params"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'New' }} Anthropometric Parameters</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new-user-info">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Diet">Diet</label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.diet"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="Diet"
                                        />
                                        <x-input-error :messages="$errors->get('parameters.diet')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Visc-Fat">
                                        Visc. Fat(%)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.visc_fat"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="Visc-Fat"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.visc_fat')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Calories">
                                        Calories
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.calories"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="Calories"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.calories')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="body_fat">
                                        Body Fat
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.body_fat"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="body_fat"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.body_fat')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bmr">B.M.R</label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.bmr"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="bmr"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.bmr')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="nct_left">
                                        MUAC
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.muac"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="nct_left"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.muac')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bmr">
                                        Body Water (%)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.body_water"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="bmr"
                                        />

                                        <x-input-error
                                            :messages="$errors->get('parameters.body_water')"
                                            class="mt-1"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="protein">
                                        Protein (gm/day)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.protein"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="protein"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.protein')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                        Height (m)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.height"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="height"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.height')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="fluid">
                                        Fluid (L/day)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.fluid"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="fluid"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.fluid')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                        Weight (kg)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.weight"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="weight"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.weight')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="na">
                                        Na (mg/day)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.na"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="na"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.na')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bmi-kg">
                                        BMI (kg/m²)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.bmi"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="bmi-kg"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.bmi')" class="mt-1" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="k">
                                        K (mg/day)
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.k"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="k"
                                        />

                                        <x-input-error :messages="$errors->get('parameters.k')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bmi-class">
                                        BMI Classification
                                    </label>
                                    <div class="col-sm-9">
                                        <select wire:model="parameters.bmi_classification" class="form-select my-2">
                                            <option selected="">Select Option</option>
                                            <option value="Under Weight">Under Weight</option>
                                            <option value="Normal Weight">Normal Weight</option>
                                            <option value="Over Weight">Over Weight</option>
                                            <option value="Obesity I">Obesity I</option>
                                            <option value="Obesity II">Obesity II</option>
                                            <option value="Obesity III">Obesity III</option>
                                        </select>

                                        <x-input-error
                                            :messages="$errors->get('parameters.bmi_classification')"
                                            class="mt-1"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="skeletal_muscle">
                                        Skeletal Muscle
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="parameters.skeletal_muscle"
                                            type="number"
                                            value=""
                                            class="form-control my-2"
                                            id="skeletal_muscle"
                                        />

                                        <x-input-error
                                            :messages="$errors->get('parameters.skeletal_muscle')"
                                            class="mt-1"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveAnthropometricParams" type="submit" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
