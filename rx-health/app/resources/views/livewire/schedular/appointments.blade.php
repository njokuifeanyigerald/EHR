<div>
    <!-- Filter -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <form class="col-sm-3" wire:submit.prevent="filter">
                    {{-- @csrf --}}
                    <div class="input-group">
                        <select wire:model="filter_type" class="form-select me-0">
                            <option value="all" selected="">All</option>
                            <option value="tomorrow">Tomorrow</option>
                            <option value="today">Today</option>
                            <option value="yesterday">Yesterday</option>
                            <option value="this_week">This Week</option>
                            <option value="this_month">This Month</option>
                        </select>
                        <button class="btn btn-light" type="submit">Filter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table
                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg table-striped"
                    >
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="#">#</th>
                                <th scope="col" data-sortable="true" data-field="patient">PATIENT</th>
                                <th scope="col" data-sortable="true" data-field="attending">ATTENDING OFFICER</th>
                                <th scope="col" data-sortable="true" data-field="specialisation">SPECIALISATION</th>
                                <th scope="col" data-sortable="true" data-field="start">START</th>
                                <th scope="col" data-sortable="true" data-field="end">END</th>
                                <th scope="col" data-sortable="true" data-field="status">STATUS</th>
                                <th scope="col" data-sortable="true" data-field="action">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments ?? collect() as $appointment)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $appointment->patient->title . ' ' . $appointment->patient->first_name . ' ' . $appointment->patient->surname }}
                                    </td>
                                    <td>
                                        {{ $appointment->doctor->title . ' ' . $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}
                                    </td>
                                    <td>{{ Str::headline($appointment->doctor->speciality) }}</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($appointment->start_date . ' ' . $appointment->start_time)->format('jS F Y g:i A') }}
                                    </td>
                                    <td>
                                        {{ Carbon\Carbon::parse($appointment->start_date . ' ' . $appointment->end_time)->format('jS F Y g:i A') }}
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-warning">
                                            {{ Str::headline($appointment->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target=".AppointmentDetails{{ $appointment->id }}"
                                            title="View"
                                            {{-- data-value="{{ $appointment }}" --}}
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base me-2"></i>
                                        </a>
                                        @if ($appointment->status == 'pending')
                                            <livewire:schedular.appointment-to-visit :appointment="$appointment" />
                                        @else
                                            <a
                                                href="{{ route('patients.show', $appointment->patient_id) }}"
                                                title="View"
                                            >
                                                <i class="fa fa-arrow-right me-2"></i>
                                            </a>
                                        @endif
                                        {{--
                                            <a
                                            href="{{ route('scheduler.appointments') }}"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            title="Delete"
                                            >
                                            <i class="ri-delete-bin-line text-danger icons-base"></i>
                                            </a>
                                        --}}
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div
                                    class="modal fade AppointmentDetails{{ $appointment->id }}"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Appointment Details</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mx-2">
                                                    <div class="col-lg-12">
                                                        <div class="iq-card shadow-lg">
                                                            <div class="iq-card-body ps-0 pe-0 pt-0">
                                                                <div class="docter-details-block">
                                                                    <div
                                                                        class="doc-profile-bg bg-primary"
                                                                        style="height: 150px"
                                                                    ></div>
                                                                    <div class="docter-profile text-center">
                                                                        <img
                                                                            src="{{ asset('images/user/12.jpg') }}"
                                                                            alt="profile-img"
                                                                            class="avatar-130 img-fluid"
                                                                        />
                                                                    </div>
                                                                    <div class="text-center mt-3 ps-3 pe-3">
                                                                        <p class="text-center">
                                                                            Appointment Booking with:
                                                                        </p>
                                                                        <h4>
                                                                            <b>
                                                                                {{ $appointment->patient->title . ' ' . $appointment->patient->first_name . ' ' . $appointment->patient->surname . $appointment->id }}
                                                                            </b>
                                                                        </h4>
                                                                        <p class="text-center">
                                                                            {{ $appointment->patient->age . ', ' . $appointment->patient->sex }}
                                                                        </p>
                                                                    </div>
                                                                    <hr />
                                                                    <ul
                                                                        class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0"
                                                                    >
                                                                        <li class="text-center">
                                                                            <h6>
                                                                                {{ Carbon\Carbon::parse($appointment->start_date . ' ' . $appointment->start_time)->format('jS F Y g:i A') }}
                                                                            </h6>
                                                                            <span>
                                                                                <i
                                                                                    class="fa fa-calendar"
                                                                                    style="font-size: 1rem"
                                                                                ></i>
                                                                            </span>
                                                                        </li>
                                                                        <li class="text-center flex-wrap">
                                                                            <h6>
                                                                                {{ $appointment->doctor->title . ' ' . $appointment->doctor->first_name . ' ' . $appointment->doctor->last_name }}
                                                                            </h6>
                                                                            <span>
                                                                                <i
                                                                                    class="fa fa-user-md"
                                                                                    style="font-size: 1.5rem"
                                                                                ></i>
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                    <ul
                                                                        class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-3"
                                                                    >
                                                                        <li class="text-center">
                                                                            <h6>In-house check with favour</h6>
                                                                            <span>Appointment type</span>
                                                                        </li>
                                                                        <li class="text-center">
                                                                            <h6>
                                                                                {{ $appointment->patient->telephone }}
                                                                            </h6>
                                                                            <span>Telephone</span>
                                                                        </li>
                                                                        <li class="text-center">
                                                                            <h6>
                                                                                <span
                                                                                    class="badge rounded-pill bg-warning"
                                                                                >
                                                                                    Awaiting
                                                                                </span>
                                                                            </h6>
                                                                            <span>Status Ask</span>
                                                                        </li>
                                                                    </ul>
                                                                    <ul
                                                                        class="doctoe-sedual d-flex align-items-center justify-content-between p-0 mt-3"
                                                                    >
                                                                        <li class="text-center">
                                                                            <h6>Coming for a review</h6>
                                                                            <span>
                                                                                {{ Str::headline($appointment->description) }}
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                    <div
                                                                        class="d-flex align-items-center justify-content-center px-6 mt-4 mb-2"
                                                                    >
                                                                        <div>
                                                                            <a
                                                                                href="tel:{{ $appointment->patient->telephone }}"
                                                                                class="btn btn-outline-primary rounded-pill me-2"
                                                                            >
                                                                                <i class="fa fa-phone"></i>
                                                                                Call Patient
                                                                            </a>
                                                                        </div>
                                                                        <div>
                                                                            <a
                                                                                href="{{ route('scheduler.sms') }}"
                                                                                target="_blank"
                                                                                class="btn btn-primary rounded-pill ms-2"
                                                                            >
                                                                                <i class="ri-message-2-fill"></i>
                                                                                Send SMS
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
