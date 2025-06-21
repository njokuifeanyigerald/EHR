<div
    wire:ignore.self
    id="show-prescribedItemDetails-{{ $visitDetail->id }}"
    class="accordion-collapse collapse"
    aria-labelledby="show-prescribedItemDetailsHeading-{{ $visitDetail->id }}"
    data-bs-parent="#accordionFlushExample"
>
    <div class="accordion-body p-3">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Name:</b>
                            <p class="text-primary">
                                {{ $visitDetail->item->item_name }}
                            </p>
                            <b class="text-dark">Dose:</b>
                            <p>{{ $visitDetail->dose }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Freq:</b>
                            <p>{{ $visitDetail->frequency }}</p>
                            <b class="text-dark">Days:</b>
                            <p>{{ $visitDetail->days }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Item Count:</b>
                            <p>{{ $visitDetail->quantity }}</p>
                            <b class="text-dark">Price:</b>
                            <p>{{ $visitDetail->currency->code }}{{ number_format($visitDetail->unit_price, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Payment Mode:</b>
                            <p>
                                {{ Str::headline($visitDetail->payment_type) }}
                            </p>
                            <b class="text-dark">Payment Status:</b>
                            @if ($visitDetail->payment_status === 'pending')
                                <span class="badge badge-success text-white">
                                    {{ $visitDetail->payment_status }}
                                </span>
                            @else
                                <span class="badge badge-info text-white">
                                    {{ $visitDetail->payment_status }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Outsourced:</b>
                            <p>{{ $visitDetail->source === 'external' ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mb-0">
                    <div class="img-extension mt-1">
                        <div class="d-inline-block">
                            <b class="text-dark">Switch From:</b>
                            <p>{{ $visitDetail->switched_from }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($visitDetail->pharmacy_status != 'served')
            <div>
                @if ($visitDetail->source == 'external')
                    <button
                        type="button"
                        data-bs-toggle="modal"
                        data-bs-target="#switch_drug_prescriptions"
                        class="btn mb-3 btn-success rounded-pill"
                        title="Switch"
                        wire:loading.remove
                        wire:click="switchDrug({{ $visitDetail->id }})"
                    >
                        <i class="fa fa-rotate me-0"></i>
                        Switch
                    </button>
                    <button
                        type="button"
                        class="btn mb-3 btn-success rounded-pill"
                        title="Switching"
                        disabled
                        wire:loading
                        wire:target="switchDrug({{ $visitDetail->id }})"
                    >
                        <i class="fa fa-spinner fa-spin me-0"></i>
                        Switching
                    </button>
                @endif

                @if ($visitDetail->source != 'external' && $visitDetail->payment_status != 'paid')
                    <button
                        type="button"
                        class="btn mb-3 btn-warning rounded-pill"
                        title="Out Source"
                        wire:loading.remove
                        wire:click="confirmOutSourceDrug({{ $visitDetail->id }})"
                    >
                        <i class="fa fa-arrow-right-from-bracket me-0"></i>
                        Out Source
                    </button>
                    <button
                        type="button"
                        class="btn mb-3 btn-warning rounded-pill"
                        title="Out Sourcing"
                        disabled
                        wire:loading
                        wire:target="outSourceDrug({{ $visitDetail->id }})"
                    >
                        <i class="fa fa-spinner fa-spin me-0"></i>
                        Out Sourcing
                    </button>
                    <button
                        type="button"
                        class="btn mb-3 btn-danger rounded-pill"
                        wire:click="confirmDeletePrescribedItem({{ $visitDetail->id }})"
                        title="Delete"
                    >
                        <i class="fa fa-trash me-0"></i>
                        Delete
                    </button>
                @endif
            </div>
        @endif
    </div>
</div>
