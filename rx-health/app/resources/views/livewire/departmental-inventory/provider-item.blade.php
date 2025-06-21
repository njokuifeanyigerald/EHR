<?php
use App\Helpers\QuantityAvailableHelper;
?>

<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>
                        List Of Provider Items
                        <b>({{ $this->inventory_location->location_name }})</b>
                    </h4>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.item_search_input')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Provider Item Name</th>
                                <th scope="col">Item Code</th>
                                <th scope="col">Item Category</th>
                                {{-- <th scope="col">Price</th> --}}
                                <th scope="col">Qty Available</th>
                                {{--
                                    <th scope="col">Expiry</th>
                                    <th scope="col">Status</th>
                                --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration + $items->firstItem() - 1 }}
                                    </th>
                                    <td scope="row">
                                        {{ $item->item_name }}
                                    </td>
                                    <td>
                                        {{ $item->item_code }}
                                    </td>
                                    <td>
                                        {{ $item->category->category_name }}
                                    </td>
                                    {{-- <td>50.00</td> --}}
                                    <td>
                                        {{ QuantityAvailableHelper::itemQuantityAvailableFromInventoryStockSales($item->inventoryStockSales->first()) }}
                                    </td>
                                    {{--
                                        <td>
                                        <div class="iq-alert-icon" title="Expired">
                                        <i class="ri-alert-line icons-sm text-danger"></i>
                                        </div>
                                        </td>
                                        <td>
                                        <span style="color: green" value="Active">Active</span>
                                        </td>
                                    --}}
                                    <td class="text-center">
                                        <a
                                            {{-- href="{{ route('departmental_inventory.create', $item->id) }}" --}}
                                            class="text-success"
                                            title="Return Item"
                                        >
                                            <i class="fa fa-rotate-left icons-sm"></i>
                                        </a>
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
                </div>

                {{ $items->links() }}
            </div>
        </div>
    </div>
</div>
