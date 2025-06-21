@props([
    'prescriptions' => [],
])

<div id="medCollapse" class="collapse show bg-white rounded">
    <div class="card-body">
        <div style="display: none" class="card card-custom card-stretch addDrug shadow-lg my-3">
            <div class="card-header bg-white">
                <div class="card-title mb-0">
                    <h4 class="card-label fw-bold text-dark">Add Prescription</h4>
                </div>
            </div>
            <div class="card-body">
                <livewire:re-usable-components.add-prescription
                    :visit_number="$this->visit_number"
                    :billing_code="$this->billing_code"
                    :fromDoctor="true"
                    {{-- :type="'examination_prescription_card'" --}}
                />
            </div>
        </div>
        <div class="table-responsive">
            <table class="table cursor table-hover table-responsive-lg">
                <thead>
                    <tr>
                        <th class="text-muted">DATE TIME</th>
                        <th class="text-muted">MEDICATION</th>
                        <th class="text-muted">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prescriptions as $prescription)
                        <tr>
                            <td>
                                {{ $prescription->created_at->format('jS F Y') }}
                                <span class="badge badge-primary badge-sm">
                                    {{ $prescription->created_at->format('h:i:s A') }}
                                </span>
                            </td>
                            <td>
                                @include(
                                    'livewire.consultation.examination.prescriptions.prescription_name_component',
                                    [
                                        'prescription' => $prescription,
                                    ]
                                )
                            </td>
                            <td>
                                <a
                                    href="#"
                                    wire:click="deletePrescription({{ $prescription->id }})"
                                    {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                    title="Delete"
                                >
                                    <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No prescriptions found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
