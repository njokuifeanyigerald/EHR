@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List Of Inpatients In Ward</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.inpatient.wardlist :type="'in-ward'" />
    </div>
@endsection
