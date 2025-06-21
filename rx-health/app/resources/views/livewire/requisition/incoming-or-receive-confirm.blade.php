<div>
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        @if ($this->type == "incoming")
                            <h4>
                                {{ $this->requisition->confirmed_status == "pending" ? "Confirm" : "Confirmed" }}
                                Requisition Order Supply
                            </h4>
                        @else
                            <h4>
                                {{ $this->requisition->received_status == "pending" ? "Confirm" : "Confirmed" }}
                                Requisition Order Received
                            </h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Requisition Details</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info row col-12">
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="from">From</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">
                                    {{ Str::title($this->requisition->requestSource->location_name ?? "Not Specified") }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="to">To</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">
                                    {{ Str::title($this->requisition->requestDestination->location_name ?? "Not Specified") }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="Remarks">Remarks</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">
                                    {{ $this->requisition->remark ?? "Not Specified" }}
                                </p>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="to">Status</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">{{ Str::title($this->requisition->status) }}</p>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="to">Ser. Status</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">{{ Str::title($this->requisition->confirmed_status) }}</p>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                            <label class="control-label col-sm-4 align-self-center mb-0" for="to">Rec. Status</label>
                            <div class="col-sm-8">
                                <p class="my-auto ms-2">{{ Str::title($this->requisition->received_status) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Requisition Items Details</h5>
                    </div>
                    {{-- for open order --}}

                    @if ($this->mark_as_supplied && $this->requisition->confirmed_status == "pending")
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a
                                wire:click="markRequisitionAsSupplied"
                                data-bs-toggle="modal"
                                data-bs-target="#add_edit_item"
                                class="btn btn-primary me-3 my-2"
                            >
                                Mark as Supplied
                            </a>
                        </div>
                    @endif

                    @if ($this->mark_as_received && $this->requisition->received_status == "pending")
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a
                                wire:click="markRequisitionAsReceived"
                                data-bs-toggle="modal"
                                data-bs-target="#add_edit_item"
                                class="btn btn-primary me-3 my-2"
                            >
                                Mark as Received
                            </a>
                        </div>
                    @endif
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>N/A</th>
                                    @if ($this->type == "incoming" && $this->requisition->confirmed_status == "pending")
                                        <th>Req. Avail. Qty</th>
                                    @endif

                                    <th>Batch no</th>
                                    <th>Item</th>
                                    <th class="text-center">Pack Size</th>
                                    <th class="text-center">Qty Req.</th>
                                    <th>Qty Sup.</th>
                                    @if ($this->type == "received")
                                        <th class="text-center">Qty Rec.</th>
                                    @endif

                                    <th>Expiry Date</th>
                                    @if ($this->type == "incoming" && $this->requisition->confirmed_status == "pending")
                                        <th class="text-center">
                                            {{-- for open order --}}
                                            {{-- Approve all --}}
                                            <i
                                                wire:click="saveAllRequisitionSuppliedDetail"
                                                class="fa fa-check-double cursor-pointer"
                                                style="color: #0bb7af"
                                            ></i>
                                        </th>
                                    @endif

                                    @if ($this->type == "received" && $this->requisition->received_status == "pending")
                                        <th class="text-center">
                                            {{-- for open order --}}
                                            {{-- Approve all --}}
                                            <i
                                                wire:click="saveAllRequisitionReceivedDetail"
                                                class="fa fa-check-double cursor-pointer"
                                                style="color: #0bb7af"
                                            ></i>
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->requisition->requisitionDetails
                                        ->sortBy(function ($detail) {
                                            return $detail->item_id;
                                        })
                                        ->groupBy("item_id")
                                        ->flatMap(function ($group) {
                                            return $group->sortBy("id");
                                        })
                                    as $requisionDetail)
                                    <tr wire:key="{{ $requisionDetail->id }}">
                                        <td>
                                            <input
                                                wire:model.live="editable_items.{{ $requisionDetail->id }}.not_available"
                                                type="checkbox"
                                                class="form-check-input align-center"
                                                id="checkbox1{{ $requisionDetail->id }}"
                                                name="checkbox1{{ $requisionDetail->id }}"
                                                @if ($this->requisition->confirmed_status != "pending")
                                                    @disabled(true)
                                                @endif
                                            />
                                        </td>

                                        @if ($this->type == "incoming" && $this->requisition->confirmed_status == "pending")
                                            <td>
                                                {{ $this->requesterQuantityAvailable($requisionDetail->item_id) }}
                                            </td>
                                        @endif

                                        <td style="width: 250px !important">
                                            @if ($this->requisition->confirmed_status == "pending")
                                                <select
                                                    wire:key="{{ $requisionDetail->id }}"
                                                    name="batch_no"
                                                    {{-- id="batch_no" --}}
                                                    class="form-control"
                                                    wire:model.live="editable_items.{{ $requisionDetail->id }}.batch_id"
                                                >
                                                    <option>Select Batch</option>
                                                    @forelse ($this->inventory_stocks
                                                            ->where("item_id", $requisionDetail->item_id)
                                                            ->whereNotIn(
                                                                $this->uses_batch_for_stock ? "id" : "batch_id",
                                                                $this->requisition->requisitionDetails
                                                                    ->where("id", "!=", $requisionDetail->id)
                                                                    ->pluck("batch_id")
                                                                    ->toArray()
                                                            )
                                                        as $inventory_stock)
                                                        <option
                                                            wire:key="{{ $inventory_stock->id }}"
                                                            id="batch_no{{ $inventory_stock->id }}"
                                                            value="{{ $this->uses_batch_for_stock ? $inventory_stock->id : $inventory_stock->batch_id }}"
                                                        >
                                                            {{
                                                                $inventory_stock->batch_no .
                                                                    " (Qty: " .
                                                                    // $this->quantityAvailable($this->uses_batch_for_stock ? $inventory_stock->id : $inventory_stock->batch_id)
                                                                    $this->batch_item_quantity[$this->uses_batch_for_stock ? $inventory_stock->id : $inventory_stock->batch_id] .
                                                                    ") (Expire Date: " .
                                                                    now()
                                                                        ->parse($inventory_stock->expiry_date)
                                                                        ->format("jS F Y") .
                                                                    ")"
                                                            }}
                                                        </option>
                                                    @empty
                                                        <option>No Batch</option>
                                                    @endforelse
                                                </select>
                                            @else
                                                {{ $requisionDetail->batch_no ?? "--" }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $requisionDetail->item->item_name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $requisionDetail->pack_size }}
                                        </td>
                                        <td class="text-center">
                                            {{ $requisionDetail->quantity }}
                                        </td>
                                        <td>
                                            @if ($this->requisition->confirmed_status == "pending")
                                                <input
                                                    type="number"
                                                    min="0"
                                                    max="{{ $this->max_supplied[$requisionDetail->id] ?? 0 }}"
                                                    style="width: 80px"
                                                    class="form-control"
                                                    {{-- disabled="" --}}
                                                    wire:model="editable_items.{{ $requisionDetail->id }}.quantity_supplied"
                                                />
                                            @else
                                                {{ $requisionDetail->quantity_supplied }}
                                            @endif
                                        </td>
                                        @if ($this->type == "received")
                                            <td class="text-center">
                                                @if ($this->requisition->received_status == "pending")
                                                    <input
                                                        type="number"
                                                        min="0"
                                                        {{-- max="{{ $this->max_supplied[$requisionDetail->id] ?? 0 }}" --}}
                                                        max="{{ $editable_items[$requisionDetail->id]["quantity_supplied"] }}"
                                                        style="width: 80px"
                                                        class="form-control"
                                                        {{-- disabled="" --}}
                                                        wire:model="editable_items.{{ $requisionDetail->id }}.quantity_received"
                                                    />
                                                @else
                                                    {{ $requisionDetail->quantity_received }}
                                                @endif
                                            </td>
                                        @endif

                                        <td>
                                            @if ($this->requisition->confirmed_status == "pending")
                                                <input
                                                    type="date"
                                                    style="width: 150px"
                                                    class="form-control"
                                                    disabled=""
                                                    wire:model="editable_items.{{ $requisionDetail->id }}.expiry_date"
                                                />
                                            @else
                                                {{ now()->parse($requisionDetail->expiry_date)->format("jS F Y") }}
                                            @endif
                                        </td>
                                        @if ($this->type == "incoming" && $this->requisition->confirmed_status == "pending")
                                            <td>
                                                {{-- for open order --}}
                                                <i
                                                    wire:click="saveRequisitionSuppliedDetail({{ $requisionDetail->id }},'{{ $requisionDetail->item->item_name }}')"
                                                    class="fa fa-check cursor-pointer"
                                                    style="color: #0bb7af"
                                                ></i>
                                                @if ($this->editable_items[$requisionDetail->id]["batch_id"] && $this->editable_items[$requisionDetail->id]["allow_duplicate"])
                                                    &nbsp;&nbsp;
                                                    <a
                                                        wire:click="duplicateRequisitionItem({{ $requisionDetail->id }},'{{ $requisionDetail->item->item_name }}')"
                                                    >
                                                        <i class="fa fa-add cursor-pointer" style="color: #0bb7af"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif

                                        @if ($this->type == "received" &&
                                            $this->requisition->received_status == "pending")
                                            <td>
                                                {{-- for open order --}}
                                                <i
                                                    wire:click="saveRequisitionReceivedDetail({{ $requisionDetail->id }},'{{ $requisionDetail->item->item_name }}')"
                                                    class="fa fa-check cursor-pointer"
                                                    style="color: #0bb7af"
                                                ></i>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="8">
                                            <div class="w-full text-center">No Requisition Items Available</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Errors --}}
    @if ($errors->get("editable_items.*.expiry_date") || $errors->get("editable_items.*.batch_id") || $errors->get("editable_items.*.quantity_supplied") || $errors->get("editable_items.*.quantity_received"))
        {{
            $this->alert(
                "error",
                array_values($errors->get("editable_items.*.expiry_date"))[0][0] ??
                    (array_values($errors->get("editable_items.*.batch_id"))[0][0] ??
                        (array_values($errors->get("editable_items.*.quantity_supplied"))[0][0] ??
                            array_values($errors->get("editable_items.*.quantity_received"))[0][0])),
                [
                    "position" => "center",
                    "toast" => false,
                    "showConfirmButton" => true,
                ],
            )
        }}
    @endif
</div>
