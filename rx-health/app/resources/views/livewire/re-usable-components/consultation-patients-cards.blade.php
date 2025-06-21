@props([
    'visits' => [],
    'type' => 'consultation',
])

<div class="col-md-12 col-lg-12">
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                @forelse ($visits ?? [] as $visit)
                    <div class="col-lg-6">
                        <a
                            href="{{
                                $type == 'consultation'
                                    ? route('consultation.examination', $visit->visit_number)
                                    : route('consultation.patientInWard', [
                                        'ward_id' => $visit->patientWards->first()->bed->ward_id,
                                        'visit_number' => $visit->visit_number,
                                    ])
                            }}"
                        >
                            <div class="iq-card shadow">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="rx-patient-profile-l bg-primary rx-profile-bg">
                                            <div class="add-img-user">
                                                <img
                                                    class="profile-img-edit img-fluid mx-auto d-block rx-patient-profile-l rx-profile-fill"
                                                    src="{{ asset('images/user/Image2.png') }}"
                                                    alt="profile-pic"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row my-2 mx-1">
                                            <div class="col-lg-6">
                                                <p>
                                                    <span class="text-dark">Name:</span>
                                                    <span class="text-primary">
                                                        {{ $visit->patient->title . ' ' . $visit->patient->first_name . ' ' . $visit->patient->surname }}
                                                    </span>
                                                </p>
                                                <p>
                                                    <span class="text-dark">Gender:</span>
                                                    {{ $visit->patient->sex }}
                                                </p>
                                                <p>
                                                    <span class="text-dark">Folder No:</span>
                                                    {{ $visit->patient->new_folder_number ?? 'N/A' }}
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                @if ($type == 'consultation')
                                                    <p class="{{ $visit->emergency_service ? 'text-danger' : '' }}">
                                                        <span class="text-dark">Visit Type:</span>
                                                        {{ $visit->emergency_service ? 'Emergency' : 'Normal Visit' }}
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="text-dark">Bed Name:</span>
                                                        {{ Str::title($visit->patientWards->first()->bed->bed_name ?? 'N/A') }}
                                                    </p>
                                                @endif

                                                <p>
                                                    <span class="text-dark">Visit No:</span>
                                                    {{ $visit->visit_number }}
                                                </p>
                                                @if ($type == 'consultation')
                                                    <p>
                                                        <span class="text-dark">Duration:</span>
                                                        {{-- {{ $visit->created_at->diffForHumans() }} --}}
                                                        <x-patient-waiting
                                                            :visit="$visit"
                                                            :current_location="'consult'"
                                                        />
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="text-dark">Age:</span>
                                                        {{ $visit->patient->age }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="d-flex justify-content-center">No Record Found</div>
                @endforelse
            </div>
        </div>
        {{ $visits->links() }}
    </div>
</div>
