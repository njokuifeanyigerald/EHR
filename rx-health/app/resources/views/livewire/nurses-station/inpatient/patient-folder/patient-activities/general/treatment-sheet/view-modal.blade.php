<div>
    <div wire:ignore.self id="view_treatment" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Treatment Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @php
                    $prescription = collect($this->prescriptions)
                        ?->where('id', $this->medical_record?->visit_detail_id)
                        ?->first();

                    $medical_record_data = json_decode($this->medical_record?->record_data ?? '{}');
                @endphp

                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="prescription_name">Prescription</label>
                        <div>
                            <span class="text-secondary">
                                {{ $medical_record_data?->prescription_name ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prescription_name">Dose</label>
                        <div>
                            <x-dosage-interpretation :prescription="$prescription" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ now()->parse($medical_record_data?->date ?? '')->format('F j, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ now()->parse($medical_record_data?->time ?? '')->format('h:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <div>
                            <span class="text-secondary">
                                {{ $medical_record_data?->status ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <div>
                            <span class="text-secondary">
                                {{ $medical_record_data?->remarks ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button wire:click="saveTreatment" type="submit" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
