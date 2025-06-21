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
                    {{--
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                        <div class="row">
                        <div class="col-sm-10 row">
                        <label class="control-label col-sm-1 align-self-center mb-0" for="date">Start
                        Date:</label>
                        <div class="col-sm-5">
                        <input type="date" class="form-control my-2" id="date">
                        </div>
                        <label class="control-label col-sm-1 align-self-center mb-0" for="date">End
                        Date:</label>
                        <div class="col-sm-5">
                        <input type="date" class="form-control my-2" id="date">
                        </div>
                        </div>
                        <div class="col-sm-2 align-self-center">
                        <a href="#" class="btn btn-primary align-self-center">Load</a>
                        </div>
                        </div>
                        </div>
                    --}}
                </div>
            </div>
        </div>

        <livewire:laboratory.pending-clients />
    </div>
    {{-- @include('lab.modals.pending_client_preview') --}}

    {{-- @include('lab.modals.add_lab') --}}
@endsection
