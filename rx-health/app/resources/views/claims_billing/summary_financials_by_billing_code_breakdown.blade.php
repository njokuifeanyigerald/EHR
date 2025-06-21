@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <livewire:claims-and-billing-office.summary-financials-breakdown
            :year="$year"
            :month="$month"
            :billing_code="$billing_code"
            :company_code="$company_code"
        />
    </div>
@endsection
