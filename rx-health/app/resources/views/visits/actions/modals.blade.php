{{-- Modals for visit details --}}
<!-- Add charges Modal -->
<div class="modal fade" id="add_charges" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Charges</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="iq-card shadow">
                            <div class="iq-card-body">
                                <form>
                                    <div class="form-group">
                                        <input
                                            type="search"
                                            class="form-control my-2 shadow"
                                            id="exampleInputText1"
                                            placeholder="Search Items..."
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Change Billing Mode</label>
                                        <select class="form-select my-2" id="selectcountry">
                                            <option value="CASH">Cash Clients</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber1">Quantity</label>
                                        <input
                                            type="number"
                                            class="form-control my-2"
                                            id="exampleInputNumber1"
                                            value="1"
                                            min="1"
                                        />
                                    </div>
                                    <div class="d-flex justify-content-start my-2">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-plus"></i>
                                            Add Item
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="col-lg-9">
                        <div class="iq-card shadow-lg">
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ITEM</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">TOTAL</th>
                                                <th scope="col">PAYMENT MODE</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>obstetric usg scan report</td>
                                                <td>1</td>
                                                <td>120.00</td>
                                                <td>120</td>
                                                <td>Cash Clients</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Chlorpheniramine/Paracetamol Tablet</td>
                                                <td>30</td>
                                                <td>4620.00</td>
                                                <td>138600</td>
                                                <td>Cash Clients</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Aceclofenac Tablet 100mg</td>
                                                <td>100</td>
                                                <td>5620.00</td>
                                                <td>562000</td>
                                                <td>Cash Clients</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Betatop Tablet 12.5mg</td>
                                                <td>30</td>
                                                <td>780.00</td>
                                                <td>23400</td>
                                                <td>Cash Clients</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Rocephine injection 2g</td>
                                                <td>40</td>
                                                <td>146.20</td>
                                                <td>5848</td>
                                                <td>Cash Clients</td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td></td>
                                            </tr>
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

{{-- eddy --}}
@if ($this->showAddCharges)
    {{-- <div class="relative"> --}}
    <div class="modal-backdrop"></div>
    <div
        class="modal d-block"
        id="add_charges"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        wire:click="hideAddChargesModal"
        {{-- wire:keydown.escape="hideAddChargesModal" --}}
    >
        <div class="modal-dialog modal-xl" onclick="stopPropagation(event)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Charges</h5>
                    <button
                        type="button"
                        class="btn-close"
                        {{-- data-bs-dismiss="modal" --}}
                        wire:click="hideAddChargesModal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="iq-card shadow">
                                <div class="iq-card-body">
                                    {{-- <form> --}}
                                    <div class="form-group">
                                        <div class="relative">
                                            @if ($this->selected_item_name)
                                                <input
                                                    type="text"
                                                    class="form-control my-2 shadow"
                                                    wire:model.live="selected_item_name"
                                                    wire:click="resetSelectedItem"
                                                />
                                            @else
                                                <input
                                                    type="search"
                                                    class="form-control my-2 shadow"
                                                    id="exampleInputText1"
                                                    placeholder="Search Items..."
                                                    wire:model.live="item_search"
                                                    wire:keydown.arrow-up="decrementItemsHighlight"
                                                    wire:keydown.arrow-down="incrementItemsHighlight"
                                                    autofocus
                                                />
                                            @endif

                                            <x-input-error :messages="$errors->get('item')" class="mt-1" />

                                            <div class="absolute z-10 w-full rounded-xl list-group bg-black top-0">
                                                @if (! empty($this->item_search) && ! $this->selected_item_name)
                                                    <div class="list-group-item" style="display: flex">
                                                        <div style="flex: 0 0 60%">Item</div>
                                                        <div style="flex: 0 0 40%">Price</div>
                                                    </div>
                                                    @forelse ($this->items as $i => $item)
                                                        <div
                                                            class="list-group-item pe-auto {{ $this->highlight_index === $i ? 'active' : '' }}"
                                                            style="display: flex"
                                                            wire:click="saveSelectedItem({{ $item }})"
                                                        >
                                                            <div class="flex-wrap" style="flex: 0 0 60%">
                                                                {{ $item->item_name }}
                                                            </div>
                                                            <div style="flex: 0 0 40%">
                                                                {{ $item->itemPrice ? number_format($item->itemPrice->unit_price, 2, '.', ',') : 'N/A' }}
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="list-group-item active">No result</div>
                                                    @endforelse
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Change Billing Mode</label>
                                        <select
                                            class="form-select my-2"
                                            id="selectcountry"
                                            wire:model.live="billing_mode"
                                        >
                                            @if (! $this->billing_mode)
                                                <option value="null">Select Billing Mode</option>
                                            @endif

                                            @foreach ($this->billing_modes as $billing_type)
                                                <option value="{{ $billing_type->code }}">
                                                    {{ $billing_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('billing_mode')" class="mt-1" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber1">Quantity</label>
                                        <input
                                            type="number"
                                            class="form-control my-2"
                                            id="exampleInputNumber1"
                                            value="1"
                                            min="1"
                                            wire:model.live="item_quantity"
                                        />
                                        <x-input-error :messages="$errors->get('item_quantity')" class="mt-1" />
                                    </div>
                                    <div class="d-flex justify-content-start my-2">
                                        <button class="btn btn-primary" wire:click="addItemAndCharge">
                                            <i class="fa fa-plus"></i>
                                            Add Item
                                        </button>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
                        {{-- Table --}}
                        <div class="col-lg-9">
                            <div class="iq-card shadow-lg">
                                <div class="iq-card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">ITEM</th>
                                                    <th scope="col">QTY</th>
                                                    <th scope="col">PRICE</th>
                                                    <th scope="col">TOTAL</th>
                                                    <th scope="col">PAYMENT MODE</th>
                                                    <th scope="col">STATUS</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($this->selected_visit)
                                                    @forelse ($this->selected_visit->visitDetails as $visit_detail)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $visit_detail->item->item_name }}</td>
                                                            <td>{{ $visit_detail->quantity }}</td>
                                                            <td>{{ $visit_detail->unit_price }}</td>
                                                            <td>{{ $visit_detail->total_price }}</td>
                                                            <td>{{ $visit_detail->payment_type }}</td>
                                                            <td>
                                                                @if ($visit_detail->payment_status == 'paid')
                                                                    <span class="badge badge-success">Paid</span>
                                                                @elseif ($visit_detail->payment_status == 'owning' || $visit_detail->payment_status == 'not_paid')
                                                                    <span class="badge badge-danger">Owing</span>
                                                                @elseif ($visit_detail->payment_status == 'partially_paid')
                                                                    <span class="badge badge-warning">
                                                                        Partially Paid
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td></td>
                                                        </tr>
                                                    @empty
                                                        <table class="w-100">
                                                            <tr class="text-center">
                                                                <td class="w-100">No items Available</td>
                                                            </tr>
                                                        </table>
                                                    @endforelse
                                                @else
                                                    <div class="w-100 text-center">No Visit Selected</div>
                                                @endif
                                                {{--
                                                    <tr>
                                                    <td>1</td>
                                                    <td>obstetric usg scan report</td>
                                                    <td>1</td>
                                                    <td>120.00</td>
                                                    <td>120</td>
                                                    <td>Cash Clients</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                    <td>2</td>
                                                    <td>Chlorpheniramine/Paracetamol Tablet</td>
                                                    <td>30</td>
                                                    <td>4620.00</td>
                                                    <td>138600</td>
                                                    <td>Cash Clients</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                    <td>3</td>
                                                    <td>Aceclofenac Tablet 100mg</td>
                                                    <td>100</td>
                                                    <td>5620.00</td>
                                                    <td>562000</td>
                                                    <td>Cash Clients</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                    <td>4</td>
                                                    <td>Betatop Tablet 12.5mg</td>
                                                    <td>30</td>
                                                    <td>780.00</td>
                                                    <td>23400</td>
                                                    <td>Cash Clients</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                    <td></td>
                                                    </tr>
                                                    <tr>
                                                    <td>2</td>
                                                    <td>Rocephine injection 2g</td>
                                                    <td>40</td>
                                                    <td>146.20</td>
                                                    <td>5848</td>
                                                    <td>Cash Clients</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                    <td></td>
                                                    </tr>
                                                --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        {{-- data-bs-dismiss="modal" --}}
                        wire:click="hideAddChargesModal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endif

<!-- Payment Mode Modal -->
<div class="modal fade" id="changePaymentMode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Payment Mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="iq-card-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis
                        mollis, diam nibh finibus leo
                    </p>
                    <form class="form-horizontal" action="/action_page.php">
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="attending_officer">
                                Attending Officer:
                            </label>
                            <div class="col-sm-10">
                                <select
                                    class="form-select my-2 col-sm-8"
                                    id="attending_officer"
                                    name="attending_officer_id"
                                >
                                    <option value="">Choose Attending Officer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="payment_type">
                                Payment Type:
                            </label>
                            <div class="col-sm-10">
                                <select
                                    onchange="showOptions(this.value)"
                                    class="form-select my-2 col-sm-8"
                                    id="payment_type"
                                    name="billing_code"
                                >
                                    <option selected="" value="CASH">Cash Client</option>
                                    <option value="CREDIT">Credit/Coorporate/Cash Client</option>
                                    <option value="INS">Insurance/Cash Client</option>
                                    <option value="STAFF">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div id="company" style="display: none">
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="comp">Company:</label>
                                <div class="col-sm-10">
                                    <select class="form-select my-2 col-sm-8" name="company" id="comp">
                                        <option value="">Lebanese Company</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="company_staff_no">
                                    Staff Number:
                                </label>
                                <div class="col-sm-10">
                                    <input
                                        name="company_staff_no"
                                        id="company_staff_no"
                                        type="text"
                                        class="form-control my-2"
                                        id="email1"
                                    />
                                </div>
                            </div>
                        </div>
                        <div id="insurance" style="display: none">
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="insurance_co">
                                    Insurance Company:
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select my-2 col-sm-8" name="insurance" id="insurance_co">
                                        <option value="">OCEANIC PHARMACY BENEFITS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="insurance_no">
                                    Insurance Number:
                                </label>
                                <div class="col-sm-10">
                                    <input
                                        name="insurance_no"
                                        id="insurance_no"
                                        type="text"
                                        class="form-control my-2"
                                        id="email1"
                                    />
                                </div>
                            </div>
                            <div class="mb-2" id="validation">
                                <img src="{{ asset('logos/card.png') }}" class="logo-card" alt="insurance card" />
                                <button type="button" class="btn btn-outline-primary ms-4" onclick="">
                                    <i class="fa fa-check"></i>
                                    Validate Insurance Card
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="horizontalformCheck" />
                                <label class="custom-control-label" for="horizontalformCheck">Emergency Visit?</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Change Payment Mode</button>
            </div>
        </div>
    </div>
</div>

{{-- eddy --}}
@if ($this->showChangePayment)
    <div class="modal-backdrop"></div>
    <div
        class="modal d-block"
        id="changePaymentMode"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        wire:click="hideChangePaymentModal"
        {{-- wire:keydown.escape="hideChangePaymentModal" --}}
    >
        <div class="modal-dialog" onclick="stopPropagation(event)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Payment Mode</h5>
                    <button
                        type="button"
                        class="btn-close"
                        {{-- data-bs-dismiss="modal" --}}
                        wire:click="hideChangePaymentModal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="iq-card-body">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis
                            mollis, diam nibh finibus leo
                        </p>
                        <form class="form-horizontal" action="/action_page.php">
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="attending_officer">
                                    Attending Officer:
                                </label>
                                <div class="col-sm-10">
                                    <select
                                        class="form-select my-2 col-sm-8"
                                        id="attending_officer"
                                        name="attending_officer_id"
                                        wire:model.live="attending_officer"
                                    >
                                        @if (! $this->attending_officer)
                                            <option value="">Choose Attending Officer</option>
                                        @endif

                                        @foreach ($this->attending_officers as $attending_officer)
                                            <option value="{{ $attending_officer->id }}">
                                                {{ $attending_officer->title . ' ' . $attending_officer->last_name . ', ' . $attending_officer->first_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="payment_type">
                                    Payment Type:
                                </label>
                                <div class="col-sm-10">
                                    {{--
                                        <select onchange="showOptions(this.value)" class="form-select my-2 col-sm-8"
                                        id="payment_type" name="billing_code">
                                        <option selected="" value="CASH"> Cash Client </option>
                                        <option value="CREDIT"> Credit/Coorporate/Cash Client </option>
                                        <option value="INS"> Insurance/Cash Client </option>
                                        <option value="STAFF"> Staff </option>
                                        </select>
                                    --}}
                                    <select class="form-select my-2" id="selectcountry" wire:model.live="billing_mode">
                                        @if (! $this->billing_mode)
                                            <option value="null">Select Billing Mode</option>
                                        @endif

                                        @foreach ($this->billing_modes as $billing_type)
                                            <option value="{{ $billing_type->code }}">
                                                {{ $billing_type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('billing_mode')" class="mt-1" />
                                </div>
                            </div>
                            {{--
                                <div id="company" style="display:none;">
                                <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0"
                                for="comp">Company:</label>
                                <div class="col-sm-10">
                                <select class="form-select my-2 col-sm-8" name="company" id="comp">
                                <option value="">Lebanese Company</option>
                                </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0"
                                for="company_staff_no">Staff Number:</label>
                                <div class="col-sm-10">
                                <input name="company_staff_no" id="company_staff_no" type="text"
                                class="form-control my-2" id="email1">
                                </div>
                                </div>
                                </div>
                                <div id="insurance" style="display:none;">
                                <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0"
                                for="insurance_co">Insurance Company:</label>
                                <div class="col-sm-10">
                                <select class="form-select my-2 col-sm-8" name="insurance"
                                id="insurance_co">
                                <option value="">OCEANIC PHARMACY BENEFITS</option>
                                </select>
                                </div>
                                </div>
                                <div class="form-group row">
                                <label class="control-label col-sm-2 align-self-center mb-0"
                                for="insurance_no">Insurance Number:</label>
                                <div class="col-sm-10">
                                <input name="insurance_no" id="insurance_no" type="text"
                                class="form-control my-2" id="email1">
                                </div>
                                </div>
                                <div class="mb-2" id="validation">
                                <img src="{{ asset('logos/card.png') }}" class="logo-card"
                                alt="insurance card">
                                <button type="button" class="btn btn-outline-primary ms-4" onclick=""><i
                                class="fa fa-check"></i>Validate Insurance Card</button>
                                
                                </div>
                                </div>
                            --}}
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="horizontalformCheck"
                                        wire:model.live="emergency_service"
                                    />
                                    <label class="custom-control-label" for="horizontalformCheck">
                                        Emergency Visit?
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        {{-- data-bs-dismiss="modal" --}}
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="savePaymentChanges">
                        Change Payment Mode
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Patient Activities modal -->
<div class="modal fade patientActivities" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient Activities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="iq-card-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis
                        mollis, diam nibh finibus leo
                    </p>
                    <form class="form-horizontal" action="/action_page.php">
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="email">
                                Patient Type:
                            </label>
                            <div class="col-sm-10">
                                <select class="form-select my-2 col-sm-8" id="selectcountry">
                                    <option value="OUT">Out-Patient</option>
                                    <option value="INP">In-Patient</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">
                                Discharge Status:
                            </label>
                            <div class="col-sm-10">
                                <select class="form-select my-2 col-sm-8" id="selectcountry">
                                    <option selected="" value="In Use">Still Pending</option>
                                    <option value="Reverse">Reverse Patient Discharge</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Forward To:</label>
                            <div class="col-sm-10">
                                <select class="form-select my-2" id="selectcountry">
                                    <option value="FRONTDESK">Front Desk</option>
                                    <option value="VITALS">Nurses Station</option>
                                    <option value="CONSULT">Consulting Room</option>
                                    <option value="PHARM">Pharmacy</option>
                                    <option value="LAB">Laboratory</option>
                                    <option value="CASHIER">Cashier</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">
                                Discharge Date:
                            </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control my-2" id="pwd1" placeholder="" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
