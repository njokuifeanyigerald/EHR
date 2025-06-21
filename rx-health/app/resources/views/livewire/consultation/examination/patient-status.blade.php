<div>
    {{--
        <ul class="nav nav-light-primary nav-pills">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#statusTab">
        <span class="nav-text">Patient Status</span>
        </a>
        </li>
        </ul>
    --}}

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="statusTab" role="tabpanel" aria-labelledby="statusTab">
            {{-- <form id="save_patient_8" action=""> --}}
            {{-- @csrf --}}
            <div class="row">
                <div class="col">
                    <label for="exampleTextarea">Select Patient Status</label>
                    <select
                        @if ($this->visit->sign != 'No') @disabled(true) @endif
                        class="form-select"
                        id="patient_status"
                        name="patient_status"
                        wire:model.live="status"
                    >
                        <option value="">Select status</option>
                        <option value="discharged_completely">Discharge Completely</option>
                        <option value="discharged_review">Discharged for Review</option>
                        <option value="pending_diagnostic">Pending Investigation Result</option>
                        <option value="pending_observation">Detained</option>
                        <option value="admitted">Admit to ward</option>
                        <option value="dead">Pronounced Dead</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-1" />
                </div>
            </div>
            @if ($this->visit->sign == 'No')
                @if ($this->status == 'discharged_completely')
                    <div class="form-check mt-3">
                        <div class="form-check form-switch">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="flexSwitchCheckDefault"
                                wire:model.live="sign"
                            />
                            <label class="form-check-label" for="flexSwitchCheckDefault">Sign Consultation</label>
                        </div>
                    </div>
                @endif

                @if ($this->status == 'discharged_review')
                    <div id="display_appointment" class="my-4">
                        <label>
                            <h4>Appointment</h4>
                        </label>
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Date</label>
                                <input
                                    type="datetime-local"
                                    class="form-control"
                                    name="appointment_date"
                                    id="appointment_date"
                                    min="{{ now()->format('Y-m-d\TH:i') }}"
                                    wire:model="appointment_date"
                                />
                                <x-input-error :messages="$errors->get('appointment_date')" class="mt-1" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">Description</label>
                                <textarea
                                    name="appointment_desc"
                                    id=""
                                    cols="3"
                                    rows="3"
                                    class="form-control"
                                    wire:model="description"
                                ></textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                @elseif ($this->status == 'dead')
                    {{-- time of death --}}
                    <div class="form-group mt-2">
                        <label for="time_of_death">Time of Death</label>
                        <input
                            class="my-2 form-control"
                            type="datetime-local"
                            name="time_of_death"
                            id="time_of_death"
                            wire:model.live="time_of_death"
                        />
                        <x-input-error :messages="$errors->get('time_of_death')" class="mt-1" />
                    </div>
                    {{-- cause of death --}}
                    <div class="form-group mt-2">
                        <label for="cause_of_death">Cause of Death</label>
                        <input
                            class="my-2 form-control"
                            type="text"
                            name="cause_of_death"
                            id="cause_of_death"
                            wire:model.live="cause_of_death"
                        />
                        <x-input-error :messages="$errors->get('cause_of_death')" class="mt-1" />
                    </div>
                @endif
            @endif

            {{-- </form> --}}

            <div class="row mt-3">
                <div class="col">
                    <button
                        data-bs-toggle="modal"
                        data-bs-target="#summaryConsultationModal"
                        wire:click="viewCurrentConsultationSummary"
                        type="button"
                        class="btn btn-sm btn-primary"
                    >
                        Consultation Summary
                    </button>

                    @if ($this->visit->sign == 'No')
                        <button wire:click="savePatientStatus" class="btn btn-sm btn-primary" type="submit">
                            Save Consultation
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('livewire.consultation.modals.consultation-summary')
</div>
