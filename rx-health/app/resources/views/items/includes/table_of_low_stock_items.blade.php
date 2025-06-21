<?php
use App\Helpers\QuantityAvailableHelper;
?>

<table class="table table-borderless">
    <thead class="table-secondary">
        <tr>
            <th scope="col" data-sortable="true" data-field="No">No</th>
            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
            <th scope="col" data-sortable="true" data-field="Rx Item Code">Rx Item Code</th>
            <th scope="col" data-sortable="true" data-field="Rx Item Name">Rx Item Name</th>
            <th scope="col" data-sortable="true" data-field="Category">Category</th>
            <th scope="col" data-sortable="true" data-field="Avail. Qty" class="text-center">Avail. Qty</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->rx_item_name }}</td>
                <td>{{ $item->category->category_name }}</td>
                <td class="text-center">
                    {{
                        QuantityAvailableHelper::itemQuantityAvailable(
                            $item->batches_sum_qty,
                            $item->batches_sum_qty_requisitioned,
                            $item->batches_sum_qty_returned,
                        )
                    }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
