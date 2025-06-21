<div>
    <div class="d-flex justify-content-end mb-2">
        <button data-bs-toggle="modal" data-bs-target="#new_anthropometric_params" class="btn btn-sm btn-primary">
            New Anthropometric Parameters
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-head-custom cursor text-center mt-3">
            <thead class="">
                <tr>
                    <th>Diet</th>
                    <th>Calories</th>
                    <th>B.M.R</th>
                    <th>Body Water (%)</th>
                    <th>Height (m)</th>
                    <th>Weight (kg)</th>
                    <th>BMI (kg/m²)</th>
                    <th>BMI Classi.</th>
                    <th>Visc. fat(%)</th>
                    <th>Body fat(%)</th>
                    <th>MUAC</th>
                    <th>Protein(gm/day)</th>
                    <th>Fluid(L/day)</th>
                    <th>Na (mg/day)</th>
                    <th>K (mg/day)</th>
                    <th>Skeletal Muscle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($medical_records ?? [] as $medical_record)
                    @php
                        $record = json_decode($medical_record->record_data)?->parameters;
                    @endphp

                    <tr>
                        <td>
                            {{ $record->diet ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->calories ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->bmr ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->body_water ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->height ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->weight ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->bmi ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->bmi_classification ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->visc_fat ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->body_fat ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->muac ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->protein ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->fluid ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->na ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->k ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $record->skeletal_muscle ?? 'N/A' }}
                        </td>
                        <td>
                            <a
                                data-bs-toggle="modal"
                                data-bs-target="#new_anthropometric_params"
                                {{-- wire:click="dispatch('editFluidIntakeAndOutput',[{{ $record->id }}])" --}}
                                wire:click="loadDataToEditForMedicalRecord({{ $medical_record->id }})"
                                title="Edit"
                            >
                                <i class="ri-pencil-line text-warning icons-sm"></i>
                            </a>
                            <a wire:click="deleteAnthropometricParameters({{ $medical_record->id }})" title="Delete">
                                <i class="ri-delete-bin-line text-danger icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="text-center">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('livewire.consultation.modals.anthropometric_params')
</div>
