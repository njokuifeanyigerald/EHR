<?php
use App\Enums\WardTypes;
?>

<div>
    {{-- Add Ward --}}
    <div wire:ignore.self id="add_ward" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">{{ $this->ward ? 'Edit' : 'Add' }} Ward</h5>
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
                                    {{-- <option value="">Select a ward status</option> --}}
                                    <option value="active" selected>Active</option>
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
                                <label for="block" class="fw-bold">
                                    Block
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="block" name="block" wire:model.live="block">
                                    <option value="">Select Block</option>
                                    @foreach ($this->blocks as $block)
                                        <option value="{{ $block->id }}">
                                            {{ Str::Headline($block->block_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('block')" class="mt-1" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="floor" class="fw-bold">
                                    Floor
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select my-2" id="floor" name="floor" wire:model.live="floor">
                                    <option value="">Select ward floor</option>
                                    @foreach ($this->blockFloors as $floor)
                                        <option
                                            value="{{ $floor->id }}"
                                            {{ $floor->id == $this->floor ? 'selected' : '' }}
                                        >
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
                                    @foreach (WardTypes::options() ?? [] as $ward_type)
                                        <option value="{{ $ward_type }}">{{ Str::Headline($ward_type) }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('ward_type')" class="mt-1" />
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="department_unit" class="fw-bold">
                                    Department Unit
                                    <span class="text-danger">*</span>
                                </label>
                                <select
                                    class="form-select my-2"
                                    id="department_unit"
                                    name="department_unit"
                                    wire:model="department_unit"
                                >
                                    <option value="">Select a department unit</option>
                                    @forelse ($departmentUnits ?? [] as $department_unit)
                                        <option value="{{ $department_unit->id }}">
                                            {{ $department_unit->unit_name }}
                                        </option>
                                    @empty
                                        <option value="">No Department Unit found</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('department_unit')" class="mt-1" />
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
        $wire.on('close_add_ward_modal', function () {
            $('#add_ward').modal('hide');
        });
    </script>
@endscript
