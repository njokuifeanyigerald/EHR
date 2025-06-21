<div>
    <div class="row">
        <div class="col-sm-3 border-end border-muted">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link p-1 mb-2 {{ $this->current_tab == 'exam' ? 'active' : '' }}"
                    id="eye-exam-tab"
                    data-bs-toggle="pill"
                    wire:click="changeCurrentTag('vertical_tabs','exam')"
                    href="#eye-exam"
                    role="tab"
                    aria-controls="eye-exam"
                    aria-selected="true"
                >
                    Eye Examination
                </a>
                <a
                    class="nav-link p-1 mb-2 {{ $this->current_tab == 'center' ? 'active' : '' }}"
                    id="eye-center-tab"
                    data-bs-toggle="pill"
                    href="#eye-center"
                    wire:click="changeCurrentTag('vertical_tabs','center')"
                    role="tab"
                    aria-controls="eye-center"
                    aria-selected="false"
                    tabindex="-1"
                >
                    Eye Center
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            <div wire:ignore.self class="tab-content mt-0" id="v-pills-tabContent">
                <div
                    wire:ignore.self
                    class="tab-pane fade show active"
                    id="eye-exam"
                    role="tabpanel"
                    aria-labelledby="eye-exam-tab"
                >
                    <div class="mt-3" style="overflow: auto; overflow-y: hidden; -ms-overflow-y: hidden">
                        <div class="d-flex justify-content-between mb-2">
                            <button
                                data-bs-toggle="modal"
                                data-bs-target="#add_eye_vitals"
                                class="btn btn-sm btn-primary"
                            >
                                New Eye Examination
                            </button>
                            <button
                                wire:click="resetVisionDetails('vision_details')"
                                data-bs-toggle="modal"
                                data-bs-target="#new_vision"
                                class="btn btn-sm btn-primary"
                            >
                                New Vision/IOP
                            </button>
                        </div>

                        <table
                            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center mt-3"
                        >
                            <thead class="">
                                <tr>
                                    <th>Pulse</th>
                                    <th>BP</th>
                                    <th>Vision (R)</th>
                                    <th>Vision (L)</th>
                                    <th>NCT:lop (R)</th>
                                    <th>NCT:lop (L)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($medical_records as $medical_record)
                                    @php
                                        $record_data = json_decode($medical_record->record_data);

                                        // dd($record_data);
                                    @endphp

                                    <tr>
                                        <td>
                                            {{ $record_data->vision_details->pulse ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $record_data->vision_details->blood_pressure ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $record_data->vision_details->vision_right ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $record_data->vision_details->vision_left ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $record_data->vision_details->nct_iop_right ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $record_data->vision_details->nct_iop_left ?? 'N/A' }}
                                        </td>
                                        <td>
                                            <a
                                                data-bs-toggle="modal"
                                                data-bs-target="#new_vision"
                                                wire:click="loadDataToEditForMedicalRecord({{ $medical_record->id }})"
                                                title="Edit"
                                            >
                                                <i class="ri-pencil-line text-warning icons-sm"></i>
                                            </a>
                                            <a
                                                wire:click="deleteVisionIOPRecord({{ $medical_record->id }})"
                                                title="Delete"
                                            >
                                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div
                    wire:ignore.self
                    class="tab-pane fade"
                    id="eye-center"
                    role="tabpanel"
                    aria-labelledby="eye-center-tab"
                >
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link {{ $this->current_tab_h == 'oct' ? 'active' : '' }}"
                                id="oct-report-tab"
                                data-bs-toggle="pill"
                                href="#oct-report"
                                role="tab"
                                wire:click="changeCurrentTag('horizontal_tabs','oct')"
                                aria-controls="oct-report"
                                aria-selected="true"
                            >
                                OCT Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ $this->current_tab_h == 'visual-field' ? 'active' : '' }}"
                                id="visual-field-tab"
                                data-bs-toggle="pill"
                                href="#visual-field"
                                wire:click="changeCurrentTag('horizontal_tabs','visual-field')"
                                role="tab"
                                aria-controls="visual-field"
                                aria-selected="false"
                            >
                                Visual Field
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ $this->current_tab_h == 'others' ? 'active' : '' }}"
                                id="other-report-tab"
                                data-bs-toggle="pill"
                                href="#other-report"
                                role="tab"
                                wire:click="changeCurrentTag('horizontal_tabs','others')"
                                aria-controls="other-report"
                                aria-selected="false"
                            >
                                Other Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link {{ $this->current_tab_h == 'lab_results' ? 'active' : '' }}"
                                id="lab-result-tab"
                                data-bs-toggle="pill"
                                href="#lab-result"
                                role="tab"
                                aria-controls="lab-result"
                                aria-selected="false"
                                wire:click="changeCurrentTag('horizontal_tabs','lab_results')"
                            >
                                Lab Result
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div
                            wire:ignore.self
                            class="tab-pane fade show active"
                            id="oct-report"
                            role="tabpanel"
                            aria-labelledby="oct-report-tab"
                        >
                            <div class="table-responsive text-dark">
                                {{-- <textarea id="OCTeditor" class="form-group" placeholder="OCT report here..."></textarea> --}}
                                <livewire:consultation.includes.c-k-editor :model_type="'oct'" :visit="$visit" />
                            </div>
                        </div>
                        <div
                            wire:ignore.self
                            class="tab-pane fade"
                            id="visual-field"
                            role="tabpanel"
                            aria-labelledby="visual-field-tab"
                        >
                            <div class="table-responsive text-dark">
                                {{--
                                    <textarea
                                    id="VisualFieldeditor"
                                    class="form-group"
                                    placeholder="Visual Field report here..."
                                    ></textarea>
                                --}}
                                <livewire:consultation.includes.c-k-editor
                                    :model_type="'visual_field'"
                                    :visit="$visit"
                                />

                                {{-- <x-ck_editor :wire_model="'visual_field'" /> --}}
                            </div>
                        </div>
                        <div
                            wire:ignore.self
                            class="tab-pane fade"
                            id="other-report"
                            role="tabpanel"
                            aria-labelledby="other-report-tab"
                        >
                            <div class="table-responsive text-dark">
                                {{--
                                    <textarea
                                    id="Othereditor"
                                    class="form-group"
                                    placeholder="Other Editor report here..."
                                    ></textarea>
                                --}}
                                <livewire:consultation.includes.c-k-editor :model_type="'others'" :visit="$visit" />
                            </div>
                        </div>
                        <div
                            wire:ignore.self
                            class="tab-pane fade"
                            id="lab-result"
                            role="tabpanel"
                            aria-labelledby="lab-result-tab"
                        >
                            <div class="table-responsive text-dark">
                                {{--
                                    <textarea
                                    id="LabResulteditor"
                                    class="form-group"
                                    placeholder="Lab Result here..."
                                    ></textarea>
                                --}}
                                <livewire:consultation.includes.c-k-editor
                                    :model_type="'lab_results'"
                                    :visit="$visit"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.consultation.modals.eye_vitals')
    @include('livewire.consultation.modals.new_vision_iop')
</div>
