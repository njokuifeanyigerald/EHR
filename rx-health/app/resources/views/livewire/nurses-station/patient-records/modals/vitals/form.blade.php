@props(['edit' => false, 'showButton' => true])
<div>
    @csrf
    <div class="row">
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="bp">Blood Pressure (mmHg)</label>
            <div class="col-sm-4">
                <input type="number" class="form-control my-2" id="bp" wire:model="systolic_pressure" />
            </div>
            <div class="col-sm-1">
                <h1>/</h1>
            </div>
            <div class="col-sm-4">
                <input type="number" class="form-control my-2" id="bp" wire:model="diastolic_pressure" />
            </div>
            {{--
                <x-input-error :messages="$errors->get('systolic_pressure')" class="mt-1" />
                <x-input-error :messages="$errors->get('diastolic_pressure')" class="mt-1" />
            --}}
            <x-input-error :messages="$errors->get('blood_pressure')" class="mt-1 d-flex justify-content-center" />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">Temperature (°C)</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="temperature"
                    wire:model="temperature"
                />
            </div>
            <x-input-error :messages="$errors->get('temperature')" class="mt-1 d-flex justify-content-center" />
        </div>

        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">Respiratory Rate</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="respiratory Rate"
                    wire:model="respiratory_rate"
                />
            </div>
            <x-input-error :messages="$errors->get('respiratory_rate')" class="mt-1 d-flex justify-content-center" />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">Pulse (bpm)</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="pulse"
                    wire:model="pulse"
                />
            </div>
            <x-input-error :messages="$errors->get('pulse')" class="mt-1 d-flex justify-content-center" />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="height">Height (Cm)</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="height"
                    wire:model="height"
                />
            </div>
            <x-input-error :messages="$errors->get('height')" class="mt-1 d-flex justify-content-center" />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="weight">Weight (Kg)</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="weight"
                    id="height"
                    wire:model="weight"
                />
            </div>
            <x-input-error :messages="$errors->get('weight')" class="mt-1 d-flex justify-content-center" />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="random_blood_sugar_level">RBS</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="random_blood_sugar_level"
                    wire:model="random_blood_sugar_level"
                />
            </div>
            <x-input-error
                :messages="$errors->get('random_blood_sugar_level')"
                class="mt-1 d-flex justify-content-center"
            />
        </div>
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="fasting_blood_sugar_level">FBS</label>
            <div class="col-sm-9">
                <input
                    type="number"
                    inputmode="decimal"
                    step="0.1"
                    class="form-control my-2"
                    id="fasting_blood_sugar_level"
                    wire:model="fasting_blood_sugar_level"
                />
            </div>
            <x-input-error
                :messages="$errors->get('fasting_blood_sugar_level')"
                class="mt-1 d-flex justify-content-center"
            />
        </div>
        {{--
            <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">Blood Sugar Level</label>
            <div class="col-sm-9">
            <input
            type="number"
            inputmode="decimal"
            step="0.1"
            class="form-control my-2"
            id="sugar_level"
            wire:model="blood_sugar_level"
            />
            </div>
            <x-input-error :messages="$errors->get('blood_sugar_level')" class="mt-1 d-flex justify-content-center" />
            </div>
        --}}
        <div class="form-group row col-sm-6">
            <label class="control-label col-sm-3 align-self-center mb-0" for="oxygen_saturation">
                Oxygen Saturation
            </label>
            <div class="col-sm-9">
                <input type="number" class="form-control my-2" id="oxygen_saturation" wire:model="oxygen_saturation" />
            </div>
            <x-input-error :messages="$errors->get('oxygen_saturation')" class="mt-1 d-flex justify-content-center" />
        </div>

        {{-- comments --}}
        <div class="form-group">
            <label class="control-label col-sm-3 align-self-center mb-0" for="comments">Comments/Others</label>
            <div>
                <textarea class="form-control" id="comments" wire:model="comments"></textarea>
            </div>
            <x-input-error :messages="$errors->get('comments')" class="mt-1" />
        </div>
    </div>
    @if ($showButton)
        <div class="form-group d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary me-1 mt-2">
                {{ $edit ? 'Update' : 'Create New' }} New Vital
            </button>
        </div>
    @endif
</div>
