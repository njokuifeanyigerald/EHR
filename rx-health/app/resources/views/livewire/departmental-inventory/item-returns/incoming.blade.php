<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>
                        Returns Order for
                        <b>({{ $this->inventory_location->location_name }})</b>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h5>Return Details</h5>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="new-user-info row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="from">From:</label>
                            <label for="from">
                                <b>Pharmacy</b>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <label for="status">
                                <b>{{ Str::title($this->item_return->confirmed_status) }}</b>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="date">Confirmed Date:</label>
                            <label for="date">
                                <b>{{ now()->parse($this->item_return->confirmed_at)->format('jS F, Y') }}</b>
                            </label>
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
                    <h5>Items Approved for Return</h5>
                </div>
                {{-- for open order --}}

                {{-- receive return if received status is pending --}}
                @if ($this->mark_as_received && $this->item_return->confirmed_status == 'pending')
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a wire:click="confirmReturnItemsAsReceived" class="btn btn-primary me-3 my-2">
                            Mark as Received
                        </a>
                    </div>
                @endif

                @if ($this->approve_return && $this->item_return->confirmed_status == 'confirmed')
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a wire:click="approveItemReturn" class="btn btn-primary me-3 my-2">Approve Received Return</a>
                    </div>
                @endif
            </div>
            <div class="iq-card-body">
                {{-- table --}}
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Batch no</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Qty returned</th>
                                <th>Expiry Date</th>
                                @if ($this->mark_as_received && $this->item_return->confirmed_status == 'pending')
                                    <th>
                                        {{-- for open order --}}
                                        {{-- Approve all --}}
                                        <i class="fa fa-check-double cursor-pointer" style="color: #0bb7af"></i>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->item_return->returnDetails ?? [] as $returnDetail)
                                <tr>
                                    <td>
                                        {{ $returnDetail->batch_no }}
                                    </td>
                                    <td>
                                        {{ $returnDetail->item->item_name }}
                                    </td>
                                    <td>
                                        {{ $returnDetail->quantity }}
                                    </td>
                                    <td>
                                        <input
                                            type="text"
                                            min="0"
                                            style="width: 50px"
                                            class="form-control"
                                            disabled=""
                                            value="{{ $returnDetail->quantity }}"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            type="date"
                                            style="width: 150px"
                                            class="form-control"
                                            disabled=""
                                            value="{{ $returnDetail->expiry_date }}"
                                        />
                                    </td>
                                    @if ($this->mark_as_received && $this->item_return->confirmed_status == 'pending')
                                        <td>
                                            {{-- for open order --}}
                                            {{-- Approve all --}}
                                            <i
                                                wire:click="markReturnItemAsReceived({{ $returnDetail->id }})"
                                                class="fa fa-check cursor-pointer"
                                                style="color: #0bb7af"
                                            ></i>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="w-full text-center">No Item Available</div>
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
