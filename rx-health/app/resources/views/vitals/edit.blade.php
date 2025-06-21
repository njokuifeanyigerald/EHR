@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Update Patient Vitals</h4>
                    </div>
                    <div>
                        <a href="{{ route('vitals.index') }}" class="btn btn-primary">Vitals List</a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.collect-patient-vitals.vital-edit :id="$id" />
    </div>
@endsection
