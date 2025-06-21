<div>
    <div class="d-flex justify-content-end my-2">
        <button
            class="btn btn-primary"
            wire:click="resetDetails"
            data-bs-toggle="modal"
            data-bs-target="#add_or_edit_nurses_note"
        >
            <i class="fa fa-plus"></i>
            Add New
        </button>
    </div>
    <div class="table-responsive">
        <table
            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
        >
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Added by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr>
                        <td>
                            {{ $loop->iteration + $records->firstItem() - 1 }}
                        </td>
                        <td>
                            {{ $record->updated_at->format('jS F, Y') }}
                        </td>
                        <td>
                            {!! Str::limit(json_decode($record?->record_data)?->message ?? 'N/A', 60) !!}
                        </td>
                        <td>
                            {{ Str::title($record?->user?->full_names) }}
                        </td>
                        <td>
                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#nurses_notes_view"
                                title="View"
                                wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            >
                                <i class="ri-eye-line text-primary icons-sm"></i>
                            </a>
                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#add_or_edit_nurses_note"
                                wire:click="loadDataToEditForMedicalRecordNursesNote({{ $record->id }});"
                                title="Edit"
                            >
                                <i class="ri-pencil-line text-warning icons-sm"></i>
                            </a>
                            <a href="#" wire:click="deleteNurseNote({{ $record->id }})" title="Delete">
                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.notes.add-or-edit-modal')

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.notes.view')
</div>
