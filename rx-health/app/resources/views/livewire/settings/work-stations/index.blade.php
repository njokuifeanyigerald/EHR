<div>
    <div class="form-group d-flex flex-row-reverse">
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#add_room_settings"
            class="btn btn-primary font-weight-bold"
            wire:click="dispatch('newWorkStation')"
        >
            <i class="fa fa-plus"></i>
            Add Work Station
        </button>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="table-responsive">
                <table class="table cursor table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Uses Inventory</th>
                            <th>Inventory Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($work_stations as $work_station)
                            <tr>
                                <td>{{ $work_station->unit_name }}</td>
                                <td>{{ $this->departments?->find($work_station?->department_id)?->name ?? 'N/A' }}</td>
                                <td>{{ $work_station?->inventory_location_id ? 'Yes' : 'No' }}</td>
                                <td>
                                    {{
                                        $work_station?->inventory_location_id
                                            ? ($work_station?->inventoryLocation?->trashed()
                                                ? 'Inactive'
                                                : 'Active')
                                            : '--'
                                    }}
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#add_room_settings"
                                        class="btn btn-outline-primary btn-sm"
                                        wire:click="dispatch('editWorkStation', [{{ $work_station?->id }}])"
                                    >
                                        View/Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $work_stations->links() }}
            </div>
        </div>
    </div>

    <livewire:settings.work-stations.modals.add-or-edit
        :work_stations="$work_stations"
        :departments="$departments"
        {{-- :key="time().'_work_stations'" --}}
        :key="'_work_stations'"
    />
</div>
