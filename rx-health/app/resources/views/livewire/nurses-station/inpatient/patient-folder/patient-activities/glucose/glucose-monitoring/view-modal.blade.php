<div>
    <div wire:ignore.self id="view_glucose" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Glucose Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    @php
                        $medical_record_data = json_decode($this->medical_record?->record_data ?? '{}');
                    @endphp

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ now()->parse($medical_record_data->date ?? '')->format('F j, Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ now()->parse($medical_record_data->time ?? '')->format('h:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FBS">FBS</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ $medical_record_data->fbs ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sugar_level">RBS</label>
                                <div>
                                    <span class="text-secondary">
                                        {{ $medical_record_data->rbs ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <div>
                            <span class="text-secondary">
                                {{ $medical_record_data->remarks ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
