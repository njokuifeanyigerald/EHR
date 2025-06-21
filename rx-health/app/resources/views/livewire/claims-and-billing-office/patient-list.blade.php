<div>
    @include('livewire.re-usable-components.patient.patient-search-input')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Visit ID</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits as $visit)
                                <tr>
                                    <td scope="row">
                                        {{ $loop->iteration + $visits->firstItem() - 1 }}
                                    </td>
                                    <td>
                                        {{ $visit->created_at->format('jS F Y h:i A') }}
                                    </td>
                                    <td>
                                        {{ $visit->patient->full_name_title }}
                                    </td>
                                    <td>
                                        {{ $visit->visit_number }}
                                    </td>
                                    <td>
                                        {{ $visit->patient->sex ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <x-visit_status_button :visit="$visit" />
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('claims_billing.show', ['visit_number' => $visit->visit_number]) }}"
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
    </div>
</div>
