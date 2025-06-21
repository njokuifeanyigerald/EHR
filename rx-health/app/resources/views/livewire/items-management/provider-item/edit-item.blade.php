<div>
    <div wire:key="edit_items_based_on_details">
        <div class="row">
            <!-- Header title -->
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4>Edit Item - {{ Str::headline($item_name) }}</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <button
                                {{-- href="#" --}}
                                data-bs-toggle="modal"
                                data-bs-target="#price_settings"
                                {{-- wire:click="dispatch('viewPriceSetterModal')" --}}
                                class="btn btn-outline-success my-2 me-2"
                            >
                                Set Price
                            </button>
                            <button
                                {{-- href="#" --}}
                                data-bs-toggle="modal"
                                data-bs-target="#stock_alert"
                                class="btn btn-outline-warning my-2 me-2"
                            >
                                Stock Alert
                            </button>
                            <a
                                href="{{ route('items.edit', $item->id) }}"
                                {{-- data-bs-toggle="modal" --}}
                                {{-- data-bs-target="#stock_alert" --}}
                                class="btn bg-success my-2 me-2"
                                {{-- wire:click="getItemRelations({{ $item->id }})" --}}
                            >
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Item --}}
            <div wire:key="edit_item_section" class="col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between bg-light">
                        <div class="iq-header-title">
                            <h4>{{ Str::headline($item_name) }}</h4>
                        </div>
                    </div>
                    <div wire:key="edit_item" wire:ignore.self class="iq-card-body">
                        <form wire:submit="updateItemDetails">
                            <div class="row mt-3">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Item Code</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input
                                                type="text"
                                                wire:model="item_code"
                                                class="form-control"
                                                name="item_code"
                                                readonly=""
                                            />
                                            <x-input-error :messages="$errors->get('item_code')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Item Name</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input
                                                type="text"
                                                wire:model="item_name"
                                                class="form-control"
                                                name="item_name"
                                                readonly=""
                                            />
                                            <x-input-error :messages="$errors->get('item_name')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Stocking Unit</label>
                                        <div class="col-md-9 col-sm-12">
                                            <select
                                                class="form-select"
                                                name="unit_of_measurement"
                                                id="unit_of_measurement"
                                                wire:model="item_stocking_unit"
                                            >
                                                @forelse ($this->dosage_forms ?? [] as $unit)
                                                    <option
                                                        wire:key="dosage_form_{{ $unit->id }}"
                                                        value="{{ $unit->dosage_form }}"
                                                    >
                                                        {{ Str::upper($unit->dosage_form) }}
                                                    </option>
                                                @empty
                                                    <option selected="" disabled>No Units Available</option>
                                                @endforelse
                                            </select>
                                            <x-input-error
                                                :messages="$errors->get('item_stocking_unit')"
                                                class="mt-1"
                                            />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Opening Stock</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="opening_stock"
                                                wire:model="item_opening_stock"
                                                id="opening_stock"
                                                value="0"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('item_opening_stock')"
                                                class="mt-1"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Item Category</label>
                                        <div class="col-md-9 col-sm-12">
                                            <select
                                                class="form-select"
                                                wire:model="item_category_id"
                                                name="item_category_id"
                                                id="item_category_id"
                                            >
                                                @forelse ($this->categories ?? [] as $category)
                                                    <option
                                                        wire:key="category_{{ $category->id }}"
                                                        value="{{ $category->id }}"
                                                    >
                                                        {{ Str::headline($category->category_name) }}
                                                    </option>
                                                @empty
                                                    <option selected="" disabled>No Categories Available</option>
                                                @endforelse
                                            </select>
                                            <x-input-error :messages="$errors->get('item_category_id')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Generic Name</label>
                                        <div wire:ignore class="col-md-9 col-sm-12">
                                            <select
                                                wire:model="item_generic_name"
                                                class="form-control select2"
                                                name="generic_names"
                                                id="generic_names"
                                            >
                                                @forelse ($this->generic_names ?? [] as $genericName)
                                                    <option
                                                        wire:key="generic_name_{{ $genericName->id }}"
                                                        value="{{ $genericName->generic_name }}"
                                                    >
                                                        {{ $genericName->generic_name }}
                                                    </option>
                                                @empty
                                                    <option selected="" disabled>No Generic Names Available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('item_generic_name')" class="mt-1" />
                                    </div>

                                    <div class="form-group row" style="">
                                        <label class="col-md-3 col-sm-12 col-form-label">Item cost</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input
                                                type="number"
                                                class="form-control"
                                                name="cost_price"
                                                wire:model="item_cost"
                                            />
                                            <x-input-error :messages="$errors->get('item_cost')" class="mt-1" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Status</label>
                                        <div class="col-md-9 col-sm-12">
                                            <select
                                                class="form-select"
                                                name="status"
                                                id="status"
                                                wire:model="item_status"
                                            >
                                                <option value="active" selected>Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('item_status')" class="mt-1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mt-2">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Item Batches --}}
            <div class="col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between bg-light">
                        <div class="iq-header-title">
                            <h4>Item Batches</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Batch No</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                        <th>Quantity Sold</th>
                                        <th>Expiry Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->item->batches as $itemBatch)
                                        <tr wire:key="{{ $itemBatch->id }}">
                                            <td>{{ $itemBatch->batch_no }}</td>
                                            <td>{{ $itemBatch->selling_price }}</td>
                                            <td>{{ $itemBatch->qty }}</td>
                                            <td>{{ $itemBatch->qty_requisitioned }}</td>
                                            <td>{{ $itemBatch->expiry_date }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-dark">
                                                    <i class="ri-pencil-line m-0 icons-sm"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12">
                                                <div class="w-full text-center">No Batches Available</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Price history --}}
            <div class="col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between bg-light">
                        <div class="iq-header-title">
                            <h4>Price History</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Batch Number</th>
                                        <th>Billing Type</th>
                                        <th>Company</th>
                                        <th>Old Price</th>
                                        <th>Price</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                        <th>Adjusted By</th>
                                        <th>Creation Date</th>
                                        {{-- <th>Action</th> --}}
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($this->item->itemPrices as $itemPrice)
                                        <tr wire:key="{{ $itemPrice->id }}" class="test_row_734">
                                            <td>
                                                {{ $itemPrice->batch->batch_no ?? 'No Batch Specified' }}
                                            </td>
                                            <td style="width: 150px">
                                                {{--
                                                    <select class="form-select" name="billing_code" id="billing_code_734">
                                                    <option value="" disabled="" selected="" hidden="">
                                                    Please Select Billing type
                                                    </option>
                                                    <option selected="" value="CASH">Cash Clients</option>
                                                    <option value="CREDIT">Credit/Coorporate Client</option>
                                                    <option value="INS">Insurance Client</option>
                                                    </select>
                                                --}}
                                                {{ Str::Headline($itemPrice->billingCode->name) }}
                                            </td>
                                            <td style="width: 150px">
                                                {{--
                                                    <select class="form-select" name="company" id="company_734">
                                                    <option value="">CASH</option>
                                                    <option value="1">ELECTRICITY COMPANY OF GHANA</option>
                                                    <option value="2">OCEANIC INSURANCE</option>
                                                    </select>
                                                --}}
                                                {{ Str::title($itemPrice->companyR->name ?? '--') }}
                                            </td>
                                            <td>
                                                {{ number_format($itemPrice->old_price, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                {{--
                                                    <input
                                                    type="number"
                                                    class="form-control"
                                                    min="0"
                                                    id="item_price_734"
                                                    name="item_price"
                                                    value="1000.00"
                                                    style="width: 80px"
                                                    />
                                                --}}
                                                {{ number_format($itemPrice->unit_price, 2, '.', ',') }}
                                            </td>
                                            <td>
                                                {{--
                                                    <select
                                                    class="form-select"
                                                    name="currency"
                                                    id="currency_734"
                                                    style="width: 80px"
                                                    >
                                                    <option value="" disabled="" selected="" hidden="">
                                                    Please Select Currency
                                                    </option>
                                                    <option value=" GHS">GHS</option>
                                                    <option selected="" value=" NGN">NGN</option>
                                                    </select>
                                                --}}
                                                {{ $itemPrice->currencyR->code }}
                                            </td>
                                            <td>
                                                <livewire:items-management.provider-item.edit.price-status
                                                    :itemPrice="$itemPrice"
                                                />
                                            </td>
                                            <td>
                                                {{ $itemPrice->user->fullName() ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $itemPrice->created_at->format('jS F, Y') }}
                                            </td>
                                            {{--
                                                <td style="width: 130px">
                                                
                                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                                Save changes
                                                </button>
                                                
                                                </td>
                                            --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12">
                                                <div class="w-full text-center">No Price History Available</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                {{-- <input type="hidden" name="total_entry" id="total_entry" value="1" /> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modals --}}

        <livewire:items-management.provider-item.modals.set-price
            :drugs_category_id="$this->drug_category_id"
            :item="$this->item"
        />

        <livewire:items-management.provider-item.modals.stock-alert :item="$this->item" />

        @script
            <script>
                $('#generic_names').select2({
                    width: '100%',
                });

                $('#generic_names').val('{{ $this->item_generic_name }}').trigger('change');

                $('#generic_names').on('change', function (e) {
                    var data = $('#generic_names').select2('val');
                    @this.set('item_generic_name', data);
                });
            </script>
        @endscript
    </div>
</div>
{{--
    @script
    <script>
    $('#generic_names').select2({
    placeholder: 'Search Investigation',
    minimumInputLength: 2,
    minimumResultsForSearch: 20,
    width: '100%',
    serverSide: true,
    ajax: {
    url: '{{ route('select2search.generic_names') }}',
    type: 'GET',
    dataType: 'json',
    delay: 250,
    cache: true,
    theme: 'bootstrap4',
    },
    });
    
    $('#generic_names').on('change', function (e) {
    var data = $('#generic_names').select2('val');
    // @this.set('ge', data);
    // @this.addInvestigation(data);
    });
    </script>
    @endscript
--}}
