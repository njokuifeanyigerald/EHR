<div>
    <div class="row">
        @if ($show_patient_details)
            <div class="col-lg-2">
                <div class="iq-card">
                    <div class="doc-profile-bg bg-primary rx-profile-bg">
                        <div class="add-img-user">
                            <img
                                class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill"
                                src="{{ $visit->patient->profile_pic != null ? asset('storage/' . $visit->patient->profile_pic) : asset('images/page-img/12.jpg') }}"
                                alt="profile-pic"
                            />
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <div class="img-extension mt-3">
                                <div class="d-inline-block">
                                    <b class="text-dark">Name:</b>
                                    <a href="{{ route('patients.show', $visit->patient?->id ?? 0) }}" title="View">
                                        <p class="text-primary">
                                            {{ $visit->patient?->full_name_title ?? 'N/A' }}
                                        </p>
                                    </a>
                                    <b class="text-dark">Age:</b>
                                    <p>{{ $visit->patient?->age }}</p>
                                    <b class="text-dark">Visit No:</b>
                                    <p>{{ $visit->visit_number }}</p>
                                    <b class="text-dark">Gender:</b>
                                    <p>{{ $visit->patient?->sex ?? 'N/A' }}</p>
                                    <b class="text-dark">Doctor:</b>
                                    <p>{{ $visit->attendingOfficer?->full_name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-{{ $show_patient_details ? '10' : '12' }}">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5 class="card-title">Payments Overview</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Receipt No</th>
                                    <th scope="col">Payment Mode</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visitPayments as $key => $payment)
                                    @php
                                        $payment_amounts = 0;
                                        $payments = \App\Models\PaymentRecord::whereIn(
                                            'id',
                                            explode(',', $payment->ids),
                                        )->get();
                                        $payment_amounts = $payments->sum('payment_amount');
                                    @endphp

                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ date('dS F Y', strtotime($payment->payment_date)) }}</td>
                                        <td>{{ $payment->receipt_number }}</td>
                                        <td>{{ ucfirst($payment->payment_methods) }}</td>
                                        <td>{{ number_format($payment_amounts, 2) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $payment->is_partially_paid ? 'bg-warning' : 'bg-success' }}"
                                            >
                                                {{ $payment->is_partially_paid ? 'Partial' : 'Paid' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a
                                                href="#!"
                                                data-bs-toggle="modal"
                                                data-bs-target="#paymentModal"
                                                wire:click="viewPaymentDetails('{{ $payment->receipt_number }}')"
                                                class="btn btn-outline-primary px-2 py-0"
                                                title="View"
                                            >
                                                <i class="ri-eye-line icons-base"></i>
                                            </a>
                                            <a
                                                href="{{ route('payments.receipt', $payment->receipt_number) }}"
                                                target="_blank"
                                                class="btn btn-outline-dark px-2 py-0"
                                                title="Print Receipt"
                                            >
                                                <i class="ri-printer-fill icons-base"></i>
                                            </a>
                                            <a
                                                href="{{ route('payments.pos_receipt', $payment->receipt_number) }}"
                                                target="_blank"
                                                class="btn btn-outline-danger px-2 py-0"
                                                title="Print POS Receipt"
                                            >
                                                <i class="ri-printer-fill icons-base"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No payment records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
    </div>

    @include('payments.modals.payment_details')
</div>
