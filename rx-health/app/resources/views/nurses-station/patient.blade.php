@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Patient {{ ucfirst($type) }} Records</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('nurses-station.' . $type) }}" class="btn btn-primary">
                            {{ ucfirst($type) }} Collection
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.patient-records.patient-visit-records-by-type :id="$id" :type="$type" />
    </div>
@endsection
