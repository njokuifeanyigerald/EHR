@props([
    'title',
    'id',
    'labels',
    'data',
])
<div wire:ignore class="iq-card">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title fw-bold text-muted">{{ $title }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div id="{{ $id }}" style="height: 300px"></div>
    </div>
</div>

<script>
    //charts
    document.addEventListener('DOMContentLoaded', function () {
        const chart = display_column_chart(
            '{{ $id }}', // The ID of the chart container element
            '', // The title of the chart
            @json($labels), // The labels of the chart
            '', // The subtitle of the chart
            '{{ $title }}', // The title of the chart
            Object.entries(@json($data)), // Converts the data object into an array of entries for the chart
        );
    });
</script>
