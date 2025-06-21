<div>
    <div class="d-flex justify-content-between mb-2">
        {{-- print plan button --}}
        <a
            href="{{ $medical_records ? route('consultation.print_diet_plan', $this->visit->visit_number) : '#' }}"
            target="{{ $medical_records ? '_blank' : '' }}"
            class="btn btn-sm btn-primary"
            wire:click="printDietPlan({{ $medical_records ? true : false }})"
        >
            <i class="fa fa-print"></i>
            Print Diet Plan
        </a>

        <button
            data-bs-toggle="modal"
            data-bs-target="#new_diet_plan"
            class="btn btn-sm btn-primary"
            {{-- wire:click="reset('medical_record','diet_plan_type','special_diet_name','record')" --}}
            wire:click="resetDetails"
        >
            New Diet Plan
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-head-custom cursor text-center mt-3">
            <thead class="">
                <tr>
                    <th>Diet Plan Type</th>
                    <th>Special Diet Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medical_records as $medical_record)
                    @php
                        $record_data = json_decode($medical_record->record_data);
                    @endphp

                    <tr>
                        <td>{{ $record_data->diet_plan_type ?? 'N/A' }}</td>
                        <td>{{ $record_data->special_diet_name ?? 'N/A' }}</td>
                        <td>
                            {{-- view --}}
                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#new_diet_plan"
                                wire:click="loadDataToEditForMedicalRecord({{ $medical_record->id }})"
                                title="View"
                            >
                                <i class="ri-eye-line text-primary icons-sm"></i>
                            </a>

                            {{-- edit --}}
                            <a
                                data-bs-toggle="modal"
                                data-bs-target="#new_diet_plan"
                                wire:click="loadDataToEditForMedicalRecordDiet({{ $medical_record->id }})"
                                title="Edit"
                            >
                                <i class="ri-pencil-line text-warning icons-sm"></i>
                            </a>

                            <a wire:click="deleteDietPlanRecord({{ $medical_record->id }})" title="Delete">
                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No Diet Plan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('livewire.consultation.modals.diet_plan_modal')
</div>
