<div class="container-fluid flex-column">
    <div class="row">
        <div
            class="col-lg-8 vh-100 d-flex justify-content-center align-items-center"
            style="
                background-image: url('images/login_image.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            "
        ></div>
        <div class="col-lg-4 vh-100 d-flex justify-content-center align-items-center bg-white">
            <div class="container-md">
                <div class="container">
                    <div class="container">
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="text-dark font-size-h4 font-size-h1-lg text-center">Sign In</h3>
                        </div>

                        <div class="form-group">
                            <label class="font-size-h6 text-dark" for="email">Email</label>
                            <input
                                class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-3 mt-1"
                                type="text"
                                id="email"
                                name="email"
                                autocomplete="on"
                                required
                                wire:model.live="email"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n3">
                                <label class="font-size-h6 text-dark pt-3" for="password">Password</label>
                                <a href="#" class="text-primary font-size-h6 text-hover-primary pt-3">
                                    Forgot Password ?
                                </a>
                            </div>
                            <input
                                class="form-control form-control-solid h-auto py-6 px-6 rounded-lg border-3 mt-1"
                                type="password"
                                id="password"
                                name="password"
                                autocomplete="off"
                                required
                                wire:model.live="password"
                                wire:keydown.enter="login"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>
                        <div class="pb-lg-0 pb-5">
                            <button
                                type="submit"
                                wire:click="login"
                                class="btn btn-primary font-size-h6 px-12 py-2 my-3 mr-3"
                            >
                                Sign In
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
