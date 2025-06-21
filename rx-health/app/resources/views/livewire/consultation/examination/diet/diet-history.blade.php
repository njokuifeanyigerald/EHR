<div>
    <div class="d-flex justify-content-end mb-2">
        <button data-bs-toggle="modal" data-bs-target="#new_diet_history" class="btn btn-sm btn-primary">
            New Dietary History
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-head-custom cursor text-center mt-3">
            <thead class="">
                <tr>
                    <th>Meal Type</th>
                    <th>Time</th>
                    <th>Food</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medical_records as $medical_record)
                    @php
                        $record = json_decode($medical_record->record_data)->diet_history;
                    @endphp

                    <tr>
                        <td>{{ $record->meal_type ?? 'N/A' }}</td>
                        <td>{{ $record->time ? now()->parse($record->time)->format('jS F, Y g:i A') : 'N/A' }}</td>
                        <td>{{ $record->food ?? 'N/A' }}</td>
                        <td>{{ $record->quantity ?? 'N/A' }}</td>
                        <td>
                            <a
                                data-bs-toggle="modal"
                                data-bs-target="#new_diet_history"
                                {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                                wire:click="loadDataToEditForMedicalRecord({{ $medical_record->id }})"
                                title="Edit"
                            >
                                <i class="ri-pencil-line text-warning icons-sm"></i>
                            </a>
                            <a wire:click="deleteDietHistory({{ $medical_record->id }})" title="Delete">
                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('livewire.consultation.modals.new_diet_history')
</div>
