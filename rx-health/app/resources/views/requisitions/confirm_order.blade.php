@extends('layouts.app')
@section('content')
    <livewire:requisition.incoming-or-receive-confirm :type="$type" :requisition_id="$id" />
@endsection
