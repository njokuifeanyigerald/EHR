<div>
    <div class="iq-card shadow-lg">
        <div class="iq-card-body">
            @include('livewire.re-usable-components.patient.visit_details_table', ['visit_details' => $visit_details, 'from_billing_office' => false, 'visit' => $this->visit])

            @if ($this->visit)
                {{ $visit_details == [] ? '' : $visit_details->links() }}
            @endif
        </div>
    </div>
</div>
