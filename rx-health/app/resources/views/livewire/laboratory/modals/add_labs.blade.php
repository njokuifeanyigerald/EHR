<div
    wire:ignore.self
    class="modal fade"
    id="add_labs"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    {{-- <div class="modal-dialog modal-fullscreen p-4"> --}}
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add labs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- Filters --}}
                    <div class="col-lg-3">
                        <div class="iq-card shadow">
                            <div class="iq-card-body">
                                <div class="form-group">
                                    <label>Change Billing Mode</label>
                                    <select class="form-select my-2" wire:model.live="billing_mode">
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
                                                wire:keydown.arrow-up="decrementItemsHighlight"
                                                wire:keydown.arrow-down="incrementItemsHighlight"
                                                wire:keydown.enter="selectItem"
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
                                                    <div style="flex: 0 0 80%">Item</div>
                                                    <div style="flex: 0 0 20%">Price</div>
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
                                                        <div class="flex-wrap" style="flex: 0 0 80%">
                                                            {{ $item->item_name }}
                                                        </div>
                                                        <div style="flex: 0 0 20%">
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
                                <div>
                                    <button
                                        wire:click="addNewLab"
                                        class="btn btn-primary btn-block my-2"
                                        id="add_new_item"
                                    >
                                        <i class="fa fa-plus"></i>
                                        Add Lab
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="col-lg-9">
                        <div class="iq-card shadow">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title me-1">
                                    <h5 class="card-title">Diagnosis</h5>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p class="text-dark">
                                            Current Location:
                                            {{ Str::headline($patients?->find($this->selected_patient_id)?->visits?->first()?->location?->name) }}
                                        </p>
                                    </div>
                                    <div class="col-sm-7 d-flex justify-content-end">
                                        @php
                                            $billingCode = $patients
                                                ?->find($this->selected_patient_id)
                                                ?->visits?->first()?->billingCode;
                                        @endphp

                                        <p class="text-dark">
                                            Default:
                                            {{ Str::headline($billingCode?->name) }}
                                            |
                                            {{ $billingCode?->code == 'cash' || (($billingCode?->code == 'gratis') == $billingCode?->code) == 'credit' ? Str::upper($patients->find($this->selected_patient_id)?->visits?->first()?->currency->code) : ($billingCode?->code == 'insurance' ? Str::upper($patients->find($this->selected_patient_id)?->visits?->first()?->insurance_no) : Str::headline($patients->find($this->selected_patient_id)?->visits?->first()?->insurance_company)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    @if ($this->forward_to_cashier)
                                        <a
                                            {{-- href="{{ route('payments.receipt', 1) }}" --}}
                                            class="btn mb-3 me-2 btn-dark rounded-pill"
                                            wire:click="forwardToCashier"
                                        >
                                            <i class="fa fa-forward"></i>
                                            Forward to Cashier
                                        </a>
                                    @endif

                                    <a class="btn mb-3 me-2 btn-primary rounded-pill" wire:click="refreshPrice">
                                        <i class="fa fa-refresh"></i>
                                        Refresh Price
                                    </a>
                                </div>
                                <div>
                                    <table class="table mb-0">
                                        <thead class="table-secondary text-dark">
                                            <tr>
                                                <th scope="col" class="">
                                                    Total:
                                                    {{
                                                        number_format(
                                                            $this->selected_patientLabs
                                                                ?->map(function ($item) {
                                                                    return $item?->unit_price * $item?->quantity;
                                                                })
                                                                ->sum(),
                                                            2,
                                                            '.',
                                                            ',',
                                                        )
                                                    }}
                                                </th>
                                                @foreach ($this->billing_modes as $billing_mod)
                                                    <th scope="col" class="">
                                                        {{ Str::headline($billing_mod->name) }}:
                                                        {{
                                                            number_format(
                                                                $this->selected_patientLabs
                                                                    ?->map(function ($item) use ($billing_mod) {
                                                                        if ($item->payment_type == $billing_mod->code) {
                                                                            return $item?->unit_price * $item?->quantity;
                                                                        }
                                                                    })
                                                                    ->sum(),
                                                                2,
                                                                '.',
                                                                ',',
                                                            )
                                                        }}
                                                    </th>
                                                @endforeach

                                                <th scope="col" class="">
                                                    Visit No:
                                                    {{ $this->selected_patientLabs?->first()?->visit_number }}
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Mode</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($this->selected_patientLabs ?? [] as $lab)
                                                <tr>
                                                    <td>{{ $lab->item->item_name }}</td>
                                                    <td>
                                                        @if ($this->labs_to_edit[$lab->id] ?? false && $this->addItemSettings == 'allow')
                                                            <input
                                                                required
                                                                wire:model.live="lab_details.{{ $lab->id }}.quantity"
                                                                class="form-control"
                                                                type="text"
                                                                name="lab_details_quantity_{{ $lab->id }}"
                                                                id="lab_details_quantity_{{ $lab->id }}"
                                                            />
                                                        @else
                                                            {{ $lab->quantity }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($this->labs_to_edit[$lab->id] ?? false && $this->addItemSettings == 'allow')
                                                            <input
                                                                wire:model.live="lab_details.{{ $lab->id }}.unit_price"
                                                                class="form-control"
                                                                type="text"
                                                                name="lab_details_{{ $lab->id }}"
                                                                id="lab_details_{{ $lab->id }}"
                                                                required
                                                            />
                                                        @else
                                                            {{ number_format($lab->unit_price, 2, '.', ',') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ Str::headline($lab->billingCode->name) }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="service_type p-2 badge badge-pill {{ $lab->payment_status == 'owing' ? 'badge-danger' : 'badge-success' }}"
                                                        >
                                                            {{ $lab->payment_status }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="text-center d-flex gap-1">
                                                            @if ($this->addItemSettings == 'allow')
                                                                @if ($this->labs_to_edit[$lab->id] ?? false)
                                                                    <button
                                                                        wire:click="saveLabEdits({{ $lab->id }})"
                                                                        class="btn btn-success"
                                                                        title="Save"
                                                                    >
                                                                        <i class="fa fa-check-double me-0"></i>
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        wire:click="editLabPriceOrQuantity({{ $lab->id }})"
                                                                        class="btn btn-primary"
                                                                        title="Edit"
                                                                    >
                                                                        <i class="fa fa-edit me-0"></i>
                                                                    </button>
                                                                @endif
                                                            @endif

                                                            <button
                                                                wire:click="deleteLab({{ $lab->id }})"
                                                                class="btn btn-danger"
                                                                title="Delete"
                                                            >
                                                                <i class="fa fa-trash me-0"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="12">No Lab Found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
