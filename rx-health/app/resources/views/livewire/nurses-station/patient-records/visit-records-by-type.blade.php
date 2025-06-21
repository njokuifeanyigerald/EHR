<div>
    @include('livewire.nurses-station.patient-records.includes.search-patient')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="mb-3 w-100 table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="No">No</th>
                                <th scope="col" data-sortable="true" data-field="patient">PATIENT</th>
                                <th scope="col" data-sortable="true" data-field="folder number">Folder Number</th>
                                <th scope="col" data-sortable="true" data-field="patient type">Patient Type</th>
                                <th scope="col" data-sortable="true" data-field="record type">RECORD TYPE</th>
                                {{-- <th scope="col" data-sortable="true" data-field="date signed">DATE SIGNED</th> --}}
                                <th scope="col" data-sortable="true" data-field="action">Action</th>
                                {{-- <th scope="col" data-sortable="true" data-field="action">ACTION</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($medical_records as $medical_record)
                                <tr
                                    {{-- title="view Visits" data-toggle="wire:click" --}}
                                    class="clickable-cursor"
                                >
                                    <td scope="row">
                                        <div class="w-100">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100">
                                            {{ $medical_record->patient->full_name_title ?? 'N\A' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100">
                                            {{ $medical_record->patient->new_folder_number ?? 'N\A' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100">
                                            {{ Str::headline($medical_record->patient->billingMode->name) }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="w-100">
                                            {{ ucfirst($type) }}
                                        </div>
                                    </td>
                                    {{--
                                        <td>
                                        <div class="w-100">
                                        {{ now()->parse($medical_record->created_at)->format('jS F Y') }}
                                        </div>
                                        </td>
                                    --}}
                                    <td class="text-center">
                                        <a
                                            href="{{ route('nurses-station.patient', ['type' => $type, 'id' => $medical_record->patient_id]) }}"
                                            title="View"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $medical_records->links() }}
            </div>
        </div>
    </div>
</div>
