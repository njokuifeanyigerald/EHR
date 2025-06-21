@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>
                            {{ Str::headline($billing_code) }} Financials for RX Health Medical Hospital ({{ $year }})
                        </h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ url()->current() }}" class="btn btn-success px-1 py-1 me-2" title="Refresh">
                            <i class="fa fa-arrows-rotate"></i>
                            Refresh
                        </a>
                        {{--
                            <a href="#" class="btn btn-dark px-2 py-1 me-2" title="Print Test Result">
                            <i class="fa fa-print"></i>
                            Print
                            </a>
                        --}}
                    </div>
                </div>
            </div>
        </div>

        <livewire:claims-and-billing-office.summary-financials-details-for-year-by-type
            :year="$year"
            :billing_code="$billing_code"
        />
    </div>
@endsection
