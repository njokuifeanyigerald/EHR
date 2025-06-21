@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Vitals Overview</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('vitals.edit', $id) }}" class="btn btn-warning me-3">
                            <i class="ri-pencil-line"></i>
                            Edit Vitals
                        </a>
                        <livewire:re-usable-components.visit-session-location-change
                            :visit_id="$visit_id"
                            :key="$visit_id"
                        />
                        {{--
                            <select class="form-select my-2 bg-white" style="width: 160px;" id="location">
                            <option value="FRONTDESK"> Front Desk </option>
                            <option value="VITALS"> Nurses Station </option>
                            <option value="CONSULT"> Consulting Room </option>
                            <option value="PHARM"> Pharmacy </option>
                            <option value="LAB"> Laboratory </option>
                            <option selected="" value="CASHIER"> Cashier </option>
                            </select>
                        --}}
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.collect-patient-vitals.vital-show :id="$id" />
    </div>
@endsection
