<div class="table-responsive mt-3">
    <table class="table cursor table-hover table-borderless table-striped">
        <thead>
            <tr>
                <th scope="col" data-field="#">#</th>
                <th scope="col" data-field="visit date">VISIT DATE</th>
                <th scope="col" data-field="patient">PATIENT</th>
                <th scope="col" data-field="visit id">VISIT NO</th>
                <th scope="col" data-field="visit type">VISIT TYPE</th>
                <th scope="col" data-field="status">STATUS</th>
                <th scope="col" data-field="action">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($visits as $visit)
                <tr wire:key="{{ $type }}-visit-{{ $visit->id }}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    {{-- <td>10th October 2023</td> --}}
                    <td>
                        {{ Carbon\Carbon::parse($visit->visit_date)->format('jS F Y') }}
                    </td>
                    {{-- @dd($visit->patient) --}}
                    <td>
                        {{ $visit->patient->full_name_title }}
                    </td>
                    <td>{{ $visit->visit_number ? $visit->visit_number : 'N/A' }}</td>
                    <td>
                        @if ($visit->serviceType->code == 'INP')
                            <span class="schedule-icon">
                                <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                            </span>
                            <span class="font-weight-bold text-warning">
                                {{ $visit->serviceType->name }}
                            </span>
                        @elseif ($visit->serviceType->code == 'OUTP')
                            <span class="schedule-icon">
                                <i class="ri-checkbox-blank-circle-fill text-success"></i>
                            </span>
                            <span class="font-weight-bold text-success">
                                {{ $visit->serviceType->name }}
                            </span>
                        @else
                            <span class="schedule-icon">
                                <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                            </span>
                            <span class="font-weight-bold text-primary">
                                {{ $visit->serviceType->name }}
                            </span>
                        @endif

                        @if ($visit->emergency_service)
                            <i class="ri-alert-fill text-danger" data-bs-toggle="tooltip" title="Emergency Service"></i>
                        @endif
                    </td>
                    <td>
                        <x-visit_status_button :visit="$visit" />
                    </td>
                    <td class="text-center">
                        <a href="{{ route('patients.show', $visit->patient->id) }}" title="View">
                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No Visit Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $visits->links() }}
</div>
