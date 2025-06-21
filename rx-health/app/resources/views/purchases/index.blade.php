@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List of PO- Draft</h4>
                    </div>
                    {{-- @if ($this->type == 'index') --}}
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#add_po">
                            <i class="fa fa-plus"></i>
                            Add New Purchase Order
                        </button>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>

        <livewire:purchases.purchase-orders type="index" />
    </div>
    {{-- @include('purchases.modals.add_po') --}}
    {{-- @include('purchases.modals.edit_po') --}}
    {{-- @include('purchases.modals.view_po') --}}
@endsection
