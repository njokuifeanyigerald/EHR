@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List of Expiring Item</h4>
                    </div>
                    @if (count($expiring_items) > 0)
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a
                                href="{{ route('items.print_expiring_items') }}"
                                class="btn btn-outline-secondary my-2"
                                target="_blank"
                            >
                                <i class="ri-printer-line m-0 icons-sm"></i>
                                Print
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    @include('items.expiring_items_table', ['expiring_items' => $expiring_items])
                </div>
            </div>
        </div>
    </div>
@endsection
