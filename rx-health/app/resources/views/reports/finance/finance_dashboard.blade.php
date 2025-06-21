@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Report Filter -->
        <x-elements.dynamic-report-filter
            :report-types="[
                'finance_revenue_report' => 'Revenue Report',
                'consultation_revenue_report' => 'Consultation Report',
                'doctor_revenue_report' => 'Doctor Report',
                'service_category_revenue_report' => 'Service Category Report',
                'morbidity_report' => 'Morbidity Report',
                'morbidity_report_graph' => 'Morbidity Report Graph',
            ]"
            :dynamic-fields="[
                'finance_revenue_report' => [
                    'fieldType' => [
                        'label' => 'Select Billing Mode',
                        'type' => 'select',
                        'options' => $billingOptions,
                    ],
                ],
                'doctor_revenue_report' => [
                    'fieldType' => [
                        'label' => 'Select Doctor',
                        'type' => 'select',
                        'options' => $doctorOptions,
                    ],
                ],
                'service_category_revenue_report' => [
                    'fieldType' => [
                        'label' => 'Graph',
                        'type' => 'radio',
                        'options' => [
                            'bar' => 'View Bar Chart',
                            'pie' => 'View Pie Chart',
                        ],
                    ],
                ],
            ]"
        />

        <!-- Report title -->
        <div class="col-sm-12">
            <div class="iq-card p-3">
                <div class="d-flex justify-content-between">
                    <div class="iq-header-title my-auto">
                        <h5>
                            Revenue Report -
                            <small>showing results from 10th January, 2023 to 1st July, 2024</small>
                        </h5>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="badge badge-warning p-2 my-auto">Showing Cached Data</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Revenue Report --}}
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
                            data-export-options='{"fileName": "Revenue-Report-date"}'
                        >
                            <thead>
                                <tr>
                                    <th scope="col" colspan="8" data-sortable="true">
                                        <p class="m-0">Revenue Report (10th January, 2023 to 1st July, 2024)</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                    <th scope="col" data-sortable="true" data-field="Sold By">Sold By</th>
                                    <th scope="col" data-sortable="true" data-field="Payment Type">Payment Type</th>
                                    <th scope="col" data-sortable="true" data-field="Qty Sold">Qty Sold</th>
                                    <th scope="col" data-sortable="true" data-field="Unit Price">Unit Price</th>
                                    <th scope="col" data-sortable="true" data-field="Sub Total">Sub Total</th>
                                    <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5"></td>
                                    <td><b>Total:</b></td>
                                    <td id="total_value" style="font-weight: bold">0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Consultation Revenue Report --}}
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
                            data-export-options='{"fileName": "Consultation-Revenue-Report-date"}'
                        >
                            <thead>
                                <tr>
                                    <th scope="col" colspan="11">
                                        <p class="m-0">
                                            Consultation Revenue Report (10th January, 2023 to 1st July, 2024)
                                        </p>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="Patient Name">Patient Name</th>
                                    <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                    <th scope="col" data-sortable="true" data-field="Doctor">Doctor</th>
                                    <th scope="col" data-sortable="true" data-field="Payment Type">Payment Type</th>
                                    <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                    <th scope="col" data-sortable="true" data-field="Visit Number">Visit Number</th>
                                    <th scope="col" data-sortable="true" data-field="Quantity">Quantity</th>
                                    <th scope="col" data-sortable="true" data-field="Price">Price</th>
                                    <th scope="col" data-sortable="true" data-field="Sub Total">Sub Total</th>
                                    <th scope="col" data-sortable="true" data-field="Date & Time">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mrs Sabah Hassan, Khalil</td>
                                    <td>Medications</td>
                                    <td>Reda Hajaig</td>
                                    <td>CASH</td>
                                    <td>Out-Patient</td>
                                    <td>1000036</td>
                                    <td>1</td>
                                    <td>5300.00</td>
                                    <td>5300</td>
                                    <td>2023-10-25 13:00:44</td>
                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                    <td><b>Total:</b></td>
                                    <td id="total_value" style="font-weight: bold">5300.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Doctor Revenue Report --}}
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
                            data-export-options='{"fileName": "Doctor-Revenue-Report-date"}'
                        >
                            <thead>
                                <tr>
                                    <th scope="col" colspan="11">
                                        <p class="m-0">Doctor Revenue Report (10th January, 2023 to 1st July, 2024)</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="Patient Name">Patient Name</th>
                                    <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                    <th scope="col" data-sortable="true" data-field="Doctor">Doctor</th>
                                    <th scope="col" data-sortable="true" data-field="Payment Type">Payment Type</th>
                                    <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                    <th scope="col" data-sortable="true" data-field="Visit Number">Visit Number</th>
                                    <th scope="col" data-sortable="true" data-field="Quantity">Quantity</th>
                                    <th scope="col" data-sortable="true" data-field="Price">Price</th>
                                    <th scope="col" data-sortable="true" data-field="Sub Total">Sub Total</th>
                                    <th scope="col" data-sortable="true" data-field="Date & Time">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>61</td>
                                    <td>Mr Diaa, AbouFakher</td>
                                    <td>GP Consultation</td>
                                    <td>Dayanne Rose</td>
                                    <td>CASH</td>
                                    <td>Out-Patient</td>
                                    <td>1000247</td>
                                    <td>1</td>
                                    <td>30000.00</td>
                                    <td>30000</td>
                                    <td>2023-12-01 08:13:20</td>
                                </tr>
                                <tr>
                                    <td colspan="8"></td>
                                    <td><b>Total:</b></td>
                                    <td id="total_value" style="font-weight: bold">30000.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Service Category Revenue Report --}}
        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Service Category Revenue Graph</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- bar chart --}}
                    <div class="card-body">
                        <div id="bar_service_type" style="width: 100%; height: 400px"></div>
                    </div>

                    {{-- pie chart --}}
                    <div class="card-body">
                        <div id="pie_service_type" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>
            <script>
                //charts
                document.addEventListener('DOMContentLoaded', function () {
                    //display Bar charts
                    display_bar_chart(
                        'bar_service_type',
                        'Service Types, Total: 82,760.00',
                        ['Administrative', 'Drugs', 'Laboratory', 'Medical', 'Radiology'],
                        'Totals',
                        'Totals',
                        [3700, 2060, 53000, 14000, 10000],
                    );

                    //display Pie charts
                    var data = {
                        Administrative: 3700,
                        Drugs: 2060,
                        Laboratory: 53000,
                        Medical: 14000,
                        Radiology: 10000,
                    };
                    display_pie_chart(
                        'pie_service_type',
                        'Service Types, Total: 82,760.00',
                        'Totals',
                        Object.entries(data),
                    );
                });
            </script>
        </div>

        {{-- Morbidity Report --}}
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
                            data-export-options='{"fileName": "Morbidity-Report-date"}'
                        >
                            <thead>
                                <tr>
                                    <th scope="col" colspan="4">
                                        <p class="m-0">Morbidity Report (10th January, 2023 to 1st July, 2024)</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="Diagnosis">Diagnosis</th>
                                    <th scope="col" data-sortable="true" data-field="Number Of Clients">
                                        Number Of Clients
                                    </th>
                                    <th scope="col" data-sortable="true" data-field="Percentage (%)">Percentage (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>6</td>
                                    <td>Cholera</td>
                                    <td>2</td>
                                    <td>14.29%</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Cholera due to Vibrio cholerae 01, biovar cholerae</td>
                                    <td>2</td>
                                    <td>14.29%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Morbidity Graph Report --}}
        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Morbidity Graph - Number of clients</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- pie chart --}}
                    <div class="card-body">
                        <div id="pie_no_patients" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>

            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Morbidity Graph - Percentages</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- pie chart --}}
                    <div class="card-body">
                        <div id="pie_percentages" style="width: 100%; height: 400px"></div>
                    </div>
                </div>
            </div>
            <script>
                //charts
                document.addEventListener('DOMContentLoaded', function () {
                    //display Pie charts
                    var data = {
                        'Irritable bowel syndrome with diarrhoea': 2,
                        'Amoeboma of intestine': 2,
                        'Acute bronchitis': 5,
                        Cholera: 3,
                        'Juvenile arthritis': 2,
                    };
                    var percentages = {
                        'Irritable bowel syndrome with diarrhoea': 14.28,
                        'Amoeboma of intestine': 14.28,
                        'Acute bronchitis': 35.71,
                        Cholera: 21.42,
                        'Juvenile arthritis': 14.28,
                    };

                    display_pie_chart('pie_no_patients', 'Top number of patients', 'Patients', Object.entries(data));

                    display_pie_chart_percentage(
                        'pie_percentages',
                        'Top number of patients by percentages',
                        'Percentage',
                        Object.entries(percentages),
                    );
                });
            </script>
        </div>
    </div>
@endsection

@section('custom_js')
    <script>
        //show extra options if selected
        $('#report_type').change(function () {
            if ($(this).children('option:selected').val() == 'revenue_report') {
                $('#doctor_revenue_report').hide();
                $('#service_category_revenue_report').hide();
                $('#revenue_report').show();
            } else if ($(this).children('option:selected').val() == 'doctor_revenue_report') {
                $('#revenue_report').hide();
                $('#service_category_revenue_report').hide();
                $('#doctor_revenue_report').show();
            } else if ($(this).children('option:selected').val() == 'service_category_revenue_report') {
                $('#revenue_report').hide();
                $('#doctor_revenue_report').hide();
                $('#service_category_revenue_report').show();
            } else {
                $('#revenue_report').hide();
                $('#doctor_revenue_report').hide();
                $('#service_category_revenue_report').hide();
            }
        });
    </script>
@endsection
