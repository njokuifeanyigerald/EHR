@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List of Approved Purchase Orders</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:purchases.purchase-orders type="approved" />
    </div>
    {{-- @include('purchases.modals.view_po') --}}
@endsection
