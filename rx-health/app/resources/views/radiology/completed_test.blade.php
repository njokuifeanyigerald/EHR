@extends('layouts.app')
@section('content')
    <livewire:radiology.test-type-listing :type="'completed_tests'" />

    {{--
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
        <th scope="col" data-sortable="true" data-field="Sample Collector">
        Sample Collector
        </th>
        <th scope="col" data-sortable="true" data-field="Notification">Notification</th>
        <th scope="col" data-sortable="true" data-field="Notified Det.">Notified Det.</th>
        <th scope="col" data-sortable="true" data-field="Apr. Status">Apr. Status</th>
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
        <td></td>
        <td>
        <span class="btn btn-sm text-warning">
        <i class="fa fa-bell"></i>
        Notified (
        <span id="notification">0</span>
        )
        </span>
        </td>
        <td>
        <span>
        <i class="fw-bold">User</i>
        :
        </span>
        <br />
        <span>
        <i class="fw-bold">Last update :</i>
        (30th April 2024 2:11 pm)
        </span>
        </td>
        <td>Approved</td>
        <td>
        <button type="button" class="btn iq-bg-success btn-rounded btn-sm my-0">
        Done
        </button>
        </td>
        <td class="text-center" style="width: 150px">
        <a
        href="{{ route('radiology.show', 1000210) }}"
        class="btn btn-outline-primary px-1 py-0 me-1"
        title="Client Diagnostics"
        >
        <i class="ri-eye-line m-0 icons-sm"></i>
        View Details
        </a>
        </td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>2023-10-08 09:01:20</td>
        <td>OYENIYI OLUKEMI</td>
        <td>1000015</td>
        <td>Female</td>
        <td></td>
        <td>
        <span class="btn btn-sm text-warning">
        <i class="fa fa-bell"></i>
        Notified (
        <span id="notification">1</span>
        )
        </span>
        </td>
        <td>
        <span>
        <i class="fw-bold">User</i>
        :
        </span>
        <br />
        <span>
        <i class="fw-bold">Last update :</i>
        (30th April 2024 2:11 pm)
        </span>
        </td>
        <td>Approved</td>
        <td>
        <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
        In Use
        </button>
        </td>
        <td class="text-center" style="width: 150px">
        <a
        href="{{ route('radiology.show', 1000210) }}"
        class="btn btn-outline-primary px-1 py-0 me-1"
        title="Client Diagnostics"
        >
        <i class="ri-eye-line m-0 icons-sm"></i>
        View Details
        </a>
        </td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>2023-10-09 19:01:20</td>
        <td>Otunne Blessing Ezinne</td>
        <td>1000019</td>
        <td>Female</td>
        <td></td>
        <td>
        <span class="btn btn-sm text-warning">
        <i class="fa fa-bell"></i>
        Notified (
        <span id="notification">0</span>
        )
        </span>
        </td>
        <td>
        <span>
        <i class="fw-bold">User</i>
        :
        </span>
        <br />
        <span>
        <i class="fw-bold">Last update :</i>
        (30th April 2024 2:11 pm)
        </span>
        </td>
        <td>Approved</td>
        <td>
        <button type="button" class="btn iq-bg-success btn-rounded btn-sm my-0">
        Done
        </button>
        </td>
        <td class="text-center" style="width: 150px">
        <a
        href="{{ route('radiology.show', 1000210) }}"
        class="btn btn-outline-primary px-1 py-0 me-1"
        title="Client Diagnostics"
        >
        <i class="ri-eye-line m-0 icons-sm"></i>
        View Details
        </a>
        </td>
        </tr>
        <tr>
        <th scope="row">4</th>
        <td>2023-10-03 14:42:01</td>
        <td>DADA OLUBUKONLA</td>
        <td>1000110</td>
        <td>Male</td>
        <td></td>
        <td>
        <span class="btn btn-sm text-warning">
        <i class="fa fa-bell"></i>
        Notified (
        <span id="notification">1</span>
        )
        </span>
        </td>
        <td>
        <span>
        <i class="fw-bold">User</i>
        :
        </span>
        <br />
        <span>
        <i class="fw-bold">Last update :</i>
        (22nd April 2024 3:40 pm)
        </span>
        </td>
        <td>Approved</td>
        <td>
        <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
        In Use
        </button>
        </td>
        <td class="text-center" style="width: 150px">
        <a
        href="{{ route('radiology.show', 1000210) }}"
        class="btn btn-outline-primary px-1 py-0 me-1"
        title="Client Diagnostics"
        >
        <i class="ri-eye-line m-0 icons-sm"></i>
        View Details
        </a>
        </td>
        </tr>
        <tr>
        <th scope="row">5</th>
        <td>2023-09-01 10:02:00</td>
        <td>ADELEKE RACHAEL</td>
        <td>1000030</td>
        <td>Female</td>
        <td></td>
        <td>
        <span class="btn btn-sm text-warning">
        <i class="fa fa-bell"></i>
        Notified (
        <span id="notification">1</span>
        )
        </span>
        </td>
        <td>
        <span>
        <i class="fw-bold">User</i>
        :
        </span>
        <br />
        <span>
        <i class="fw-bold">Last update :</i>
        (22nd April 2024 3:38 pm)
        </span>
        </td>
        <td>Approved</td>
        <td>
        <button type="button" class="btn iq-bg-warning btn-rounded btn-sm my-0">
        In Use
        </button>
        </td>
        <td class="text-center" style="width: 150px">
        <a
        href="{{ route('radiology.show', 1000210) }}"
        class="btn btn-outline-primary px-1 py-0 me-1"
        title="Client Diagnostics"
        >
        <i class="ri-eye-line m-0 icons-sm"></i>
        View Details
        </a>
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
@endsection
