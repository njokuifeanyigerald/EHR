@extends('layouts.app')
@section('content')
    <livewire:requisition.requisition-list :type="'pending'" />
@endsection
