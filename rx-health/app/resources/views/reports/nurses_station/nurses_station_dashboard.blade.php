@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Report Filter -->
        <x-elements.dynamic-report-filter
            :report-types="[
                'nurse_duty_roster_report' => 'Duty Roaster Report',
                'requisition_report' => 'Requisition Report',
            ]"
            :dynamic-fields="[]"
        />

        @if ($reportData && in_array($reportType, ['nurse_duty_roster_report', 'requisition_report']))
            <!-- Report title -->
            <div class="col-sm-12">
                <div class="iq-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="iq-header-title my-auto">
                            <h5>
                                {{ Str::headline($reportType) }}
                                ({{ $reportData[0]['visit_type_option'] ?? 'Unspecified' }}) -
                                <small>
                                    showing results from {{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }}
                                    to
                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }}
                                </small>
                            </h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-warning p-2 my-auto">Showing Cached Data</span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($reportType == 'nurse_duty_roster_report')
                {{-- Duty Roaster Report --}}
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
                                    data-show-columns="true"
                                    data-page-size="25"
                                    data-buttons-class="light"
                                    data-search="true"
                                    data-search-align="left"
                                    data-show-print="true"
                                    data-show-export="true"
                                    data-export-data-type="all"
                                    data-export-types="[ 'csv', 'pdf','excel']"
                                    data-export-footer="true"
                                    data-export-options='{"fileName": "Front-Desk-Duty-Roaster-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="7">
                                                <p class="m-0">
                                                    Nurse Duty Roaster Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Staff Name">Staff Name</th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                            <th scope="col" data-sortable="true" data-field="Shift">Shift</th>
                                            <th scope="col" data-sortable="true" data-field="Dept.">Dept.</th>
                                            <th scope="col" data-sortable="true" data-field="Start Time">Start Time</th>
                                            <th scope="col" data-sortable="true" data-field="End Time">End Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $dutyRosterRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dutyRosterRecord['staff_name'] }}</td>
                                                <td>{{ $dutyRosterRecord['date'] }}</td>
                                                <td>{{ $dutyRosterRecord['shift'] }}</td>
                                                <td>{{ $dutyRosterRecord['department'] }}</td>
                                                <td>{{ $dutyRosterRecord['start_time'] }}</td>
                                                <td>{{ $dutyRosterRecord['end_time'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'requisition_report')
                {{-- Requisition Report --}}
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
                                    data-show-columns="true"
                                    data-page-size="25"
                                    data-buttons-class="light"
                                    data-search="true"
                                    data-search-align="left"
                                    data-show-print="true"
                                    data-show-export="true"
                                    data-export-data-type="all"
                                    data-export-types="[ 'csv', 'pdf','excel']"
                                    data-export-footer="true"
                                    data-export-options='{"fileName": "Nurse-Requisition-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="9">
                                                <p class="m-0">
                                                    Requisition Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Qty Requested">
                                                Qty Requested
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Qty Supplied">
                                                Qty Supplied
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Qty Available">
                                                Qty Available
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Date Requested">
                                                Date Requested
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Date Supplied">
                                                Date Supplied
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Requested By">
                                                Requested By
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Supplied By">
                                                Supplied By
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $requisitionRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $requisitionRecord['item_name'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_requested'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_supplied'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_available'] }}</td>
                                                <td>{{ $requisitionRecord['date_requested'] }}</td>
                                                <td>{{ $requisitionRecord['date_supplied'] }}</td>
                                                <td>{{ $requisitionRecord['requested_by'] }}</td>
                                                <td>{{ $requisitionRecord['supplied_by'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <h4 class="card-title text-center">No record found. Filter with different date.</h4>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
