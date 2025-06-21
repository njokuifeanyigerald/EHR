@props([
    'visits' => [],
])

<div class="mb-1 mt-2">
    @if (count($visits) > 0)
        <div class="d-flex">
            <div class="bg-light-primary p-0">
                <i class="ri-message-fill icons-base"></i>
            </div>
            <div class="p-2 w-100">
                <div
                    style="cursor: pointer"
                    class="bg-light-primary"
                    onclick="$('.historyDetails_1all').fadeToggle('slow')"
                >
                    <div class="chat-message float-none text-start">
                        <p>Click to view details</p>
                    </div>
                </div>
                <div style="display: none" class="historyDetails_1all mt-2 ml-10 mx-3">
                    <div class="card bg-light">
                        <div class="card-body">
                            <h3 class="font-weight-bolder">Medical Notes</h3>
                            <div class="row d-flex justify-content-between">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>
                                            <u>
                                                <h5 class="font-weight-bold">Presenting Complaints</h5>
                                            </u>
                                        </label>
                                        @php
                                            $medEmpty = true;
                                        @endphp

                                        @foreach ($visits as $visit)
                                            @if ($visit->medicalRecords->where('record_type', 'Presenting Complaints')->first())
                                                <label>
                                                    @foreach (json_decode($visit->medicalRecords->where('record_type', 'Presenting Complaints')->first()?->record_data) as $record)
                                                        @php
                                                            $medEmpty = false;
                                                        @endphp

                                                        {{ $record }},&nbsp;
                                                    @endforeach

                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $visit->medicalRecords->where('record_type', 'Presenting Complaints')->first()->updated_at->format('jS F Y') }}
                                                    </span>
                                                </label>
                                            @else
                                                @php
                                                    $medEmpty = $medEmpty == false ? false : true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($medEmpty)
                                            No Record Found
                                        @endif

                                        <br />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>
                                            <u>
                                                <h5 class="font-weight-bold">History of Complaints</h5>
                                            </u>
                                        </label>
                                        <br />

                                        @foreach ($visits as $visit)
                                            @forelse ($visit->medicalRecords->where('record_type', 'History of Complaints') as $record)
                                                <label>
                                                    {{ json_decode($record->record_data) }},&nbsp;
                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $record->updated_at->format('jS F Y') }}
                                                    </span>
                                                </label>
                                            @empty
                                                No Record Found
                                            @endforelse
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>
                                            <u>
                                                <h5 class="font-weight-bold">Past Medical History</h5>
                                            </u>
                                        </label>
                                        <br />
                                        @foreach ($visits as $visit)
                                            @forelse ($visit->medicalRecords->where('record_type', 'Past Medical History') as $record)
                                                <label>
                                                    {{ json_decode($record->record_data) }},&nbsp;
                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $record->updated_at->format('jS F Y') }}
                                                    </span>
                                                </label>
                                            @empty
                                                No Record Found
                                            @endforelse
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>
                                            <u>
                                                <h5 class="font-weight-bold">Drug History</h5>
                                            </u>
                                        </label>
                                        <br />
                                        @php
                                            $medDrugHistoryEmpty = true;
                                        @endphp

                                        @foreach ($visits as $visit)
                                            @if ($visit->medicalRecords->where('record_type', 'Drug History')->first())
                                                <label>
                                                    @foreach (json_decode($visit->medicalRecords->where('record_type', 'Drug History')->first()?->record_data) as $record)
                                                        @php
                                                            $medDrugHistoryEmpty = false;
                                                        @endphp

                                                        {{ $record }},&nbsp;
                                                    @endforeach

                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $visit->medicalRecords->where('record_type', 'Drug History')->first()->updated_at->format('jS F Y') }}
                                                    </span>
                                                </label>
                                            @else
                                                @php
                                                    $medDrugHistoryEmpty = $medDrugHistoryEmpty == false ? false : true;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($medDrugHistoryEmpty)
                                            No Record Found
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>
                                            <u>
                                                <h5 class="font-weight-bold">Social History</h5>
                                            </u>
                                        </label>
                                        <br />
                                        @php
                                            $medSocialEmpty = true;
                                        @endphp

                                        @foreach ($visits as $visit)
                                            @foreach ($visit->medicalRecords->where('record_type', 'Social History') as $record)
                                                <label>
                                                    {{ json_decode($record->record_data) }},&nbsp;
                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $record->updated_at->format('jS F Y') }}
                                                    </span>
                                                </label>
                                                @php
                                                    $medSocialEmpty = false;
                                                @endphp
                                            @endforeach
                                        @endforeach

                                        @if ($medSocialEmpty)
                                            No Record Found
                                        @endif

                                        {{--
                                            Introvert and always indoors<span
                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold">28th
                                            September 2023 </span>
                                        --}}
                                    </div>
                                </div>
                                <div class="col-4"></div>

                                <div class="separator separator-dashed separator-border-2 separator-primary mb-5"></div>

                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Diagnosis</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medDiagnosisEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->visitDiagnosis as $visitDiagnosis)
                                                    <li style="list-style: none">
                                                        {{ $visitDiagnosis->diagnosis->disease }}
                                                        <span
                                                            style="font-size: x-small"
                                                            class="{{ $visitDiagnosis->status == 'Confirmed' ? 'text-success' : 'text-danger' }}"
                                                        >
                                                            {{ $visitDiagnosis->status }}
                                                        </span>
                                                        <span
                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                        >
                                                            {{ $visitDiagnosis->updated_at->format('jS F Y') }}
                                                        </span>
                                                    </li>
                                                    @php
                                                        $medDiagnosisEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medDiagnosisEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Investigation</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medLabEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->visitDetails->where('item.category.category_name', 'Laboratory') as $lab)
                                                    <li style="list-style: none">
                                                        <span style="color: #000000">
                                                            {{ $lab->item->item_name }} :
                                                        </span>
                                                    </li>
                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $lab->updated_at->format('jS F Y') }}
                                                    </span>
                                                    @php
                                                        $medLabEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medLabEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Prescriptions</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medPrescriptionEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->visitDetails->where('item.category.category_name', 'Drugs') as $prescription)
                                                    <li style="list-style: none">
                                                        <span style="color: #000000">
                                                            {{ $prescription->item->item_name }} :
                                                        </span>
                                                        {{ $prescription->dose . ' ' . $prescription->dosage_unit . ' ' . $prescription->frequency . ' ' . $prescription->days . ' days ' . $prescription->route }}
                                                    </li>
                                                    <span
                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                    >
                                                        {{ $prescription->updated_at->format('jS F Y') }}
                                                    </span>
                                                    @php
                                                        $medPrescriptionEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medPrescriptionEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Procedure</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medProcedureEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->visitDetails->where('item.category.category_name', 'Medical') as $procedure)
                                                    <li style="list-style: none">
                                                        <span style="color: #000000">
                                                            {{ $procedure->item->item_name }}
                                                            :
                                                        </span>
                                                        <span
                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                        >
                                                            {{ now()->parse($procedure->procedure_date)->format('jS F Y') }}
                                                        </span>
                                                    </li>
                                                    @php
                                                        $medProcedureEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medProcedureEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Nurses Notes</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medNurseNotesEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->medicalRecords->where('record_type', 'Nurses Order') as $order)
                                                    <li style="list-style: none">
                                                        <p>
                                                            {{ json_decode($order->record_data)->message }}
                                                        </p>
                                                        <span
                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                        >
                                                            {{ $order->updated_at->format('jS F Y') }}
                                                        </span>
                                                    </li>
                                                    @php
                                                        $medNurseNotesEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medNurseNotesEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Doctors Note</h5>
                                                </u>
                                            </label>
                                            <br />
                                            @php
                                                $medDoctorNotesEmpty = true;
                                            @endphp

                                            @foreach ($visits as $visit)
                                                @foreach ($visit->medicalRecords->where('record_type', 'Doctors Note') as $note)
                                                    <li style="list-style: none">
                                                        <p>
                                                            {{ json_decode($note->record_data)->message }}
                                                        </p>
                                                        <span
                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                        >
                                                            {{ $note->updated_at->format('jS F Y') }}
                                                        </span>
                                                    </li>
                                                    @php
                                                        $medDoctorNotesEmpty = false;
                                                    @endphp
                                                @endforeach
                                            @endforeach

                                            @if ($medDoctorNotesEmpty)
                                                No Record Found
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>
                                                <u>
                                                    <h5 class="font-weight-bold">Patient Status</h5>
                                                </u>
                                            </label>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        No Visit Found
    @endif
</div>
