@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Organization'])
        <livewire:settings.organization />
    </div>
@endsection
