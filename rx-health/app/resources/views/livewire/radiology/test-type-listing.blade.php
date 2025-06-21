<div class="row">
    <!-- Header title -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>{{ Str::headline($this->type) }}</h4>
                </div>
                {{--
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                    <div class="row">
                    <div class="col-sm-10 row">
                    <label class="control-label col-sm-1 align-self-center mb-0" for="date">Start Date:</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control my-2" id="date" />
                    </div>
                    <label class="control-label col-sm-1 align-self-center mb-0" for="date">End Date:</label>
                    <div class="col-sm-5">
                    <input type="date" class="form-control my-2" id="date" />
                    </div>
                    </div>
                    <div class="col-sm-2 align-self-center">
                    <a href="#" class="btn btn-primary align-self-center">Load</a>
                    </div>
                    </div>
                    </div>
                --}}
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.patient.patient-search-input')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="No">No</th>
                                <th scope="col" data-sortable="true" data-field="Time">Time</th>
                                <th scope="col" data-sortable="true" data-field="Patient">Patient</th>
                                <th scope="col" data-sortable="true" data-field="Lab. No.">Lab. No.</th>
                                <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                {{-- <th scope="col" data-sortable="true" data-field="Sample Collector">Sample Collector</th> --}}
                                {{-- <th scope="col" data-sortable="true" data-field="Notification">Notification</th> --}}
                                {{-- <th scope="col" data-sortable="true" data-field="Notified Det.">Notified Det.</th> --}}
                                <th scope="col" data-sortable="true" data-field="Apr. Status">Apr. Status</th>
                                <th scope="col" data-sortable="true" data-field="Status">Status</th>
                                <th scope="col" data-sortable="true" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($lab_results as $lab_result)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>{{ $lab_result->updated_at }}</td>
                                    <td>{{ $lab_result->patient->full_name_title }}</td>
                                    <td>{{ $lab_result->lab_number }}</td>
                                    <td>{{ Str::headline($lab_result->patient->sex) }}</td>
                                    {{-- <td></td> --}}
                                    {{--
                                        <td>
                                        <span class="btn btn-sm text-warning">
                                        <i class="fa fa-bell"></i>
                                        Notified (
                                        <span id="notification">0</span>
                                        )
                                        </span>
                                        </td>
                                    --}}
                                    {{--
                                        <td>
                                        <span>
                                        <i class="fw-bold">User</i>
                                        :
                                        </span>
                                        <br />
                                        <span>
                                        <i class="fw-bold">Last update :</i>
                                        (30th April 2024 2:11 pm)
                                        </span>
                                        </td>
                                    --}}
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $lab_result->approved_status == 'pending' ? 'iq-bg-warning' : 'iq-bg-success ' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($lab_result->approved_status) }}
                                        </button>
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $lab_result->status == 'pending' ? 'iq-bg-warning' : 'iq-bg-success ' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($lab_result->status) }}
                                        </button>
                                    </td>
                                    <td class="text-center" style="width: 150px">
                                        <a
                                            href="{{ route('radiology.show', ['lab_number' => $lab_result->lab_number, 'type' => $this->type]) }}"
                                            class="btn btn-outline-primary px-1 py-0 me-1"
                                            title="Client Diagnostics"
                                        >
                                            <i class="ri-eye-line m-0 icons-sm"></i>
                                            View Details
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $lab_results->links() }}
            </div>
        </div>
    </div>
</div>
