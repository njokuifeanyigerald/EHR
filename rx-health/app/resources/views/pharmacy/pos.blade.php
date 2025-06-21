@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Point Of Sale</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Prescription</h5>
                    </div>
                </div>
                @livewire('pharmacy.patient-visit.pharmacy-drug-search', ['type' => 'pos', 'location' => 'pharmacy', 'allowPriceChange' => $allowPriceChange])
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Preview Prescription</h5>
                    </div>
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#drug-serving-modal">
                            <i class="fas fa-prescription"></i>
                            Servings
                        </a>
                        <a
                            href="#"
                            class="btn btn-success"
                            data-bs-toggle="modal"
                            data-bs-target="#pos-transaction-history"
                        >
                            <i class="fa fa-dollar"></i>
                            Transaction Details
                        </a>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- Patient --}}
                    <div class="mt-2 col-lg-6">
                        @livewire('pharmacy.pos.patient-search')
                    </div>
                    {{-- table --}}
                    @livewire('pharmacy.pos.preview-prescription', ['page_location' => 'pos'])
                </div>
            </div>
        </div>
    </div>
@endsection
