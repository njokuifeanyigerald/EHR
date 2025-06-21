<div>
    {{-- Update Ward --}}
    <div wire:ignore.self id="update_ward" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Ward</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body mx-5">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="ward_name" class="fw-bold">
                                    Ward Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="ward_name"
                                    name="ward_name"
                                    wire:model="ward_name"
                                />
                                <x-input-error :messages="$errors->get('ward_name')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="status" class="fw-bold">
                                    Status
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="status" name="status" wire:model="status">
                                    <option value="">Select a ward status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="price" class="fw-bold">
                                    Price
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="number"
                                    class="form-control my-2"
                                    id="price"
                                    name="price"
                                    wire:model="ward_price"
                                />
                                <x-input-error :messages="$errors->get('ward_price')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="floor" class="fw-bold">
                                    Floor
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="floor" name="floor" wire:model="floor">
                                    <option value="">Select ward floor</option>
                                    @foreach ($this->floors as $floor)
                                        <option value="{{ $floor->id }}">
                                            {{ Str::Headline($floor->floor_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('floor')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="floor" class="fw-bold">
                                    Ward Type
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="floor" name="floor" wire:model="ward_type">
                                    <option value="">Select a ward type</option>
                                    <option value="children">Children</option>
                                    <option value="adult male">Adult Male</option>
                                    <option value="adult female">Adult Female</option>
                                    <option value="adult mixed">Adult Mixed</option>
                                </select>
                                <x-input-error :messages="$errors->get('ward_type')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveWard">Save Ward</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close_edit_ward_modal', function () {
            $('#update_ward').modal('hide');
        });
    </script>
@endscript
