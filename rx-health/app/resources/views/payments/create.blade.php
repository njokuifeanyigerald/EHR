@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title me-1">
                        <h4 class="card-title">Payments Overview</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('payments.index') }}" class="btn btn-primary me-3 my-2">Receipt list</a>
                        {{-- @livewire('re-usable-components.visit-session-location-change', ['visit' => $visit]) --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="charges-tab"
                                data-bs-toggle="tab"
                                href="#charges"
                                role="tab"
                                aria-controls="pills-charges"
                                aria-selected="true"
                            >
                                Charges
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="PaymentHistory-tab"
                                data-bs-toggle="tab"
                                href="#PaymentHistory"
                                role="tab"
                                aria-controls="pills-PaymentHistory"
                                aria-selected="false"
                            >
                                Payment History
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            {{-- Charges --}}
            <div class="col-lg-12 tab-pane fade show active" id="charges" role="tabpanel" aria-labelledby="charges-tab">
                @livewire('payments.payment-charges', ['visit' => $visit, 'over_payment_allowed' => $over_payment_allowed])
            </div>
            {{-- Payment history --}}
            <div class="tab-pane fade" id="PaymentHistory" role="tabpanel" aria-labelledby="PaymentHistory-tab">
                @livewire('payments.payment-history', ['visit' => $visit, 'over_payment_allowed' => $over_payment_allowed])
            </div>
        </div>
    </div>
@endsection
