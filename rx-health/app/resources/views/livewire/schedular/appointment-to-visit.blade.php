{{--
    <a href="{{ route('visits.create', $appointment->patient_id) }}" title="Create Visit">
    <i class="ri-add-line text-success icons-base me-2"></i>
    </a>
--}}
<a wire:click="convertToVisit" href="#" title="Create Visit">
    <i wire:target="convertToVisit" wire:loading.remove class="ri-add-line text-success icons-base me-2"></i>
    <i wire:target="convertToVisit" wire:loading class="fa fa-spinner fa-spin"></i>
</a>
