<div class="row">
    <p class="fw-bold text-center text-dark h6 mt-3">Cheque Payment Details</p>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="chequeNumber">Cheque Number</label>
            <input
                class="form-control my-2"
                type="text"
                id="chequeNumber"
                name="chequeNumber"
                wire:model="cheque_details.cheque_number"
            />
            <x-input-error :messages="$errors->get('cheque_details.cheque_number')" class="mt-1" />
        </div>
        <div class="form-group my-3">
            <label for="bankName">Bank Name</label>
            <input
                class="form-control my-2"
                type="text"
                id="bankName"
                name="bankName"
                wire:model="cheque_details.bank_name"
            />
            <x-input-error :messages="$errors->get('cheque_details.bank_name')" class="mt-1" />
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="chequeAmount">Cheque Amount</label>
            <input
                class="form-control my-2"
                type="number"
                min="0"
                id="chequeAmount"
                name="chequeAmount"
                wire:model="cheque_details.cheque_amount"
            />
            <x-input-error :messages="$errors->get('cheque_details.cheque_amount')" class="mt-1" />
        </div>
    </div>
</div>
