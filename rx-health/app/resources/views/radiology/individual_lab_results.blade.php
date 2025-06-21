<div class="iq-card px-3" style="page-break-after: always">
    <div class="iq-card-body">
        <div class="row align-items-center">
            <x-print_header :title="'Medical Radiology Report'" />

            <div class="col-sm-12 mt-5 my-3 border rounded-3 p-3 bg-light">
                <div class="row">
                    <x-patient_info_lab-results
                        :title="'Patient Name'"
                        :value="Str::headline($lab->labResults->first()->patient->full_name_title)"
                    />
                    <x-patient_info_lab-results
                        :title="'Gender'"
                        :value="Str::headline($lab->labResults->first()->patient->sex)"
                    />
                    <x-patient_info_lab-results :title="'Age'" :value="$lab->labResults->first()->patient->age" />
                    <x-patient_info_lab-results
                        :title="'Email'"
                        :value="Str::lower($lab->labResults->first()->patient->email)"
                    />
                    <x-patient_info_lab-results
                        :title="'Phone Number'"
                        :value="$lab->labResults->first()->patient->telephone"
                    />
                    <x-patient_info_lab-results
                        :title="'Specimen Received'"
                        :value="now()->parse($lab->specimen_collected_at)->format('F j, Y, g:i A')"
                    />
                    <x-patient_info_lab-results
                        :title="'Approval Date'"
                        :value="now()->parse($lab->labResults->first()->approved_at)->format('F j, Y, g:i A')"
                    />

                    <x-patient_info_lab-results :title="'Print Date'" :value="now()->format('F j, Y, g:i A')" />

                    <x-patient_info_lab-results :title="'Test Number'" :value="Str::upper($lab->lab_number)" />
                </div>
            </div>
            <div class="col-12 mt-2 my-3 border-b underline text-center">
                <div class="border-bottom border-light">
                    Requested:
                    <span class="text-dark">
                        @foreach ($all_lab_requests as $key => $lab_request)
                            <span class="fw-medium">{{ $lab_request }}</span>
                            {{ $key == array_key_last($all_lab_requests) ? '' : ', ' }}
                        @endforeach
                    </span>
                </div>
            </div>

            <div class="col-12 mt-2 my-3 border-b underline text-center text-black">
                <div class="fw-bolder" style="font-size: 14px">
                    ***
                    {{ $lab->lab_category ?? 'General' }}
                    ***
                </div>
            </div>
            <div class="mt-2 col-12 text-left">
                <p class="mb-4 w-100 text-center">
                    {{-- Lab Report - --}}
                    <span class="text-dark fw-bold" style="font-size: 15px">
                        {{ $lab->labResults->first()->lab_test_name }}
                    </span>
                </p>
                {{-- table for lab results --}}
                {{--
                    <div id="lab-results" class="w-100 table-responsive mt-4">
                    <table id="table" class="w-100 table table-borderless">
                    <thead class="table-secondary">
                    <tr>
                    <th scope="col" colspan="4">Test</th>
                    <th scope="col" colspan="3">Result</th>
                    <th scope="col" colspan="2">Flag</th>
                    <th scope="col" colspan="3">Range/Unit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lab->labResults as $lab_result)
                    <tr>
                    <td scope="col" colspan="4">
                    {{ $lab_result->lab_sub_test_name }}
                    </td>
                    <td scope="col" colspan="3" class="text-capitalize">
                    {{ $lab_result->lab_result ?? '-' }}
                    </td>
                    <td scope="col" colspan="2">
                    {{
                    $lab_result->result_type == 'no_range'
                    ? '-'
                    : ($lab_result->lab_result < $lab_result->start
                    ? 'Low'
                    : ($lab_result->lab_result > $lab_result->end
                    ? 'High'
                    : 'Normal'))
                    }}
                    </td>
                    <td scope="col" colspan="3">
                    {!!
                    $lab_result->result_type == 'no_range'
                    ? '- ' . $lab_result->units
                    : '(' .
                    $lab_result->start .
                    ' - ' .
                    $lab_result->end .
                    ') x10
                    <sup>' .
                    $lab_result->power_of_10 .
                    '</sup>
                    ' .
                    $lab_result->units
                    !!}
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                --}}

                {{-- lab results --}}
                <div id="lab-results" class="w-100 table-responsive mt-4">
                    <p class="mb-0 text-black">Result</p>
                    <p class="text-black">{!! $lab->labResults->first()->lab_result !!}</p>
                </div>

                {{-- label comment --}}
                {{--
                    <div class="mt-2 col-12 text-left">
                    <p class="mb-0 text-black">
                    Comment -
                    <span class="text-dark">{{ $lab->labResults->first()->comments ?? 'N/A' }}</span>
                    </p>
                    </div>
                --}}

                {{-- lab default comment that comes with its own html --}}
                <div class="mt-2 col-12 text-left border-top">
                    <p class="mb-0">Default Comment</p>
                    <div class="text-dark bg-white">
                        @if ($lab->labResults->first()->labDefaultComment)
                            {!! $lab->labResults->first()->labDefaultComment->comment !!}
                        @else
                            <p class="mb-0">N/A</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 d-flex justify-content-between text-dark">
                <div class="col-6">
                    <p class="mb-0 gap-2 d-flex">
                        Signature:
                        <span class="fw-bold">.................</span>
                    </p>
                    <p class="mb-0 gap-2 d-flex">
                        Name:
                        <span class="fw-bold">Favour Nwevo</span>
                    </p>
                    <p class="mb-0 gap-2 d-flex">
                        Designation:
                        <span class="fw-bold">Lab Manager</span>
                    </p>
                </div>
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
    </div>
</div>
