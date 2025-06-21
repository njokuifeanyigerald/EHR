@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List of Incoming Returns</h4>
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
                                id="PendingConfirmation-tab"
                                data-bs-toggle="tab"
                                href="#PendingConfirmation"
                                role="tab"
                                aria-controls="pills-PendingConfirmation"
                                aria-selected="true"
                            >
                                Pending Confirmation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="Confirmed-tab"
                                data-bs-toggle="tab"
                                href="#Confirmed"
                                role="tab"
                                aria-controls="pills-Confirmed"
                                aria-selected="false"
                            >
                                Confirmed
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="tab-content" id="pills-tabContent-2">
                {{-- Pending Confirmation --}}
                <div
                    class="tab-pane fade show active"
                    id="PendingConfirmation"
                    role="tabpanel"
                    aria-labelledby="PendingConfirmation-tab"
                >
                    <livewire:departmental-inventory.item-returns.listing :type="'pending_incoming'" />
                </div>

                {{-- Confirmed --}}
                <div class="tab-pane fade" id="Confirmed" role="tabpanel" aria-labelledby="Confirmed-tab">
                    <livewire:departmental-inventory.item-returns.listing :type="'confirmed_incoming'" />
                </div>
            </div>
        </div>
    </div>
@endsection
