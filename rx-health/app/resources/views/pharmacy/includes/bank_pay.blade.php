<div class="row">
    <p class="fw-bold text-center text-dark h6 mt-3">Bank Transfer Payment Details</p>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="bankName">Bank Name</label>
            <input
                class="form-control my-2"
                type="text"
                id="bankName"
                name="bankName"
                wire:model="bank_details.bank_name"
            />
            <x-input-error :messages="$errors->get('bank_details.bank_name')" class="mt-1" />
        </div>
        <div class="form-group my-3">
            <label for="bankTransferAmount">Bank Transfer Amount</label>
            <input
                class="form-control my-2"
                type="number"
                id="bankTransferAmount"
                name="bankTransferAmount"
                wire:model="bank_details.bank_transfer_amount"
            />
            <x-input-error :messages="$errors->get('bank_details.bank_transfer_amount')" class="mt-1" />
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="transactionId">Transaction ID</label>
            <input
                class="form-control my-2"
                type="text"
                id="transactionId"
                name="transactionId"
                wire:model="bank_details.transaction_id"
            />
            <x-input-error :messages="$errors->get('bank_details.transaction_id')" class="mt-1" />
        </div>
    </div>
</div>
