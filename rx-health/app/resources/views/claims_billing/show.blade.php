@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <livewire:claims-and-billing-office.patient-visit-show :visit_number="$visit_number" />
    </div>
@endsection
