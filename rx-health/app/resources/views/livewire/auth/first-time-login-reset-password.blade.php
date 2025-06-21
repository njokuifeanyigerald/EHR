<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="firstTimeLoginModal"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="firstTimeLoginModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="firstTimeLoginModalLabel">Reset Password</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <p class="font-weight-bold">Please reset your password first before you can login.</p>

                    <div class="form-group">
                        <div class="d-flex justify-content-between my-2">
                            <label for="exampleInputPassword0">Current Password</label>
                        </div>
                        <input
                            type="password"
                            class="form-control mb-0"
                            id="exampleInputPassword0"
                            min="8"
                            wire:model="current_password"
                        />
                        <x-input-error :messages="$errors->get('current_password')" class="mt-1" />
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between my-2">
                            <label for="exampleInputPassword1">Password</label>
                        </div>
                        <input
                            type="password"
                            class="form-control mb-0"
                            id="exampleInputPassword1"
                            placeholder="Min. 8 Characters"
                            min="8"
                            wire:model="password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <div class="form-group">
                        <div class="d-flex justify-content-between my-2">
                            <label for="exampleInputPassword2">Confirm Password</label>
                        </div>
                        <input
                            type="password"
                            class="form-control mb-0"
                            id="exampleInputPassword2"
                            min="8"
                            wire:model="confirm_password"
                        />
                        <x-input-error :messages="$errors->get('confirm_password')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="resetPassword" class="btn btn-primary">Reset Password</button>
                </div>
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('openModalFirstTimeLogin', () => {
                $('#firstTimeLoginModal').modal('show');
            });

            $wire.on('closeModalFirstTimeLogin', () => {
                $('#firstTimeLoginModal').modal('hide');
            });
        </script>
    @endscript
</div>
