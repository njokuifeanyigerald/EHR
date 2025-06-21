<div>
    <!-- Search -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Search for a patient using folder number,telephone,visit number,visit date.</p>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    placeholder="Enter Folder Number/Tel/Vist Number"
                                    wire:model.live="search"
                                    name="search"
                                    autofocus
                                />
                                <span><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Visit Date</th>
                                <th scope="col">Patient</th>
                                <th scope="col">Visit Number</th>
                                <th scope="col">Visit Type</th>
                                <th scope="col">Waiting Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ date('dS F Y', strtotime($payment->visit_date)) }}</td>
                                    <td>{{ $payment->patient->full_name_title }}</td>
                                    <td>{{ $payment->visit_number }}</td>
                                    <td>
                                        @if ($payment->serviceType?->code == 'INP')
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                                            </span>
                                            <span class="font-weight-bold text-warning">
                                                {{ $payment->serviceType?->name ?? 'N/A' }}
                                            </span>
                                        @else
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                            </span>
                                            <span class="font-weight-bold text-primary">
                                                {{ $payment->serviceType?->name ?? 'N/A' }}
                                            </span>
                                        @endif

                                        @if ($payment->emergency_service)
                                            <i
                                                class="ri-alert-fill text-danger"
                                                data-bs-toggle="tooltip"
                                                aria-label="Emergency Service"
                                                data-bs-original-title="Emergency Service"
                                            ></i>
                                        @endif
                                    </td>
                                    <td>
                                        <x-patient-waiting :visit="$payment" :current_location="'cashier'" />
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn iq-bg-{{ $payment->status == 'done' ? 'success' : 'warning' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($payment->status) }}
                                        </button>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('payments.create', $payment->visit_number) }}"
                                            title="New Payment"
                                            class="btn btn-outline-primary rounded-pill"
                                        >
                                            <i class="fa fa-plus"></i>
                                            New Payment
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No payments found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
