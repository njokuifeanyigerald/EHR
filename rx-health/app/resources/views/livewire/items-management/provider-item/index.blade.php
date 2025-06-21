<?php
use App\Helpers\QuantityAvailableHelper;
use App\Helpers\SettingsHelper;
?>

<div class="row">
    <!-- Header title -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>List Of Provider Item</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_item" class="btn btn-primary my-2 me-2">
                        <i class="fa fa-plus"></i>
                        Add New Item
                    </a>
                    <a
                        href="#"
                        data-bs-toggle="modal"
                        data-bs-target="#price_adjustment"
                        class="btn btn-success my-2 me-2"
                    >
                        <i class="fa fa-cedi-sign"></i>
                        Price Adjustment
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.item_search_input')

    <div>
        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div wire:ignore.self class="table-responsive">
                        <table class="table table-striped table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Provider Item Name</th>
                                    <th scope="col">Item Code</th>
                                    <th scope="col">Item Category</th>
                                    {{-- <th scope="col">Billing Code</th> --}}
                                    <th scope="col">Expiry</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr wire:key="item-{{ $item->id }}">
                                        <td>
                                            {{ $loop->iteration + $items->firstItem() - 1 }}
                                        </td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->item_code }}</td>
                                        <td>{{ $this->categories->find($item->item_category_id)->category_name }}</td>
                                        {{-- <td>{{ $item->itemCategory->category_name }}</td> --}}
                                        {{-- <td>{{ $item->billing_code }}</td> --}}
                                        <td>
                                            @if ($item->batches->first()?->expiry_date)
                                                {{ now()->parse($item->batches->first()->expiry_date)->format('jS F Y') }}
                                                <span
                                                    class="badge {{
                                                        now()->parse($item->batches->first()->expiry_date) < now()
                                                            ? 'badge-danger'
                                                            : (SettingsHelper::daysToExpiration() >
                                                            now()
                                                                ->parse($item->batches->first()->expiry_date)
                                                                ->diffInDays()
                                                                ? 'badge-warning'
                                                                : 'badge-success')
                                                    }}"
                                                >
                                                    {{ now()->parse($item->batches->first()->expiry_date)->diffForHumans() }}
                                                </span>
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            {{
                                                QuantityAvailableHelper::itemQuantityAvailable(
                                                    $item->batches_sum_qty,
                                                    $item->batches_sum_qty_requisitioned,
                                                    $item->batches_sum_qty_returned,
                                                )
                                            }}
                                        </td>
                                        <td>
                                            <livewire:items-management.provider-item.item-status-update
                                                :key="$item->id"
                                                :item="$item"
                                            />
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('items.edit', $item->id) }}"
                                                class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                title="View or Edit"
                                            >
                                                <i class="ri-eye-line m-0 icons-sm"></i>
                                                View/Edit
                                            </a>
                                            <a
                                                href="{{ route('items.print_barcode', $item->id) }}"
                                                class="btn btn-outline-secondary px-1 py-0 me-1"
                                                title="Print Barcode"
                                            >
                                                <i class="ri-printer-line m-0 icons-sm"></i>
                                                Print Barcode
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No Item Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Item Modal --}}
    <livewire:items-management.provider-item.modals.add-item :categories="$this->categories" />

    {{-- Price Adjustment Modal --}}
    <livewire:items-management.provider-item.modals.price-adjustment :categories="$this->categories" />
</div>
