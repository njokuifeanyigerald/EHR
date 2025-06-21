<div>
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="">
                <div class="row">
                    <form class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="col-9">
                                <label for="search_query">Search User</label>
                                <div class="input-icon input-icon-right">
                                    <input
                                        type="search"
                                        class="form-control"
                                        autofocus
                                        wire:model.live.debounce.700ms="search_query"
                                        placeholder="Search for User"
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
                                <th scope="col" data-field="Name">Name</th>
                                <th scope="col" data-field="NPA Number">NPA Number</th>
                                <th scope="col" data-field="Phone Number">Phone Number</th>
                                <th scope="col" data-field="User Role">User Role</th>
                                <th scope="col" data-field="Status">Status</th>
                                <th scope="col" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                    <td>{{ $user->fullName() }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                    <td>{{ $user?->roles?->first()->name ?? 'N/A' }}</td>
                                    <td>{{ Str::headline($user->status) }}</td>
                                    <td class="text-center">
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#view_user_"
                                            class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                            title="View User Details"
                                            wire:click="dispatch('viewUser',[{{ $user->id }}])"
                                        >
                                            <i class="ri-eye-line m-0 icons-sm"></i>
                                        </a>
                                        @if (! in_array($user->email, ['ashilekpeyedwardsena@gmail.com', 'admin@admin.com']) ||auth()->user()->hasRole('Super Admin'))
                                            <a
                                                href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_user"
                                                class="btn btn-outline-dark px-1 py-0 me-1 me-2"
                                                title="Edit User"
                                                wire:click="dispatch('editUser',[{{ $user->id }}])"
                                            >
                                                <i class="ri-pencil-line m-0 icons-sm"></i>
                                            </a>
                                            <a
                                                href="#"
                                                class="btn btn-outline-warning px-1 py-0 me-1"
                                                title="Reset Password"
                                                wire:click="dispatch('resetPassword',[{{ $user->id }}])"
                                            >
                                                <i class="ri-refresh-line m-0 icons-sm"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="w-full text-center">No Record Found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <livewire:user-management.users.modals.add-or-edit
        :users="$users"
        :departments="$departments"
        :roles="$roles"
        :specializations="$specializations"
        :department_units="$department_units"
    />

    <livewire:user-management.users.modals.view
        :users="$users"
        :departments="$departments"
        :specializations="$specializations"
        :department_units="$department_units"
    />

    <livewire:user-management.users.reset-password :users="$users" />

    @include('livewire.user-management.users.modals.password-reset')

    @script
        <script>
            $(document).ready(function () {
                $wire.on('openPasswordResetModal', () => {
                    $('#resetPasswordModal').modal('show');
                });
            });
        </script>
    @endscript
</div>
