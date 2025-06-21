@extends('layouts.app')
@section('content')
    <div class="row">
        <x-elements.dynamic-report-filter
            :report-types="[
                'prescription_report' => 'Prescription Report',
                'daily_case_report' => 'Daily Case Report',
                'consultation_appointment_report' => 'Appointment Report',
                'most_prescribed_medications_report' => 'Most Prescribed Medications',
            ]"
            :dynamic-fields="[
                'prescription_report' => [
                    'fieldType' => [
                        'label' => 'Type Of Age Range',
                        'type' => 'select',
                        'options' => [
                            '' => '-- Choose options --',
                            '0-12' => 'Ages 0 to 12',
                            '13-25' => 'Ages 13 to 25',
                            '26-50' => 'Ages 26 to 50',
                            '51-100' => 'Above 50',
                        ],
                    ],
                ],
                'most_prescribed_medications_report' => [
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

        @if ($reportData &&
            in_array($reportType, [
                'prescription_report',
                'daily_case_report',
                'consultation_appointment_report',
                'most_prescribed_medications_report'
            ]))
            <!-- Report title -->
            <div class="col-sm-12">
                <div class="iq-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="iq-header-title my-auto">
                            <h5>
                                {{ Str::headline($reportType) }}
                                ({{
                                    isset($reportData[0]['age_range_option'])
                                        ? $reportData[0]['age_range_option']
                                        : (isset($reportData[0]['graph_option'])
                                            ? $reportData[0]['graph_option'] . ' Chart'
                                            : 'Unspecified')
                                }})
                                -
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

            @if ($reportType == 'prescription_report')
                {{-- Prescription Report --}}
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
                                    data-export-options='{"fileName": "Prescription-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="11">
                                                <p class="m-0">
                                                    Prescription Report
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
                                            <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                            <th scope="col" data-sortable="true" data-field="Age">Age</th>
                                            <th scope="col" data-sortable="true" data-field="Visit Number">
                                                Visit Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                            <th scope="col" data-sortable="true" data-field="Diagnosis">Diagnosis</th>
                                            <th scope="col" data-sortable="true" data-field="Lab">Lab</th>
                                            <th scope="col" data-sortable="true" data-field="Medication">Medication</th>
                                            <th scope="col" data-sortable="true" data-field="Date Of Visit">
                                                Date Of Visit
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['patient_name'] }}</td>
                                                <td>{{ $data['folder_id'] }}</td>
                                                <td>{{ $data['gender'] }}</td>
                                                <td>{{ $data['age'] }}</td>
                                                <td>{{ $data['visit_number'] }}</td>
                                                <td>{{ $data['visit_type'] }}</td>
                                                {{--
                                                    <td>{{ $data['diagnosis'] }}</td>
                                                    <td>{{ $data['lab_results'] }}</td>
                                                    <td>{{ $data['medications'] }}</td>
                                                --}}
                                                <td>
                                                    <ul>
                                                        @foreach ($data['diagnosis'] as $diagnosis)
                                                            <li>{{ $diagnosis }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($data['lab_results'] as $labResult)
                                                            <li>{{ $labResult }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($data['medications'] as $medication)
                                                            <li>{{ $medication }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $data['date_of_visit'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'daily_case_report')
                {{-- Daily Case Report --}}
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
                                    data-export-options='{"fileName": "Daily-Case-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="9" data-sortable="true">
                                                <p class="m-0">
                                                    Daily Case Report
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
                                            <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                            <th scope="col" data-sortable="true" data-field="Member Type">
                                                Member Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                            <th scope="col" data-sortable="true" data-field="Payment Type">
                                                Payment Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit No">Visit No</th>
                                            <th scope="col" data-sortable="true" data-field="Folder ID">Folder ID</th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['patient_name'] }}</td>
                                                <td>{{ $data['gender'] }}</td>
                                                <td>{{ $data['member_type'] }}</td>
                                                <td>{{ $data['visit_type'] }}</td>
                                                <td>{{ $data['payment_type'] }}</td>
                                                <td>{{ $data['visit_number'] }}</td>
                                                <td>{{ $data['folder_id'] ?? '-' }}</td>
                                                <td>{{ $data['visit_date'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'consultation_appointment_report')
                {{-- Appointments Report --}}
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
                                    data-export-options='{"fileName": "Prescription-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="8">
                                                <p class="m-0">
                                                    Appointments Report
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
                                            <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                            <th scope="col" data-sortable="true" data-field="Age">Age</th>
                                            <th scope="col" data-sortable="true" data-field="Appointment Type">
                                                Appointment Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Dept.">Dept.</th>
                                            <th scope="col" data-sortable="true" data-field="Appointment Date & Time">
                                                Appointment Date & Time
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Appointment Status">
                                                Appointment Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['patient_name'] }}</td>
                                                <td>{{ $data['gender'] }}</td>
                                                <td>{{ $data['age'] }}</td>
                                                <td>{{ $data['appointment_type'] }}</td>
                                                <td>{{ $data['department'] }}</td>
                                                <td>{{ $data['appointment_date_time'] }}</td>
                                                <td>{{ Str::ucfirst($data['appointment_status']) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'most_prescribed_medications_report')
                {{-- Most Pescribed Medication Report --}}
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
                                    data-export-options='{"fileName": "Most-Prescribed-Medication-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3">
                                                <p class="m-0">
                                                    Most Pescribed Medication Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Medication Name">
                                                Medication Name
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="No. of times pescribed">
                                                No. of times pescribed
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['medication_name'] }}</td>
                                                <td>{{ $data['prescription_count'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'bar')
                    {{-- Most Pescribed Medication Report - bar chart --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Pescribed Medications Bar Graph</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="card-body">
                                    <div id="bar_meds" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'pie')
                    {{-- Most Pescribed Medication Report - pie chart --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Pescribed Medications Pie Graph</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                {{-- pie chart --}}
                                <div class="card-body">
                                    <div id="pie_meds" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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

@section('custom_js')
    <script>
        // console.log('reportData', {!! json_encode($reportData) !!});
        const jsonData = {!! json_encode($reportData) !!};

        // check if json data is empty
        if (jsonData != null && jsonData.length > 0) {
            if (jsonData[0]['graph_option'] == 'bar') {
                const medicationNames = jsonData.map((item) => item.medication_name);
                const prescriptionCounts = jsonData.map((item) => item.prescription_count);

                display_bar_chart(
                    'bar_meds',
                    'Top Medications Prescribed',
                    medicationNames,
                    'Prescription count',
                    'No. of times prescribed',
                    prescriptionCounts,
                );
            }

            if (jsonData[0]['graph_option'] == 'pie') {
                //display Pie charts
                const data = jsonData.reduce((acc, item) => {
                    acc[item.medication_name] = item.prescription_count;
                    return acc;
                }, {});
                display_pie_chart(
                    'pie_meds',
                    'Top Medications Pescribed',
                    'No. of times pescribed',
                    Object.entries(data),
                );
            }
        }
    </script>
@endsection
