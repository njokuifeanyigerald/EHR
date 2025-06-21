<?php
use App\Helpers\ReferenceHelper;

?>

@props([
    'records' => [],
    'from_ward' => false,
])

<table class="table table-head-custom cursor table-hover table-responsive-lg">
    <thead>
        <tr>
            <th style="text-align: center">Prescription</th>
            <th style="text-align: center">Date</th>
            <th style="text-align: center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($records ?? [] as $record)
            @php
                $prescription = $this->prescriptions->where('id', $record->visit_detail_id)->first();
                $record_data = json_decode($record->record_data);
            @endphp

            <tr>
                <td>
                    <div class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5" role="alert">
                        <span class="text-dark">{{ $prescription->item->item_name }}:</span>
                        <x-dosage-interpretation :prescription="$prescription" />
                    </div>
                </td>
                <td>
                    {{--
                        <table>
                        <tbody>
                        <tr>
                        <td>
                        <div class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5" role="alert">
                        {{ $record->created_at->format('jS F Y') }}
                        </div>
                        </td>
                        <td>
                        <span class="badge badge-primary badge-sm">
                        {{ now()->parse($record_data->time)->format('h:i A') }}-
                        <span style="color: #000000">
                        ({{ ReferenceHelper::abbreviate($record->user->full_names) }})
                        </span>
                        </span>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                    --}}
                    <div>
                        {{ $record->created_at->format('jS F Y') }}
                        <span class="badge badge-primary badge-sm">
                            {{ now()->parse($record_data->time)->format('h:i A') }}-
                            <span style="color: #000000">
                                ({{ ReferenceHelper::abbreviate($record->user->full_names) }})
                            </span>
                        </span>
                    </div>
                </td>
                <td>
                    <a
                        href="#"
                        data-bs-toggle="modal"
                        data-bs-target="#view_treatment"
                        title="View"
                        wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                    >
                        <i class="ri-eye-line text-primary icons-sm"></i>
                    </a>
                    @if ($from_ward)
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_or_edit_treatment"
                            wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            title="Edit"
                        >
                            <i class="ri-pencil-line text-warning icons-sm"></i>
                        </a>
                        <a href="#" wire:click="deleteTreatment({{ $record->id }})" title="Delete">
                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>
