@extends('layouts.app')
@section('content')
    <livewire:requisition.edit-or-view :type="'edit'" :requisition_id="$id" />
@endsection
