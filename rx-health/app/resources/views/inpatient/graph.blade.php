@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Patient Observation Chart</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="iq-card">
                <div class="doc-profile-bg bg-primary rx-profile-bg">
                    <div class="add-img-user">
                        <img
                            class="profile-img-edit img-fluid mx-auto d-block doc-profile-bg rx-profile-fill"
                            src="{{ asset('images/user/Image2.png') }}"
                            alt="profile-pic"
                        />
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="form-group">
                        <div class="img-extension mt-1">
                            <div class="d-inline-block">
                                <b class="text-dark">Name:</b>
                                <a href="{{ route('patients.show', $visit->patient_id) }}" title="View">
                                    <p class="text-primary">{{ Str::title($visit->patient->full_name_title) }}</p>
                                </a>
                                <b class="text-dark">Age:</b>
                                <p>{{ $visit->patient->age }}</p>
                                <b class="text-dark">Visit No:</b>
                                <p>{{ $visit->visit_number }}</p>
                                <b class="text-dark">Gender:</b>
                                <p>{{ $visit->patient->sex }}</p>
                                <b class="text-dark">Doctor:</b>
                                <p>{{ $visit?->attendingOfficer?->full_names }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mb-2">
                        <a
                            href="tel:{{ $visit->patient->telephone }}"
                            class="btn btn-outline-primary rounded-pill me-2 rx-font-size-sm"
                        >
                            <i class="fa fa-phone"></i>
                            Call
                        </a>
                        <a
                            href="{{ route('scheduler.sms') }}"
                            target="_blank"
                            class="btn btn-primary rounded-pill rx-font-size-sm text-white"
                        >
                            <i class="ri-message-2-fill"></i>
                            SMS
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div id="graph"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var temp_value_all = <?php echo json_encode($temp_value_all); ?>;
        var respiratory_value_all = <?php echo json_encode($respiratory_value_all); ?>;
        var blood_pressure_systolic_value_all = <?php echo json_encode($blood_pressure_systolic_value_all); ?>;
        var blood_pressure_diastolic_value_all = <?php echo json_encode($blood_pressure_diastolic_value_all); ?>;
        var blood_sugar_value_all = <?php echo json_encode($blood_sugar_value_all); ?>;
        var pulse_value_all = <?php echo json_encode($pulse_value_all); ?>;
        var oxygen_value_all = <?php echo json_encode($oxygen_value_all); ?>;
        var date_value_all = <?php echo json_encode($date_value_all); ?>;
        var random_blood_sugar_value_all = <?php echo json_encode($random_blood_sugar_value_all); ?>;
        var fasting_blood_sugar_value_all = <?php echo json_encode($fasting_blood_sugar_value_all); ?>;

        Highcharts.chart('graph', {
            title: {
                text: 'Observation Chart ',
            },
            subtitle: {
                text: '',
            },
            xAxis: {
                categories: date_value_all,
            },
            yAxis: {
                title: {
                    text: '',
                },
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                },
            },
            series: [
                {
                    name: 'Temperature',
                    data: temp_value_all,
                },
                {
                    name: 'Respiratory',
                    data: respiratory_value_all,
                },

                {
                    name: 'Systolic',
                    data: blood_pressure_systolic_value_all,
                },

                {
                    name: 'Diastolic',
                    data: blood_pressure_diastolic_value_all,
                },

                // {
                //     name: 'Blood Sugar',
                //     data: blood_sugar_value_all,
                // },
                {
                    name: 'Random Blood Sugar',
                    data: random_blood_sugar_value_all,
                },
                {
                    name: 'Fasting Blood Sugar',
                    data: fasting_blood_sugar_value_all,
                },
                {
                    name: 'Pulse',
                    data: pulse_value_all,
                },

                {
                    name: 'Oxygen',
                    data: oxygen_value_all,
                },
            ],
            responsive: {
                rules: [
                    {
                        condition: {
                            maxWidth: 500,
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom',
                            },
                        },
                    },
                ],
            },
        });
    </script>
@endsection
