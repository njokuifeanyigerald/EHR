@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Search Visits</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:visits.search-patient />
    </div>
@endsection
