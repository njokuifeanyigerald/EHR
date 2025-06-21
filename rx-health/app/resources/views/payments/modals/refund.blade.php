<div
    wire:ignore.self
    id="add_patient_refund"
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make A Refund</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" wire:submit.prevent="confirmRefund">
                <div class="modal-body">
                    <div class="iq-card-body">
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="refund_type">
                                Refund Type
                            </label>
                            <div class="col-sm-10">
                                <select class="form-select" wire:model.live="refund_type">
                                    <option value="" disabled>Select from options</option>
                                    <option value="withdrawal">Withdrawal</option>
                                </select>

                                @error('refund_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="payment_type">
                                Refund:
                            </label>
                            <div class="col-sm-10">
                                <input
                                    type="number"
                                    min="0"
                                    class="form-control my-2"
                                    id="amount_to_refund"
                                    wire:model.live.debounce.550ms="amount_to_refund"
                                    placeholder="Amount to refund"
                                />

                                @error('amount_to_refund')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confrim Refund</button>
                </div>
            </form>
        </div>
    </div>
</div>
