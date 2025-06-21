@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">List of Patients</h4>
                    </div>
                    <div>
                        <a href="{{ route('patients.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i>
                            Add New Patient
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:front-desk.manage-patients />
    </div>
@endsection
