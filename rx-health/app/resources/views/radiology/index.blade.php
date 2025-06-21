@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Pending Clients</h4>
                    </div>
                </div>
            </div>
        </div>
        <livewire:radiology.pending-clients />

        {{--
            <div class="col-md-12 col-lg-12">
            <div class="iq-card">
            <div class="iq-card-body">
            <div class="table-responsive">
            <table
            data-classes="table table-hover"
            data-toggle="table"
            data-sortable="true"
            data-pagination="true"
            data-filter-control="true"
            data-show-toggle="true"
            data-show-columns="true"
            data-page-size="15"
            data-buttons-class="light"
            data-search="true"
            data-search-align="left"
            >
            <thead>
            <tr>
            <th scope="col" data-sortable="true" data-field="No">No</th>
            <th scope="col" data-sortable="true" data-field="Time">Time</th>
            <th scope="col" data-sortable="true" data-field="Patient">Patient</th>
            <th scope="col" data-sortable="true" data-field="Visit ID">Visit ID</th>
            <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
            <th scope="col" data-sortable="true" data-field="Status">Status</th>
            <th scope="col" data-sortable="true" data-field="Action">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <th scope="row">1</th>
            <td>2023-10-16 12:22:20</td>
            <td>AUDU UGBEDE</td>
            <td>1000210</td>
            <td>Female</td>
            <td>
            <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
            In Use
            </button>
            </td>
            <td class="text-center">
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#client_preview_"
            class="btn btn-outline-primary px-1 py-0 me-1"
            title="Preview"
            >
            <i class="ri-eye-line m-0 icons-sm"></i>
            Preview
            </a>
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#add_radiology"
            class="btn btn-outline-success px-1 py-0"
            title="Add Radiology"
            >
            <i class="ri-add-line m-0 icons-sm"></i>
            Add Radiology
            </a>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>2023-10-08 09:01:20</td>
            <td>OYENIYI OLUKEMI</td>
            <td>1000015</td>
            <td>Female</td>
            <td>
            <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
            In Use
            </button>
            </td>
            <td class="text-center">
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#client_preview_"
            class="btn btn-outline-primary px-1 py-0 me-1"
            title="Preview"
            >
            <i class="ri-eye-line m-0 icons-sm"></i>
            Preview
            </a>
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#add_radiology"
            class="btn btn-outline-success px-1 py-0"
            title="Add Radiology"
            >
            <i class="ri-add-line m-0 icons-sm"></i>
            Add Radiology
            </a>
            </td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>2023-10-16 12:22:20</td>
            <td>LAWRENCE ANIMI ETALAJE</td>
            <td>1000012</td>
            <td>Male</td>
            <td>
            <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
            In Use
            </button>
            </td>
            <td class="text-center">
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#client_preview_"
            class="btn btn-outline-primary px-1 py-0 me-1"
            title="Preview"
            >
            <i class="ri-eye-line m-0 icons-sm"></i>
            Preview
            </a>
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#add_radiology"
            class="btn btn-outline-success px-1 py-0"
            title="Add Radiology"
            >
            <i class="ri-add-line m-0 icons-sm"></i>
            Add Radiology
            </a>
            </td>
            </tr>
            <tr>
            <th scope="row">4</th>
            <td>2023-10-03 14:42:01</td>
            <td>DADA OLUBUKONLA</td>
            <td>1000110</td>
            <td>Male</td>
            <td>
            <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
            In Use
            </button>
            </td>
            <td class="text-center">
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#client_preview_"
            class="btn btn-outline-primary px-1 py-0 me-1"
            title="Preview"
            >
            <i class="ri-eye-line m-0 icons-sm"></i>
            Preview
            </a>
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#add_radiology"
            class="btn btn-outline-success px-1 py-0"
            title="Add Radiology"
            >
            <i class="ri-add-line m-0 icons-sm"></i>
            Add Radiology
            </a>
            </td>
            </tr>
            <tr>
            <th scope="row">5</th>
            <td>2023-09-01 10:02:00</td>
            <td>ADELEKE RACHAEL</td>
            <td>1000030</td>
            <td>Female</td>
            <td>
            <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
            In Use
            </button>
            </td>
            <td class="text-center">
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#client_preview_"
            class="btn btn-outline-primary px-1 py-0 me-1"
            title="Preview"
            >
            <i class="ri-eye-line m-0 icons-sm"></i>
            Preview
            </a>
            <a
            href="#"
            data-bs-toggle="modal"
            data-bs-target="#add_radiology"
            class="btn btn-outline-success px-1 py-0"
            title="Add Radiology"
            >
            <i class="ri-add-line m-0 icons-sm"></i>
            Add Radiology
            </a>
            </td>
            </tr>
            </tbody>
            </table>
            </div>
            </div>
            </div>
            </div>
        --}}
    </div>
    {{-- @include('radiology.modals.pending_client_preview') --}}
    {{-- @include('radiology.modals.add_radiology') --}}
@endsection
