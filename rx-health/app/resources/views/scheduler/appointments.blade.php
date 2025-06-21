@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Appointments</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('scheduler.index') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>
                            New Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:schedular.appointments />
    </div>
@endsection
