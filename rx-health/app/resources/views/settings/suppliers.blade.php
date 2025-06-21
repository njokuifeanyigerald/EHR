@extends('layouts.app')
@section('content')
    <div class="row">
        @include('settings.heading', ['title' => 'Supplier'])
        <livewire:settings.suppliers.index />
    </div>
@endsection
