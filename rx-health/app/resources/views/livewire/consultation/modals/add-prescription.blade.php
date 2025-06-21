<div>
    {{-- Pescription modal --}}
    {{-- @dd($this->visit_number) --}}
    <div wire:ignore.self id="searchDrug_examination" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Pescription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-2">
                    <livewire:re-usable-components.add-prescription
                        :visit_number="$this->visit_number"
                        :billing_code="$this->billing_code"
                        :fromDoctor="true"
                        {{-- :type="'examination_prescription_modal'" --}}
                    />
                </div>
                {{--
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                --}}
            </div>
        </div>
    </div>
</div>
