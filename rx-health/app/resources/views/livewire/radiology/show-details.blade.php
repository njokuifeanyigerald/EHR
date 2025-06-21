<div>
    <!-- Header title -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h5>
                        List of Tests Requested -

                        {{ $patient->getFullnameAndTitle() . ' (' . $patient->age . ', ' . Str::headline($patient->sex) . ')' }}
                    </h5>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    @if ($this->type != 'enter_results')
                        <a
                            class="btn btn-outline-dark px-1 py-1 me-2"
                            wire:click="downloadLabResult('print')"
                            title="Print Test Result"
                        >
                            <i class="fa fa-print"></i>

                            Print Test Result
                        </a>
                        <a
                            class="btn btn-outline-primary px-1 py-1 me-2"
                            title="Download Test Result"
                            wire:click="downloadLabResult('download')"
                        >
                            <i class="fa fa-download"></i>
                            Download Test Result
                        </a>
                        <a class="btn btn-outline-warning px-1 py-1 me-2" title="Send Notification">
                            <i class="fa fa-bell"></i>
                            Send Notification (1)
                        </a>
                    @endif

                    <a
                        class="btn btn-success px-1 py-1"
                        title="Refresh"
                        {{-- wire:navigate --}}
                        href="{{ route('radiology.show', ['type' => $this->type, 'lab_number' => $this->lab_number]) }}"
                    >
                        <i class="fa fa-arrows-rotate"></i>
                        Refresh
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                {{-- <h6>Doctor's Report: N/A</h6> --}}
                <div wire:ignore class="table-responsive">
                    <table
                        data-classes="table table-hover"
                        data-toggle="table"
                        data-sortable="true"
                        data-pagination="true"
                        data-filter-control="true"
                        data-show-columns="true"
                        data-page-size="15"
                        data-buttons-class="light"
                        data-search="true"
                        data-search-align="left"
                        id="labsTable"
                    >
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="No">No</th>
                                <th scope="col" data-sortable="true" data-field="Visit ID">Item</th>
                                <th scope="col" data-sortable="true" data-field="Time">S.C. Time</th>
                                <th scope="col" data-sortable="true" data-field="Item">S. Collector</th>
                                <th scope="col" data-sortable="true" data-field="Status">Status</th>
                                {{-- <th scope="col" data-sortable="true" data-field="Completed By">Completed By</th> --}}
                                {{-- <th scope="col" data-sortable="true" data-field="Completed Date">Completed Date</th> --}}
                                @if ($this->type != 'enter_results')
                                    <th scope="col" data-sortable="true" data-field="Result By">Result By</th>
                                    <th scope="col" data-sortable="true" data-field="Result Date">Result Date</th>
                                    <th scope="col" data-sortable="true" data-field="Appr. Status">Appr. Status</th>
                                    <th scope="col" data-sortable="true" data-field="Appr. By">Appr. By</th>
                                @endif

                                <th scope="col" data-sortable="true" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->labs as $lab)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td title="{{ $lab?->item?->item_name }}">
                                        {{ Str::limit($lab?->item?->item_name, 30, '...') }}
                                    </td>
                                    <td>{{ $lab?->specimen_collected_at }}</td>
                                    <td>{{ $lab?->specimenCollector?->fullName() ?? 'N/A' }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ strtolower($lab?->lab_status) == 'specimen_collected' ? ' iq-bg-warning' : (strtolower($lab?->lab_status) == 'results_entered' ? ' iq-bg-success' : ' iq-bg-danger') }} btn-rounded btn-sm my-0 rounded"
                                        >
                                            {{ Str::headline($lab?->lab_status) }}
                                        </button>
                                    </td>

                                    @if ($this->type != 'enter_results')
                                        <td>
                                            {{ $lab?->labResults->first()?->resultEnteredBy?->fullName() ?? 'N/A' }}
                                        </td>
                                        <td>{{ $lab?->labResults->first()?->result_entered_at }}</td>
                                        <td>
                                            <button
                                                type="button"
                                                class="btn btn-rounded btn-sm my-0 rounded {{ strtolower($lab?->labResults->first()?->approved_status) == 'pending' ? 'iq-bg-warning' : 'iq-bg-success' }}"
                                            >
                                                {{ Str::headline($lab?->labResults->first()?->approved_status) }}
                                            </button>
                                        </td>

                                        <td>{{ $lab?->labResults->first()?->approvedBy?->fullName() ?? 'N/A' }}</td>
                                    @endif

                                    <td class="text-center" style="width: 280px">
                                        @if ($this->type == 'enter_results')
                                            <a
                                                class="btn btn-outline-success p-1 me-1"
                                                wire:click="openLabResultFormModal({{ $lab->id }})"
                                            >
                                                Enter Result
                                            </a>
                                        @else
                                            <a
                                                class="btn btn-outline-success p-1 me-1"
                                                wire:click="openLabResultFormModal({{ $lab->id }})"
                                            >
                                                View Result
                                            </a>
                                        @endif
                                        @if ($lab->source == 'outsource')
                                            <span class="mx-1">|</span>
                                            <a
                                                data-bs-toggle="modal"
                                                data-bs-target="#outsource"
                                                class="btn btn-outline-primary p-1 me-1"
                                            >
                                                Outsource
                                            </a>
                                        @endif

                                        @if ($this->type != 'enter_results')
                                            <span class="mx-1">|</span>
                                            <div
                                                class="custom-control custom-checkbox custom-control-inline d-inline w-25"
                                            >
                                                <input
                                                    wire:model.live="labs_to_print.{{ $lab->id }}"
                                                    type="checkbox"
                                                    class="custom-control-input"
                                                    id="print1_{{ $lab->id }}"
                                                    name="lab.{{ $lab->id }}"
                                                />
                                                <label class="custom-control-label" for="print1_{{ $lab->id }}">
                                                    Print
                                                </label>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end my-2">
                    @if ($this->type == 'enter_results' && $this->mark_as_complete)
                        <button class="btn btn-primary" wire:click="makeAllResultsAsCompleted">
                            Mark All As Complete
                        </button>
                    @endif

                    @if ($this->type != 'enter_results' && $this->mark_as_approved)
                        <button class="btn btn-primary" wire:click="makeAllResultsAsApproved">
                            Mark All As Approved
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <livewire:radiology.modals.enter-results :lab_number="$this->lab_number" :type="$this->type" />
</div>
@script
    <script>
        $wire.on('download_lab_result', (url) => {
            // console.log(url);
            window.open(url, '_blank');
        });
        window.addEventListener('refreshLivewire', () => {
            // console.log('heredkadj');
            Livewire.dispatch('labReportsGeneratedSuccessfully');
        });
    </script>
@endscript
