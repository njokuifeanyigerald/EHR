@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Report Filter -->
        <x-elements.dynamic-report-filter
            :report-types="[
                'daily_visit_report' => 'Daily Visits Report',
                'patient_registration_report' => 'Patient Registration Report',
                'appointment_report' => 'Appointment Report',
                'duty_roster_report' => 'Duty Roaster Report',
                'walk_in_report' => 'Walk-in Report',
            ]"
            :dynamic-fields="[
                'daily_visit_report' => [
                    'fieldType' => [
                        'label' => 'Type Of Visit',
                        'type' => 'select',
                        'options' => [
                            '' => '-- Choose options --',
                            'ALL' => 'All Types',
                            'OUTP' => 'Out-Patient',
                            'INP' => 'In-Patient',
                            'GUEST' => 'Guest/Walk-in',
                        ],
                    ],
                ],
            ]"
        />

        @if ($reportData &&
            in_array($reportType, [
                'daily_visit_report',
                'patient_registration_report',
                'appointment_report',
                'duty_roster_report',
                'walk_in_report'
            ]))
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

            @if ($reportType == 'daily_visit_report')
                {{-- Daily Visits Reports --}}
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
                                    data-export-options='{"fileName": "Daily-Visits-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="10">
                                                <p class="m-0">
                                                    Daily Visits Reports
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Patient name">
                                                Patient name
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                            <th scope="col" data-sortable="true" data-field="Member Type">
                                                Member Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                            <th scope="col" data-sortable="true" data-field="Payment Type">
                                                Payment Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Number">
                                                Visit Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Folder ID">Folder ID</th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                            <th scope="col" data-sortable="true" data-field="Discharge Date">
                                                Discharge Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $dailyVisitRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dailyVisitRecord['patient_name'] }}</td>
                                                <td>{{ $dailyVisitRecord['gender'] }}</td>
                                                <td>{{ $dailyVisitRecord['member_type'] }}</td>
                                                <td>{{ $dailyVisitRecord['visit_type'] }}</td>
                                                <td>{{ $dailyVisitRecord['payment_type'] }}</td>
                                                <td>{{ $dailyVisitRecord['visit_number'] }}</td>
                                                <td>{{ $dailyVisitRecord['folder_number'] ?? '-' }}</td>
                                                <td>{{ $dailyVisitRecord['visit_date'] }}</td>
                                                <td>{{ $dailyVisitRecord['discharge_date'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'patient_registration_report')
                {{-- Patient Registration Report/First Time Visitors Report --}}
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
                                    data-export-options='{"fileName": "Patient-Registration-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="10">
                                                <p class="m-0">
                                                    Patient Registration Report/First Time Visitors Report
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
                                            <th scope="col" data-sortable="true" data-field="Phone Number">
                                                Phone Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Member Type">
                                                Member Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Type">Visit Type</th>
                                            <th scope="col" data-sortable="true" data-field="Payment Type">
                                                Payment Type
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Visit Number">
                                                Visit Number
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Folder ID">Folder ID</th>
                                            <th scope="col" data-sortable="true" data-field="Reg. Date">Reg. Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $patientRegistrationRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $patientRegistrationRecord['patient_name'] }}</td>
                                                <td>{{ $patientRegistrationRecord['gender'] }}</td>
                                                <td>{{ $patientRegistrationRecord['telephone'] }}</td>
                                                <td>{{ $patientRegistrationRecord['member_type'] }}</td>
                                                <td>{{ $patientRegistrationRecord['visit_type'] }}</td>
                                                <td>{{ $patientRegistrationRecord['payment_type'] }}</td>
                                                <td>{{ $patientRegistrationRecord['visit_number'] }}</td>
                                                <td>{{ $patientRegistrationRecord['folder_number'] }}</td>
                                                <td>{{ $patientRegistrationRecord['registration_date'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'appointment_report')
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
                                    data-export-options='{"fileName": "Front-Desk-Appointments-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="7">
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
                                            <th scope="col" data-sortable="true" data-field="Appointment Date">
                                                Appointment Date
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Type of Appointment">
                                                Type of Appointment
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Dept.">Dept.</th>
                                            <th scope="col" data-sortable="true" data-field="Attending Officer">
                                                Attending Officer
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Scheduled By">
                                                Scheduled By
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $appointmentRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $appointmentRecord['patient_name'] }}</td>
                                                <td>{{ $appointmentRecord['appointment_date'] }}</td>
                                                <td>{{ $appointmentRecord['type_of_appointment'] }}</td>
                                                <td>{{ $appointmentRecord['department'] }}</td>
                                                <td>{{ $appointmentRecord['attending_doctor'] }}</td>
                                                <td>{{ $appointmentRecord['scheduled_by'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'duty_roster_report')
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
                                                    Duty Roaster Report
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

            @if ($reportType == 'walk_in_report')
                {{-- Walk-in Report --}}
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
                                    data-export-options='{"fileName": "Walk-In-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="5">
                                                <p class="m-0">
                                                    Walk-in Report
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $walkinRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $walkinRecord['patient_name'] }}</td>
                                                <td>{{ $walkinRecord['service_type'] }}</td>
                                                <td>{{ $walkinRecord['telephone'] }}</td>
                                                <td>{{ $walkinRecord['visit_date'] }}</td>
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
