<?php
use App\Enums\FeedingTypes;
use App\Enums\CheckingTimes;
?>

@props([
    'records' => [],
    'from_ward' => false,
    'feeding_types' => FeedingTypes::options(),
    'check_times' => CheckingTimes::options(),
])

<table
    class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
>
    <thead>
        <tr class="text-center">
            <th></th>
            @foreach ($feeding_types as $feeding_type)
                <th colspan="3">
                    <span
                        class="badge badge-{{ $feeding_type == 'lunch' ? 'warning' : ($feeding_type == 'dinner' ? 'success' : 'primary') }} badge-sm"
                    >
                        {{ Str::headline($feeding_type) }}
                    </span>
                </th>
            @endforeach

            {{--
                <th colspan="3">
                <span class="badge badge-warning badge-sm">Lunch</span>
                </th>
                <th colspan="3">
                <span class="badge badge-success badge-sm">Supper</span>
                </th>
            --}}
            <th></th>
        </tr>
        <tr>
            <th>Date</th>
            @foreach ($feeding_types as $feeding_type)
                @foreach ($check_times as $check_time)
                    <th>
                        {{ Str::headline($check_time) }}
                    </th>
                @endforeach
            @endforeach

            {{-- <th>Sugar Level</th> --}}
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
                @foreach ($feeding_types as $feeding_type)
                    @foreach ($check_times as $check_time)
                        <td>
                            @if (isset($record_data['monitoring'][$feeding_type][$check_time]))
                                <span class="col">
                                    <span class="gap-1">
                                        <span class="fw-bolder">Time:</span>
                                        <span>
                                            {{
                                                $record_data['monitoring'][$feeding_type]['fasting']['time'] ?? null
                                                    ? now()
                                                        ->parse($record_data['monitoring'][$feeding_type]['fasting']['time'])
                                                        ->format('h:i A')
                                                    : '--'
                                            }}
                                        </span>
                                    </span>
                                    ,
                                    <span class="gap-1">
                                        <span class="fw-bolder">Sugar Level:</span>
                                        <span>
                                            {{ $record_data['monitoring'][$feeding_type]['fasting']['sugar_level'] ?? '--' }}
                                        </span>
                                    </span>
                                    ,
                                    <span class="gap-1">
                                        <span class="fw-bolder">Glucose Level:</span>
                                        <span>
                                            {{ $record_data['monitoring'][$feeding_type]['fasting']['glucose_level'] ?? '--' }}
                                        </span>
                                    </span>
                                </span>
                            @else
                                {{-- <span class="text-muted text-center w-full">--</span> --}}
                                <span class="text-muted text-center w-full">N/A</span>
                            @endif
                        </td>
                    @endforeach
                @endforeach

                {{-- <td>Sugar Level</td> --}}
                <td>
                    {{ $record->user->full_names }}
                </td>
                @if ($from_ward)
                    <td>
                        <a
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_blood_glucose_monitoring"
                            {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a wire:click="deleteBloodGlucoseMonitoring({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="13" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>
