<div>
    {{-- edit injection --}}
    <div wire:ignore.self id="edit_injection" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Latest Injection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <form class="form-horizontal" wire:submit="updateInjection">
                        @csrf
                        @include('livewire.nurses-station.patient-records.modals.injection.form', ['edit' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
