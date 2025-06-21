@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Pharmacy Patient Visits</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                @livewire('pharmacy.patient-visit.search-pharmacy-visit')
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="tab-content" id="pills-tabContent-2">
                        {{-- current visits --}}
                        <div
                            class="tab-pane fade show active"
                            id="CurrentVisits"
                            role="tabpanel"
                            aria-labelledby="CurrentVisits-tab"
                        >
                            @livewire('pharmacy.patient-visit.current-visit')
                        </div>

                        {{-- Served visits --}}
                        <div class="tab-pane fade" id="ServedVisits" role="tabpanel" aria-labelledby="ServedVisits-tab">
                            @livewire('pharmacy.patient-visit.discharged-visit')
                        </div>

                        {{-- Guest visits --}}
                        <div class="tab-pane fade" id="GuestVisits" role="tabpanel" aria-labelledby="GuestVisits-tab">
                            @livewire('pharmacy.patient-visit.guest-visit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
