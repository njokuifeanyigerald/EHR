@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List of Items With Low Quantity</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a
                            href="{{ route('items.print_individual_low_stock_items') }}"
                            class="btn btn-outline-secondary my-2 me-2"
                            target="_blank"
                        >
                            <i class="ri-printer-line m-0 icons-sm" target="_blank"></i>
                            Print Individual Low Stocks
                        </a>
                        <a
                            href="{{ route('items.print_global_low_stock_items') }}"
                            class="btn btn-outline-secondary my-2"
                            target="_blank"
                        >
                            <i class="ri-printer-line m-0 icons-sm"></i>
                            Print Global Low Stocks
                        </a>
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
                                id="individual_low_stocks-tab"
                                data-bs-toggle="tab"
                                href="#individual_low_stocks"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                            >
                                Individual Low Stocks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="global_low_stocks-tab"
                                data-bs-toggle="tab"
                                href="#global_low_stocks"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                            >
                                Global Low Stocks
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="tab-content" id="pills-tabContent-2">
                {{-- Individual low stocks --}}
                <div
                    class="tab-pane fade show active"
                    id="individual_low_stocks"
                    role="tabpanel"
                    aria-labelledby="individual_low_stocks-tab"
                >
                    <livewire:items-management.low-stock.item-listing :key="'individual'" :type="'individual'" />
                </div>

                {{-- Global low stocks --}}
                <div
                    class="tab-pane fade"
                    id="global_low_stocks"
                    role="tabpanel"
                    aria-labelledby="global_low_stocks-tab"
                >
                    <livewire:items-management.low-stock.item-listing :key="'global'" :type="'global'" />
                </div>
            </div>
        </div>
    </div>
@endsection
