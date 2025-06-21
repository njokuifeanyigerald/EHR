@extends('layouts.app')
@section('content')
    <livewire:radiology.show-details :lab_number="$lab_number" :type="$type" />

    {{--
        <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
        <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
        <div class="iq-header-title">
        <h5>List of Radiology Requested - Oluleke Adewale (30yrs,Male)</h5>
        </div>
        <div class="iq-card-header-toolbar d-flex align-items-center">
        <a href="#" class="btn btn-outline-dark px-1 py-1 me-2" title="Print Test Result">
        <i class="fa fa-print"></i>
        Print Test Result
        </a>
        <a href="#" class="btn btn-outline-primary px-1 py-1 me-2" title="Download Test Result">
        <i class="fa fa-download"></i>
        Download Test Result
        </a>
        <a href="#" class="btn btn-outline-warning px-1 py-1 me-2" title="Send Notification">
        <i class="fa fa-bell"></i>
        Send Notification (1)
        </a>
        <a href="#" class="btn btn-success px-1 py-1" title="Refresh">
        <i class="fa fa-arrows-rotate"></i>
        Refresh
        </a>
        </div>
        </div>
        </div>
        </div>
        
        <div class="col-md-12 col-lg-12">
        <div class="iq-card">
        <div class="iq-card-body">
        <h6>Doctor's Report: N/A</h6>
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
        <th scope="col" data-sortable="true" data-field="Item">Item</th>
        <th scope="col" data-sortable="true" data-field="Visit ID">Visit ID</th>
        <th scope="col" data-sortable="true" data-field="Status">Status</th>
        <th scope="col" data-sortable="true" data-field="Completed By">Completed By</th>
        <th scope="col" data-sortable="true" data-field="Completed Date">Completed Date</th>
        <th scope="col" data-sortable="true" data-field="Action">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th scope="row">1</th>
        <td>2023-10-16 12:22:20</td>
        <td>Abdominal Scan</td>
        <td>1000210</td>
        <td>
        <button type="button" class="btn iq-bg-success btn-rounded btn-sm my-0 rounded">
        completed
        </button>
        </td>
        <td>Vincent Lilian</td>
        <td>2023-10-16 12:22:20</td>
        <td class="text-center" style="width: 280px">
        @if (str_replace(url('/'), '', url()->previous()) == '/radiology/enter_radiology_results')
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#enter_results_data_"
        class="btn btn-outline-success p-1 me-1"
        >
        Enter Result
        </a>
        <span class="mx-1">|</span>
        @else
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#view_results_data_"
        class="btn btn-outline-success p-1 me-1"
        >
        View Result
        </a>
        <span class="mx-1">|</span>
        @endif
        @if (str_replace(url('/'), '', url()->previous()) != '/radiology/completed_test')
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#outsource"
        class="btn btn-outline-primary p-1 me-1"
        >
        Outsource
        </a>
        <span class="mx-1">|</span>
        @endif
        
        <div class="custom-control custom-checkbox custom-control-inline d-inline w-25">
        <input type="checkbox" class="custom-control-input" id="print1" />
        <label class="custom-control-label" for="print1">Print</label>
        </div>
        </td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>2023-10-15 12:14:00</td>
        <td>CT Scan - 2 Region with No Contrast</td>
        <td>10000119</td>
        <td>
        <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0 rounded">
        Pending
        </button>
        </td>
        <td>N/A</td>
        <td>2023-10-15 12:14:00</td>
        <td class="text-center" style="width: 280px">
        @if (str_replace(url('/'), '', url()->previous()) == '/radiology/enter_radiology_results')
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#enter_results_data_"
        class="btn btn-outline-success p-1 me-1"
        >
        Enter Result
        </a>
        <span class="mx-1">|</span>
        @else
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#view_results_data_"
        class="btn btn-outline-success p-1 me-1"
        >
        View Result
        </a>
        <span class="mx-1">|</span>
        @endif
        @if (str_replace(url('/'), '', url()->previous()) != '/radiology/completed_test')
        <a
        href="#"
        data-bs-toggle="modal"
        data-bs-target="#outsource"
        class="btn btn-outline-primary p-1 me-1"
        >
        Outsource
        </a>
        <span class="mx-1">|</span>
        @endif
        
        <div class="custom-control custom-checkbox custom-control-inline d-inline w-25">
        <input type="checkbox" class="custom-control-input" id="print2" />
        <label class="custom-control-label" for="print2">Print</label>
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
    --}}
    {{--
        @if (str_replace(url('/'), '', url()->previous()) == '/radiology/enter_radiology_results')
        @include('radiology.modals.enter_results_data')
        @else
        @include('radiology.modals.view_results')
        @endif
        @include('radiology.modals.outsource')
        <!-- Ckeditor -->
        <script src="{{ asset('packages/ckeditor5-build-classic/ckeditor.js') }}"></script>
        <script src="{{ asset('js/custom/custom-ckeditor.js') }}"></script>
    --}}
@endsection
