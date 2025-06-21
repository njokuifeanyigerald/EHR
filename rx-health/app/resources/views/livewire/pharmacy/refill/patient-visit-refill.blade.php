<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="mt-4">
                    {{-- Search --}}
                    <p>
                        Search for a patient -
                        <small>using Folder Number/Tel/Vist Number/Visit Date.</small>
                    </p>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                <div class="input-icon input-icon-right">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Enter Folder Number/Tel/Vist Number/Visit Date"
                                        wire:model.live.debounce.550ms="search"
                                        name="search"
                                    />
                                    <span><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-head-custom cursor table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Patient</th>
                                <th>Telephone</th>
                                <th>Refill Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patient_refill_visits as $patient_refill_visit)
                                <tr>
                                    <td>1</td>
                                    <td>
                                        {{ date('dS F Y', strtotime($patient_refill_visit->visit_date)) }}
                                    </td>
                                    <td>
                                        {{ $patient_refill_visit->patient?->full_name_title . ' ' . $patient_refill_visit->patient?->folder_number }}
                                    </td>
                                    <td>{{ $patient_refill_visit->patient?->telephone }}</td>
                                    <td>
                                        {{ $patient_refill_visit->created_at->format('dS F Y') }}
                                        <span class="iq-bg-danger ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">
                                            {{ $patient_refill_visit->created_at->diffForHumans() }}
                                        </span>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('pharmacy.prescribe_pharmacy_benefit', $patient_refill_visit->visit_number) }}"
                                            title="View Refill"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="text-center">No refill visits found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
