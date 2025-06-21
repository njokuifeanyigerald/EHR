@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Scheduler</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('scheduler.appointments') }}" class="btn btn-primary">
                            <i class="ri-list-unordered me-2"></i>
                            View Appointments
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:schedular.duty-roster />
    </div>
    <!-- Custom fullcalendar js code -->
    {{-- <script src="{{ asset('js/custom/custom-calendar.js') }}"></script> --}}
@endsection
