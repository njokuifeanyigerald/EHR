<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive" wire:ignore>
                    <table
                        data-classes="table table-hover"
                        data-toggle="table"
                        data-sortable="true"
                        data-pagination="true"
                        data-filter-control="true"
                        data-show-toggle="true"
                        data-show-columns="true"
                        data-page-size="15"
                        data-buttons-class="light"
                        data-search="true"
                        data-search-align="left"
                    >
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="No">No</th>
                                <th scope="col" data-sortable="true" data-field="patient">PATIENT</th>
                                <th scope="col" data-sortable="true" data-field="folder number">Folder Number</th>
                                <th scope="col" data-sortable="true" data-field="patient type">Patient Type</th>
                                <th scope="col" data-sortable="true" data-field="record type">RECORD TYPE</th>
                                <th scope="col" data-sortable="true" data-field="date signed">DATE SIGNED</th>
                                <th scope="col" data-sortable="true" data-field="action">Action</th>
                                {{-- <th scope="col" data-sortable="true" data-field="action">ACTION</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vitals as $vital)
                                <tr
                                    {{-- title="view Visits" data-toggle="wire:click" --}}
                                    class="clickable-cursor"
                                >
                                    <td scope="row">
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            {{ $vital->patient->title . ' ' . $vital->patient->surname . ' ' . $vital->patient->first_name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            {{ $vital->folder_number ?? 'N\A' }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            {{ Str::headline($vital->patient->billingMode->name) }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            Vitals
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-100" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                            {{ now()->parse($vital->created_at)->format('jS F Y') }}
                                        </div>
                                    </td>
                                    <td class="text-center" wire:click="openVitalGroupModal({{ $vital->patient_id }})">
                                        <a href="{{ route('vitals.patient', $vital->patient_id) }}" title="View">
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self id="show_vitals_grouped" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Visits and Vitals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    @if ($this->selected_patient)
                        <table
                            data-classes="table table-hover"
                            data-pagination="true"
                            data-show-columns="true"
                            data-page-size="15"
                        >
                            <thead>
                                <tr>
                                    <th data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="patient">PATIENT</th>
                                    <th scope="col" data-sortable="true" data-field="visit number">VISIT NUMBER</th>
                                    <th scope="col" data-sortable="true" data-field="visit date">VISIT DATE</th>
                                    <th scope="col" data-sortable="true" data-field="record type">RECORD TYPE</th>
                                    <th scope="col" data-sortable="true" data-field="date signed">DATE SIGNED</th>
                                    {{-- <th scope="col" data-sortable="true" data-field="action">ACTION</th> --}}
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('open_vital_grouped_modal', function () {
            $('#show_vitals_grouped').modal('show');
        });
    </script>
@endscript
