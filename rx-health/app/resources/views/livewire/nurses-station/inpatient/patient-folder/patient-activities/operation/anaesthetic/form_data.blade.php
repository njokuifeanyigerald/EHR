@props([
    'view' => false,
])

<div wire:key="operation-anaesthetic-form-data{{ $view }}">
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
            <div class="form-group">
                <label class="font-weight-bolder">Date Time</label>
                @if (! $view)
                    <input
                        @if ($view) disabled @endif
                        wire:model="date"
                        class="form-control"
                        type="datetime-local"
                        value=""
                        name="date_time"
                    />
                    <x-input-error :messages="$errors->get('date')" class="mt-1" />
                @else
                    <br />
                    {{ now()->parse(json_decode($this->medical_record?->record_data)->date ?? '')->format('F j, Y h:i A') }}
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6"></div>
    </div>
    <div class="row">
        <div class="col">
            <ul class="nav nav-light-primary nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#operationsTab{{ $view ? '-view' : '' }}">
                        <span class="nav-text">Operation</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#medicationTab{{ $view ? '-view' : '' }}">
                        <span class="nav-text">Medication</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#vitalsTab{{ $view ? '-view' : '' }}">
                        <span class="nav-text">Vitals &amp; Intubation</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#othersTab{{ $view ? '-view' : '' }}">
                        <span class="nav-text">Others</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content mt-5">
                <div
                    class="tab-pane fade active show"
                    id="operationsTab{{ $view ? '-view' : '' }}"
                    role="tabpanel"
                    aria-labelledby="operationsTab{{ $view ? '-view' : '' }}"
                >
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Pre op Assessment</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.pre_op_assessment"
                                    class="form-control"
                                    type="text"
                                    name="pre_op_assessment"
                                />
                                <x-input-error :messages="$errors->get('monitoring.pre_op_assessment')" class="mt-1" />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Post Op Instructions</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.post_op_instructions"
                                    class="form-control"
                                    type="text"
                                    name="post_op_instructions"
                                />
                                <x-input-error
                                    :messages="$errors->get('monitoring.post_op_instructions')"
                                    class="mt-1"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Operation</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.operation"
                                    class="form-control"
                                    type="text"
                                    name="operation"
                                />
                                <x-input-error :messages="$errors->get('monitoring.operation')" class="mt-1" />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Imm. Post op Condition</label>
                                <select
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.imm_post_op_condition"
                                    class="form-select"
                                    id="exampleSelectd"
                                    name="imm_post_op_condition"
                                >
                                    <option value="">Please Select</option>
                                    <option value="fully_conscious">Fully Conscious</option>
                                    <option value="semi_conscious">Semi Conscious</option>
                                    <option value="unconscious">Unconscious</option>
                                </select>
                                <x-input-error
                                    :messages="$errors->get('monitoring.imm_post_op_condition')"
                                    class="mt-1"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane fade"
                    id="medicationTab{{ $view ? '-view' : '' }}"
                    role="tabpanel"
                    aria-labelledby="medicationTab{{ $view ? '-view' : '' }}"
                >
                    <div class="row mt-2">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Recent Medication</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.recent_medication"
                                    class="form-control"
                                    type="text"
                                    name="recent_medication"
                                />
                                <x-input-error :messages="$errors->get('monitoring.recent_medication')" class="mt-1" />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Current Medication</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.current_medication"
                                    class="form-control"
                                    type="text"
                                    name="current_medication"
                                />
                                <x-input-error
                                    :messages="$errors->get('monitoring.current_medication')"
                                    class="mt-1"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Pre Medication</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.pre_medication"
                                    class="form-control"
                                    type="text"
                                    name="pre_medication"
                                />
                                <x-input-error :messages="$errors->get('monitoring.pre_medication')" class="mt-1" />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Time</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.time"
                                    class="form-control"
                                    type="time"
                                    name="time"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane fade"
                    id="vitalsTab{{ $view ? '-view' : '' }}"
                    role="tabpanel"
                    aria-labelledby="vitalsTab{{ $view ? '-view' : '' }}"
                >
                    <div class="row mt-2">
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">BP on Admission</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.bp_on_admission"
                                    class="form-control"
                                    type="text"
                                    name="bp_on_admission"
                                />

                                <x-input-error :messages="$errors->get('monitoring.bp_on_admission')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">BP at Assessment</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.bp_at_assessment"
                                    class="form-control"
                                    type="text"
                                    name="bp_at_assessment"
                                />

                                <x-input-error :messages="$errors->get('monitoring.bp_at_assessment')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">BP</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.bp"
                                    class="form-control"
                                    type="text"
                                    name="bp"
                                />
                                <x-input-error :messages="$errors->get('monitoring.bp')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Pulse</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.pulse"
                                    class="form-control"
                                    type="text"
                                    name="pulse"
                                />

                                <x-input-error :messages="$errors->get('monitoring.pulse')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Respiratory Rate</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.respiratory_rate"
                                    class="form-control"
                                    type="text"
                                    name="respiratory_rate"
                                />

                                <x-input-error :messages="$errors->get('monitoring.respiratory_rate')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Extubated</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.extubated"
                                    class="form-control"
                                    type="text"
                                    name="extubated"
                                />

                                <x-input-error :messages="$errors->get('monitoring.extubated')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Intubation</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.intubation"
                                    class="form-control"
                                    type="text"
                                    name="intubation"
                                />

                                <x-input-error :messages="$errors->get('monitoring.intubation')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane fade"
                    id="othersTab{{ $view ? '-view' : '' }}"
                    role="tabpanel"
                    aria-labelledby="othersTab{{ $view ? '-view' : '' }}"
                >
                    <div class="row mt-2">
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">ASA Status</label>
                                <select
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.asa_status"
                                    class="form-select"
                                    id="exampleSelectd"
                                    name="asa_status"
                                >
                                    <option value="">Select</option>
                                    <option value="ASA I">ASA I</option>
                                    <option value="ASA II">ASA II</option>
                                    <option value="ASA III">ASA III</option>
                                    <option value="ASA IV">ASA IV</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">IV Fluid</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.iv_fluid"
                                    class="form-control"
                                    type="text"
                                    name="iv_fluid"
                                />

                                <x-input-error :messages="$errors->get('monitoring.iv_fluid')" class="mt-1" />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Electrolyte</label>
                                <div class="row">
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <input
                                            @if ($view) disabled @endif
                                            wire:model="monitoring.electrolite_na"
                                            class="form-control"
                                            type="text"
                                            placeholder="na"
                                            name="electrolite_na"
                                        />
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <input
                                            class="form-control"
                                            type="text"
                                            placeholder="Kg"
                                            name="electrolite_kg"
                                        />
                                    </div>
                                    <div class="col-12 col-lg-4 col-md-4">
                                        <input
                                            class="form-control"
                                            type="text"
                                            placeholder="CI"
                                            name="electrolite_ci"
                                        />
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('monitoring.electrolite_na')" class="mt-1" />

                                <x-input-error :messages="$errors->get('monitoring.electrolite_kg')" class="mt-1" />

                                <x-input-error :messages="$errors->get('monitoring.electrolite_ci')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Diagnosis</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.diagnosis"
                                    class="form-control"
                                    type="text"
                                    name="diagnosis"
                                />

                                <x-input-error :messages="$errors->get('monitoring.diagnosis')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Anaesthetic Technique</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.anaesthetic_techniques"
                                    class="form-control"
                                    type="text"
                                    name="anaesthetic_techniques"
                                />

                                <x-input-error
                                    :messages="$errors->get('monitoring.anaesthetic_techniques')"
                                    class="mt-1"
                                />
                            </div>

                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Blood Required</label>
                                <div class="radio-inline">
                                    <label class="radio radio-primary">
                                        <input
                                            @if ($view) disabled @endif
                                            wire:model="monitoring.blood_required"
                                            type="radio"
                                            name="radios11"
                                            name="blood_required"
                                            value="yes"
                                        />
                                        <span>Yes</span>
                                    </label>

                                    <label class="radio radio-primary">
                                        <input
                                            @if ($view) disabled @endif
                                            wire:model="monitoring.blood_required"
                                            type="radio"
                                            name="radios11"
                                            name="blood_required"
                                            value="no"
                                        />
                                        <span>No</span>
                                    </label>
                                    <x-input-error
                                        :messages="$errors->get('monitoring.blood_required')"
                                        class="mt-1"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">HB</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.hb"
                                    class="form-control"
                                    type="text"
                                    name="hb"
                                />
                                <x-input-error :messages="$errors->get('monitoring.hb')" class="mt-1" />
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectd" class="font-weight-bolder">Sickling</label>
                                <input
                                    @if ($view) disabled @endif
                                    wire:model="monitoring.sickling"
                                    class="form-control"
                                    type="text"
                                    name="sickling"
                                />
                            </div>
                        </div>
                    </div>
                    @if (! $view)
                        <div class="form-group d-flex justify-content-end">
                            <button wire:click="saveAnaestheticRecord" type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
