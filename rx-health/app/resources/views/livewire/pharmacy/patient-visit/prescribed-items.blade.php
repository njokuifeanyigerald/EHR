<div>
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title me-1">
                <h5 class="card-title">Prescribed Items</h5>
            </div>
            <div class="iq-card-header-toolbar d-flex align-items-center">
                @if ($this->forward_to_cashier)
                    <div class="btn-group me-2">
                        {{-- <button type="button" href="#" class="btn btn-success me-3 my-2"> --}}
                        {{-- <i class="fa fa-plus"></i> --}}
                        {{-- Forward To --}}
                        {{-- </button> --}}
                        <button wire:click="forwardToCashier" type="button" class="btn btn-primary me-3 my-1">
                            Forward To Cashier &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-forward-fast"></i>
                        </button>
                    </div>
                    <div class="btn-group me-2">
                        {{-- @livewire('re-usable-components.visit-session-location-change', ['visit' => $this->patient_visit]) --}}
                        {{-- <select class="form-select my-2" id="selected_location" wire:model.live="selected_location"> --}}
                        {{-- @forelse ($this->locations as $location) --}}
                        {{-- <option value="{{ $location->code }}">{{ Str::headline($location->name) }}</option> --}}
                        {{-- @empty --}}
                        {{-- <option value="">No Locations</option> --}}
                        {{-- @endforelse --}}
                        {{-- </select> --}}
                        {{-- <select class="form-select my-2" id="selected_location" wire:model.live="selected_location"> --}}
                        {{-- @forelse ($this->locations as $location) --}}
                        {{-- <option value="{{ $location->code }}">{{ Str::headline($location->name) }}</option> --}}
                        {{-- @empty --}}
                        {{-- <option value="">No Locations</option> --}}
                        {{-- @endforelse --}}
                        {{-- </select> --}}
                    </div>
                @endif
            </div>
        </div>
        <div class="iq-card-body">
            <div class="row">
                <div class="col-sm-5">
                    <p class="text-dark">Current Location: {{ Str::headline($this->current_location_name) }}</p>
                </div>
                <div class="col-sm-7">
                    @php
                        $billingCode = $patient_visit?->billingCode;
                    @endphp

                    <p class="text-dark">
                        Default:
                        {{ Str::headline($billingCode?->name) }}
                        |
                        {{
                            $billingCode?->code == 'cash' || (($billingCode?->code == 'gratis') == $billingCode?->code) == 'credit'
                                ? Str::upper($patient_visit?->first()?->currency->code)
                                : ($billingCode?->code == 'insurance'
                                    ? Str::upper($patient_visit?->first()?->insurance_no)
                                    : Str::upper($patient_visit?->first()?->insurance_company))
                        }}
                    </p>
                </div>
            </div>
            <div>
                @unless (! $this->visit_details->where('payment_status', 'paid')->contains('pharmacy_status', 'pending'))
                    <button
                        type="button"
                        class="btn mb-3 me-2 btn-primary rounded-pill"
                        wire:loading.remove
                        wire:click="confirmServeDrug"
                    >
                        <i class="fa fa-hand-holding-medical"></i>
                        Serve
                    </button>
                    <button
                        type="button"
                        class="btn mb-3 btn-primary rounded-pill"
                        title="Serve Drug"
                        disabled
                        wire:loading
                        wire:target="serveDrug"
                    >
                        <i class="fa fa-spinner fa-spin me-0"></i>
                        Serving...
                    </button>
                @endunless

                @if ($this->visit_details->contains('source', 'external'))
                    <a
                        href="{{ route('pharmacy.outsourced_receipt', $patient_visit->visit_number) }}"
                        class="btn mb-3 me-2 btn-warning rounded-pill"
                        target="_blank"
                    >
                        <i class="fa fa-arrow-right-from-bracket"></i>
                        Out Source
                    </a>
                    <a
                        {{-- href="{{ route('pharmacy.outsourced_receipt', $patient_visit->visit_number) }}" --}}
                        class="btn mb-3 me-2 btn-secondary rounded-pill"
                        {{-- target="_blank" --}}
                        wire:click="outSourceFromNepp"
                        data-bs-toggle="modal"
                        data-bs-target="#outSourceFromNeppModal"
                    >
                        <i class="fa fa-arrow-up-from-bracket"></i>
                        Out Source (Nepp)
                    </a>
                @endif

                {{--
                    @if ($this->visit_details->count() > 0)
                    <a href="{{ route('payments.receipt', $patient_visit->visit_number) }}"
                    class="btn mb-3 me-2 btn-dark rounded-pill" target="_blank">
                    @endif
                --}}

                @if ($this->patient_visit->visitDetails->count() > 0)
                    <a
                        href="{{ route('payments.prescribed_receipt', $patient_visit->visit_number) }}"
                        class="btn mb-3 me-2 btn-dark rounded-pill"
                        target="_blank"
                    >
                        <i class="fa fa-print"></i>
                        Bill
                    </a>
                    <a class="btn mb-3 me-2 btn-success rounded-pill" wire:click="refreshPrice">
                        <i class="fa fa-refresh"></i>
                        Refresh Price
                    </a>
                @endif

                {{--
                    @if ($this->patient_visit->visitDetails->count() > 0)
                    <a href="#!" wire:click="refreshPrice" class="btn mb-3 me-2 btn-warning rounded-pill">
                    <i class="fa fa-recycle"></i>
                    Refresh
                    </a>
                    @endif
                --}}

                {{--
                    @if ($this->patient_visit->visitDetails->count() > 0)
                    <a href="#!" wire:click='refreshPrice' class="btn mb-3 me-2 btn-warning rounded-pill">
                    <i class="fa fa-recycle"></i>
                    Refresh
                    </a>
                    @endif
                --}}
            </div>
            <div>
                <table class="table mb-0">
                    <thead class="table-dark text-white">
                        <tr>
                            <th scope="col" class="text-white">Total: {{ number_format($this->total_amount, 2) }}</th>
                            <th scope="col" class="text-white">
                                Company: {{ number_format($this->insurance_company_total, 2) }}
                            </th>
                            <th scope="col" class="text-white">Cash: {{ number_format($this->cash_total, 2) }}</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col" class="text-white">Visit No:</th>
                            <th scope="col" class="text-white">{{ $this->patient_visit->visit_number }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Prescription</th>
                            {{-- <th scope="col">Dose | Unit</th> --}}
                            {{-- <th scope="col">Freq</th> --}}
                            {{-- <th scope="col">Days</th> --}}
                            {{-- <th scope="col">Item Count</th> --}}
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Pharmacy Status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->visit_details as $key => $visitDetail)
                            <div class="accordion accordion-flush" id="accordionFlushExample" wire:key="{{ $key }}">
                                <div class="accordion-item">
                                    <tr>
                                        <td>
                                            <div
                                                data-bs-toggle="collapse"
                                                data-bs-target="#edit-prescribedItemDetails-{{ $visitDetail->id }}"
                                                aria-expanded="false"
                                                aria-controls="edit-prescribedItemDetails"
                                                style="cursor: pointer"
                                                class="accordion-button collapsed ps-3 pe-3 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                                role="alert"
                                            >
                                                <span>{{ $visitDetail->item->item_name }}:</span>
                                                &nbsp; &nbsp; &nbsp;
                                                <span class="text-muted">
                                                    {{-- 2 Tab tid 5 days Oral --}}
                                                    {{ $visitDetail->dosage_unit }}
                                                    {{ $visitDetail->dose }}
                                                    {{ $visitDetail->route }}
                                                    {{ $visitDetail->frequency }} for {{ $visitDetail->days }} days
                                                </span>
                                            </div>
                                        </td>
                                        {{-- <td> --}}
                                        {{-- <select class="form-select my-2" id="dose_unit" style="width: 60px"></select> --}}
                                        {{-- <a href="#" class="text-primary">Add New</a> --}}
                                        {{-- </td> --}}
                                        {{-- <td> --}}
                                        {{-- <select class="form-select my-2" id="freq"></select> --}}
                                        {{-- </td> --}}
                                        {{-- <td> --}}
                                        {{-- <input type="number" class="form-control my-2" id="days" style="width: 60px" /> --}}
                                        {{-- </td> --}}
                                        {{-- <td> --}}
                                        {{-- <select class="form-select my-2" id="item_count"></select> --}}
                                        {{-- </td> --}}
                                        <td>
                                            @if ($this->update_mode && $this->visit_detail_id == $visitDetail->id)
                                                <input
                                                    type="number"
                                                    min="0"
                                                    class="form-control my-2"
                                                    id="unit_price"
                                                    style="width: 60px"
                                                    wire:model="unit_price.{{ $key }}"
                                                    {{ $this->allowPriceChange ? '' : 'disabled' }}
                                                />

                                                @error('unit_price.' . $key)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @else
                                                {{ $visitDetail->currency?->code ?? 'N/A' }}
                                                {{ number_format($visitDetail->unit_price, 2) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($this->update_mode && $this->visit_detail_id == $visitDetail->id)
                                                <input
                                                    type="number"
                                                    min="0"
                                                    class="form-control my-2"
                                                    id="quantity"
                                                    style="width: 60px"
                                                    wire:model="unit_quantity.{{ $key }}"
                                                />

                                                @error('unit_quantity.' . $key)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @else
                                                {{ $visitDetail->quantity }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $visitDetail->currency->code }}
                                            {{ number_format($visitDetail->unit_price * $visitDetail->quantity, 2) }}
                                        </td>
                                        <td>
                                            <select class="form-select my-2" id="payment_mode" style="width: 120px">
                                                <option value="{{ $visitDetail->payment_type }}">
                                                    {{ Str::headline($visitDetail->payment_type) }}
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            @if ($visitDetail->pharmacy_status === null)
                                                <span class="badge badge-primary">
                                                    {{ 'N/A' }}
                                                </span>
                                            @elseif ($visitDetail->pharmacy_status === 'served')
                                                <span class="badge badge-success">
                                                    {{ $visitDetail->pharmacy_status }}
                                                </span>
                                            @elseif ($visitDetail->pharmacy_status === 'pending')
                                                <span class="badge badge-warning">
                                                    {{ $visitDetail->pharmacy_status }}
                                                </span>
                                            @else
                                                <span class="badge badge-info">
                                                    {{ $visitDetail->pharmacy_status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div>
                                                @if ($this->update_mode && $this->visit_detail_id == $visitDetail->id)
                                                    <button
                                                        type="button"
                                                        class="btn mb-3 btn-success rounded-pill"
                                                        title="Update Details"
                                                        wire:click.prevent="updatePrescribedQtyPrice('{{ $key }}', '{{ $visitDetail->id }}', true)"
                                                    >
                                                        <i class="fa fa-save" aria-hidden="true"></i>
                                                    </button>
                                                @else
                                                    <button
                                                        type="button"
                                                        class="btn mb-3 btn-warning rounded-pill"
                                                        title="Edit Details"
                                                        wire:click.prevent="editPrescribedItemMode('{{ $key }}', '{{ $visitDetail->id }}', true)"
                                                    >
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#show-prescribedItemDetails-{{ $visitDetail->id }}"
                                                    aria-expanded="false"
                                                    aria-controls="show-prescribedItemDetails"
                                                    class="btn mb-3 btn-secondary rounded-pill"
                                                    title="Show Details"
                                                >
                                                    <i class="fa fa-arrow-alt-circle-down"></i>
                                                </button>
                                                {{-- <button --}}
                                                {{-- type="button" --}}
                                                {{-- data-bs-toggle="modal" --}}
                                                {{-- data-bs-target="#switch_drug_prescriptions" --}}
                                                {{-- class="btn mb-3 btn-success rounded-pill" --}}
                                                {{-- title="Switch" --}}
                                                {{-- > --}}
                                                {{-- <i class="fa fa-rotate me-0"></i> --}}
                                                {{-- </button> --}}
                                                {{-- <button --}}
                                                {{-- type="button" --}}
                                                {{-- class="btn mb-3 btn-warning rounded-pill" --}}
                                                {{-- title="Out Source" --}}
                                                {{-- > --}}
                                                {{-- <i class="fa fa-arrow-right-from-bracket me-0"></i> --}}
                                                {{-- </button> --}}
                                                {{-- <button --}}
                                                {{-- type="button" --}}
                                                {{-- class="btn mb-3 btn-danger rounded-pill" --}}
                                                {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                                {{-- title="Delete" --}}
                                                {{-- > --}}
                                                {{-- <i class="fa fa-trash me-0"></i> --}}
                                                {{-- </button> --}}
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Edit Priscribed Item Details --}}
                                    <tr>
                                        <td colspan=" 11">
                                            @include('livewire.pharmacy.includes.update_prescribed_item')
                                        </td>
                                    </tr>

                                    <tr>
                                        {{-- Show Priscribed Item Details --}}
                                        <td colspan=" 11">
                                            @include('livewire.pharmacy.includes.show_prescribed_item_details')
                                        </td>
                                    </tr>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">No Prescribed Items</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('pharmacy.modals.switch-drugs', ['allowPriceChange' => $this->allowPriceChange])

    @include('livewire.pharmacy.includes.outsource-from-nepp-modal')
</div>

@script
    <script>
        // close the modal by listening to the event
        window.addEventListener('drugSwitched', (event) => {
            // console.log('switchedDrug event', event);
            $('#switch_drug_prescriptions').modal('hide');
        });
    </script>
@endscript
