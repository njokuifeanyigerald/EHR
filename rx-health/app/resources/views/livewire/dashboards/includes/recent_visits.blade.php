@props([
    'recent_visits' => [],
    'show_add_new_patient' => false,
    'url' => 'folder',
    //vital-or-folder,
])
<div class="iq-card iq-card-block iq-card-height">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title fw-bold text-muted">Recent Visits</h4>
        </div>
        @if ($show_add_new_patient)
            <div class="iq-card-header-toolbar d-flex align-items-center">
                <a href="{{ route('patients.create') }}" class="btn btn-primary me-3 my-2">
                    <i class="fa fa-plus"></i>
                    New Patient
                </a>
            </div>
        @endif
    </div>
    <div class="iq-card-body">
        <div class="table-responsive rx-dash-lists" style="height: 355px">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Visit No</th>
                        <th scope="col">Visit type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recent_visits ?? [] as $visit)
                        <tr>
                            <td scope="row">
                                {{ now()->parse($visit?->visit_date)->format('jS F Y') ?? '--' }}
                            </td>
                            <td>
                                {{ $visit?->patient?->full_name_title ?? '--' }}
                            </td>
                            <td>
                                {{ $visit?->visit_number ?? '--' }}
                            </td>

                            <td>
                                @php
                                    $service_type = $this->service_types
                                        ->where('id', $visit?->type_of_service)
                                        ->first();
                                @endphp

                                <span class="schedule-icon">
                                    <i
                                        class="ri-checkbox-blank-circle-fill {{ $service_type?->code == 'INP' ? 'text-success' : ($service_type?->code == 'OUTP' ? 'text-primary' : 'text-warning') }}"
                                    ></i>
                                </span>
                                <span
                                    class="font-weight-bold {{ $service_type?->code == 'INP' ? 'text-success' : ($service_type?->code == 'OUTP' ? 'text-primary' : 'text-warning') }}"
                                >
                                    {{ $service_type->name ?? '--' }}
                                </span>
                            </td>
                            <td>
                                <x-visit_status_button :visit="$visit" />
                            </td>
                            <td>
                                {{ Str::headline($visit?->location?->name ?? '--') }}
                            </td>
                            <td>
                                <a
                                    href="{{ $url === 'folder' ? route('patients.show', $visit?->patient?->id) : route('nurses-station.patient', ['id' => $visit?->patient?->id, 'type' => 'vitals']) }}"
                                    title="View"
                                >
                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
