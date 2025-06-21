@props([
    'records' => [],
    'from_ward' => false,
])

<table class="table table-head-custom cursor table-hover table-responsive-lg">
    <thead>
        <tr>
            <th>Date</th>
            <th>Diagnosis</th>
            <th>Current Medication</th>
            <th>Operation</th>
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
                            'time' => $record_data?->date,
                        ]
                    )
                </td>
                <td>
                    {{ $record_data?->monitoring?->diagnosis ?? '--' }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->current_medication ?? '--' }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->operation ?? '--' }}
                </td>
                <td>
                    {{ $record->user->full_names }}
                </td>
                <td>
                    <a
                        href="#"
                        data-bs-toggle="modal"
                        data-bs-target="#view_anaesthetic_record"
                        title="View"
                        wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                    >
                        <i class="ri-eye-line text-primary icons-sm"></i>
                    </a>
                    @if ($from_ward)
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_anaesthetic"
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a href="#" wire:click="deleteAnaesthetic({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>
