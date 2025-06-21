<div>
    {{-- Add floor --}}
    <div wire:ignore.self id="add_floor" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add floor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body mx-5">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="floor_name" class="fw-bold">
                                    Floor Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="floor_name"
                                    name="floor_name"
                                    wire:model="floor_name"
                                />
                                <x-input-error :messages="$errors->get('floor_name')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="block" class="fw-bold">
                                    Block
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="block" name="block" wire:model="block">
                                    <option value="">Select block</option>
                                    @foreach ($this->blocks as $block)
                                        <option value="{{ $block->id }}">
                                            {{ Str::Headline($block->block_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('block')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status" class="fw-bold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="status" name="status" wire:model="status">
                                    {{-- <option value="">Select floor status</option> --}}
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveFloor">Save Floor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close_add_floor_modal', function () {
            $('#add_floor').modal('hide');
        });
    </script>
@endscript
