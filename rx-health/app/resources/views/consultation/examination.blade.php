@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <livewire:consultation.examination :visit_number="$visit_number" />
    </div>

    {{-- @include('consultation.modals.modals') --}}
    {{-- @include('consultation.modals.add-prescription-modal') --}}
@endsection
