<div>
    @include('livewire.re-usable-components.patient.patient-search-input')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="No">No</th>
                                <th scope="col" data-sortable="true" data-field="Time">Time</th>
                                <th scope="col" data-sortable="true" data-field="Patient">Patient</th>
                                {{-- <th scope="col" data-sortable="true" data-field="Visit ID">Visit ID</th> --}}
                                <th scope="col" data-sortable="true" data-field="Visit ID">Lab Number</th>
                                <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                <th scope="col" data-sortable="true" data-field="Status">Status</th>
                                <th scope="col" data-sortable="true" data-width="150" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lab_visits ?? [] as $lab_visit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $lab_visit?->specimen_collected_at ?? 'N/A' }}
                                    </td>
                                    <td>{{ $lab_visit?->visit?->patient?->getFullNameAndTitle() }}</td>
                                    <td>{{ $lab_visit?->lab_number ?? 'N/A' }}</td>
                                    <td>{{ Str::headline($lab_visit?->visit->patient->sex) }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $lab_visit?->visit->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($lab_visit?->visit?->status) }}
                                        </button>
                                    </td>
                                    <td class="text-center" style="width: 150px">
                                        <a
                                            href="{{ route('lab.show', ['lab_number' => $lab_visit?->lab_number, 'type' => 'enter_results']) }}"
                                            class="btn btn-outline-primary px-1 py-0 me-1"
                                            title="Client Diagnostics"
                                        >
                                            <i class="ri-eye-line m-0 icons-sm"></i>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Pending Client</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $lab_visits->links() }}
            </div>
        </div>
    </div>
</div>
