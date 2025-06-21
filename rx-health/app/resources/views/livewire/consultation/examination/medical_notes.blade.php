<div>
    <div class="iq-card-body">
        <div class="row">
            {{-- vertical Tabs --}}
            <div class="col-sm-3 border-end border-muted">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a
                        class="nav-link p-1 mb-2 active"
                        id="presenting-complaints-tab"
                        data-bs-toggle="pill"
                        href="#presenting-complaints"
                        role="tab"
                        aria-controls="presenting-complaints"
                        wire:ignore.self
                        aria-selected="true"
                    >
                        Presenting Complaints
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="complaints-history-tab"
                        data-bs-toggle="pill"
                        href="#complaints-history"
                        role="tab"
                        aria-controls="complaints-history"
                        aria-selected="false"
                        tabindex="-1"
                        wire:ignore.self
                    >
                        History of Complaints
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="past-medical-history-tab"
                        data-bs-toggle="pill"
                        href="#past-medical-history"
                        role="tab"
                        aria-controls="past-medical-history"
                        aria-selected="false"
                        wire:ignore.self
                        tabindex="-1"
                    >
                        Past Medical History
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="drug-history-tab"
                        data-bs-toggle="pill"
                        href="#drug-history"
                        role="tab"
                        aria-controls="drug-history"
                        aria-selected="false"
                        wire:ignore.self
                        tabindex="-1"
                    >
                        Drug History
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="social-history-tab"
                        data-bs-toggle="pill"
                        href="#social-history"
                        role="tab"
                        aria-controls="social-history"
                        aria-selected="false"
                        wire:ignore.self
                        tabindex="-1"
                    >
                        Social History
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="allergies-tab"
                        data-bs-toggle="pill"
                        href="#allergies"
                        role="tab"
                        aria-controls="allergies"
                        wire:ignore.self
                        aria-selected="false"
                        tabindex="-1"
                    >
                        Allergies
                    </a>
                    <a
                        class="nav-link p-1 mb-2"
                        id="review-system-tab"
                        data-bs-toggle="pill"
                        href="#review-system"
                        role="tab"
                        aria-controls="review-system"
                        aria-selected="false"
                        wire:ignore.self
                        tabindex="-1"
                    >
                        Review Of Systems
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="tab-content mt-0" id="v-pills-tabContent">
                    <div
                        class="tab-pane fade show active"
                        id="presenting-complaints"
                        role="tabpanel"
                        aria-labelledby="presenting-complaints-tab"
                        wire:ignore.self
                    >
                        <form class="email-form" wire:submit="savePresentingComplaintsForm">
                            <div wire:ignore class="form-group">
                                <label class="col-form-label col-12">Select Presenting Complaints</label>
                                <div wire:ignore>
                                    <div wire:ignore class="col-lg-12 mb-3">
                                        <select
                                            wire:key="presentComplains12"
                                            id="presentComplains"
                                            class="select2 form-control"
                                            name="presenting_compliant[]"
                                            multiple="multiple"
                                        ></select>
                                        <small class="text-danger" id="presenting_compliant_error">
                                            NOTE: Saving empty value will delete all previous data
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @if ($this->visit->sign == 'No')
                                <div class="d-flex justify-content-end my-2 gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    @if ($ai_model_allowed)
                                        <a
                                            class="btn btn-primary"
                                            wire:loading.attr="disabled"
                                            wire:click="generateAIDiagnosis"
                                        >
                                            <i
                                                wire:loading.remove
                                                wire:target="generateAIDiagnosis"
                                                class="fa fa-microchip"
                                            ></i>

                                            <i
                                                wire:loading
                                                wire:target="generateAIDiagnosis"
                                                class="fa fa-spinner fa-spin"
                                            ></i>
                                            AI Diagnosis
                                        </a>
                                        @if ($this->ai_diagnosis)
                                            <a
                                                data-bs-toggle="modal"
                                                data-bs-target="#ai-diagnosis-modal"
                                                class="btn btn-secondary"
                                            >
                                                <i class="fa fa-eye"></i>
                                                View AI Diagnosis
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            @endif
                        </form>
                        @if (! empty(json_decode($this->presenting_complaintsModel?->record_data)))
                            <div class="col-12 flex-wrap">
                                {{ $this->presenting_complaintsModel->updated_at->format('jS F Y') }}
                                -
                                @foreach (json_decode($this->presenting_complaintsModel->record_data) as $data)
                                    <span wire:key="{{ $loop->index }}" class="badge badge-secondary mb-1">
                                        {{ $data }}
                                        &nbsp;
                                        @if ($this->visit->sign == 'No')
                                            <a
                                                {{-- href="#" --}}
                                                wire:click="deletePresentingComplaint({{ $loop->index }})"
                                                {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                                title="Delete"
                                            >
                                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                            </a>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div
                        class="tab-pane fade"
                        id="complaints-history"
                        role="tabpanel"
                        aria-labelledby="complaints-history-tab"
                        wire:ignore.self
                    >
                        <div class="form-group">
                            <label for="presentingComplaints">History of Presenting Complaints</label>
                            <textarea
                                class="form-control"
                                name="complaint_history"
                                id="complaint_history"
                                onkeyup=""
                                wire:model.live="history_of_complaints"
                            ></textarea>
                            <small class="text-danger" id="presenting_compliant_error">
                                NOTE: Saving empty value will delete all previous data
                            </small>
                            @if ($this->visit->sign == 'No')
                                <div class="d-flex justify-content-end my-2">
                                    <button class="btn btn-primary" wire:click="saveHistoryOfComplaints">Save</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="past-medical-history"
                        role="tabpanel"
                        aria-labelledby="past-medical-history-tab"
                        wire:ignore.self
                    >
                        <div class="form-group">
                            <label for="exampleTextarea">Past Medical History</label>
                            <textarea
                                class="form-control"
                                id="past_medical_history"
                                name="past_medical_history"
                                onkeyup=""
                                wire:model.live="past_medical_history"
                            ></textarea>
                            <small class="text-danger" id="presenting_compliant_error">
                                NOTE: Saving empty value will delete all previous data
                            </small>
                            @if ($this->visit->sign == 'No')
                                <div class="d-flex justify-content-end my-2">
                                    <button class="btn btn-primary" wire:click="savePastMedicalHistory">Save</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="drug-history"
                        role="tabpanel"
                        aria-labelledby="drug-history-tab"
                        wire:ignore.self
                    >
                        <form class="email-form" wire:submit="saveDrugHistoryForm">
                            <div wire:ignore class="form-group">
                                <label class="col-form-label col-12">Drug History</label>
                                <div wire:ignore class="col-lg-12 mb-3">
                                    <select
                                        wire:key="drug_history_select"
                                        id="drug_history_select"
                                        class="select2 form-control"
                                        name="drug_history[]"
                                        multiple="multiple"
                                    ></select>
                                    <small class="text-danger" id="presenting_compliant_error">
                                        NOTE: Saving empty value will delete all previous data
                                    </small>
                                </div>
                            </div>
                            @if ($this->visit->sign == 'No')
                                <div class="d-flex justify-content-end my-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            @endif
                        </form>
                        @if (! empty(json_decode($this->drug_historysModel?->record_data)))
                            <div class="col-12 flex-wrap">
                                {{ $this->drug_historysModel->updated_at->format('jS F Y') }}
                                -
                                @foreach (json_decode($this->drug_historysModel->record_data) as $data)
                                    <span wire:key="{{ $loop->index }}" class="badge badge-secondary">
                                        {{ $data }}
                                        &nbsp;
                                        @if ($this->visit->sign == 'No')
                                            <a
                                                href="#"
                                                wire:click="deleteDrugHistory({{ $loop->index }})"
                                                title="Delete"
                                            >
                                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                            </a>
                                        @endif
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div
                        class="tab-pane fade"
                        id="social-history"
                        role="tabpanel"
                        aria-labelledby="social-history-tab"
                        wire:ignore.self
                    >
                        <div class="form-group">
                            <label for="presentingComplaints">Social History</label>
                            <textarea
                                class="form-control"
                                name="social_history"
                                id="social_history"
                                onkeyup=""
                                wire:model.live="social_history"
                            ></textarea>
                            @if ($this->visit->sign == 'No')
                                <div class="d-flex justify-content-end my-2">
                                    <button class="btn btn-primary" wire:click="saveSocialHistory">Save</button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="allergies"
                        role="tabpanel"
                        aria-labelledby="allergies-tab"
                        wire:ignore.self
                    >
                        <div class="form-group mb-1 a">
                            <span id="allergy_content_area">
                                <div>
                                    <label for="exampleTextarea">Allergy</label>
                                    <select class="form-select" id="allergy" name="allergy" wire:model.live="allergy">
                                        <option>Select an allergy</option>
                                        @foreach ($this->allergies as $allergy)
                                            <option value="{{ $allergy->allergy_name }}">
                                                {{ $allergy->allergy_name }}
                                            </option>
                                        @endforeach

                                        <option value="new_allergy">New Allergy</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('allergy')" class="mt-1" />
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label col-12">Reaction</label>
                                    <div wire:ignore class="col-lg-12 mb-3">
                                        <select
                                            id="allergyReaction"
                                            class="select2 form-control"
                                            name="allergy_reactions[]"
                                            multiple="multiple"
                                        ></select>
                                    </div>
                                    <x-input-error
                                        :messages="$errors->get(
                                            'allergy_reactions',
                                        )"
                                        class="mt-1"
                                    />
                                </div>

                                @if ($this->allergy == 'new_allergy')
                                    <div class="form-group mt-1 pt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="allergy_name">Allergy Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Type Allergy name here..."
                                                    wire:model.live="allergy_name"
                                                />
                                                <x-input-error
                                                    :messages="$errors->get(
                                                        'allergy_name',
                                                    )"
                                                    class="mt-1"
                                                />
                                            </div>
                                            <div class="col-6">
                                                <label for="allergy_group">Allergy Group</label>
                                                <select
                                                    class="form-select"
                                                    id="allergy_group"
                                                    name="allergy_group"
                                                    wire:model.live="allergy_group"
                                                >
                                                    <option value="">Select Allergy Group</option>
                                                    @foreach ($this->allergy_groups as $allergy_group)
                                                        <option value="{{ $allergy_group }}">
                                                            {{ $allergy_group }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error
                                                    :messages="$errors->get(
                                                        'allergy_group',
                                                    )"
                                                    class="mt-1"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleTextarea">Status</label>
                                        <select
                                            class="form-select"
                                            id="status"
                                            name="status"
                                            wire:model.live="allergy_status"
                                        >
                                            {{--
                                                <option value="">Select Status
                                                </option>
                                            --}}
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleTextarea">Severity</label>
                                        <select
                                            class="form-select"
                                            id="severity"
                                            name="severity"
                                            wire:model.live="allergy_severity"
                                        >
                                            <option value="Mild">Mild</option>
                                            <option value="Moderate">Moderate</option>
                                            <option value="Severe">Severe</option>
                                        </select>

                                        <div class="d-flex justify-content-end my-2">
                                            <button class="btn btn-primary" wire:click="saveAllergy">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="review-system"
                        role="tabpanel"
                        aria-labelledby="review-system-tab"
                        wire:ignore.self
                    >
                        <livewire:consultation.examination.review-of-systems :visit="$this->visit" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.consultation.modals.ai-diagnosis-modal')
</div>
