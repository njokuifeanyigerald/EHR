<div>
    <!-- Header title -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>List Of User Roles</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a
                        wire:click="dispatch('addRole')"
                        data-bs-toggle="modal"
                        data-bs-target="#add_role"
                        class="btn btn-primary my-2"
                    >
                        <i class="fa fa-plus"></i>
                        Add New Role
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="">
                <div class="row">
                    <form class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="col-9">
                                <label for="search_query">Search Role</label>
                                <div class="input-icon input-icon-right">
                                    <input
                                        type="search"
                                        class="form-control"
                                        autofocus
                                        wire:model.live.debounce.700ms="search_query"
                                        placeholder="Search for Role"
                                        name="search_query"
                                    />

                                    <span class="input-icon-addon clickable-cursor">
                                        <i class="fa fa-search"></i>
                                    </span>

                                    <!-- <input type="hidden" name="visit_number" id="visit_number" value="0"> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" data-field="No">No</th>
                                <th scope="col" data-field="Role">Role</th>
                                <th scope="col" data-field="Description">Description</th>
                                <td scope="col" data-field="Action" class="text-center fw-bolder text-black">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration + $roles->firstItem() - 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ Str::title($role->description) }}</td>
                                    <td class="text-center">
                                        @if ($role->name != 'Super Admin')
                                            <button
                                                type="button"
                                                class="btn btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_role"
                                                wire:click="dispatch('editRole', [{{ $role->id }}])"
                                            >
                                                View/Edit
                                            </button>

                                            <button
                                                type="button"
                                                class="btn btn-outline-danger"
                                                {{-- data-bs-target="#delete_role" --}}
                                                wire:click="dispatch('deleteRole', [{{ $role->id }}])"
                                            >
                                                Delete
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>

    <livewire:user-management.roles.modals.add-or-edit :permissions="$permissions" :roles="$roles" />

    <livewire:user-management.roles.delete-role :roles="$roles" />
</div>
