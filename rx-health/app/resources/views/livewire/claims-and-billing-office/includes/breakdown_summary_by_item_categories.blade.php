<div class="iq-card-body">
    <table class="table table-striped">
        <thead class="table-dark">
            <th>Item Category</th>
            <th class="text-end">Sum Of Claims (GHC)</th>
        </thead>
        <tbody>
            @forelse ($visit_details->pluck('itemCategory')->unique('id') ?? [] as $item_category)
                <tr>
                    <td>{{ Str::headline($item_category->category_name) }}</td>
                    <td class="text-end">
                        {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details->where('item_category_id', $item_category->id)), 2, '.', ',') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">No Record Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
