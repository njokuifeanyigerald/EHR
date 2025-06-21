@props([
    'discharged_patients' => [],
])

<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title fw-bold text-muted">Discharged Patients</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <ul class="rx-dash-lists m-0 p-0" style="height: 355px">
            @forelse ($discharged_patients ?? [] as $discharged_patient)
                <a href="{{ route('patients.show', ['id' => $discharged_patient?->id]) }}">
                    <li class="d-flex iq-bg-secondary py-3 px-2 rounded mb-2 align-items-center">
                        <div class="user-img img-fluid">
                            <img
                                src="{{ $discharged_patient?->profile_pic ?? asset('images/user/Image2.png') }}"
                                alt="story-img"
                                class="rounded-circle avatar-40"
                            />
                        </div>
                        <div class="media-support-info ms-3">
                            <h6>
                                {{ $discharged_patient?->full_name_title ?? '--' }}
                            </h6>
                            <p class="mb-0 font-size-12">
                                {{ $discharged_patient?->visits?->first()?->attendingOfficer?->full_names ?? '--' }}
                            </p>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown show">
                                <span
                                    class="dropdown-toggle text-primary"
                                    id="dropdownMenuButton41"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="true"
                                    role="button"
                                >
                                    <span class="text-dark">
                                        {{ now()->parse($discharged_patient?->visits?->first()?->discharge_date)->format('Y-m-d') ?? '--' }}
                                    </span>
                                </span>
                            </div>
                        </div>
                    </li>
                </a>
            @empty
                <li class="d-flex iq-bg-secondary py-3 px-2 rounded mb-2 align-items-center text-center">
                    No Discharged Patient Found
                </li>
            @endforelse
        </ul>
    </div>
</div>
