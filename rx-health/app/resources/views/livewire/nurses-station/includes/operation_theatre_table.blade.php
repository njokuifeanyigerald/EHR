@props([
    'records' => [],
    'from_ward' => false,
])

<table class="table table-head-custom table-striped cursor table-hover table-responsive-lg">
    <thead>
        <tr>
            <th>Date Time</th>
            <th>Operation</th>
            <th>Surgeon</th>
            <th>Anaesthetist</th>
            <th>Nurse</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($records as $record)
            @php
                $record_data = json_decode($record->record_data);
            @endphp

            <tr>
                <td>
                    @include(
                        'livewire.nurses-station.inpatient.patient-folder.includes.date-to-show',
                        [
                            'date' => $record_data?->monitoring?->start_date,
                            'time' => $record_data?->monitoring?->start_time,
                        ]
                    )
                </td>
                <td>
                    {{ Str::title($record_data?->monitoring?->operation_name ?? 'N/A') }}
                </td>
                <td>
                    {{ Str::title($record_data?->monitoring?->surgeon?->name ?? 'N/A') }}
                </td>
                <td>
                    {{ Str::title($record_data?->monitoring?->anaesthetist?->name ?? 'N/A') }}
                </td>
                <td>
                    {{ Str::title($record_data?->monitoring?->nurse?->name ?? 'N/A') }}
                </td>
                <td>
                    {{ Str::title($record->user->full_names) }}
                </td>
                <td>
                    <a
                        href="#"
                        data-bs-toggle="modal"
                        data-bs-target="#view_operation_theatre"
                        title="View"
                        wire:click="loadDataToEditForMedicalRecord({{ $record->id }},true)"
                    >
                        <i class="ri-eye-line text-primary icons-sm"></i>
                    </a>
                    @if ($from_ward)
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_operation_theatre"
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a href="#" wire:click="deleteOperationTheatre({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>
