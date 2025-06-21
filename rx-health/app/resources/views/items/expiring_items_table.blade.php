@props([
    'expiring_items' => [],
])

<div class="table-responsive">
    <table data-classes="table table-hover" data-toggle="table" data-sortable="true" data-buttons-class="light">
        <thead>
            <tr>
                <th scope="col" data-sortable="true" data-field="No">No</th>
                <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                <th scope="col" data-sortable="true" data-field="RX Item Code">RX Item Code</th>
                <th scope="col" data-sortable="true" data-field="Rx Item Name">Rx Item Name</th>
                <th scope="col" data-sortable="true" data-field="Item Category">Item Category</th>
                <th scope="col" data-sortable="true" data-field="Expiry Date">Expiry Date</th>
                {{-- <th scope="col" data-sortable="true" data-field="Action">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($expiring_items as $item)
                <tr>
                    <th scope="row">
                        {{ $loop->iteration }}
                    </th>
                    <td>
                        {{ $item->item_name }}&nbsp;
                        <span class="badge text-dark border border-dark">
                            -{{ $item?->batches?->first()?->batch_no }}
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
                        {{ now()->parse($item?->batches?->first()?->expiry_date)->format('jS F Y') }}
                        <span
                            class="badge {{
                                now()->parse($item?->batches?->first()?->expiry_date) < now()
                                    ? 'badge-danger'
                                    : 'badge-warning'
                            }}"
                        >
                            {{ now()->parse($item?->batches?->first()?->expiry_date)->diffForHumans() }}
                        </span>
                    </td>
                    {{--
                        <td class="text-center">
                        <a href="#" class="text-secondary"><i class="fa fa-dumpster icons-sm"></i></a>
                        </td>
                    --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
