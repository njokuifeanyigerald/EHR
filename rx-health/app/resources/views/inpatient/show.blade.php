@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->

        <livewire:nurses-station.inpatient.patient-folder.index :visit_number="$visit_number" />
    </div>

    {{-- @include('inpatient.patient_activities.activity_modals') --}}
@endsection
