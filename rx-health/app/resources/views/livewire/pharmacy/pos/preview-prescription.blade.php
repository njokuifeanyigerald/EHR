<div>
    <div class="mt-4 mb-2">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Prescription</th>
                        <th>Price</th>
                        <th class="text-center">Qty</th>
                        <th>Total</th>
                        <th>Mode</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->carts as $index => $cart)
                        <tr>
                            <td>
                                <span class="text-dark">{{ $cart['item']['item_name'] }}:</span>
                                {{-- 1 Ml tid Oral for 2 Days --}}
                                {{ $cart['prescriptions']['dosage_unit'] }}
                                {{ $cart['prescriptions']['dosage_form'] }} of
                                {{ $cart['prescriptions']['frequency'] }}
                                {{ $cart['prescriptions']['route_of_administration'] }}
                                for {{ $cart['prescriptions']['days'] }}
                                {{ $cart['prescriptions']['days'] > 1 ? 'days' : 'day' }}
                            </td>
                            <td>{{ $cart['price'] }}</td>
                            <td class="d-flex flex-row justify-content-around align-items-center">
                                <button
                                    type="button"
                                    class="btn btn-md btn-light"
                                    id="minusBtn"
                                    wire:click="decrementQty({{ $cart['id'] }})"
                                >
                                    -
                                </button>
                                <input
                                    type="text"
                                    class="form-control mx-2"
                                    id="quantity"
                                    style="width: 50px"
                                    wire:model.live.debounce.600ms="carts.{{ $index }}.qty"
                                />
                                <button
                                    type="button"
                                    class="btn btn-md btn-light"
                                    id="plusBtn"
                                    wire:click="incrementQty({{ $cart['id'] }})"
                                >
                                    +
                                </button>
                            </td>
                            <td>{{ (float) $cart['price'] * (float) $cart['qty'] ?? 0 }}</td>
                            <td>{{ Str::replace('_', ' ', strtoupper($cart['payment_mode'])) }}</td>
                            <td>
                                @if ($cart['payment_mode'] == 'cash')
                                    <span class="iq-bg-danger ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">
                                        Pending
                                    </span>
                                @else
                                    <span class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block">Paid</span>
                                @endif
                            </td>
                            <td>
                                {{-- <span class="flaticon2-trash text-danger" title="trash this item"></span> --}}
                                <a href="#" wire:click="confirmRemoveItem({{ $cart['id'] }})">
                                    <i class="fa fa-trash text-danger icons-sm" title="trash this item"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No items added</td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5"></td>
                        <td>Total:</td>
                        <td>
                            <b>{{ $this->total }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Tax:</td>
                        <td>
                            <b>{{ $this->tax }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Discount:</td>
                        <td>
                            <b>{{ $this->discount }}</b>
                        </td>
                    </tr>
                    {{-- <tr> --}}
                    {{-- <td colspan="5"></td> --}}
                    {{-- <td>Sub Total:</td> --}}
                    {{-- <td> --}}
                    {{-- <b>0</b> --}}
                    {{-- </td> --}}
                    {{-- </tr> --}}
                    {{-- </tr> --}}
                    <tr>
                        <td colspan="5"></td>
                        <td>Grand Total:</td>
                        <td>
                            <b>{{ $this->total - $this->discount + $this->tax }}</b>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @if (count($this->carts) > 0)
        {{-- buttons --}}
        <div class="my-2 d-flex justify-content-between">
            <div>
                <button
                    class="btn btn-danger"
                    wire:click="cancelOrder"
                    wire:confirm="Are you sure you want to cancel this order?"
                >
                    Cancel Order
                </button>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-warning me-2" wire:click="confirmToCashier()">
                    To Cashier
                    <i class="fa fa-forward"></i>
                </button>
                @if ($this->patient_id)
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#pharmacy-payment-modal"
                    >
                        <i class="fa fa-shopping-cart"></i>
                        Checkout
                    </button>
                @endif
            </div>
        </div>
    @endif

    {{-- modals --}}
    @include('pharmacy.modals.pos-transaction-history')
    @include('pharmacy.modals.pharmacy-payment-modal')
    @include('pharmacy.modals.pharmacy-drugs-serving')

    @script
        <script>
            // close the modal by listening to the event
            window.addEventListener('checkoutCart', (event) => {
                // console.log('switchedDrug event', event);
                $('#pharmacy-payment-modal').modal('hide');
            });
        </script>
    @endscript
</div>
