@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Pending Clients</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:laboratory.enter-results />
    </div>
@endsection
