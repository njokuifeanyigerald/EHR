@props([
    'visit',
    'show_medical_notes_heading' => true,
])

<div class="card bg-light">
    <div class="card-body">
        @if ($show_medical_notes_heading)
            <h3 class="font-weight-bolder">Medical Notes</h3>
        @endif

        <div class="row d-flex justify-content-between">
            <div class="col-4">
                <div class="form-group">
                    <label>
                        <u>
                            <h5 class="font-weight-bold">Presenting Complaints</h5>
                        </u>
                    </label>
                    <br />
                    {{-- {{  }} --}}
                    <label>
                        @if ($visit->medicalRecords->where('record_type', 'Presenting Complaints')->first())
                            @foreach (json_decode($visit->medicalRecords->where('record_type', 'Presenting Complaints')->first()?->record_data) as $record)
                                {{ $record }},&nbsp;
                            @endforeach
                        @else
                            N/A
                        @endif
                    </label>
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
                    <label>
                        {{ json_decode($visit->medicalRecords->where('record_type', 'History of Complaints')->first()?->record_data) ?? ' N/A' }}
                    </label>
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
                    <label>
                        {{ json_decode($visit->medicalRecords->where('record_type', 'Past Medical History')->first()?->record_data) ?? ' N/A' }}
                    </label>
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
                    <label>
                        @if (json_decode($visit->medicalRecords->where('record_type', 'Drug History')->first()))
                            @foreach (json_decode($visit->medicalRecords->where('record_type', 'Drug History')->first()?->record_data) as $record)
                                {{ $record }},&nbsp;
                            @endforeach
                        @else
                            N/A
                        @endif
                    </label>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group text-wrap">
                    <label>
                        <u>
                            <h5 class="font-weight-bold">Social History</h5>
                        </u>
                    </label>
                    <br />
                    <label>
                        {{ json_decode($visit->medicalRecords->where('record_type', 'Social History')->first()?->record_data) ?? ' N/A' }}
                    </label>
                </div>
            </div>
            {{--
                <div class="col-4">
                <div class="form-group">
                <label><u>
                <h5 class="font-weight-bold">
                Allergy confirm</h5>
                </u></label> <br>
                
                <span>
                
                @if (json_decode($visit->medicalRecords->where('record_type', 'Allergy')->first()))
                @forelse (json_decode($visit->medicalRecords->where('record_type', 'Allergy')->first()?->record_data) as $record)
                <label>
                <h5 class="font-weight-bold">
                {{ $loop->iteration }}. <u>
                Allergy:
                </u>
                </h5>
                {{ $record->allergy }}
                ,&nbsp;
                </label>
                <br>
                <span>
                <h6 class="font-weight-bold">
                <u>
                Reaction
                </u>
                </h6>
                <ul>
                @foreach ($record->allergy_reactions as $reaction)
                <li>
                {{ $reaction }}
                </li>
                @endforeach
                </ul>
                </span>
                <span>
                <h6 class="font-weight-bold">
                <u>
                Severity
                </u>
                </h6>
                {{ $record->allergy_severity }}
                </span>
                <span>
                <h6 class="font-weight-bold">
                <u>
                Status
                </u>
                </h6>
                {{ $record->allergy_status }}
                </span>
                <br>
                @empty
                No Record Found
                @endforelse
                @else
                No Record Found
                @endif
                
                </span>
                
                </div>
                </div>
            --}}

            <div class="col-12">
                <div class="form-group">
                    <label>
                        <u>
                            <h5 class="font-weight-bold">Review of Systems</h5>
                        </u>
                    </label>
                    <br />

                    @forelse (json_decode($visit->medicalRecords->where('record_type', 'Review Of Systems')->first()?->record_data, true) ?? [] as $group => $groupData)
                        <div>
                            Group:
                            <u style="color: #000000">{{ $group }}</u>
                        </div>
                        @foreach ($groupData as $itemName => $itemData)
                            <li>
                                Check:
                                <span style="color: #000000">{{ $itemName }},</span>
                                &nbsp;&nbsp;Comment:
                                <span style="color: #000000">
                                    {{ $itemData['comment'] ?? 'n/a' }}
                                </span>
                                &nbsp;&nbsp; Response:
                                <span style="color: #000000">
                                    {{ $itemData['response'] ?? 'n/a' }}
                                </span>
                                &nbsp;
                            </li>
                        @endforeach
                    @empty
                        No Record Found
                    @endforelse
                </div>
            </div>
        </div>
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
                    {{-- @dd() --}}
                    @forelse ($visit->visitDiagnosis as $visitDiagnosis)
                        <li style="list-style: none">
                            {{ $visitDiagnosis->diagnosis->disease }}
                            <span
                                style="font-size: x-small"
                                class="{{ $visitDiagnosis->status == 'Confirmed' ? 'text-success' : 'text-danger' }}"
                            >
                                {{ $visitDiagnosis->status }}
                            </span>
                        </li>
                    @empty
                        No record Found
                    @endforelse
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
                    @forelse ($visit->visitDetails->where('item.category.category_name', 'Laboratory') as $investigation)
                        <li style="list-style: none">
                            <span style="color: #000000">
                                {{ $investigation->item->item_name }}
                            </span>
                        </li>
                    @empty
                        No Record Found
                    @endforelse
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
                    @forelse ($visit->visitDetails->where('item.category.category_name', 'Drugs') as $prescription)
                        <li style="list-style: none">
                            <span style="color: #000000">{{ $prescription->item->item_name }} :</span>
                            {{ $prescription->dose . ' ' . $prescription->dosage_unit . ' ' . $prescription->frequency . ' ' . $prescription->days . ' days ' . $prescription->route }}
                        </li>
                    @empty
                        No Record Found
                    @endforelse
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
                    @forelse ($visit->visitDetails->where('item.category.category_name', 'Medical') as $procedure)
                        <li style="list-style: none">
                            <span style="color: #000000">
                                {{ $procedure->item->item_name }}
                                :
                            </span>
                            {{ now()->parse($procedure->procedure_date)->format('jS F Y') }}
                        </li>
                    @empty
                        No Record Found
                    @endforelse
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>
                        <u>
                            <h5 class="font-weight-bold">Nurses Orders</h5>
                        </u>
                    </label>
                    <br />
                    @forelse ($visit->medicalRecords->where('record_type', 'Nurses Order') as $order)
                        <li style="list-style: none">
                            <p>
                                {{ json_decode($order->record_data)->message }}
                            </p>
                        </li>
                    @empty
                        No Record Found
                    @endforelse
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

                    @forelse ($visit->medicalRecords->where('record_type', 'Doctors Note') as $note)
                        <li style="list-style: none">
                            <p>
                                {{ json_decode($note->record_data)->message }}
                            </p>
                        </li>
                    @empty
                        No Record Found
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
