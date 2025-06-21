@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title"></div>
                    <div>
                        <a href="{{ route('patients.index') }}" class="btn btn-primary">Go To Patient List</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- {{$principal_id}} --}}

        <livewire:front-desk.register-patient :principal_id="$principal_id" />
    </div>
@endsection
