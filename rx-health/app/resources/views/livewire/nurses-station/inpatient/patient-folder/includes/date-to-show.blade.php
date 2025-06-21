@props([
    'record',
    'date' => null,
    'time' => null,
])

<div>
    {{
        $date
            ? now()
                ->parse($date)
                ->format('jS M, Y')
            : $record->created_at->format('jS M, Y')
    }}

    @if ((! $date && ! $time) || ($date && $time))
        <span class="badge badge-primary badge-sm">
            {{ $record->created_at->format('h:i A') }}
        </span>
    @endif
</div>
