@extends('layouts.app')
@section('content')
    <div class="row">
        {{-- <livewire:laboratory.show-details :patient_id="$patient_id" :enter_results="true" /> --}}
        <livewire:laboratory.show-details :lab_number="$lab_number" :type="$type" />
    </div>
    {{-- @include('lab.modals.enter_results_data') --}}
    {{-- @include('lab.modals.view_results') --}}
    @include('lab.modals.outsource')
@endsection
