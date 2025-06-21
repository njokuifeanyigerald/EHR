@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Packages'])
        <livewire:settings.packages.index />
    </div>
@endsection
