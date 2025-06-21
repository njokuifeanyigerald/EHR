@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Patient Vital Record</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('vitals.index') }}" class="btn btn-primary">Vitals list</a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.patient-records.visit-list :type="'vital'" />
    </div>
@endsection
