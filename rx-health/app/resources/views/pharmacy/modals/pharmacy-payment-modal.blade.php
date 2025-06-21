{{-- pharmacy-payment-modal --}}
<div wire:ignore.self id="pharmacy-payment-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Checkout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                {{-- <div style="height: 500px; overflow-y: scroll"> --}}
                <div style="height: auto; overflow-y: scroll">
                    <div class="mt-2">
                        <div class="col-lg-12">
                            @include('payments.includes.cashier-payment')
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
