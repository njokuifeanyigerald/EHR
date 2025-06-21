<div
    wire:ignore.self
    id="paymentModal"
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Details</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    wire:click="resetFields"
                ></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    @if ($this->payment_record)
                        <table class="table table-responsive-lg table-responsive-md table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item</th>
                                    <th>Item Amount</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->payment_visit_details as $visit_detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $visit_detail->item?->item_name ?? 'N/A' }}</td>
                                        <td>{{ $visit_detail->unit_price }}</td>
                                        <td>{{ $visit_detail->quantity }}</td>
                                        <td>
                                            <span class="badge rounded-pill bg-success">
                                                {{ $visit_detail->payment_status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No payment record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    @endif
                </div>
                {{-- <div class="alert alert-danger" role="alert">No payment record found</div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="resetFields">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
