@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List Of Wards</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">Large modal</button> --}}
                        <button
                            type="button"
                            class="btn btn-primary me-2"
                            data-bs-toggle="modal"
                            data-bs-target="#add_bed"
                        >
                            Add Bed
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary me-2"
                            data-bs-toggle="modal"
                            data-bs-target="#add_ward"
                        >
                            Add Ward
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary me-2"
                            data-bs-toggle="modal"
                            data-bs-target="#add_floor"
                        >
                            Add Floor
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary me-2"
                            data-bs-toggle="modal"
                            data-bs-target="#add_block"
                        >
                            Add Block
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <livewire:nurses-station.ward.index />
    </div>

    {{-- @include('inpatient.ward.modals') --}}
@endsection
