<div class="row">
    @include('livewire.nurses-station.includes.patient-info', ['patient' => $patient])
    <div class="col-lg-12">
        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <table
                        class="table table-hover table-striped"
                        {{--
    data-classes="table table-hover"
    data-toggle="table"
    data-pagination="true"
    data-page-size="15"
    data-buttons-class="light"
--}}
                    >
                        <thead>
                            <tr class="w-100 col-lg-12">
                                <th class="col" data-field="No" style="width: 10%">No</th>
                                <th class="col" data-field="visit date" style="width: 30%">Attending Officer</th>
                                <th class="col" data-field="visit number" style="width: 20%">VISIT NUMBER</th>
                                <th class="col" data-field="visit date" style="width: 20%">VISIT DATE</th>

                                <th class="col" data-field="visit date" style="width: 20%">Visit Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits ?? collect() as $visit)
                                <tr
                                    class="accordion col-lg-12 w-100 clickable-cursor"
                                    id="myAccordion{{ $visit->id }}"
                                >
                                    <td colspan="5">
                                        <table class="w-100">
                                            <tbody>
                                                <tr class="w-100 col-lg-12">
                                                    <td
                                                        class="col"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $visit->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $visit->id }}"
                                                        style="width: 10%"
                                                    >
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td
                                                        class="col"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $visit->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $visit->id }}"
                                                        style="width: 30%"
                                                    >
                                                        {{ $visit->attendingOfficer->title . ' ' . $visit->attendingOfficer->first_name . ' ' . $visit->attendingOfficer->last_name }}
                                                    </td>
                                                    <td
                                                        class="col"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $visit->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $visit->id }}"
                                                        style="width: 20%"
                                                    >
                                                        {{ $visit->visit_number }}
                                                    </td>
                                                    <td
                                                        class="col"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $visit->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $visit->id }}"
                                                        style="width: 20%"
                                                    >
                                                        {{ now()->parse($visit->visit_date)->format('jS F Y') }}
                                                    </td>
                                                    <td
                                                        class="col"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $visit->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="collapse{{ $visit->id }}"
                                                        style="width: 20%"
                                                    >
                                                        {{ Str::headline($visit->serviceType->name) }}
                                                    </td>
                                                </tr>
                                                <tr
                                                    class="accordion-collapse collapse"
                                                    id="collapse{{ $visit->id }}"
                                                    aria-labelledby="headingOne"
                                                    data-bs-parent="#myAccordion"
                                                >
                                                    <td colspan="5">
                                                        <table class="w-100">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="5">
                                                                        @if ($type == 'vitals')
                                                                            @include('livewire.nurses-station.patient-records.includes.vitals-group-table')
                                                                        @elseif ($type == 'dressing')
                                                                            @include('livewire.nurses-station.patient-records.includes.dressing-group-table')
                                                                        @elseif ($type == 'injection')
                                                                            @include('livewire.nurses-station.patient-records.includes.injection-group-table')
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Visit Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
