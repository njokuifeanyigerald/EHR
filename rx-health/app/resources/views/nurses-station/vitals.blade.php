@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">New Patient Vital Records</h4>
                    </div>
                    <div>
                        <a href="{{ route('nurses-station.list', ['type' => 'vitals']) }}" class="btn btn-primary">
                            Vitals Records List
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.patient-records.visit-list :type="'vitals'" />
    </div>
@endsection
