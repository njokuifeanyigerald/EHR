@extends('layouts.app')
@section('content')
    <livewire:departmental-inventory.item-returns.edit-or-view :id="$id" :type="'edit'" />
@endsection
