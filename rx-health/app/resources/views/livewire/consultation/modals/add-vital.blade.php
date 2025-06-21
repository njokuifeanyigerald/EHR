<div>
    <div wire:ignore.self id="add_vital_exam" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <form class="form-horizontal" wire:submit="saveVital">
                        @include('livewire.nurses-station.patient-records.modals.vitals.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
