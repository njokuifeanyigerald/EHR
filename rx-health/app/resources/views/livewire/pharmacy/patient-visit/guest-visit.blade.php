<div>
    <div wire:ignore.self class="table-responsive">
        <table class="table table-striped table-borderless table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">VISIT DATE</th>
                    <th scope="col">PATIENT</th>
                    <th scope="col">VISIT #</th>
                    <th scope="col">VISIT TYPE</th>
                    <th scope="col">WAITING TIME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guest_visits as $guest_visit)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ date('dS F Y', strtotime($guest_visit->visit_date)) }}</td>
                        <td>{{ $guest_visit->patient?->full_name_title ?? 'N/A' }}</td>
                        <td>{{ $guest_visit->visit_number }}</td>
                        <td>
                            @if ($guest_visit->serviceType?->code == 'GUEST')
                                <span class="schedule-icon">
                                    <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                                </span>
                                <span class="font-weight-bold text-warning">
                                    {{ $guest_visit->serviceType?->name }}
                                </span>
                            @else
                                <span class="schedule-icon">
                                    <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                </span>
                                <span class="font-weight-bold text-primary">
                                    {{ $guest_visit->serviceType?->name }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <x-patient-waiting :visit="$guest_visit" :current_location="'pharmacy'" />
                        </td>
                        <td>
                            @if ($guest_visit->status == 'in_use')
                                <button type="button" class="btn iq-bg-danger btn-rounded btn-sm my-0">
                                    {{ Str::headline($guest_visit->status) }}
                                </button>
                            @elseif ($guest_visit->status == 'done')
                                <button type="button" class="btn iq-bg-primary btn-rounded btn-sm my-0">
                                    {{ Str::headline($guest_visit->status) }}
                                </button>
                            @else
                                <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
                                    {{ Str::headline($guest_visit->status) }}
                                </button>
                            @endif
                        </td>
                        <td class="text-center">
                            <a
                                href="{{ route('pharmacy.prescribe', $guest_visit->visit_number) }}"
                                class="btn btn-outline-primary"
                                title="Prescribe"
                            >
                                <i class="fa fa-hand-holding-medical me-0 icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No guest visits</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $guest_visits->links() }}
    </div>
</div>
