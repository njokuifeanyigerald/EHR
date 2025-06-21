@props([
    'records' => [],
    'from_ward' => false,
])

<table class="table table-head-custom table-striped cursor table-hover table-responsive-lg">
    <thead>
        <tr>
            <th>Date Time</th>
            <th>FBS</th>
            <th>RBS</th>
            <th>Remarks</th>
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
                            'date' => $record_data?->date,
                            'time' => $record_data?->time,
                        ]
                    )
                </td>
                <td>
                    {{ $record_data?->fbs }}
                </td>
                <td>
                    {{ $record_data?->rbs }}
                </td>
                <td>
                    {{ Str::limit($record_data?->remarks, 30, '...') }}
                </td>
                <td>
                    {{ $record->user->full_names }}
                </td>
                <td>
                    <a
                        href="#"
                        data-bs-toggle="modal"
                        data-bs-target="#view_glucose"
                        title="View"
                        wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                    >
                        <i class="ri-eye-line text-primary icons-sm"></i>
                    </a>
                    @if ($from_ward)
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_glucose"
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a href="#" wire:click="deleteGlucose({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>
