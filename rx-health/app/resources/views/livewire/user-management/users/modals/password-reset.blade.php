<div>
    {{-- reset user password modal --}}
    <div
        wire:ignore.self
        class="modal fade"
        id="resetPasswordModal"
        tabindex="-1"
        aria-labelledby="resetPasswordModal"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPasswordModalTitle">Password Reset</h5>
                    <button
                        type="button"
                        wire:click="resetPasswordDetails"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <x-user_info_view :title="'New Password'" :value="$this->password" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        wire:click="resetPasswordDetails"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
