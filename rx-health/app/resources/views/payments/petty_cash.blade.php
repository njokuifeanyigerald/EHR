@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Petty Cash Payments</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_petty_cash"
                            class="btn btn-primary px-2 py-1"
                            title="Add Petty cash"
                        >
                            <i class="fa fa-plus"></i>
                            Add Petty Cash
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @livewire('payments.petty-cash')
        </div>
    </div>
@endsection
