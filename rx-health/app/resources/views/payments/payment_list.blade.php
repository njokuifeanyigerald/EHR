@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List of Payments</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('payments.index') }}" class="btn btn-primary">Receipt list</a>
                    </div>
                </div>
            </div>
        </div>

        @livewire('payments.list-payment')
    </div>
@endsection
