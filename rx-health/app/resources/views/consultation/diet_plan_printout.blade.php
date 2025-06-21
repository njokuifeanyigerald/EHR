<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Lab Report</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
        <!-- Bootstrap CSS -->
        <link id="bootstrap-css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('css/typography.css') }}" />
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <!-- Rx style -->
        <link rel="stylesheet" href="{{ asset('css/rx-style.css') }}" />
        <!-- Style-Rtl CSS -->
        <link rel="stylesheet" href="{{ asset('css/style-rtl.css') }}" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-icons/font/bootstrap-icons.css') }}" />
        <!-- Bootstrap table CSS -->
        <link rel="stylesheet" href="{{ asset('packages/bootstrap-table/dist/bootstrap-table.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}" />

        @livewireStyles
        <style>
            .diet-plan-day {
                page-break-after: always;
            }
            .diet-plan-day:last-child {
                page-break-after: auto;
            }
        </style>
    </head>
    <body style="font-size: 12px">
        <div id="loading">
            <div id="loading-center"></div>
        </div>

        {{-- arrange records by day --}}
        @php
            $printable_records[0] = $medical_records->where('record_type', 'Diet Plan Monday')->first();
            $printable_records[1] = $medical_records->where('record_type', 'Diet Plan Tuesday')->first();
            $printable_records[2] = $medical_records->where('record_type', 'Diet Plan Wednesday')->first();
            $printable_records[3] = $medical_records->where('record_type', 'Diet Plan Thursday')->first();
            $printable_records[4] = $medical_records->where('record_type', 'Diet Plan Friday')->first();
            $printable_records[5] = $medical_records->where('record_type', 'Diet Plan Saturday')->first();
            $printable_records[6] = $medical_records->where('record_type', 'Diet Plan Sunday')->first();

            $count = 7;

            foreach ($medical_records->where('record_type', 'Diet Plan Other (Special Diet)') as $key => $value) {
                $printable_records[$count] = $value;
                $count++;
            }

            $printable_records = array_filter($printable_records);
        @endphp

        <div id="printable">
            @foreach ($printable_records as $key => $record)
                <div class="diet-plan-day" id="diet-plan-day-{{ $record->id }}">
                    @php
                        $record_data = json_decode($record->record_data);
                    @endphp

                    <div class="iq-card px-3">
                        <div class="iq-card-body">
                            <div class="row align-items-center">
                                <x-print_header :title="$record->record_type" />
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2 my-3 border-b underline text-center text-black">
                        <div class="fw-bolder" style="font-size: 14px">
                            ***
                            {{
                                ($record_data->diet_plan_type == 'Other (Special Diet)'
                                    ? $record_data->special_diet_name
                                    : $record_data->diet_plan_type) ?? 'General'
                            }}
                            ***
                        </div>
                    </div>

                    <div class="col-12 mt-2 my-3 px-3">
                        {!! $record_data->diet_plan_details ?? '' !!}
                    </div>

                    <div id="footer" class="col-12 mt-5">
                        {{-- date of printing --}}
                        <div class="col-12 mt-3 text-dark text-center">
                            <p class="mb-0 gap-2">
                                Printed Date / Time:
                                <span class="fw-bold">
                                    {{ now()->format('F j, Y, g:i A') }}
                                </span>
                            </p>
                        </div>

                        <div class="text-center col-12 bg-light p-3">
                            <p class="mb-0">
                                Powered by:
                                <span class="fw-bold text-primary">RxHealth</span>
                                &copy;{{ now()->year }}
                            </p>
                        </div>

                        {{-- End of file --}}
                        <div class="col-12 mt-4 mb-4 text-dark text-center border-top border-bottom border-3">
                            <p class="mb-0 -mt-1">End of File</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

        <script>
            window.onload = function () {
                document.getElementById('loading').style.display = 'none';
                // window.print();
                window.print();

                // Livewire.dispatch('labReportsGeneratedSuccessfully');
            };
        </script>
    </body>
</html>
