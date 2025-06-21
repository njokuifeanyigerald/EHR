<?php

use App\Helpers\CountryHelper;

$countryHelper = new CountryHelper();

?>

<div>
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
                                <th scope="col" data-sortable="true" data-field="Visit ID">Visit ID</th>
                                <th scope="col" data-sortable="true" data-field="Gender">Gender</th>
                                <th scope="col" data-sortable="true" data-field="Status">Status</th>
                                <th scope="col" data-sortable="true" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $patients->firstItem() - 1 }}</th>
                                    <td>
                                        {{-- {{ $patient->visits->first()->visitDetails->first()->created_at ?? 'N/A' }} --}}
                                        {{ $patient?->visits?->first()?->visitDetails?->first()?->created_at ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $patient->getFullnameAndTitle() ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $patient?->visits?->first()?->visit_number ?? 'N/A' }}
                                    </td>
                                    <td>
                                        <x-patient-waiting
                                            :visit="$patient?->visits?->first()"
                                            :current_location="'lab'"
                                        />
                                    </td>
                                    <td>
                                        {{ Str::headline($patient->sex ?? 'N/A') }}
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $patient?->visits?->first()?->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($patient?->visits?->first()?->status) }}
                                        </button>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            {{-- data-bs-toggle="modal" --}}
                                            {{-- data-bs-target="#client_preview{{ $patient->id }}" --}}
                                            wire:click="openModalLabPreview({{ $patient->id }}, '{{ $patient->visits->first()->visit_number }}')"
                                            class="btn btn-outline-primary px-1 py-0 me-1"
                                            title="Preview"
                                        >
                                            <i class="ri-eye-line m-0 icons-sm"></i>
                                            Preview
                                        </a>
                                        <a
                                            wire:click="openModalAddLab({{ $patient->id }},'{{ $patient->visits->first()->visit_number }}')"
                                            {{-- data-bs-toggle="modal" data-bs-target="#add_labs" --}}
                                            class="btn btn-outline-success px-1 py-0"
                                            title="Add Radiology"
                                        >
                                            <i class="ri-add-line m-0 icons-sm"></i>
                                            Add Radiology
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Pending Client</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $patients->links() }}
            </div>
        </div>
    </div>

    {{-- Preview Modal --}}
    @include('livewire.radiology.modals.pending_client_preview')
    <!-- Add Radiology Modal -->
    @include('livewire.radiology.modals.add_radios')
</div>
@script
    <script>
        $wire.on('openModalLabPreview', function () {
            $('#client_preview_radiology').modal('show');
        });
        $wire.on('closeModalLabPreview', function () {
            $('#client_preview_radiology').modal('hide');
            $('#pending_clientsLab').bootstrapTable('load', @json($patients));
        });
        $wire.on('openModalAddLab', function () {
            $('#add_radiology').modal('show');
        });
        $wire.on('closeModalAddLab', function () {
            $('#add_radiology').modal('hide');
        });
    </script>
@endscript
