@extends('layouts.app')
@section('content')
    <div>
        <livewire:consultation.ward-rounds.patient-in-ward.index :ward_id="$ward_id" :visit_number="$visit_number" />
    </div>
@endsection
