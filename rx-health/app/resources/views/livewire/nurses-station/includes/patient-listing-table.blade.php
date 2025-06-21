@props([
    'type' => 'all',
])
<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="w-100 table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id">ID</th>
                                <th scope="col" data-field="Visit date">VISIT DATE</th>
                                <th scope="col" data-field="Attending officer Name">ATTENDING OFFICER</th>
                                <th scope="col" data-field="Patient Name">PATIENT NAME</th>
                                <th scope="col" data-field="Type of service">TYPE OF SERVICE</th>
                                <th scope="col" data-field="Billing code">BILLING CODE</th>
                                <th scope="col" data-field="Visit Number">VISIT NUMBER</th>
                                <th scope="col" data-field="Adm. Status">ADM. STATUS</th>
                                <th scope="col" data-field="action">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits ?? [] as $visit)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ now()->parse($visit->visit_date)->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        {{ $visit->attendingOfficer?->full_names ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $visit->patient->full_name_title }}
                                    </td>
                                    <td>
                                        {{ Str::headline($visit->serviceType->name) }}
                                    </td>
                                    <td>
                                        {{ Str::headline($visit->billingCode->name) }}
                                    </td>
                                    <td>
                                        {{ $visit->visit_number }}
                                    </td>
                                    <td class="text-center">
                                        {{--
                                            {{
                                            $visit->patientWards->count() > 0
                                            ? 'Ward Admission'
                                            : 'Pending Ward Admission'
                                            }}
                                        --}}
                                        {{
                                            $visit->patientWards->count() == 0
                                                ? 'Pending Ward Admission'
                                                : ($visit->patientWards->first()->status == 'booked'
                                                    ? 'Ward Admission'
                                                    : 'Discharged From Ward')
                                        }}
                                    </td>
                                    <td class="text-center">
                                        @if ($type == 'all')
                                            @if ($visit->patientWards->count() == 0)
                                                <a
                                                    href="#"
                                                    class="me-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#assign_bed"
                                                    title="Assign Bed"
                                                    wire:click="dispatch('openAssignBedModal',[{{ $visit->id }}])"
                                                >
                                                    <i class="ri-hotel-bed-line text-success icons-base"></i>
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('inpatient.show', $visit->visit_number) }}"
                                                    title="Open Visit"
                                                >
                                                    <i class="ri-file-user-line text-primary icons-base"></i>
                                                </a>
                                            @endif
                                        @else
                                            <a
                                                href="{{ route('inpatient.show', $visit->visit_number) }}"
                                                title="Open Visit"
                                            >
                                                <i class="ri-file-user-line text-primary icons-base"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="12" class="w-100 text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $visits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
