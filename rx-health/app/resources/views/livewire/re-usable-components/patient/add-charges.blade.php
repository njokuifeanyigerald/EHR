@props([
    'from_claims_and_billing_office' => false,
])

<div class="row">
    <div class="col-lg-{{ $from_claims_and_billing_office ? 12 : 4 }}">
        <div class="iq-card shadow">
            <div class="iq-card-body">
                {{-- <form> --}}
                <div class="form-group">
                    <label>Change Billing Mode</label>
                    <select class="form-select my-2" wire:model.live="billing_mode">
                        <option value="">Select Billing Mode</option>
                        @foreach ($this->billing_modes as $billing_type)
                            <option
                                value="{{ $billing_type->code }}"
                                {{ $billing_type->code === $this->billing_mode ? 'selected' : '' }}
                            >
                                {{ $billing_type->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('billing_mode')" class="mt-1" />
                </div>
                <div class="form-group">
                    <div class="position-relative">
                        @if ($this->selected_item_name)
                            <input
                                type="text"
                                class="form-control my-2 shadow"
                                wire:model.live="selected_item_name"
                                wire:click="resetSelectedItem"
                                autofocus
                            />
                        @else
                            <input
                                type="search"
                                class="form-control my-2 shadow"
                                id="exampleInputText1"
                                placeholder="Search Items..."
                                wire:key="item_search"
                                wire:model.live="item_search"
                                autofocus
                                autocomplete="off"
                            />
                        @endif

                        <x-input-error :messages="$errors->get('item')" class="mt-1" />

                        <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                            <div
                                wire:loading
                                wire:target="item_search"
                                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                            >
                                <div class="list-item">Searching...</div>
                            </div>

                            @if (! empty($this->item_search) && ! $this->selected_item_name)
                                <div class="list-group-item" style="display: flex">
                                    <div style="flex: 0 0 70%">Item</div>
                                    <div style="flex: 0 0 30%">Price</div>
                                </div>
                                @forelse ($this->items as $i => $item)
                                    @php
                                        $price = $item->itemPrice
                                            ->where(
                                                'billing_code',
                                                $this->billing_modes
                                                    ->where(
                                                        'code',
                                                        $this->billing_mode == 'gratis' ||
                                                        $this->billing_mode == 'credit'
                                                            ? 'cash'
                                                            : $this->billing_mode,
                                                    )
                                                    ->first()->id,
                                            )
                                            ->first()?->unit_price;
                                        $item['price'] = $price;
                                        $success = 'success';
                                        $msg = 'test';
                                    @endphp

                                    <div
                                        class="list-group-item pe-auto {{ $this->highlight_index === $i ? 'active' : '' }}"
                                        style="display: flex"
                                        wire:click="saveSelectedItem( {{ $item }} )"
                                    >
                                        <div class="flex-wrap" style="flex: 0 0 70%">
                                            {{ $item->item_name }}
                                        </div>
                                        <div style="flex: 0 0 30%">
                                            {{ $price ?? 0 }}
                                        </div>
                                    </div>
                                @empty
                                    <div class="list-group-item active text-center">No result</div>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Quantity</label>
                    <input
                        type="number"
                        class="form-control my-2"
                        id="exampleInputNumber1"
                        value="1"
                        min="1"
                        max="1"
                        wire:model.live="item_quantity"
                        readonly
                    />
                    <x-input-error :messages="$errors->get('item_quantity')" class="mt-1" />
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber2">Unit Price</label>
                    <input
                        type="number"
                        class="form-control my-2"
                        id="exampleInputNumber2"
                        value="1"
                        min="0"
                        wire:model.live="item_unit_price"
                        {{ $this->addItemSettings != 'allow' ? 'readonly' : '' }}
                    />
                    <x-input-error :messages="$errors->get('item_unit_price')" class="mt-1" />
                </div>
                <div class="d-flex justify-content-start my-2">
                    <button
                        wire:loading.attr="disabled"
                        wire:target="addItemAndCharge"
                        class="btn btn-primary"
                        wire:click="addItemAndCharge"
                    >
                        <i wire:loading.remove wire:target="addItemAndCharge" class="fa fa-plus"></i>
                        <i wire:loading wire:target="addItemAndCharge" class="fa fa-spinner fa-spin"></i>
                        <span wire:loading.remove wire:target="addItemAndCharge">Add Item</span>
                        <span wire:loading wire:target="addItemAndCharge">Adding Item...</span>
                    </button>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>

    @if (! $from_claims_and_billing_office)
        {{-- Table --}}
        <div class="col-lg-8">
            <livewire:re-usable-components.patient.visit-details
                :visit="$this->selected_visit"
                :addItemSettings="$this->addItemSettings"
            />
        </div>
    @endif
</div>
