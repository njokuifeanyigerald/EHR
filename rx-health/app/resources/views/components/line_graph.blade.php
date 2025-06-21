@props([
    'id',
    'title',
    'labels',
    'data',
])
<div wire:ignore class="iq-card iq-card-block iq-card-height">
    <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
            <h4 class="card-title fw-bold text-muted">{{ $title }}</h4>
        </div>
    </div>
    <div class="iq-card-body">
        <div id="{{ $id }}" style="height: 350px"></div>
    </div>
</div>

<script>
    //charts
    document.addEventListener('DOMContentLoaded', function () {
        //registered patients data
        showLineChart{{ $id }}();
    });

    function showLineChart{{ $id }}() {
        display_spline_chart('{{ $id }}', @json($labels), @json($data));
    }

    document.addEventListener('refreshDashboard', function () {
        showLineChart{{ $id }}();
    });
</script>
