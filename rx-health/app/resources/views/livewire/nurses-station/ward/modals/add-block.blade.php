<div>
    {{-- Add Block --}}
    <div wire:ignore.self id="add_block" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Block</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body mx-5">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="block_name" class="fw-bold">
                                    Block Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="block_name"
                                    name="block_name"
                                    wire:model="block_name"
                                />
                                <x-input-error :messages="$errors->get('block_name')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status" class="fw-bold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="status" name="status" wire:model="status">
                                    <option value="">Select a Block status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveBlock">Save Block</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close_add_block_modal', function () {
            $('#add_block').modal('hide');
        });
    </script>
@endscript
