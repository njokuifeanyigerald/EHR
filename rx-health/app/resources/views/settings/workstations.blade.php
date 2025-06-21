@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Work Stations'])
        <livewire:settings.work-stations.index />
    </div>
@endsection
