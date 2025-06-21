<div>
    <div class="row">
        <!-- Header title -->
        @include('livewire.dashboards.includes.header')

        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'cn_patients'"
                        :title="'Patients'"
                        :subtitle="'Patients'"
                        :total_count="$total_patients_count"
                        :data="$patients_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'cn_shift_distribution'"
                        :title="'Shift Distribution'"
                        :subtitle="'Shifts'"
                        :total_count="$total_shifts_count"
                        :data="$shifts_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-primary'"
                        :icon="'fa fa-stethoscope'"
                        :title="'Consultations'"
                        :count="$total_consultations_count"
                        :percentage="$total_consultation_percentage"
                        {{-- :message="'from last month'" --}}
                        :view_type="$this->view_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-success'"
                        :icon="'fa fa-money-bill-wave'"
                        :title="'Revenue Generated'"
                        :count="$total_revenue_generated"
                        :percentage="$total_revenue_percentage"
                        {{-- :message="'from last month'" --}}
                        :view_type="$this->view_type"
                    />
                </div>
            </div>
        </div>

        {{-- Patient Visits By Month --}}
        <div class="col-lg-8">
            <x-line_graph
                :id="'cn_patient_visits'"
                :title="'Patient Visits By Month'"
                :labels="$patients_visits_labels"
                :data="$patients_visits_data"
            />
        </div>

        {{-- discharged patients --}}
        <div class="col-lg-4">
            @include('livewire.dashboards.includes.discharge_patients', ['discharged_patients' => $discharged_patients])
        </div>

        <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Wards</h4>
                    </div>
                </div>
                <div class="iq-card-body pb-0">
                    @forelse ($wards_data['most_occupied_wards'] ?? [] as $ward)
                        <x-horizontal_progress_bar
                            :title="$ward?->ward_name ?? '--'"
                            :percentage="$ward?->occupancy_rate ?? 0"
                            :color="'primary'"
                            :message="'Occupied'"
                        />
                    @empty
                        <li class="d-flex mb-4 align-items-center rounded me-1">
                            <div class="text-center w-100">
                                <h6 class="text-center">No Record Found</h6>
                            </div>
                        </li>
                    @endforelse
                </div>
                <hr />
                <div class="iq-card-body pt-0">
                    <h4 class="card-title text-dark mb-2">Ward Types</h4>
                    <div class="row">
                        @forelse ($wards_data['wards_by_types'] ?? [] as $ward_type => $count)
                            <div class="col-md-3">
                                <p class="mb-0 text-dark font-size-14">{{ $ward_type }}({{ $count }})</p>
                            </div>
                        @empty
                            <div class="col-md-3">
                                <p class="mb-0 text-dark font-size-14">No Record Found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <x-veritical_bar_chart_pill
                :id="'cn_patient_status'"
                :title="'Patient Status'"
                :labels="$patient_status_labels"
                :data="$patient_status_data"
            />
        </div>

        <div class="col-lg-8">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Completed Tests/Scans</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Investigation Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($completed_investigations as $investigation)
                                    <tr>
                                        <td scope="row">
                                            {{
                                                $investigation?->approved_at
                                                    ? now()
                                                        ->parse($investigation?->approved_at)
                                                        ->diffForHumans()
                                                    : '--'
                                            }}
                                        </td>
                                        <td>
                                            {{ $investigation->patient->full_name_title }}
                                        </td>
                                        <td>
                                            {{ $investigation->patient->age }}
                                        </td>
                                        <td>
                                            {{
                                                str_contains($investigation->lab_number, '-LAB-')
                                                    ? 'Laboratory'
                                                    : 'Radiology'
                                            }}
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('consultation.examination', ['visit_number' => $investigation->visit_number]) }}"
                                                class="text-primary"
                                            >
                                                View Report
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Investigation Results Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Pending Consultations</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        @forelse ($pending_consultations as $pending_consultation)
                            <li class="d-flex mb-2 align-items-center iq-bg-primary border border-primary rounded me-1">
                                <div class="user-img img-fluid rounded-start p-1">
                                    <img
                                        src="{{ $pending_consultation?->patient?->profile_pic ?? asset('images/user/Image2.png') }}"
                                        alt="story-img"
                                        class="rounded-circle avatar-40"
                                    />
                                </div>
                                <div class="media-support-info ps-3 py-1">
                                    <h6>
                                        {{ $pending_consultation?->patient?->full_name_title ?? '--' }}
                                    </h6>
                                    <p class="mb-0 font-size-12">
                                        {{ $pending_consultation?->patient?->age }}
                                    </p>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center bg-white py-3 rounded-end">
                                    <div class="dropdown show">
                                        <span
                                            class="dropdown-toggle text-primary mx-2"
                                            id="dropdownMenuButton41"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="true"
                                            role="button"
                                        >
                                            <span class="text-dark">
                                                {{ now()->parse($pending_consultation?->created_at)->format('Y-m-d') ?? '--' }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="d-flex iq-bg-secondary py-3 px-2 rounded mb-2 align-items-center text-center">
                                No Pending Consultations Found
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
