@php
    use App\Enums\Titles;
@endphp

<div>
    {{-- Add user modal --}}
    <div
        wire:ignore.self
        class="modal fade"
        id="add_user"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $this->page_title }} New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="title">Title</label>
                            <select wire:model="title" id="title" name="title" class="form-select my-1" required>
                                <option>Select Title</option>
                                @forelse (Titles::options() ?? [] as $title)
                                    <option value="{{ $title }}">{{ $title }}</option>
                                @empty
                                    <option value="">No Title Found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('title')" class="mt-1" />
                        </div>
                        <div class="form-group col-6">
                            <label for="FirstName">First Name</label>
                            <input
                                wire:model="first_name"
                                id="FirstName"
                                type="text"
                                class="form-control my-1"
                                placeholder="First Name"
                                required
                            />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                        </div>
                        <div class="form-group col-6">
                            <label for="LastName">Last Name</label>
                            <input
                                wire:model="last_name"
                                id="LastName"
                                type="text"
                                class="form-control my-1"
                                placeholder="Last Name"
                                required
                            />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                        </div>
                        <div class="form-group col-6">
                            <label for="email">NPA Number</label>
                            <input
                                id="email"
                                wire:model="email"
                                type="text"
                                class="form-control my-1"
                                placeholder="NPA Number"
                                required
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>
                        <div class="form-group col-6">
                            <label for="tel">Phone Number</label>
                            <input
                                wire:model="phone_number"
                                id="tel"
                                type="tel"
                                class="form-control my-1"
                                placeholder=""
                                required
                            />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-1" />
                        </div>
                        <div class="form-group col-6">
                            <label for="Department">Department</label>
                            <select wire:model.live="department" class="form-select my-1" name="Department" required>
                                <option value="">Select a Department</option>
                                @forelse ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty
                                    <option value="">No departments found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('department')" class="mt-1" />
                        </div>

                        @if ($this->department && ! in_array($this->department, $this->work_station_not_required_departments))
                            <div class="form-group col-6">
                                <label for="Department">Work Station</label>
                                <select
                                    wire:model.live="department_unit"
                                    class="form-select my-1"
                                    name="Department"
                                    required
                                >
                                    <option value="">Select a Work Station</option>
                                    @forelse ($department_units->where('department_id', $this->department) as $department_unit)
                                        <option value="{{ $department_unit->id }}">
                                            {{ $department_unit->unit_name }}
                                        </option>
                                    @empty
                                        <option value="">No Work Station found</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('department_unit')" class="mt-1" />
                            </div>
                        @endif

                        @if (in_array($this->department, $this->license_required_departments))
                            <div class="form-group col-6">
                                <label for="license">License No.</label>
                                <input
                                    id="license"
                                    wire:model="license_number"
                                    type="text"
                                    class="form-control my-1"
                                    placeholder="License No."
                                    required
                                />
                                <x-input-error :messages="$errors->get('license_number')" class="mt-1" />
                            </div>
                        @endif

                        @if (in_array($this->department, $this->speciality_required_departments))
                            <div class="form-group col-6">
                                <label for="speciality">Speciality</label>
                                <select
                                    wire:key="speciality"
                                    wire:model="speciality"
                                    class="form-select my-1"
                                    name="speciality"
                                >
                                    <option wire:key="specialitydsjd" value="">Select a Speciality</option>
                                    @forelse ($specializations as $speciality)
                                        <option
                                            wire:key="speciality{{ $speciality->id }}"
                                            value="{{ $speciality->id }}"
                                        >
                                            {{ $speciality->specialization }}
                                        </option>
                                    @empty
                                        <option wire:key="specialitywfkje" value="">No specialities found</option>
                                    @endforelse
                                </select>
                                <x-input-error :messages="$errors->get('speciality')" class="mt-1" />
                            </div>
                        @endif

                        <div class="form-group col-6">
                            <label for="role">User Role</label>
                            <select
                                wire:key="role"
                                id="role"
                                wire:model="role"
                                class="form-select my-1"
                                name="role"
                                required
                            >
                                <option wire:key="rolekjfwef" value="">Select a role</option>
                                @forelse ($roles as $role)
                                    <option wire:key="role{{ $role->id }}" value="{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                @empty
                                    <option wire:key="rolewfkjefe" value="">No roles found</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-1" />
                        </div>

                        <div class="form-group col-6">
                            <label for="role">Status</label>
                            <select wire:model="status" class="form-select" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-1" />
                        </div>

                        <div class="form-group col-6 d-none">
                            <label for="facility">Facility</label>
                            <select class="form-select" name="facility" required>
                                <option value="">Select a facility</option>
                                <option value="TST02">Gbadamosi, Mustapha and Nwuzor</option>
                                <option value="TST54">Yussuf PLC</option>
                                <option value="TST90">Muinat LLC</option>
                                <option value="TST24">Habeeb, Wuraola and Elizabeth</option>
                                <option value="TST33">Mustapha-Adewale</option>
                            </select>
                        </div>
                        <div class="form-group col-6 d-none">
                            <label for="role">Attending Officer</label>
                            <select class="form-select" name="attending_officer" required>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveUser" type="button" class="btn btn-primary">Save User</button>
                </div>
            </div>
        </div>
    </div>
</div>
