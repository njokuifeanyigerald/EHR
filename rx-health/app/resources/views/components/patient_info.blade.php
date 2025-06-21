@props([
    'visit',
])

<div class="col-md-12">
    <div class="iq-card py-2">
        <div class="row">
            <div class="col-sm-3">
                <div class="add-img-user">
                    <img
                        class="profile-img-edit img-fluid ms-4 d-block doc-profile-bg rx-profile-circle"
                        src="{{ $visit->patient->profile_pic ?? asset('images/user/Image2.png') }}"
                        alt="profile-pic"
                    />
                </div>
            </div>
            <div class="col-sm-9 my-auto">
                <div class="row">
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-2">Full Name:</span>
                        <span class="text-dark">
                            {{ $visit->patient->full_name_title ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-1">Sex:</span>
                        <span class="text-dark">
                            {{ $visit->patient->sex ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-1">Patient ID:</span>
                        <span class="text-dark">
                            {{ $visit->patient->new_folder_number ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-1">Tel:</span>
                        <span class="text-dark">
                            {{ $visit->patient->telephone ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4">
                        <span class="text-dark me-1">Date of Birth:</span>
                        <span class="text-dark">
                            {{
                                $visit->patient->date_of_birth
                                    ? now()
                                        ->parse($visit->patient->date_of_birth)
                                        ->format('jS F, Y')
                                    : 'N/A'
                            }}
                        </span>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-1">Payment:</span>
                        <span class="text-dark">
                            {{ $visit->billingCode->name ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <span class="text-dark me-1">Insurer:</span>
                        <span class="text-dark">
                            {{ $visit->insurance_company ?? 'N/A' }}
                        </span>
                    </div>
                    <div class="col-sm-4">
                        <span class="text-dark me-1">Mem No.:</span>
                        <span class="text-dark">
                            {{ $visit->insurance_no ?? 'N/A' }}
                        </span>
                    </div>
                    {{--
                        <div class="col-sm-4">
                        <span class="text-dark me-1">Employer:</span>
                        <span class="text-dark"></span>
                        </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
