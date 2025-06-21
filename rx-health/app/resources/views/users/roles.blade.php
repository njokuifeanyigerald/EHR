@extends('layouts.app')
@section('content')
    <div class="row">
        <livewire:user-management.roles.index />
    </div>

    {{-- @include('users.modals.create_role') --}}
    {{-- @include('users.modals.edit_role') --}}
@endsection
