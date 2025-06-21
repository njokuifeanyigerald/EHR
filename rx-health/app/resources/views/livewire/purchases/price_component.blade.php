@props([
    'total_cost',
    'discount',
    'vat',
    'actual_cost',
])

<div class="d-flex mt-4 justify-content-evenly">
    <span>
        Total Cost:
        <span class="text-dark">{{ number_format($total_cost, 2, '.', ',') }}</span>
    </span>
    {{-- <br /> --}}
    <span>
        Discount:
        <span class="text-dark">{{ number_format($discount, 2, '.', ',') }}</span>
    </span>
    {{-- <br /> --}}
    <span>
        Vat:
        <span class="text-dark">{{ number_format($vat, 2, '.', ',') }}</span>
    </span>
    {{-- <br /> --}}
    <span>
        Actual Cost:
        <span class="text-dark">{{ number_format($actual_cost, 2, '.', ',') }}</span>
    </span>
</div>
