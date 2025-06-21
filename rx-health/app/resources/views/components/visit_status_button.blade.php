@props([
    'visit',
])

<button
    type="button"
    class="btn {{ $visit?->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
>
    {{ Str::headline($visit?->status) }}
</button>
