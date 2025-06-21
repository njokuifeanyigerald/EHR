@props([
    'records' => [],
    'from_ward' => false,
])

<table
    class="table table-bordered table-bordered table-head-custom table-striped cursor table-hover table-responsive-lg"
>
    <thead>
        <tr>
            <th></th>
            {{-- <th></th> --}}
            <th colspan="4">
                <span class="badge badge-primary badge-sm">Pre Breakfast</span>
            </th>
            <th colspan="4">
                <span class="badge badge-warning badge-sm">Pre Lunch</span>
            </th>
            <th colspan="4">
                <span class="badge badge-success badge-sm">Pre Supper</span>
            </th>
        </tr>
        <tr>
            <th>Date</th>
            <th>SL Time</th>
            <th>SL (mml)</th>
            <th>ATP Time</th>
            <th>ATP (mml)</th>
            <th>SL Time</th>
            <th>SL (mml)</th>
            <th>ATP Time</th>
            <th>ATP (mml)</th>
            <th>SL Time</th>
            <th>SL (mml)</th>
            <th>ATP Time</th>
            <th>ATP (mml)</th>
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
                    @include(
                        'livewire.nurses-station.inpatient.patient-folder.includes.date-to-show',
                        [
                            'date' => $record_data?->date,
                        ]
                    )
                </td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_breakfast?->sugar_level_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_breakfast?->sugar_level_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->pre_breakfast?->sugar_level ?? null }}
                </td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_breakfast?->actrapid_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_breakfast?->actrapid_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->pre_breakfast?->actrapid ?? null }}
                </td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_lunch?->sugar_level_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_lunch?->sugar_level_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>{{ $record_data?->monitoring?->pre_lunch?->sugar_level ?? null }}</td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_lunch?->actrapid_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_lunch?->actrapid_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->pre_lunch?->actrapid ?? null }}
                </td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_supper?->sugar_level_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_supper?->sugar_level_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->pre_supper?->sugar_level ?? null }}
                </td>
                <td>
                    {{
                        $record_data?->monitoring?->pre_supper?->actrapid_time ?? null
                            ? now()
                                ->parse($record_data?->monitoring?->pre_supper?->actrapid_time)
                                ->format('h:i A')
                            : '--'
                    }}
                </td>
                <td>
                    {{ $record_data?->monitoring?->pre_supper?->actrapid ?? null }}
                </td>
                <td>
                    {{ $record->user->full_names }}
                </td>
                @if ($from_ward)
                    <td>
                        <a
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_sliding_scale"
                            {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a wire:click="deleteSlidingScale({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="15" class="text-center">No data found</td>
            </tr>
        @endforelse
    </tbody>
</table>
