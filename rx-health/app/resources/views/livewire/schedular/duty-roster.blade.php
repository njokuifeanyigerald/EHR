<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Select a day to add new roster/appointment</h4>
                </div>
                <div>
                    <select class="form-select" wire:model.live="selected_department_for_calendar">
                        <option value="all">All</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div wire:ignore class="iq-card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="schedule-modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="schedule-modal"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Appointment Booking/Duty Roster</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div wire:ignore.self class="iq-card-body">
                        <ul class="nav nav-tabs mb-3 nav-fill" id="pills-tab-1" role="tablist">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="pills-home-tab-fill"
                                    data-bs-toggle="pill"
                                    href=".pills-Roster-fill"
                                    role="tab"
                                    aria-controls="pills-home"
                                    aria-selected="true"
                                    wire:ignore.self
                                >
                                    Roster
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="pills-profile-tab-fill"
                                    data-bs-toggle="pill"
                                    href="#pills-Appointment-fill"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false"
                                    wire:ignore.self
                                >
                                    Appointment
                                </a>
                            </li>
                        </ul>
                        <div wire:ignore.self class="tab-content" id="pills-tabContent-1">
                            <!-- Roster tab -->
                            <div
                                wire:ignore.self
                                class="tab-pane fade show active pills-Roster-fill"
                                id="pills-Roster-fill"
                                role="tabpanel"
                                aria-labelledby="pills-Roster-tab-fill"
                            >
                                <div class="form-group">
                                    <label for="title">Event Type</label>
                                    <select class="form-select my-2" id="title">
                                        <option selected="">Roster</option>
                                    </select>
                                </div>
                                <div class="position-relative">
                                    <label for="staff_id">Search Staff - using Tel/Surname/Other Names</label>
                                    @if ($this->selected_staff_name)
                                        <input
                                            type="text"
                                            class="form-control my-2 shadow"
                                            wire:model.live="selected_staff_name"
                                            wire:click="resetSelectedStaff"
                                        />
                                    @else
                                        <input
                                            type="search"
                                            class="form-control my-2 shadow"
                                            id="exampleInputText1"
                                            placeholder="Enter Tel/Surname/Other Names"
                                            wire:key="staff_search"
                                            wire:model.live="staff_search"
                                            wire:keydown.arrow-up="decrementStaffsHighlight"
                                            wire:keydown.arrow-down="incrementstaffsHighlight"
                                            wire:keydown.enter="selectStaff"
                                            autofocus
                                            autocomplete="off"
                                        />
                                    @endif

                                    <x-input-error :messages="$errors->get('staff')" class="mt-1" />

                                    <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                                        <div
                                            wire:loading
                                            wire:target="staff_search"
                                            class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                        >
                                            <div class="list-item">Searching...</div>
                                        </div>

                                        @if (! empty($this->staff_search) && ! $this->selected_staff_name)
                                            @forelse ($this->staffs as $i => $staff)
                                                <div
                                                    class="list-group-item pe-auto {{ $this->highlight_index === $i ? "active" : "" }}"
                                                    wire:click="saveSelectedStaff({{ $staff }})"
                                                >
                                                    <div class="flex-wrap">
                                                        {{ $staff->fullName() }}
                                                    </div>
                                                    <div>
                                                        {{ $staff->email }}
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="list-group-item active text-center">No result</div>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                                @If($this->staff && $this->staff->department_id != $this->medical_department->id)
                                <div class="form-group">
                                    <label for="appointment_doc">Location</label>
                                    <select
                                        class="form-select my-2"
                                        name="appointment_doc"
                                        id="appointment_doc"
                                        required
                                        wire:model.live="location"
                                    >
                                        <option value="" selected="">Please select location</option>
                                        @foreach ($this->locations->where("department_id", $this->staff?->department_id) as $loc)
                                            <option value="{{ $loc->id }}">
                                                {{ Str::headline($loc->unit_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('location')" class="mt-1" />
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="start_roster">Start Date</label>
                                            <input
                                                type="date"
                                                class="form-control my-2"
                                                name="start_roster"
                                                id="start_roster"
                                                required
                                                wire:model.live="start_date"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="end_roster">End Date</label>
                                            <input
                                                type="date"
                                                class="form-control my-2"
                                                name="end_roster"
                                                id="end_roster"
                                                required
                                                wire:model.live="end_date"
                                            />
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-1" />
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-1" />
                                </div>
                                <div class="form-group">
                                    <label for="shift">Shift</label>
                                    <select
                                        class="form-select my-2"
                                        name="shift"
                                        id="shift"
                                        wire:model.live="shift"
                                        required
                                    >
                                        <option value="" selected="">Please select shift</option>
                                        @foreach ($this->shifts as $shift)
                                            <option
                                                value="{{ $shift->id }}"
                                                {{ $shift->id == $this->shift ? 'selected=""' : "" }}
                                            >
                                                {{ Str::headline($shift->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('shift')" class="mt-1" />
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    @if ($this->edit)
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-danger" wire:click="deleteSelectedDuty">
                                            Delete Schedule
                                        </button>
                                        <button type="button" class="btn btn-success" wire:click="updateSelectedDuty">
                                            Update Schedule
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary" wire:click="addRoster">
                                            Add Schedule
                                        </button>
                                    @endif
                                </div>
                                {{-- </form> --}}
                            </div>
                            <!-- Appointment tab -->
                            <div
                                wire:ignore.self
                                class="tab-pane fade"
                                id="pills-Appointment-fill"
                                role="tabpanel"
                                aria-labelledby="pills-Appointment-tab-fill"
                            >
                                <div class="form-group">
                                    <label for="title">Event Type</label>
                                    <select class="form-select my-2" id="title">
                                        <option value="Appointment Booking">Appointment Booking</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="patient_id">
                                        Search Patient: - using Old/New Folder No/Tel/Surname/Other Names
                                    </label>

                                    @if ($this->selected_patient_name)
                                        <input
                                            type="text"
                                            class="form-control my-2 shadow"
                                            wire:model.live="selected_patient_name"
                                            wire:click="resetSelectedPatient"
                                        />
                                    @else
                                        <input
                                            type="search"
                                            class="form-control my-2 shadow"
                                            id="exampleInputText1"
                                            placeholder="Search Patient: - using Old/New Folder No/Tel/Surname/Other Names"
                                            wire:key="patient_search"
                                            wire:model.live="patient_search"
                                            wire:keydown.arrow-up="decrementPatientsHighlight"
                                            wire:keydown.arrow-down="incrementPatientsHighlight"
                                            wire:keydown.enter="selectpatient"
                                            autofocus
                                            autocomplete="off"
                                        />
                                    @endif

                                    <x-input-error :messages="$errors->get('patient')" class="mt-1" />
                                    <div class="position-relative">
                                        <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                                            <div
                                                wire:loading
                                                wire:target="patient_search"
                                                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                            >
                                                <div>Searching for patient...</div>
                                            </div>

                                            @if (! empty($this->patient_search) && ! $this->selected_patient_name)
                                                @forelse ($this->patients as $i => $patient)
                                                    <div
                                                        class="list-group-item pe-auto {{ $this->highlight_index === $i ? "active" : "" }}"
                                                        wire:click="saveSelectedPatient({{ $patient }})"
                                                    >
                                                        <div class="flex-wrap">
                                                            {{ $patient->first_name . " " . $patient->surname }}
                                                        </div>
                                                        <div>
                                                            {{ $patient->email }}
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="list-group-item active text-center">No result</div>
                                                @endforelse
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="doctor_id">Search Doctor - using Tel/Surname/Other Names</label>
                                    @if ($this->selected_doctor_name)
                                        <input
                                            type="text"
                                            class="form-control my-2 shadow"
                                            wire:model.live="selected_doctor_name"
                                            wire:click="resetSelectedDoctor"
                                        />
                                    @else
                                        <input
                                            type="search"
                                            class="form-control my-2 shadow"
                                            id="exampleInputText1"
                                            placeholder="Enter Tel/Surname/Other Names"
                                            wire:key="doctor_search"
                                            wire:model.live="doctor_search"
                                            wire:keydown.arrow-up="decrementDoctorsHighlight"
                                            wire:keydown.arrow-down="incrementDoctorsHighlight"
                                            wire:keydown.enter="selectDoctor"
                                            autofocus
                                            autocomplete="off"
                                        />
                                    @endif

                                    <x-input-error :messages="$errors->get('doctor')" class="mt-1" />
                                    <div class="position-relative">
                                        <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                                            <div
                                                wire:loading
                                                wire:target="doctor_search"
                                                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                            >
                                                <div class="list-item">Searching for Doctor...</div>
                                            </div>

                                            @if (! empty($this->doctor_search) && ! $this->selected_doctor_name)
                                                @forelse ($this->doctors as $i => $doctor)
                                                    <div
                                                        class="list-group-item pe-auto {{ $this->highlight_index === $i ? "active" : "" }}"
                                                        wire:click="saveSelectedDoctor({{ $doctor }})"
                                                    >
                                                        <div class="flex-wrap">
                                                            {{ $doctor->full_name }}
                                                        </div>
                                                        <div>
                                                            {{ $doctor->email }}
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="list-group-item active text-center">No result</div>
                                                @endforelse
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="appointment_day">Select Appointment Day</label>
                                    <div class="row">
                                        @forelse ($this->doctor_duties ?? [] as $duty)
                                            <div class="col-12">
                                                <div class="custom-control custom-radio custom-control-inline mt-1">
                                                    <input
                                                        type="radio"
                                                        class="custom-control-input"
                                                        name="appointment_day"
                                                        id="appointment_day{{ $duty->id }}"
                                                        @if ($duty->appointments_count >=
                                                            ($this->specializations->find($this->specialization_id)?->first()
                                                                ?->max_appointments_per_day ??
                                                                4))
                                                            disabled
                                                        @endif
                                                        wire:model.live="appointment_day"
                                                        value="{{ $duty->id }}"
                                                    />
                                                    <label
                                                        class="custom-control-label"
                                                        for="appointment_day{{ $duty->id }}"
                                                        wire:ignore
                                                    >
                                                        {{
                                                            now()
                                                                ->parse($duty->start)
                                                                ->format("D, d M Y") .
                                                                " - (" .
                                                                $duty->appointments_count .
                                                                " out of " .
                                                                ($this->specializations->find($this->specialization_id)?->first()?->max_appointments_per_day ?? 4) .
                                                                ")"
                                                        }}
                                                    </label>
                                                </div>
                                            </div>
                                        @empty
                                            <div>No Duty found or Doctor not selected</div>
                                        @endforelse
                                    </div>

                                    <x-input-error :messages="$errors->get('appointment_day')" class="mt-1" />
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea
                                        class="form-control my-2"
                                        id="description"
                                        rows="2"
                                        wire:model="description"
                                    ></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-1" />
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary" wire:click="addAppointment">
                                        Add Schedule
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        //show modals
        $wire.on('close_roster_modal', () => {
            $('#schedule-modal').modal('hide');
        });
    </script>
@endscript

<script>
    document.addEventListener('livewire:initialized', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                center: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay'
            }, //shows year,month,week and days options
            selectable: true, //shows a color when user clicks on a date
            contentHeight: 400,
            events: @json($events),
            eventClick: function(event) {
                @this.editModalDetails(event);
                var scheduleModal = new bootstrap.Modal(document.getElementById('schedule-modal'));
                scheduleModal.toggle();
            }
        });
        calendar.render();

        //On date get click event handler for schedular modal
        calendar.on('dateClick', function(info) {
            //Toggle the boostrap modal(schedular)
            @this.resetEditDataIfExits();
            var scheduleModal = new bootstrap.Modal(document.getElementById('schedule-modal'));
            scheduleModal.toggle();

            //Assign selected date value to date forms in schedular modal

            //roster
            document.getElementById('start_roster').value = info.dateStr;
            document.getElementById('end_roster').value = info.dateStr;
            @this.start_date = info.dateStr;
            @this.end_date = info.dateStr;
        });

        //on a dispatch refresh the calendar
        @this.$on('refreshCalendar', () => {
            //fetch events

            // calendar.removeAllEvents();
            // calendar.addEventSource(@json($events));
            @this.getEventData().then((data) => {
                // console.log(data);
                calendar.removeAllEvents();
                calendar.addEventSource(data);
                calendar.refetchEvents();
            });
            // console.log(@this.getEventData());
            calendar.render();
        });
    });
</script>
