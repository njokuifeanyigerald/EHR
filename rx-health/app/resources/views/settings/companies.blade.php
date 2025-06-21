@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Corporate/Insurance Companies'])
        <livewire:settings.companies.index />
    </div>
@endsection
