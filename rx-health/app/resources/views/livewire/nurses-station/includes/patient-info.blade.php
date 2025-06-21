@props([
    'visit_number',
    'patient',
])

<div class="col-lg-12">
    <div class="iq-card d-flex align-content-center" style="height: 90px; width: 100%">
        <div class="col-2" style="height: 90px">
            <div class="add-img-user">
                <img
                    class="img-fluid mx-auto"
                    src="{{ asset($patient?->profile_pic ?? 'images/user/Image2.png') }}"
                    alt="profile-pic"
                    style="border-radius: 25px 0 0 25px !important; height: 90px; width: 100%"
                />
            </div>
        </div>

        <div class="iq-card-body col-10">
            <div class="form-group">
                <div class="img-extension">
                    <div class="d-flex justify-content-center align-content-center">
                        <div class="row col-12">
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Name:</b>
                                    <a href="{{ route('patients.show', $patient?->id) }}" title="View">
                                        <p class="text-primary">
                                            {{ $patient?->title . ' ' . $patient?->surname . ' ' . $patient?->first_name }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Age:</b>
                                    <p>{{ $patient?->age }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Current Visit No:</b>
                                    <p>{{ $visit_number ?? $patient?->visits?->first()?->visit_number }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Gender:</b>
                                    <p>{{ $patient?->sex }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Folder No:</b>
                                    <p>{{ $patient?->new_folder_number ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex gap-2">
                                    <b class="text-dark">Blood Group:</b>
                                    <p>
                                        {{ $patient?->blood_group ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
