<?php
use App\Helpers\QuantityAvailableHelper;
?>

<div>
    <!-- <div class="col-md-12 col-lg-12"> -->

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="">
                <!-- Search -->
                <p>Search for a provider item</p>
                <div class="row">
                    <form class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 d-flex gap-3">
                            <!-- Check boxes for begin with contains or ends with -->
                            <div class="col-3">
                                <label for="{{ $this->type }}search_type">Search Type</label>
                                <select
                                    class="form-select"
                                    name="{{ $this->type }}search_type"
                                    wire:model.live="search_type"
                                >
                                    <option value="begins_with">Begins With</option>
                                    <option value="contains">Contains</option>
                                    <option value="ends_with">Ends With</option>
                                </select>
                            </div>
                            <div class="col-9">
                                <label for="{{ $this->type }}search_query">Search for</label>
                                <div class="input-icon input-icon-right">
                                    <input
                                        type="search"
                                        class="form-control"
                                        autofocus
                                        wire:model.live.debounce.700ms="search_query"
                                        placeholder="Search for Provider Item"
                                        name="{{ $this->type }}search_query"
                                    />

                                    <span class="input-icon-addon clickable-cursor">
                                        <i class="fa fa-search"></i>
                                    </span>

                                    <!-- <input type="hidden" name="visit_number" id="visit_number" value="0"> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->

    <div class="iq-card">
        <div class="iq-card-body">
            @if ($this->type == 'global')
                <div class="col-md-12">
                    <button wire:click="makePurchaseOrder" class="btn btn-primary">Make Purchase Order</button>
                </div>
            @endif

            <div wire:ignore.self class="table-responsive mt-3">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            @if ($this->type == 'global')
                                <th scope="col" data-sortable="true" class="">
                                    <input
                                        wire:click="selectAll({{ $hospital_items->pluck('item_id') }})"
                                        type="checkbox"
                                        wire:model.live="selected_all"
                                        class="checkbox-input align-bottom"
                                        id="checkbox"
                                    />
                                </th>
                            @endif

                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                            <th scope="col" data-sortable="true" data-field="Rx Item Code">Rx Item Code</th>
                            <th scope="col" data-sortable="true" data-field="Rx Item Name">Rx Item Name</th>
                            <th scope="col" data-sortable="true" data-field="Category">Category</th>
                            <th scope="col" data-sortable="true" data-field="Remaining Qty">Remaining Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hospital_items as $hospital_item)
                            <tr>
                                @if ($this->type == 'global')
                                    <td>
                                        <input
                                            wire:model.live="selected_items.{{ $hospital_item->item->id }}"
                                            type="checkbox"
                                            class="checkbox-input align-bottom"
                                            id="checkbox1{{ $hospital_item->item->id }}"
                                        />
                                    </td>
                                @endif

                                <td>{{ Str::headline($hospital_item->item->item_name) }}</td>
                                <td>{{ $hospital_item->item->item_code }}</td>
                                <td>{{ Str::headline($hospital_item->item->rx_item_name) }}</td>
                                <td>{{ Str::headline($hospital_item->item->category->category_name) }}</td>
                                <td>
                                    {{
                                        QuantityAvailableHelper::itemQuantityAvailable(
                                            $hospital_item->batches_sum_qty,
                                            $hospital_item->batches_sum_qty_requisitioned,
                                            $hospital_item->batches_sum_qty_returned,
                                        )
                                    }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">
                                    <div class="w-full text-center">No Record Found</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- {{ $hospital_items->links(data: ['click' => '#individual_low_stocks']) }} --}}
                {{ $hospital_items->links() }}
            </div>
        </div>
    </div>
</div>
