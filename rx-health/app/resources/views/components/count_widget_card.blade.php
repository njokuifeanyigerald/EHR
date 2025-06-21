@props([
    'title',
    'count',
    'icon',
    'color',
    'percentage',
    'view_type',
    'message',
])

<div class="iq-card iq-card-block iq-card-height">
    <div class="iq-card-body px-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="rounded-circle iq-card-icon {{ $color }}">
                <i class="{{ $icon }}"></i>
            </div>
            <div>
                <h3 class="mb-0 fw-bold">
                    <span class="counter">
                        {{ number_format($count, 0, '.', ',') }}
                    </span>
                </h3>
                <h6 class="">{{ $title }}</h6>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            @if ($percentage > 0)
                <img class="w-100" src="{{ asset('images/chart/Graph.svg') }}" alt="Chart" />
            @else
                <img class="w-100" src="{{ asset('images/chart/Graph_low.svg') }}" alt="Chart" />
            @endif
        </div>
        {{-- <div class="col-md-12 mt-2 text-center"> --}}
        <div class="col-md-12 mt-2">
            <span class="{{ $percentage > 0 ? 'text-success' : 'text-danger' }}">
                <i class="{{ $percentage > 0 ? 'ri-arrow-right-up-line' : 'ri-arrow-right-down-line' }} icons-sm"></i>
                {{ abs($percentage) }}%
            </span>
            @php
                use Carbon\Carbon;

                // Define the previous period messages
                $previous_periods = [
                    'today' => 'compared to yesterday',
                    'this_week' => 'compared to last week',
                    'this_month' => 'compared to last month',
                    'this_year' => 'compared to last year',
                ];

                // Handle the "last six months" case dynamically
                if ($view_type == 'last_six_months') {
                    $startOfCurrentSixMonths = Carbon::now()
                        ->startOfMonth()
                        ->subMonths(5);
                    $endOfPreviousSixMonths = $startOfCurrentSixMonths->copy()->subDay();
                    $startOfPreviousSixMonths = $endOfPreviousSixMonths
                        ->copy()
                        ->subMonths(5)
                        ->startOfMonth();

                    $previous_periods['last_six_months'] = 'compared to ' . $startOfPreviousSixMonths->format('F Y') . ' - ' . $endOfPreviousSixMonths->format('F Y');
                }
            @endphp

            {{ $previous_periods[$view_type] ?? '' }}
        </div>
    </div>
</div>
