<div>
    <div wire:ignore.self id="nurses_notes_view" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg rounded-3">
            <div class="modal-content px-3">
                <div class="modal-header">
                    <h5 class="modal-title">Nurses Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-4">
                        <div>
                            <span class="text-dark fw-bolder">By:</span>
                            {{ $this->medical_record?->user?->full_names }}
                        </div>
                        <div>
                            <span class="text-dark fw-bolder">At:</span>
                            {{ $this->medical_record?->updated_at->format('jS F Y') }}
                        </div>
                    </div>
                    <div>
                        <span class="text-dark fw-bolder">Message:</span>
                        <div class="text-black">
                            {!! json_decode($this->medical_record?->record_data)?->message ?? '<p>N/A</p>' !!}
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
