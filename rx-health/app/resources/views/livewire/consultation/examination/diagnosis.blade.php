{{-- <div wire:ignore.self class="tab-pane fade" id="Diagnosis" role="tabpanel" aria-labelledby="v-pills-Diagnosis-tab"> --}}
<div>
    @if ($this->visit->sign == 'No')
        <div class="form-group col-12">
            {{--
                <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                <div class="input-icon input-icon-right">
                <input type="search" class="form-control" placeholder="Search for Diagnosis" name="item_name"
                id="item_name">
                <span><i class="fa fa-search"></i></span>
                <input type="hidden" name="diagnosis_id" id="diagnosis_id" value="0">
                </div>
                </div>
            --}}

            @if ($this->selected_search_name)
                <div class="input-icon input-icon-right">
                    <input
                        type="text"
                        class="form-control my-2 shadow"
                        wire:model.live="selected_search_name"
                        wire:click="resetSearch"
                        {{ $this->selected_search_name ? 'autofocus' : '' }}
                    />
                    <span><i class="fa fa-search"></i></span>
                </div>
            @else
                <div class="input-icon input-icon-right">
                    <input
                        type="search"
                        class="form-control"
                        placeholder="Search for Diagnosis"
                        name="item_name"
                        id="item_name"
                        wire:key="search"
                        wire:model.live="search"
                        {{ ! $this->selected_search_name ? 'autofocus' : '' }}
                    />
                    <span><i class="fa fa-search"></i></span>
                </div>
            @endif

            <x-input-error :messages="$errors->get('diagnosis')" class="mt-1" />

            <div class="position-absolute z-10 rounded-xl list-group bg-black">
                <div
                    wire:loading
                    wire:target="search"
                    class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                >
                    <div class="list-item">Searching...</div>
                </div>

                @if (! empty($this->search) && ! $this->selected_search_name)
                    <div class="list-group-item text-bold" style="display: flex">
                        <div style="flex: 0 0 100%">
                            <b>Diagnosis</b>
                        </div>
                    </div>
                    @forelse ($this->search_diagnosis_results as $i => $diagnosis)
                        <div
                            class="list-group-item pe-auto"
                            style="display: flex"
                            wire:click="saveSelectedDiagnosis( {{ $diagnosis }} )"
                        >
                            <div class="flex-wrap" style="flex: 0 0 100%">
                                {{ $diagnosis->disease }} -
                                <span class="text-primary">{{ $diagnosis->code }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="list-group-item active text-center flex-wrap" style="flex: 0 0 100%">No result</div>
                    @endforelse
                @endif
            </div>
        </div>
    @endif

    <div>
        <div class="d-flex justify-content-end my-2 gap-2">
            @if ($this->visit->sign == 'No' && $this->ai_model_allowed)
                <button class="btn btn-primary" wire:click="getAITreatmentSuggestionsForAllDiagnosis">
                    <i
                        class="fa fa-microchip"
                        wire:loading.remove
                        wire:target="getAITreatmentSuggestionsForAllDiagnosis"
                    ></i>
                    <i
                        class="fa fa-spinner fa-spin"
                        wire:loading
                        wire:target="getAITreatmentSuggestionsForAllDiagnosis"
                    ></i>
                    AI Diagnosis
                </button>
            @endif
        </div>

        <div class="table-responsive">
            <table
                class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
            >
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Diagnosis Added</th>
                        <th>Status</th>
                        @if ($this->ai_model_allowed)
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->patient_diagnosis as $diagnosis)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div
                                    class="ps-3 pe-3 w-75 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                    role="alert"
                                >
                                    <span>{{ $diagnosis->diagnosis->disease }}</span>
                                </div>
                            </td>
                            <td class="clickable-cursor">
                                <span
                                    class="badge badge-pill {{ $diagnosis->status == 'Confirmed' ? 'badge-success' : 'badge-danger' }} p-2"
                                >
                                    {{ $diagnosis->status }}
                                </span>
                                <span class="p-2">
                                    <input
                                        type="checkbox"
                                        wire:click="updateDiagnosisStatus({{ $diagnosis->id }})"
                                        {{ $diagnosis->status == 'Confirmed' ? 'checked' : '' }}
                                    />
                                </span>
                            </td>
                            @if ($this->ai_model_allowed)
                                <td class="text-center">
                                    @if ($this->visit->sign == 'No')
                                        {{-- ai suggestions --}}
                                        <a
                                            class="btn btn-primary"
                                            wire:loading.attr="disabled"
                                            wire:click="getAiTreatmentSuggestion({{ $diagnosis->id }},'{{ $diagnosis->diagnosis->code }}')"
                                        >
                                            <i
                                                wire:loading.remove
                                                wire:target="getAiTreatmentSuggestion({{ $diagnosis->id }},'{{ $diagnosis->diagnosis->code }}')"
                                                class="fa fa-microchip"
                                            ></i>

                                            <i
                                                wire:loading
                                                wire:target="getAiTreatmentSuggestion({{ $diagnosis->id }},'{{ $diagnosis->diagnosis->code }}')"
                                                class="fa fa-spinner fa-spin"
                                            ></i>
                                            {{-- AI Treatments --}}
                                            Suggest
                                        </a>

                                        {{-- view --}}
                                        <a
                                            wire:click="viewAiTreatments('{{ $diagnosis->diagnosis->code }}')"
                                            data-bs-toggle="modal"
                                            data-bs-target="#ai-treatments-modal"
                                            class="btn btn-secondary"
                                        >
                                            <i class="fa fa-eye"></i>
                                            {{-- View AI Treatments --}}
                                            View
                                        </a>

                                        <a href="#" title="Delete">
                                            <i
                                                class="ri-delete-bin-line text-danger icons-sm"
                                                wire:click="deleteDiagnosis({{ $diagnosis->id }})"
                                            ></i>
                                        </a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">
                                <div class="w-full text-center">No Diagnosis Available</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @include('livewire.consultation.modals.ai-treatments-modal')
</div>
