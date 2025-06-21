<div>
    {{-- All Investigations  Modal --}}
    <div wire:ignore.self id="view_lab_result" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Investigation Result -
                        <span class="text-black fw-bold">
                            {{ $this?->lab?->labResults?->first()?->lab_test_name }}
                        </span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <x-patient_info_lab-results
                                :title="'Specimen Received'"
                                :value="now()->parse($lab?->specimen_collected_at)?->format('F j, Y, g:i A')"
                            />
                            <x-patient_info_lab-results
                                :title="'Approval Date'"
                                :value="now()->parse($lab?->labResults?->first()?->approved_at)?->format('F j, Y, g:i A')"
                            />

                            <x-patient_info_lab-results
                                :title="'Lab Number'"
                                :value="Str::upper($lab?->lab_number)"
                            />
                        </div>
                        @if ($this->type == 'Radiology')
                            {{-- radiology results --}}
                            <div class="mt-4">
                                <p class="mb-0">Result</p>
                                <div class="text-dark bg-white">
                                    @if ($lab?->labResults?->first()?->lab_result)
                                        {!! $lab?->labResults?->first()?->lab_result !!}
                                    @else
                                        <p class="mb-0">N/A</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            {{-- table for lab results --}}
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
                                        @foreach ($lab?->labResults ?? [] as $lab_result)
                                            <tr>
                                                <td scope="col" colspan="4">
                                                    {{ $lab_result?->lab_sub_test_name }}
                                                </td>
                                                <td scope="col" colspan="3" class="text-capitalize">
                                                    {{ $lab_result?->lab_result ?? '-' }}
                                                </td>
                                                <td scope="col" colspan="2">
                                                    {{
                                                        $lab_result?->result_type == 'no_range'
                                                            ? '-'
                                                            : ($lab_result?->lab_result < $lab_result?->start
                                                                ? 'L'
                                                                : ($lab_result?->lab_result > $lab_result?->end
                                                                    ? 'H'
                                                                    : '--'))
                                                    }}
                                                </td>
                                                <td scope="col" colspan="3">
                                                    {!!
                                                        $lab_result->result_type == 'range'
                                                            ? '(' .
                                                                $lab_result->start .
                                                                ' -> ' .
                                                                $lab_result->end .
                                                                ')' .
                                                                ($lab_result->power_of_10 != null ? ' x10 <sup>' . $lab_result->power_of_10 . '</sup>' : '')
                                                            : '--'
                                                    !!}
                                                    {{--
                                                        {!!
                                                        $lab_result?->result_type == 'no_range'
                                                        ? '- ' . $lab_result?->units
                                                        : '(' .
                                                        $lab_result?->start .
                                                        ' - ' .
                                                        $lab_result?->end .
                                                        ') x10<sup>' .
                                                        $lab_result?->power_of_10 .
                                                        '</sup>' .
                                                        $lab_result?->units
                                                        !!}
                                                    --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- label comment --}}
                            <div class="mt-2 col-12 text-left">
                                <p class="mb-0">
                                    Comment -
                                    <span class="text-dark">
                                        {{ $lab?->labResults?->first()?->comments ?? 'N/A' }}
                                    </span>
                                </p>
                            </div>
                        @endif
                        {{-- lab default comment that comes with its own html --}}
                        <div class="mt-2 col-12 text-left">
                            <p class="mb-0">Default Comment</p>
                            <div class="text-dark bg-white">
                                @if ($lab?->labResults?->first()?->labDefaultComment)
                                    {!! $lab?->labResults?->first()?->labDefaultComment?->comment !!}
                                @else
                                    <p class="mb-0">N/A</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
