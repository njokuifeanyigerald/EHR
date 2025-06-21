<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>
                        List of Expiring Item In:
                        <b>({{ $this->inventory_location->location_name }})</b>
                    </h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a wire:click="generateReturnList" class="btn btn-primary px- py-1">Generate A Return List</a>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.item_search_input')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <input
                                        wire:click="selectAll({{ $items->pluck('id') }})"
                                        type="checkbox"
                                        wire:model.live="selected_all"
                                        class="checkbox-input align-bottom"
                                        id="checkbox"
                                    />
                                </th>
                                <th scope="col">No</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">RX Claim Code</th>
                                <th scope="col">Rx Claim Name</th>
                                <th scope="col">Item Category</th>
                                <th scope="col">Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td class="text-center">
                                        <input
                                            wire:model.live="selected_items.{{ $item->id }}"
                                            type="checkbox"
                                            class="checkbox-input align-bottom"
                                            id="checkbox{{ $item->id }}"
                                        />
                                    </td>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>
                                        {{ $item->item_name }}&nbsp;
                                        <span class="badge text-dark border border-dark">
                                            -{{ $item?->inventoryStocks?->first()?->batch_no }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $item->item_code }}
                                    </td>
                                    <td>
                                        {{ $item->rx_item_name }}
                                    </td>
                                    <td>
                                        {{ $item->category->category_name }}
                                    </td>
                                    <td>
                                        {{ now()->parse($item?->inventoryStocks?->first()?->expiry_date)->format('jS F Y') }}
                                        <span
                                            class="badge {{
                                                now()->parse($item?->inventoryStocks?->first()?->expiry_date) < now()
                                                    ? 'badge-danger'
                                                    : 'badge-warning'
                                            }}"
                                        >
                                            {{ now()->parse($item?->inventoryStocks?->first()?->expiry_date)->diffForHumans() }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="12">No item found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
