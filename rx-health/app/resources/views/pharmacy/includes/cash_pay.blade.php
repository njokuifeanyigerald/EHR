<div class="row">
    <p class="fw-bold text-center text-dark h6 mt-3">Cash Payment Details</p>

    <div class="form-group my-3">
        <label>
            Cash Amount
            <span class="text-danger">*</span>
        </label>
        <input
            class="form-control my-2"
            type="number"
            min="0"
            name="cash_amount"
            wire:model.live.debounce.550ms="cash_details.cash_amount"
        />
        <x-input-error :messages="$errors->get('cash_details.cash_amount')" class="mt-1" />
    </div>
</div>
