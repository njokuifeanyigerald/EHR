<div class="col-lg-12">
    <div class="iq-card">
        <div class="iq-card-body">
            {{-- <form wire:submit="saveGuest"> --}}
            {{-- @csrf --}}
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="first_name">
                        First Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control my-2" id="first_name" wire:model.live="first_name" />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="last_name">
                        Last Name
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control my-2" id="last_name" wire:model.live="last_name" />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="telephone">
                        Telephone
                        <span class="text-danger">*</span>
                    </label>
                    <input
                        type="text"
                        max="20"
                        class="form-control my-2"
                        id="telephone"
                        wire:model.live="phone_number"
                    />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-1" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="email">
                        Email Address
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control my-2" id="email" wire:model.live="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="dob">
                        Date Of Birth
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control my-2" id="dob" required wire:model.live="date_of_birth" />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-1" />
                </div>
                <div class="form-group col-lg-6">
                    <label for="cname">
                        Gender
                        <span class="text-danger">*</span>
                    </label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="customRadio6"
                            name="customRadio-1"
                            class="custom-control-input"
                            required
                            wire:model.live="gender"
                            value="Male"
                        />
                        <label class="custom-control-label" for="customRadio6">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input
                            type="radio"
                            id="customRadio7"
                            name="customRadio-1"
                            class="custom-control-input"
                            required
                            wire:model.live="gender"
                            value="Female"
                        />
                        <label class="custom-control-label" for="customRadio7">Female</label>
                    </div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-1" />
                </div>
            </div>
            <button wire:click="save" class="btn btn-primary me-1 mt-2">Save Guest</button>
            {{-- </form> --}}
        </div>
    </div>
</div>
