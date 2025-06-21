@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Review Patients</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- <livewire:consultation.review /> --}}

        <livewire:re-usable-components.consultation-lists :admission_status="'discharged_review'" :in_use_only="true" />
    </div>
@endsection
