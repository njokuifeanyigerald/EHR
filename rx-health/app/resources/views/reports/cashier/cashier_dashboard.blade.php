@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Report Filter -->
        <x-elements.dynamic-report-filter
            :report-types="[
                'sale_report' => 'Sales Report',
                'walk_in_daily_report' => 'Walk-in Daily Report',
            ]"
            :dynamic-fields="[]"
        />

        @if ($reportData && in_array($reportType, ['sale_report', 'walk_in_daily_report']))
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

            @if ($reportType == 'sale_report')
                {{-- Sales Report --}}
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
                                    data-export-options='{"fileName": "Cashier-Sales-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="11">
                                                <p class="m-0">
                                                    Sales Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Patient Name">
                                                Patient Name
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Folder ID">Folder ID</th>
                                            <th scope="col" data-sortable="true" data-field="Cashier">Cashier</th>
                                            <th scope="col" data-sortable="true" data-field="Visit Number">
                                                Visit Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                            <th scope="col" data-sortable="true" data-field="Payment Type">
                                                Payment Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Receipt No.">
                                                Receipt No.
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Amount">Amount</th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['patient_name'] }}</td>
                                                <td>{{ $data['folder_number'] }}</td>
                                                <td>{{ $data['cashier'] }}</td>
                                                <td>{{ $data['visit_number'] }}</td>
                                                <td>{{ $data['visit_type'] }}</td>
                                                <td>{{ $data['payment_type'] }}</td>
                                                <td>{{ $data['item_name'] }}</td>
                                                <td>{{ $data['receipt_number'] }}</td>
                                                <td>{{ $data['amount'] }}</td>
                                                <td>{{ $data['date'] }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="8"></td>
                                            <td><b>Total:</b></td>
                                            <td id="total_value" style="font-weight: bold">
                                                {{
                                                    array_reduce(
                                                        $reportData,
                                                        function ($carry, $item) {
                                                            return $carry + $item['amount'];
                                                        },
                                                        0,
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'walk_in_daily_report')
                {{-- Walk-in Daily Report --}}
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
                                    data-export-options='{"fileName": "Walk-In-Daily-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="6">
                                                <p class="m-0">
                                                    Walk-in Daily Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Client Name">
                                                Client Name
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Service Type">
                                                Service Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Phone Number">
                                                Phone Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                            <th scope="col" data-sortable="true" data-field="Amount">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['client_name'] }}</td>
                                                <td>{{ $data['service_type'] }}</td>
                                                <td>{{ $data['phone_number'] }}</td>
                                                <td>{{ $data['date'] }}</td>
                                                <td>{{ $data['amount'] }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="4"></td>
                                            <td><b>Total:</b></td>
                                            <td id="total_value" style="font-weight: bold">
                                                {{
                                                    array_reduce(
                                                        $reportData,
                                                        function ($carry, $item) {
                                                            return $carry + $item['amount'];
                                                        },
                                                        0,
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
