@props([
    'view' => false,
])

<div wire:key="operation-theatre-form-data{{ $view }}">
    @php
        // $medical_record_data = json_decode($this->medical_record?->record_data ?? '{}');
        $medical_record_data;
        if ($this->medical_record && $this->load_operation_theater_records) {
            $medical_record_data = json_decode($this->medical_record->record_data ?? '{}')?->monitoring;
            // dd($medical_record_data);
        }
    @endphp

    <ul class="nav nav-light-primary nav-pills">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="pill" href="#dateTab{{ $view }}">
                <span class="nav-text">Date Time</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#operationDetailsTab{{ $view }}">
                <span class="nav-text">Operation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="pill" href="#staffTab{{ $view }}">
                <span class="nav-text">Staff</span>
            </a>
        </li>
    </ul>
    <div class="tab-content mt-5">
        <div
            class="tab-pane fade show active"
            id="dateTab{{ $view }}"
            role="tabpanel"
            aria-labelledby="dateTab{{ $view }}"
        >
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bolder">Start Date</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.start_date"
                            class="form-control"
                            type="date"
                            value=""
                            name="start_date"
                        />
                        <x-input-error :messages="$errors->get('monitoring.start_date')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">End Date Date</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.end_date"
                            class="form-control"
                            type="date"
                            value=""
                            name="end_date"
                        />
                        <x-input-error :messages="$errors->get('monitoring.end_date')" class="mt-1" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-weight-bolder">Start Time</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.start_time"
                            class="form-control"
                            type="time"
                            value=""
                            name="start_time"
                        />
                        <x-input-error :messages="$errors->get('monitoring.start_time')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">End Time</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.end_time"
                            class="form-control"
                            type="time"
                            value=""
                            name="end_time"
                        />
                        <x-input-error :messages="$errors->get('monitoring.end_time')" class="mt-1" />
                    </div>
                </div>
            </div>
        </div>
        <div
            class="tab-pane fade"
            id="operationDetailsTab{{ $view }}"
            role="tabpanel"
            aria-labelledby="operationDetailsTab{{ $view }}"
        >
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Operation Name</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.operation_name"
                            class="form-control"
                            type="text"
                            name="operation_name"
                        />
                        <x-input-error :messages="$errors->get('monitoring.operation_name')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Pre Op Diagnosis</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.pre_op_diagnosis"
                            class="form-control"
                            type="text"
                            name="pre_op_diagnosis"
                        />
                        <x-input-error :messages="$errors->get('monitoring.pre_op_diagnosis')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">Estimated Blood Loss</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.estimated_blood_loss"
                            class="form-control"
                            type="text"
                            name="estimated_blood_loss"
                        />
                        <x-input-error :messages="$errors->get('monitoring.estimated_blood_loss')" class="mt-1" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Indication</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.indication"
                            class="form-control"
                            type="text"
                            name="indication"
                        />
                        <x-input-error :messages="$errors->get('monitoring.indication')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Post Op Diagnosis</label>
                        <input
                            @if ($view) disabled @endif
                            wire:model="monitoring.post_op_diagnosis"
                            class="form-control"
                            type="text"
                            name="post_op_diagnosis"
                        />
                        <x-input-error :messages="$errors->get('monitoring.post_op_diagnosis')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">Unit</label>
                        <select
                            @if ($view) disabled @endif
                            wire:model="monitoring.unit"
                            class="form-select"
                            id="exampleSelectd"
                            name="unit"
                        >
                            <option value="">Please select unit</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <x-input-error :messages="$errors->get('monitoring.unit')" class="mt-1" />
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="staffTab{{ $view }}" role="tabpanel" aria-labelledby="staffTab{{ $view }}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {{--
                            @if ($medical_record_data)
                            @dd($medical_record_data->surgeon->id)
                            @endif
                        --}}

                        <label for="exampleSelectd" class="font-weight-bolder">Surgeon</label>
                        <select
                            @if ($view) disabled @endif
                            wire:model="monitoring.surgeon.id"
                            class="form-select"
                            id="exampleSelectd"
                            name="surgeon"
                        >
                            {{--
                                <option>Default Admin</option>
                                <option>Mercy Iburuoma</option>
                                <option>Joy Eneh</option>
                            --}}
                            @if ($view)
                                <option value="{{ $medical_record_data?->surgeon?->id ?? '' }}">
                                    {{ Str::headline($medical_record_data?->surgeon?->name ?? 'No Surgeon Assigned') }}
                                </option>
                            @else
                                <option value="">Please Select a Surgeon</option>
                                @forelse ($users->whereIn('department.area_code', ['surgicals', 'medical']) as $user)
                                    <option value="{{ $user->id }}">
                                        {{ Str::headline($user->full_names) }}
                                    </option>
                                @empty
                                    <option value="">No surgeon available</option>
                                @endforelse
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('monitoring.surgeon.id')" class="mt-1" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Assistant Surgeon</label>
                        <select
                            @if ($view) disabled @endif
                            wire:model="monitoring.ass_surgeon.id"
                            class="form-select"
                            id="exampleSelectd"
                            name="ass_surgeon"
                        >
                            @if ($view)
                                <option value="{{ $medical_record_data?->ass_surgeon?->id ?? '' }}">
                                    {{ Str::headline($medical_record_data?->ass_surgeon?->name ?? 'No Surgeon Assigned') }}
                                </option>
                            @else
                                <option>Please Select a Surgeon</option>
                                @forelse ($users->whereIn('department.area_code', ['surgicals', 'medical']) as $user)
                                    <option value="{{ $user->id }}">
                                        {{ Str::headline($user->full_names) }}
                                    </option>
                                @empty
                                    <option>No surgeon available</option>
                                @endforelse
                            @endif
                        </select>

                        <x-input-error :messages="$errors->get('monitoring.ass_surgeon.id')" class="mt-1" />
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Scrub Nurse</label>
                        <select
                            @if ($view) disabled @endif
                            wire:model="monitoring.scrub_nurse.id"
                            class="form-select"
                            id="exampleSelectd"
                            name="scrub_nurse"
                        >
                            @if ($view)
                                <option value="{{ $medical_record_data?->scrub_nurse?->id ?? '' }}">
                                    {{ Str::headline($medical_record_data?->scrub_nurse?->name ?? 'No Nurse Assigned') }}
                                </option>
                            @else
                                <option>Please select a nurse</option>
                                @forelse ($users->whereIn('department.area_code', ['nurses']) as $user)
                                    <option value="{{ $user->id }}">
                                        {{ Str::headline($user->full_names) }}
                                    </option>
                                @empty
                                    <option>No nurse available</option>
                                @endforelse
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('monitoring.scrub_nurse.id')" class="mt-1" />
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleSelectd" class="font-weight-bolder">Anaesthetist</label>
                        <select
                            @if ($view) disabled @endif
                            wire:model="monitoring.anaesthetist.id"
                            class="form-select"
                            id="exampleSelectd"
                            name="anaesthetist"
                        >
                            @if ($view)
                                <option value="{{ $medical_record_data?->anaesthetist?->id ?? '' }}">
                                    {{ Str::headline($medical_record_data?->anaesthetist?->name ?? 'No Nurse Assigned') }}
                                </option>
                            @else
                                <option>Please select a nurse</option>
                                @forelse ($users->whereIn('department.area_code', ['nurses']) as $user)
                                    <option value="{{ $user->id }}">
                                        {{ Str::headline($user->full_names) }}
                                    </option>
                                @empty
                                    <option>No nurse available</option>
                                @endforelse
                            @endif
                        </select>

                        <x-input-error :messages="$errors->get('monitoring.anaesthetist.id')" class="mt-1" />
                    </div>

                    @if (! $view)
                        <div class="form-group d-flex justify-content-end">
                            <button wire:click="saveOperationTheatre" type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
