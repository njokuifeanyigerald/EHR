@props([
    'title',
    'value',
])

<div class="col-sm-4">
    <span class="text-dark">{{ $title }}</span>
    <br />
    <span class="fw-bold text-dark">
        {{ $value }}
    </span>
</div>
