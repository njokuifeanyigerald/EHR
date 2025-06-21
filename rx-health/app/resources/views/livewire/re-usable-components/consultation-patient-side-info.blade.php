@props([
    'visits',
])

<div class="col-lg-2">
    <div class="iq-card">
        <div class="doc-profile-bg bg-primary rx-profile-bg">
            <div class="add-img-user">
                <img
                    class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill"
                    src="{{ $this->visit?->patient?->profile_pic ?? asset('images/user/Image2.png') }}"
                    alt="profile-pic"
                />
            </div>
        </div>
        <div class="mt-3 text-center" wire:ignore>
            @php
                $newPatient = $this->visit->patient->newPatient();
            @endphp

            <button class="btn {{ $newPatient ? 'btn-outline-danger' : 'btn-outline-success' }} mx-auto">
                {{ $newPatient ? 'New Patient' : 'Existing Patient' }}
            </button>
        </div>
        <div class="iq-card-body">
            <div class="form-group">
                <div class="img-extension mt-1">
                    <div class="d-inline-block">
                        <b class="text-dark">Name:</b>
                        <a href="{{ route('patients.show', $this->visit->patient->id) }}" title="View">
                            <p class="text-primary">
                                {{ $this->visit->patient->full_name_title }}
                            </p>
                        </a>
                        <b class="text-dark">Age:</b>
                        <p>{{ $this->visit->patient->age }}</p>
                        <b class="text-dark">Visit No:</b>
                        <p>{{ $this->visit->visit_number }}</p>
                        <b class="text-dark">Gender:</b>
                        <p>{{ $this->visit->patient->sex }}</p>
                        <b class="text-dark">Folder No:</b>
                        <p>{{ $this->visit->patient->new_folder_number ?? 'N/A' }}</p>
                        <b class="text-dark">Genotype:</b>
                        <p>{{ $this->visit->patient->genotype ?? 'N/A' }}</p>
                        <b class="text-dark">Blood Group:</b>
                        <p>{{ $this->visit->patient->blood_group ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
