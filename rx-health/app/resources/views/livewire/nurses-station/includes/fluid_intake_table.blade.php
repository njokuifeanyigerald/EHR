@props([
    'records' => [],
    'from_ward' => false,
])

<table class="table table-bordered table-head-custom table-striped cursor table-hover">
    <thead>
        <tr>
            <th></th>
            <th colspan="4">Intake Route</th>
            <th colspan="5">Output Route</th>
            <th colspan="3"></th>
        </tr>
        <tr>
            <th>Date Time</th>
            <th>Oral</th>
            <th>IV</th>
            <th>Chloride in urine</th>
            <th>In-Take Total</th>
            {{-- <th></th> --}}
            <th>Urine</th>
            <th>Tube</th>
            <th>Vomit</th>
            <th>Other</th>
            <th>Chloride in urine</th>
            <th>Output Total</th>
            <th>Balance</th>
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
                            'record' => $record,
                        ]
                    )
                </td>
                <td>{{ $record_data->oral }} ml of {{ $record_data->type_of_oral }}</td>
                <td>{{ $record_data->iv }} ml of {{ $record_data->type_of_iv }}</td>
                <td>{{ $record_data->in_chloride_in_urine }} ml</td>
                <td>{{ $record_data->oral + $record_data->iv + $record_data->in_chloride_in_urine }} ml</td>
                {{-- <td></td> --}}
                <td>{{ $record_data->urine }} ml</td>
                <td>{{ $record_data->tube }} ml</td>
                <td>{{ $record_data->vomit }} ml</td>
                <td>{{ $record_data->other }} ml</td>
                <td>{{ $record_data->out_chloride_in_urine }} ml</td>
                <td>
                    {{ $record_data->urine + $record_data->tube + $record_data->vomit + $record_data->other }}
                    ml
                </td>
                <td>
                    <span class="badge badge-success badge-sm">1099 Ask</span>
                </td>
                <td>{{ $record->user->full_names }}</td>
                @if ($from_ward)
                    <td>
                        <a
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_fluid_intake_and_output"
                            {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a wire:click="deleteFluidIntakeAndOutput({{ $record->id }})" title="Delete">
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
