<div
    wire:ignore.self
    id="add_patient_deposit"
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" wire:submit.prevent="confirmDeposit">
                <div class="modal-body">
                    <div class="iq-card-body">
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="attending_officer">
                                Payment Type:
                            </label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model="payment_type">
                                    <option value="" disabled>Select from options</option>
                                    @forelse ($billing_codes as $billing_code)
                                        <option value="{{ $billing_code->code }}">{{ $billing_code->name }}</option>
                                    @empty
                                        <option value="" disabled="" selected="">No Billing Codes Available</option>
                                    @endforelse
                                </select>

                                @error('payment_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="payment_type">
                                Amount:
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="number"
                                    min="0"
                                    class="form-control my-2"
                                    id="user"
                                    wire:model="amount"
                                    placeholder="Deposit Amount"
                                />

                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
