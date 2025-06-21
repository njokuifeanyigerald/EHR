@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Pharmacy Drug Prescription</h4>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.nurses-station.includes.patient-info', ['patient' => $patient_visit->patient])

        <div class="col-md-12">
            <div class="row">
                @if ($allowPharmacyAddDrugs)
                    {{-- Filters --}}
                    <div class="col-lg-3">
                        @livewire('pharmacy.patient-visit.pharmacy-drug-search', ['patient_visit' => $patient_visit, 'type' => 'prescribe', 'location' => $patient_visit->session_location, 'allowPriceChange' => $allowPriceChange])
                    </div>
                @endif

                {{-- Table --}}
                <div class="col-lg-{{ $allowPharmacyAddDrugs ? '9' : '12' }}">
                    @livewire('pharmacy.patient-visit.prescribed-items', ['patient_visit' => $patient_visit, 'location' => $patient_visit->session_location, 'allowPriceChange' => $allowPriceChange])
                </div>
            </div>
        </div>
    </div>
@endsection
