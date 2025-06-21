@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Facilities Not Done'])
        <livewire:settings.facilities.index />
    </div>
@endsection
