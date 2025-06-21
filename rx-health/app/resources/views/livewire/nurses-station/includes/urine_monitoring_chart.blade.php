<table class="table table-head-custom table-striped cursor table-hover">
    <thead>
        <tr>
            <th>Date Time</th>
            <th>Urine Protein</th>
            <th>Urine Sugar</th>
            <th>Weight</th>
            <th>Kerotones</th>
            <th>Other</th>
            <th>User</th>
            @if ($from_ward)
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($records as $record)
            @php
                $record_data = json_decode($record->record_data);
            @endphp

            <tr>
                <td>
                    @include('livewire.nurses-station.inpatient.patient-folder.includes.date-to-show', ['record' => $record])
                </td>
                <td>{{ $record_data->urine_protein ?? '-' }}</td>
                <td>{{ $record_data->urine_sugar ?? '-' }}</td>
                <td>{{ $record_data->weight ?? '-' }}</td>
                <td>{{ $record_data->kerotones ?? '-' }}</td>
                <td>{{ $record_data->other ?? '-' }}</td>
                <td>{{ $record->user->full_names }}</td>
                @if ($from_ward)
                    <td>
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_urine_monitoring"
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a href="#" wire:click="deleteUrineMonitoringRecord({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>
