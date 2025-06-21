<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="add_room_settings"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $this->work_station ? 'Edit Work Station Settings' : 'Add Work Station & Settings' }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="room_name">Work Station Name</label>
                        <input
                            id="room_name"
                            type="text"
                            class="form-control my-2"
                            wire:model.defer="work_station_name"
                            required
                        />
                        <x-input-error :messages="$errors->get('work_station_name')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="work_station_department">Department</label>
                        <select
                            id="work_station_department"
                            class="form-select my-2"
                            wire:model.defer="work_station_department"
                            required
                        >
                            <option value="">Select a Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('work_station_department')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="work_station_uses_inventory">Uses Inventory</label>
                        <select
                            id="work_station_uses_inventory"
                            class="form-select my-2"
                            wire:model.defer="work_station_uses_inventory"
                            required
                        >
                            <option value="">Select from options</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                        <x-input-error :messages="$errors->get('work_station_uses_inventory')" class="mt-1" />
                    </div>

                    @if ($this->work_station && $this->work_station_uses_inventory == 'yes')
                        <div class="form-group">
                            <label for="work_station_inventory_status">Inventory Status</label>
                            <select
                                id="work_station_inventory_status"
                                class="form-select my-2"
                                wire:model.defer="work_station_inventory_status"
                                required
                            >
                                <option value="">Select from options</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('work_station_inventory_status')" class="mt-1" />
                        </div>
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="saveWorkStationDetails" class="btn btn-primary">Save Work Station</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
