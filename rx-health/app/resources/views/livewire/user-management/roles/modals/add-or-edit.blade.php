<div>
    {{-- create role modal --}}
    <div
        wire:ignore.self
        id="add_role"
        class="modal fade bd-example-modal-xl"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $role ? 'Edit Role' : 'Create Role' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-sm-12">
                            Role
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-10 col-sm-12">
                            <input wire:model="role_name" class="form-control" type="text" name="role_name" />
                            <x-input-error :messages="$errors->get('role_name')" class="mt-1" />
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-sm-12 my-auto">Description</label>
                        <div class="col-md-10 col-sm-12">
                            <textarea
                                wire:model="role_description"
                                class="form-control my-2"
                                id="exampleFormControlTextarea1"
                                rows="2"
                            ></textarea>
                        </div>
                        <x-input-error :messages="$errors->get('role_description')" class="mt-1" />
                    </div>
                    <div class="row h-50 mt-3">
                        <div class="col-md-4 overflow-auto">
                            <div class="list-group" id="list-tab" role="tablist">
                                @foreach ($permission_groups as $group)
                                    <a
                                        wire:key="{{ $group }}"
                                        wire:ignore
                                        class="list-group-item list-group-item-action {{ $loop->first ? 'active' : '' }}"
                                        id="list-{{ $group }}-list"
                                        data-bs-toggle="list"
                                        href="#list-{{ $group }}"
                                        role="tab"
                                        aria-controls="{{ $group }}"
                                    >
                                        {{ Str::headline($group) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-8 overflow-auto" style="max-height: 300px">
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($permission_groups as $group)
                                    <div
                                        wire:key="{{ $group }}"
                                        wire:ignore.self
                                        class="tab-pane fade {{ $loop->first ? 'active show' : '' }} ms-4"
                                        id="list-{{ $group }}"
                                        role="tabpanel"
                                        aria-labelledby="list-{{ $group }}-list"
                                    >
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input
                                                    type="checkbox"
                                                    name="permission_{{ $group }}"
                                                    wire:model.live="check_all.{{ $group }}"
                                                    wire:click="checkAll('{{ $group }}')"
                                                    class="custom-control-input"
                                                    id="customCheckAll{{ $group }}"
                                                />
                                                <label
                                                    class="custom-control-label fw-bold text-primary"
                                                    for="customCheckAll{{ $group }}"
                                                >
                                                    Check all Permissions
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            @foreach ($permissions->where('category', $group) as $permission)
                                                <div class="custom-control custom-checkbox">
                                                    <input
                                                        type="checkbox"
                                                        class="custom-control-input"
                                                        wire:model="permissions_selected.{{ $permission->id }}"
                                                        id="customCheck{{ $permission->name }}"
                                                    />
                                                    <label
                                                        class="custom-control-label"
                                                        for="customCheck{{ $permission->name }}"
                                                    >
                                                        {{ Str::headline($permission->display_name) }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveRole" type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
