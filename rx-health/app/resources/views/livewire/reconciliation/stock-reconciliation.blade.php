<div>
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Stock Reconciliation for {{ $this->inventory_location?->location_name }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & search -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <div class="form-group">
                                    <button class="btn btn-secondary p-2 mt-1" wire:click="generateStockNumber">
                                        Generate New Stock Number &gt;&gt;
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select class="form-select" wire:model.live="reconciliation_id">
                                    <option value="">Select Stock Number</option>
                                    @forelse ($this->reconciliations as $reconciliation)
                                        <option value="{{ $reconciliation->id }}">
                                            {{ $reconciliation->reconciliation_no . ' - ' . $reconciliation->created_at->format('j F, Y') }}
                                        </option>
                                    @empty
                                        <option value="">No Stock Number Found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Search Item Name</label>
                                <div class="position-relative">
                                    <input
                                        type="search"
                                        class="form-control shadow"
                                        id="exampleInputText1"
                                        wire:model.live.debounce.500ms="search_query"
                                        placeholder="Search Items..."
                                        wire:key="item_search"
                                    />

                                    <x-input-error :messages="$errors->get('item')" class="mt-1" />

                                    <div class="position-absolute z-10 w-100 rounded-xl list-group bg-black">
                                        <div
                                            wire:loading
                                            wire:target="item_search"
                                            class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                        >
                                            <div class="list-item">Searching...</div>
                                        </div>

                                        @if (! empty($this->search_query) && empty($this->item))
                                            <div class="list-group-item" style="display: flex">
                                                <div style="flex: 0 0 80%">Item</div>
                                                <div style="flex: 0 0 20%">Action</div>
                                            </div>
                                            @forelse ($this->items as $i => $item)
                                                <div
                                                    class="list-group-item pe-auto text-wrap text-break"
                                                    style="display: flex"
                                                    {{-- wire:click="saveSelectedItem( {{ $item }} )" --}}
                                                >
                                                    <div class="flex-wrap" style="flex: 0 0 80%">
                                                        {{ $item->item_name }}
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-center align-content-center"
                                                        style="flex: 0 0 20%"
                                                    >
                                                        {{-- <div class="btn btn-sm rounded"> --}}
                                                        <i
                                                            class="fa fa-add text-primary fw-bolder clickable-cursor fa-4 text-bolder"
                                                            wire:click="saveSelectedItem( {{ $item->id }} )"
                                                        ></i>
                                                        {{-- </div> --}}
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="list-group-item active text-center">No result</div>
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--
                                <div class="form-group">
                                <label>Search Item Name</label>
                                <input
                                type="search"
                                class="form-control"
                                placeholder="Search Drug"
                                name="item_name"
                                id="item_name"
                                autofocus=""
                                autocomplete=""
                                />
                                <small class="text-muted"></small>
                                
                                <input type="hidden" id="item_id" value="" />
                                </div>
                            --}}
                        </div>
                        {{--
                            <div class="col-lg-3">
                            <div class="form-group">
                            <label>System Batch</label>
                            <select class="form-select" wire:model.live.debounce.500ms="batch">
                            <option value="">Select Batch</option>
                            @forelse ($this->item->batches ?? [] as $batch)
                            <option value="{{ $batch->id }}">
                            {{ $batch->batch_no .' - ' . now()->parse($batch->expiry_date)->format('j F, Y') }}
                            </option>
                            @empty
                            <option value="">No Batch Found</option>
                            @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('batch')" class="mt-1" />
                            </div>
                            </div>
                        --}}
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>System Quantity</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="system_qty"
                                    wire:model="system_quantity"
                                    readonly=""
                                    disabled=""
                                />
                                <x-input-error :messages="$errors->get('system_quantity')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Physical Quantity</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="physical_qty"
                                    wire:model.live.debounce.500ms="physical_quantity"
                                />
                                <x-input-error :messages="$errors->get('physical_quantity')" class="mt-1" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Variance</label>
                                <input
                                    type="number"
                                    name="variance"
                                    class="form-control"
                                    wire:model="variance"
                                    readonly=""
                                    disabled=""
                                />
                                <x-input-error :messages="$errors->get('variance')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        @if ($this->reconciliation?->status == 'pending')
                            <button wire:click="addProductToReconciliation" class="btn btn-primary me-2">
                                <i class="fa fa-plus"></i>
                                Add product
                            </button>
                            <button wire:click="adjustAllStockInReconciliation" class="btn btn-warning">
                                Adjust All Stock
                            </button>
                        @else
                            @if ($this->reconciliation)
                                <span class="badge badge-success">Adjusted By</span>
                                &nbsp;
                                {{ $this->reconciliation?->adjustedBy?->fullName() ?? 'N/A' }}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="Id">#</th>
                                    <th scope="col" data-field="Created At">Created At</th>
                                    <th scope="col" data-field="Item">Item</th>
                                    {{-- <th scope="col" data-field="Batch No">Batch No</th> --}}
                                    <th scope="col" data-field="System Qty">System Qty</th>
                                    <th scope="col" data-field="Physical Qty">Physical Qty</th>
                                    <th scope="col" data-field="Variance">Variance</th>
                                    <th scope="col" data-field="Stock Number">Stock No</th>
                                    <th scope="col" data-field="Status">Status</th>
                                    <th scope="col" data-field="Adjusted By">Added By</th>
                                    <th scope="col" data-field="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reconciliationDetails ?? [] as $reconciliationDetail)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $reconciliationDetail->created_at->format('j F, Y h:i A') }}</td>
                                        <td>
                                            {{ $reconciliationDetail->item->item_name }}
                                        </td>
                                        {{--
                                            <td>
                                            {{ $reconciliationDetail->batch_no }}
                                            </td>
                                        --}}
                                        <td>
                                            {{ $reconciliationDetail->system_quantity }}
                                        </td>
                                        <td>
                                            {{ $reconciliationDetail->physical_quantity }}
                                        </td>
                                        <td>
                                            {{ $reconciliationDetail->variance }}
                                        </td>
                                        <td>
                                            {{ $this->reconciliation->reconciliation_no }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $this->reconciliation->status == 'pending' ? 'warning' : 'success' }}"
                                            >
                                                {{ Str::title($this->reconciliation->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $reconciliationDetail->addedBy->fullName() ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if ($this->reconciliation->status == 'pending')
                                                <button
                                                    wire:click="removeProductFromReconciliation({{ $reconciliationDetail->id }})"
                                                    class="btn btn-sm btn-danger"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="11">
                                            <div class="w-full text-center">No Record Found</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $reconciliationDetails?->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
