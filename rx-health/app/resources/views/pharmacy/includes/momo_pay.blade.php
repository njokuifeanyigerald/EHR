<div class="row">
    <p class="fw-bold text-center text-dark h6 mt-3">Mobile Money Payment Details</p>
    <div class="col-lg-6">
        <div class="form-group my-3">
            <label for="mobileNetwork">Mobile Network</label>
            <select
                class="form-select my-2"
                id="mobileNetwork"
                name="mobileNetwork"
                wire:model="momo_details.mobile_network"
            >
                <option selected>Select Mobile Network</option>
                <option value="MTN">MTN</option>
                <option value="Vodafone">Vodafone</option>
                <option value="AirtelTigo">AirtelTigo</option>
            </select>
            <x-input-error :messages="$errors->get('momo_details.mobile_network')" class="mt-1" />
        </div>
        <div class="form-group my-3">
            <label for="phoneNumber">Phone Number</label>
            <input
                class="form-control my-2"
                type="text"
                id="phoneNumber"
                name="phoneNumber"
                wire:model="momo_details.phone_number"
            />
            <x-input-error :messages="$errors->get('momo_details.phone_number')" class="mt-1" />
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
                wire:model="momo_details.transaction_id"
            />
            <x-input-error :messages="$errors->get('momo_details.transaction_id')" class="mt-1" />
        </div>
        <div class="form-group my-3">
            <label for="momoAmount">Momo Amount</label>
            <input
                class="form-control my-2"
                type="number"
                id="momoAmount"
                name="momoAmount"
                wire:model="momo_details.momo_amount"
            />
            <x-input-error :messages="$errors->get('momo_details.momo_amount')" class="mt-1" />
        </div>
    </div>
</div>
