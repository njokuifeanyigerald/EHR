<div>
    <div wire:ignore.self id="add_bed" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Bed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body mx-5">
                        <div class="form-group">
                            <label for="bed_name" class="fw-bold">
                                Bed Name
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control my-2"
                                id="bed_name"
                                name="bed_name"
                                wire:model="bed_name"
                            />
                            <x-input-error :messages="$errors->get('bed_name')" class="mt-1" />
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="ward_id" class="fw-bold">
                                Ward
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="ward_id" name="ward_id" wire:model="ward">
                                <option value="">Select ward</option>
                                @foreach ($this->wards as $ward)
                                    <option value="{{ $ward->id }}">{{ Str::Headline($ward->ward_name) }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('ward')" class="mt-1" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="saveBed">Save Bed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('close_add_bed_modal', function () {
            $('#add_bed').modal('hide');
        });
    </script>
@endscript
