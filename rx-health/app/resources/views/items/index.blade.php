@extends('layouts.app')
@section('content')
    <livewire:items-management.provider-item.index />
    {{-- @include('items.modals.add_new_item') --}}
    {{-- @include('items.modals.price_adjustment') --}}
    {{--
        @section('custom_js')
        <script>
        function update_status(item_id) {
        let form = document.getElementById('form__submit_' + item_id);
        form.submit();
        }
        </script>
        @endsection
    --}}
@endsection
