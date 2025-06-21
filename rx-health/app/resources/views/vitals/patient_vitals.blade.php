@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Patient Vitals</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('vitals.index') }}" class="btn btn-primary">Vitals Collection</a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.collect-patient-vitals.patient.vital-records :patient="$patient" />
    </div>
@endsection
