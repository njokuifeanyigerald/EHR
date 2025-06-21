@props([
    'visit' => null,
    'visit_details' => [],
    'from_billing_office' => false,
])

@if ($from_billing_office)
    <div class="table-responsive">
        <table class="table mb-0">
            <thead class="table-dark text-white">
                <tr>
                    <th scope="col" class="text-white">
                        Total:
                        {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details), 2) }}
                    </th>
                    @foreach ($this->billing_modes as $billing_mode)
                        <th scope="col">
                            {{ $billing_mode->name }} :
                            {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details, [$billing_mode->code]), 2, '.', ',') }}
                        </th>
                    @endforeach

                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" class="text-white">Visit No: 1000192</th>
                </tr>
            </thead>
        </table>
    </div>
@endif

<div class="table-responsive mb-2">
    <table class="table mb-0 {{-- table-borderless --}}">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ITEM</th>
                <th scope="col">QTY</th>
                <th scope="col">PRICE</th>
                <th scope="col">TOTAL</th>
                <th scope="col">PAYMENT MODE</th>
                <th scope="col">STATUS</th>
                <th scope="col">
                    <div class="d-flex justify-content-center w-100">ACTION</div>
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($visit)
                @forelse ($visit_details ?? [] as $visit_detail)
                    <tr>
                        <td>
                            {{
                                $from_billing_office
                                    ? $loop->iteration
                                    : $loop->iteration + $visit_details->firstItem() - 1
                            }}
                        </td>
                        <td>{{ $visit_detail?->item?->item_name }}</td>
                        <td>
                            @if ($this->editable_items[$visit_detail?->id] ?? false)
                                <input
                                    type="number"
                                    class="form-control"
                                    min="1"
                                    wire:model="editable_items_details.{{ $visit_detail?->id }}.quantity"
                                />
                            @else
                                {{ $visit_detail?->quantity }}
                            @endif
                        </td>
                        <td>
                            @if ($this->editable_items[$visit_detail?->id] ?? false)
                                <input
                                    type="number"
                                    class="form-control"
                                    min="0"
                                    wire:model="editable_items_details.{{ $visit_detail?->id }}.unit_price"
                                    {{ $this->addItemSettings != 'allow' ? 'readonly' : '' }}
                                />
                            @else
                                {{ $visit_detail?->unit_price }}
                            @endif
                        </td>
                        <td>
                            {{ $visit_detail?->unit_price * $visit_detail?->quantity * $visit_detail?->conversion_rate }}
                        </td>
                        <td>{{ Str::headline($visit_detail?->payment_type) }}</td>
                        <td>
                            @if ($visit_detail?->payment_status == 'paid')
                                <span class="badge badge-success">Paid</span>
                            @elseif ($visit_detail?->payment_status == 'owing' || $visit_detail?->payment_status == 'not_paid')
                                <span class="badge badge-danger">Owing</span>
                            @elseif ($visit_detail?->payment_status == 'partially_paid')
                                <span class="badge badge-warning">Partially Paid</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 w-100">
                                @if ($visit?->status != 'done')
                                    @if ($this->editable_items[$visit_detail?->id] ?? false)
                                        {{-- save --}}
                                        <button
                                            wire:loading.attr="disabled"
                                            wire:target="saveVisitDetail({{ $visit_detail?->id }})"
                                            class="btn"
                                            wire:click="saveVisitDetail({{ $visit_detail?->id }})"
                                        >
                                            <i
                                                wire:loading.remove
                                                wire:target="saveVisitDetail({{ $visit_detail?->id }})"
                                                class="fa fa-save text-success icons-sm"
                                                title="save this item"
                                            ></i>

                                            <i
                                                wire:loading
                                                wire:target="saveVisitDetail({{ $visit_detail?->id }})"
                                                class="fa fa-spinner fa-spin text-success icons-sm"
                                                title="save this item"
                                            ></i>
                                        </button>
                                    @else
                                        <button
                                            class="btn"
                                            wire:click="editVisitDetail({{ $visit_detail?->id }}, {{ $visit_detail?->quantity }}, {{ $visit_detail?->unit_price }})"
                                        >
                                            <i class="fa fa-edit text-primary icons-sm" title="edit this item"></i>
                                        </button>
                                    @endif
                                    <button
                                        wire:target="deleteVisitDetail({{ $visit_detail?->id }})"
                                        class="btn"
                                        wire:click="deleteVisitDetail({{ $visit_detail?->id }})"
                                        wire:loading.attr="disabled"
                                    >
                                        <i
                                            wire:loading.remove
                                            wire:target="deleteVisitDetail({{ $visit_detail?->id }})"
                                            class="fa fa-trash text-danger icons-sm"
                                            title="trash this item"
                                        ></i>

                                        <i
                                            wire:loading
                                            wire:target="deleteVisitDetail({{ $visit_detail?->id }})"
                                            class="fa fa-spinner fa-spin text-danger icons-sm"
                                            title="trash this item"
                                        ></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="8" class="w-100">No items Available</td>
                    </tr>
                @endforelse
            @else
                <tr class="text-center">
                    <td colspan="8" class="w-100">No items Available</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
