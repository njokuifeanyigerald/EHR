@props([
    'total_count',
    'id',
    'title',
    'subtitle',
    'data',
])

<div wire:ignore class="iq-card iq-card-block iq-card-height">
    <div class="iq-card-body p-2">
        <div id="{{ $id }}" style="height: 200px"></div>
    </div>
</div>

<script>
    // //charts

    // Add an event listener for the DOMContentLoaded event to ensure the DOM is fully loaded before executing the script
    document.addEventListener('DOMContentLoaded', function () {
        // Create the donut chart using the display_donut_chart function
        const chart = display_donut_chart(
            '{{ $id }}', // The ID of the chart container element
            '{{ $title }}', // The title of the chart
            getSubtitle(@json($total_count), '{{ $subtitle }}'), // The subtitle dynamically generated using the total count and subtitle
            '{{ $subtitle }}', // The subtitle of the chart
            Object.entries(@json($data)), // Converts the data object into an array of entries for the chart
        );

        // Listen for the 'refreshDashboard' event triggered by Livewire
        Livewire.on('refreshDashboard', (data) => {
            // Check if the data received corresponds to the current chart's ID
            if (data[0]['id'] === '{{ $id }}') {
                // Update the chart's series data with new data values
                chart.series[0].setData(Object.entries(data[0]['data']));
                // Update the chart's subtitle with the new total count
                chart.setTitle(null, { text: getSubtitle(data[0]['total_count'], '{{ $subtitle }}') });
                // Redraw the chart to reflect the changes
                chart.redraw();
            }
        });
    });
</script>
