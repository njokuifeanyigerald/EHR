<div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="mb-2">Email</label>
        <input
            type="email"
            class="form-control mb-0"
            id="exampleInputEmail1"
            placeholder="Enter email"
            wire:model="email"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-1" />
    </div>
    <div class="form-group">
        <div class="d-flex justify-content-between my-2">
            <label for="exampleInputPassword1">Password</label>
        </div>
        <input
            type="password"
            class="form-control mb-0"
            id="exampleInputPassword1"
            placeholder="Min. 8 Characters"
            min="8"
            wire:model="password"
            wire:keydown.enter="login"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-1" />
    </div>
    <div class="d-flex w-100 justify-content-between align-items-center mt-3 w-100">
        <div class="custom-control custom-checkbox d-inline-block">
            {{-- <input type="checkbox" class="custom-control-input" id="customCheck1" /> --}}
            {{-- <label class="custom-control-label" for="customCheck1">Remember Me</label> --}}
        </div>
        <a href="#" class="float-end">Forgot password?</a>
    </div>
    <div class="mt-4 d-flex align-content-end">
        <button type="submit" class="btn btn-primary w-100" wire:click="login">Login</button>
    </div>
</div>
