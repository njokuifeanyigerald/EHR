{{-- Change Payment Method --}}
<div
    wire:ignore.self
    class="modal fade"
    id="changePaymentMode"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Payment Mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="iq-card-body">
                    {{--
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis
                        mollis, diam nibh finibus leo</p>
                    --}}
                    {{-- <form class="form-horizontal" action="/action_page.php"> --}}
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="attending_officer">
                            Attending Officer:
                        </label>
                        <div class="col-sm-10">
                            <select
                                class="form-select my-2 col-sm-8"
                                id="attending_officer"
                                name="attending_officer_id"
                                wire:model.live="attending_officer"
                            >
                                @if ($this->selected_visit && ! empty($this->attending_officers))
                                    @if (! $this->attending_officer)
                                        <option value="">Choose Attending Officer</option>
                                    @endif

                                    @foreach ($this->attending_officers as $attending_officer)
                                        <option value="{{ $attending_officer->id }}">
                                            {{ $attending_officer->title . ' ' . $attending_officer->last_name . ', ' . $attending_officer->first_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="payment_type">
                            Payment
                            {{-- {{ $this->billing_mode }} --}}
                            Type:
                        </label>
                        <div class="col-sm-10">
                            <select class="form-select my-2" id="selectcountry" wire:model.live="billing_mode">
                                @foreach ($this->billing_modes as $billing_type)
                                    <option
                                        value="{{ $billing_type->code }}"
                                        {{ $billing_type->code == $this->billing_mode ? 'selected=""' : '' }}
                                    >
                                        {{ $billing_type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('billing_mode')" class="mt-1" />
                    </div>

                    @if ($this->billing_mode == 'credit_corporate')
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="company_name">
                                Company Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select my-2"
                                    id="company_name"
                                    required
                                    wire:model.live="company_name"
                                >
                                    @if (! $this->company_name)
                                        <option>Select company</option>
                                    @endif

                                    @foreach ($this->companies as $company)
                                        <option class="form-select" value="{{ $company->code }}">
                                            {{ Str::headline($company->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('company_name')" class="mt-1" />
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="staff_id">
                                Staff Id
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="staff_id"
                                    placeholder="Staff Id"
                                    required
                                    wire:model.live="staff_id"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('staff_id')" class="mt-1" />
                        </div>
                    @elseif ($this->billing_mode == 'insurance')
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="insurance_company">
                                Insurance Company
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select my-2"
                                    id="insurance_company"
                                    required
                                    wire:model.live="insurance_company"
                                >
                                    @if (! $this->insurance_company)
                                        <option>Select Insurance Company</option>
                                    @endif

                                    @foreach ($this->insuranceCompanies as $company)
                                        <option value="{{ $company->code }}">
                                            {{ Str::headline($company->name) }}
                                        </option>
                                    @endforeach

                                    {{-- <option>Select Insurance Company</option> --}}
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('insurance_company')" class="mt-1" />
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="member_number">
                                Member Number
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="member_number"
                                    placeholder="Member Number"
                                    required
                                    wire:model.live="member_number"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('member_number')" class="mt-1" />
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="horizontalformCheck"
                                wire:model.live="emergency_service"
                            />
                            <label class="custom-control-label" for="horizontalformCheck">Emergency Visit?</label>
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click="savePaymentChanges">
                    Change Payment Mode
                </button>
            </div>
        </div>
    </div>
</div>
