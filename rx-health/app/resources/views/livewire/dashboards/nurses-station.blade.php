<div>
    <div class="row">
        <!-- Header title -->
        @include('livewire.dashboards.includes.header')

        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'ns_patients'"
                        :title="'Patients'"
                        :subtitle="'Patients'"
                        :total_count="$total_patients_count"
                        :data="$patients_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-display_donut_chart_card
                        :id="'ns_beds'"
                        :title="'Assigned Beds'"
                        :subtitle="'Beds'"
                        :total_count="$total_beds_count"
                        :data="$beds_by_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-info'"
                        :icon="'fa fa-heart-pulse'"
                        :title="'Vitals Taken'"
                        :count="$total_vitals_count"
                        :percentage="$total_vital_percentage"
                        :view_type="$this->view_type"
                    />
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-count_widget_card
                        :color="'iq-bg-danger'"
                        :icon="'fa fa-bed-pulse'"
                        :title="'Patients In Ward'"
                        :count="$total_patient_in_ward_count"
                        :percentage="$total_patient_in_ward_percentage"
                        :view_type="$this->view_type"
                    />
                </div>
            </div>
        </div>

        {{-- Patient Visits By Month --}}
        <div class="col-lg-8">
            <x-line_graph
                :id="'ns_patient_visits'"
                :title="'Patient Visits By Month'"
                :labels="$patients_visits_labels"
                :data="$patients_visits_data"
            />
        </div>

        {{-- discharge patients --}}
        <div class="col-lg-4">
            @include('livewire.dashboards.includes.discharge_patients', ['discharged_patients' => $discharged_patients])
        </div>

        <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-height">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Most Occupied Wards</h4>
                    </div>
                </div>
                <div class="iq-card-body pb-0">
                    @forelse ($most_occupied_wards_data['most_occupied_wards'] ?? [] as $ward)
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
                        @forelse ($most_occupied_wards_data['wards_by_types'] ?? [] as $ward_type => $count)
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
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Beds</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    @forelse ($beds_count_by_type ?? [] as $ward_type => $count)
                        <x-horizontal_progress_bar
                            :title="$ward_type.'('.$count['total_count'].')'"
                            :percentage="$count['percentage_occupied']"
                            :color="'success'"
                            :message="'Occupied'"
                        />
                    @empty
                        <div class="row mb-4">
                            <p class="mb-0 text-dark font-size-14">No Record Found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            @include('livewire.dashboards.includes.recent_visits', ['show_add_new_patient' => false, 'recent_visits' => $recent_visits, 'url' => 'vital'])
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title fw-bold text-muted">Recent Vitals Taken</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
                        @forelse ($recent_vitals_taken ?? [] as $vital_taken)
                            <li
                                wire:key="ns_recent_vital-{{ $vital_taken?->id }}"
                                class="d-flex mb-2 px-2 align-items-center iq-bg-primary border border-primary rounded"
                            >
                                <div class="user-img img-fluid rounded-start p-1">
                                    <img
                                        src="{{ asset($vital_taken?->patient?->profile_pic ?? 'images/user/Image2.png') }}"
                                        alt="story-img"
                                        class="rounded-circle avatar-40"
                                    />
                                </div>
                                <div class="media-support-info ps-3 py-1">
                                    <h6>
                                        {{ $vital_taken?->patient?->full_name_title ?? '--' }}
                                    </h6>
                                    <p class="mb-0 font-size-12 text-dark">
                                        {{ $vital_taken?->user?->full_names ?? '--' }}
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
                                                {{ $vital_taken?->created_at->diffForHumans() ?? '--' }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="d-flex mb-4 align-items-center rounded me-1">
                                <div class="text-center w-100">
                                    <h6 class="text-center">No Record Found</h6>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
