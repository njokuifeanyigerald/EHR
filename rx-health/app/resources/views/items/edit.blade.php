@extends('layouts.app')
@section('content')
    <livewire:items-management.provider-item.edit-item :item_id="$item_id" />

    {{-- @include('items.modals.price_setting') --}}
    {{-- @include('items.modals.stock_alert') --}}
@endsection
