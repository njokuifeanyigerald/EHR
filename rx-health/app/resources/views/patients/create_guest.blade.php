@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Register New Guest</h4>
                    </div>
                    <div>
                        <a href="{{ route('patients.index') }}" class="btn btn-primary">Go To Patient List</a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:front-desk.register-guest />
    </div>
@endsection
