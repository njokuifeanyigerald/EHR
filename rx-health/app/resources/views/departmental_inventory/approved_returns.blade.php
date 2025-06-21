@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Approved Returns</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header title -->
        <livewire:departmental-inventory.item-returns.listing :type="'approved'" />
    </div>
@endsection
