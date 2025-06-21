@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Consultation Queue</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- <livewire:consultation.queue /> --}}
        <livewire:re-usable-components.consultation-lists
            :session_location="'consult'"
            :ignore_admission_status="true"
            :in_use_only="true"
            :only_auth_user_patients="true"
        />
    </div>
@endsection
