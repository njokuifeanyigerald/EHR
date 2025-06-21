@props([
    'prescription',
])

<span class="text-secondary">
    {{ $prescription?->dose . ' ' . $prescription?->dosage_unit . ' ' . $prescription?->frequency . ' for ' . $prescription?->days . ' days ' . $prescription?->route }}
</span>
