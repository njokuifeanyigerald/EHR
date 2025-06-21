<!-- Patient Activities modal -->
<div wire:ignore.self class="modal fade patientActivities" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient Activities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="iq-card-body">
                    {{--
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis
                        mollis,
                        diam nibh finibus leo</p>
                    --}}
                    <ul class="nav nav-tabs mb-3 nav-fill" id="pills-tab-1" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="pills-home-tab-fill"
                                data-bs-toggle="pill"
                                href=".pills-Patient-State-fill"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                                wire:ignore.self
                            >
                                Patient State
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="pills-profile-tab-fill"
                                data-bs-toggle="pill"
                                href="#pills-Discharge-State-fill"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                                wire:ignore.self
                            >
                                Discharge State
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-1">
                        <!-- Patient-State tab -->
                        <div
                            class="tab-pane fade show active pills-Patient-State-fill"
                            id="pills-Patient-State-fill"
                            role="tabpanel"
                            aria-labelledby="pills-Patient-State-tab-fill"
                            wire:ignore.self
                        >
                            {{--
                                <form action="" method="post">
                                @csrf
                            --}}
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="email">
                                    Patient Type:
                                </label>
                                <div class="col-sm-10">
                                    <select
                                        class="form-select my-2 col-sm-8"
                                        id="selectcountry"
                                        wire:model.live="visit_type"
                                    >
                                        @foreach ($this->service_types as $service_type)
                                            <option
                                                value="{{ $service_type->id }}"
                                                {{ $service_type->id == $this->visit_type ? 'selected' : '' }}
                                            >
                                                {{ Str::headline($service_type->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">
                                    Forward To:
                                </label>
                                <div class="col-sm-10">
                                    <select
                                        class="form-select my-2"
                                        id="selectcountry"
                                        wire:model.live="session_location"
                                    >
                                        @foreach ($this->locations as $location)
                                            <option
                                                value="{{ $location->code }}"
                                                {{ $location->code == $this->session_location ? 'selected' : '' }}
                                            >
                                                {{ Str::headline($location->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" wire:click="savePatientState">
                                    Save Changes
                                </button>
                            </div>
                            {{-- </form> --}}
                        </div>
                        {{-- <form class="form-horizontal" action="/action_page.php"> --}}
                        <div
                            class="tab-pane fade"
                            id="pills-Discharge-State-fill"
                            role="tabpanel"
                            aria-labelledby="pills-Discharge-State-tab-fill"
                            wire:ignore.self
                        >
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">
                                    Discharge Status:
                                </label>
                                <div class="col-sm-10">
                                    <select
                                        class="form-select my-2 col-sm-8"
                                        id="selectcountry"
                                        wire:model.live="discharge_status"
                                    >
                                        @if ($this->discharge_status && $this->selected_visit?->discharge_date)
                                            <option value="reverse" selected="">Reverse Patient Discharge</option>
                                        @else
                                            <option selected="" value="pending">Still Pending</option>
                                            <option value="discharge">Discharge Patient</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">
                                    Discharge
                                    {{-- {{ $this->discharge_date }} --}}
                                    Date:
                                </label>
                                <div class="col-sm-10">
                                    <input
                                        type="date"
                                        class="form-control my-2"
                                        id="pwd1"
                                        wire:model.live="discharge_date"
                                        readonly
                                    />
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" wire:click="savePatientDischargeStatus">
                                    Save Changes
                                </button>
                            </div>
                        </div>

                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            {{--
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="savePatientActivityChanges">Save
                changes</button>
                </div>
            --}}
        </div>
    </div>
</div>
