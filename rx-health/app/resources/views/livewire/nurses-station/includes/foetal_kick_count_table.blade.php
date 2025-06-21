<?php

use App\Enums\FoetalKickCheckTypes;

?>

@props([
    'records' => [],
    'from_ward' => false,
    'kick_check_types' => FoetalKickCheckTypes::options(),
])

<table
    class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
>
    <thead>
        <tr>
            <th></th>
            @foreach ($kick_check_types as $kick_check_type)
                <th colspan="3">{{ Str::headline($kick_check_type) }}</th>
            @endforeach

            <th>Total</th>
        </tr>
        <tr>
            <th>Date</th>
            @foreach ($kick_check_types as $kick_check_type)
                <th>Start Time</th>
                <th>End Time</th>
                <th>Kick Count</th>
            @endforeach

            <th>Total Kick Count</th>
            <th>User</th>
            @if ($from_ward)
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @forelse ($records as $record)
            @php
                $record_data = json_decode($record->record_data, true);
            @endphp

            <tr>
                <td>
                    @include(
                        'livewire.nurses-station.inpatient.patient-folder.includes.date-to-show',
                        [
                            'date' => $record_data['date'],
                        ]
                    )
                </td>
                @foreach ($kick_check_types as $kick_check_type)
                    <th>
                        {{
                            $record_data['monitoring'][$kick_check_type]['start_time'] ?? null
                                ? now()
                                    ->parse($record_data['monitoring'][$kick_check_type]['start_time'])
                                    ->format('h:i A')
                                : '--'
                        }}
                    </th>
                    <th>
                        {{
                            $record_data['monitoring'][$kick_check_type]['end_time'] ?? null
                                ? now()
                                    ->parse($record_data['monitoring'][$kick_check_type]['end_time'])
                                    ->format('h:i A')
                                : '--'
                        }}
                    </th>
                    <th>
                        {{ $record_data['monitoring'][$kick_check_type]['kick_count'] ?? '--' }}
                    </th>
                @endforeach

                <td>
                    {{ $record_data['monitoring']['total_kick_count'] ?? '--' }}
                </td>
                <td>
                    {{ $record->user->full_names }}
                </td>
                @if ($from_ward)
                    <td>
                        <a
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_foetal_kick_count"
                            {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a wire:click="deleteFoetalKickCount({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>
