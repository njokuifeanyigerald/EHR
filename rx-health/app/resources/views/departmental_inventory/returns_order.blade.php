@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <livewire:departmental-inventory.item-returns.incoming :item_return_id="$id" />
    </div>
@endsection
