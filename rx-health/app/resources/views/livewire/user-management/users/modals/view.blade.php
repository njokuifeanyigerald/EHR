<div>
    {{-- view user modal --}}
    <div
        wire:ignore.self
        id="view_user_"
        class="modal fade bd-example-modal-lg"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <x-user_info_view :title="'Name'" :value="$this->user?->fullName()" />
                            <x-user_info_view :title="'Email'" :value="$this->user?->email" />
                            <x-user_info_view :title="'Phone'" :value="$this->user?->phone_number" />
                            <x-user_info_view
                                :title="'Department'"
                                :value="$this->departments->where('id', $this->user?->department_id)->pluck('name')->first()"
                            />
                            <x-user_info_view
                                :title="'Work Station'"
                                :value="$this->department_units->where('id', $this->user?->department_unit_id)->pluck('unit_name')->first()"
                            />
                            <x-user_info_view
                                :title="'Specialization'"
                                :value="$this->specializations->where('id', $this->user?->specialization_id)->pluck('specialization')->first()"
                            />
                            <x-user_info_view :title="'License Number'" :value="$this->user?->license_number" />
                            <x-user_info_view :title="'Role'" :value="$this->user?->getRoleNames()?->first()" />
                            <x-user_info_view
                                :title="'Status'"
                                :value="$this->user?->status ? Str::headline($this->user?->status) : 'N/A'"
                            />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
