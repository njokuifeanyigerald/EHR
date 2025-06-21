<div class="row">
    <p class="fw-bold text-center text-dark h6 mt-3">POS Payment Details</p>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="cardType">Card Type</label>
            <select class="form-select my-2" id="cardType" name="cardType" wire:model="pos_details.card_type">
                <option selected value="">Select Card Type</option>
                <option value="visa">Visa</option>
                <option value="Master_card">Master Card</option>
            </select>
            <x-input-error :messages="$errors->get('pos_details.card_type')" class="mt-1" />
        </div>
        <div class="form-group my-3">
            <label for="transaction_id">Transaction ID</label>
            <input
                class="form-control my-2"
                type="text"
                id="transaction_id"
                name="transaction_id"
                wire:model="pos_details.transaction_id"
            />
            <x-input-error :messages="$errors->get('pos_details.transaction_id')" class="mt-1" />
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="posAmount">POS Amount</label>
            <input
                class="form-control my-2"
                type="number"
                min="0"
                id="posAmount"
                name="posAmount"
                wire:model="pos_details.pos_amount"
            />
            <x-input-error :messages="$errors->get('pos_details.pos_amount')" class="mt-1" />
        </div>
    </div>
</div>
