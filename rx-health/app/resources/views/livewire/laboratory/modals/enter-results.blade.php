<div>
    {{-- Enter Results Modal --}}
    <div wire:ignore.self id="enter_results_data_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-chart-line me-2"></i>
                        {{ Str::headline($this->title) }} - {{ $this->lab_templates_and_comment?->item_name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width: 3%">#</th>
                                    <th style="width: 20%">Test</th>
                                    <th style="width: 40%">Result Value</th>
                                    <th style="width: 6%">Gender</th>
                                    <th style="width: 14%">Range</th>
                                    <th style="width: 14%">Unit</th>
                                    <th style="width: 14%">User</th>
                                    <th style="width: 14%">Last Updated</th>
                                    @if ($this->type == 'completed_tests')
                                        <th style="width: 14%">App. Status</th>
                                        {{-- <th style="width: 14%">Action</th> --}}
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->lab
                                        ?->labResults()
                                        ?->where('lab_number', $this->lab_number)
                                        ?->get() ?? []
                                    as $template)
                                    <tr class="sms_template_rw_">
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- {{ $template->id }} --}}
                                        <td>{{ $template->lab_sub_test_name }}</td>
                                        <td>
                                            @if ($template->approved_status == 'pending')
                                                <input
                                                    tabindex="1"
                                                    name="result_value_"
                                                    id="result_value_"
                                                    class="form-control text-wrap"
                                                    min="{{ $template->result_type == 'range' ? $template->start : '' }}"
                                                    max="{{ $template->result_type == 'range' ? $template->end : '' }}"
                                                    type="{{ $template->result_type == 'range' ? 'number' : 'text' }}"
                                                    wire:model.blur="result.{{ $template->id }}.result_value"
                                                    wire:change="updateResult({{ $template->id }})"
                                                />
                                            @else
                                                {{ $result[$template->id]['result_value'] }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                {{ $template->gender }}
                                            </div>
                                        </td>
                                        <td>
                                            {!!
                                                $template->result_type == 'range'
                                                    ? '(' .
                                                        $template->start .
                                                        ' -> ' .
                                                        $template->end .
                                                        ')' .
                                                        ($template->power_of_10 != null ? ' x10 <sup>' . $template->power_of_10 . '</sup>' : '')
                                                    : '--'
                                            !!}
                                        </td>
                                        <td>{{ $template->units }}</td>
                                        <td>{{ $result[$template->id]['user'] ?? 'N/A' }}</td>
                                        <td>
                                            {{ $result[$template->id]['updated_at'] == null ? 'N/A' : now()->parse($result[$template->id]['updated_at']) }}
                                        </td>
                                        @if ($this->type == 'completed_tests')
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-{{ $template->approved_status == 'pending' ? 'warning' : 'success' }}"
                                                >
                                                    {{ $template->approved_status == 'pending' ? 'Pending' : 'Approved' }}
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No Template Found</td>
                                    </tr>
                                @endforelse

                                <tr class="sms_template_rw_">
                                    <td colspan="2">Comments / Notes</td>
                                    <td colspan="{{ $this->type == 'enter_results' ? '6' : '7' }}">
                                        @if (

                                            $this->lab
                                                ?->labResults()
                                                ->where('approved_status', 'pending')
                                                ->count() > 0                                        )
                                            <textarea
                                                name="comments_notes"
                                                id="comments_notes"
                                                class="form-control"
                                                wire:model.blur="comments"
                                            ></textarea>
                                        @else
                                            {{ $comments }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if ($this->type == 'enter_results')
                        <button wire:click="enterResults" class="btn btn-primary">
                            Click to Finish this Diagnostics
                        </button>
                    @endif

                    @if (

                        $this->type != 'enter_results' &&
                        $this->lab
                            ?->labResults()
                            ->where('approved_status', 'pending')
                            ->count() > 0                    )
                        <button wire:click="approveAllResults" class="btn btn-primary">Approve All</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('openEnterResultsFormContentModal', function () {
            $('#enter_results_data_').modal('show');
        });
    </script>
@endscript
