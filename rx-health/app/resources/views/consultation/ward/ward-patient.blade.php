@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <livewire:consultation.ward-rounds.index :ward_id="$ward_id" />
    </div>
@endsection
