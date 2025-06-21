<div>
    <div class="row">
        @include('livewire.dashboards.includes.header')

        {{-- widgets --}}
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'fd_registered_patients'"
                        :title="'Registered Patients'"
                        :subtitle="'Patients'"
                        :total_count="$total_registered_patients_count"
                        :data="$registered_patients_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'fd_total_appointments'"
                        :title="'Total Appointments'"
                        :subtitle="'Appointments'"
                        :total_count="$total_appointments_count"
                        :data="$appointments_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-info'"
                        :icon="'ri-hospital-line'"
                        :title="'Total Visits'"
                        :count="$total_visits_count"
                        :percentage="$total_visit_percentage"
                        {{-- :message="'from last month'" --}}
                        :view_type="$this->view_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-danger'"
                        :icon="'fa fa-plus'"
                        :title="'Emergency Visits'"
                        :count="$total_emergency_visits_count"
                        :percentage="$total_emergency_visits_percentage"
                        {{-- :message="'from last month'" --}}
                        :view_type="$this->view_type"
                    />
                </div>
            </div>
        </div>

        {{-- Patient Visits By Month --}}
        <div class="col-lg-8">
            <x-line_graph
                :id="'fd_patient_visits'"
                :title="'Patient Visits By Month'"
                :labels="$patients_visits_labels"
                :data="$patients_visits_data"
            />
        </div>

        {{-- Discharged Patients --}}
        <div class="col-lg-4">
            @include('livewire.dashboards.includes.discharge_patients', ['discharged_patients' => $discharged_patients])
        </div>

        {{-- Recent Visits --}}
        <div class="col-lg-8">
            @include('livewire.dashboards.includes.recent_visits', ['show_add_new_patient' => true, 'recent_visits' => $recent_visits, 'url' => 'folder'])
        </div>

        {{-- Upcoming Appointments --}}
        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Upcoming Appointments</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        @forelse ($upcoming_appointments ?? [] as $appointment)
                            <li class="d-flex mb-2 px-2 align-items-center iq-bg-primary border border-primary rounded">
                                <div class="user-img img-fluid rounded-start p-1">
                                    <img
                                        src="{{ asset($appointment?->patient?->profile_pic ?? 'images/user/Image2.png') }}"
                                        alt="story-img"
                                        class="rounded-circle avatar-40"
                                    />
                                </div>
                                <div class="media-support-info ps-3 py-1">
                                    <h6>
                                        {{ $appointment?->patient?->full_name_title ?? '--' }}
                                    </h6>
                                    <p class="mb-0 font-size-12 text-dark">
                                        {{ $appointment?->user?->full_names ?? '--' }}
                                    </p>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center py-3 rounded-end">
                                    <div class="dropdown show">
                                        <span
                                            class="dropdown-toggle text-primary mx-2"
                                            id="dropdownMenuButton41"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="true"
                                            role="button"
                                        >
                                            <span class="text-dark">
                                                {{ $appointment?->start_date ?? '--' }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="d-flex mb-4 align-items-center iq-bg-primary border border-primary rounded me-1">
                                <div class="text-center w-100">
                                    <h6 class="text-center">No Record Found</h6>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <x-veritical_bar_chart_pill
                :id="'fd_patient_locations'"
                :title="'Patient Locations'"
                :labels="$patient_locations_labels"
                :data="$patient_locations_data"
            />
        </div>

        <div class="col-md-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Consultation Rooms</h4>
                    </div>
                </div>
                <div class="iq-card-body rx-dash-lists">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Consultation Room</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Shift</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consultation_room_data['consulting_rooms'] ?? [] as $consultation_room)
                                <tr>
                                    <td scope="row">
                                        {{ $consultation_room->unit_name ?? '--' }}
                                    </td>
                                    <td>
                                        {{ $consultation_room_data['duties']->where('department_unit_id', $consultation_room->id)->first()->attendingOfficer->full_name_title ?? '--' }}
                                    </td>
                                    <td>
                                        {{ $consultation_room_data['duties']->where('department_unit_id', $consultation_room->id)->first()->shift->name ?? '--' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
