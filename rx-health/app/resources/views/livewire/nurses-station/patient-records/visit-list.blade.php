<div>
    @include('livewire.nurses-station.patient-records.includes.search-patient')

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="mb-3 w-100 table table-borderless table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>PATIENT</th>
                                <th>VISIT No</th>
                                <th>VISIT TYPE</th>
                                <th>VISIT DATE</th>
                                <th>WAITING TIME</th>
                                <th>STATUS</th>
                                <th>Forward To</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits as $visit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>
                                        {{ $visit->patient->full_name_title }}
                                    </td>
                                    <td>{{ $visit->visit_number }}</td>
                                    <td>
                                        @if ($visit->serviceType->code == 'INP')
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-warning"></i>
                                            </span>
                                            <span class="font-weight-bold text-warning">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @elseif ($visit->serviceType->code == 'OUTP')
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-success"></i>
                                            </span>
                                            <span class="font-weight-bold text-success">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @else
                                            <span class="schedule-icon">
                                                <i class="ri-checkbox-blank-circle-fill text-primary"></i>
                                            </span>
                                            <span class="font-weight-bold text-primary">
                                                {{ $visit->serviceType->name }}
                                            </span>
                                        @endif

                                        @if ($visit->emergency_service)
                                            <i
                                                class="ri-alert-fill text-danger"
                                                data-bs-toggle="tooltip"
                                                title="Emergency Service"
                                            ></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ now()->parse($visit->visit_date)->format('jS F Y') }}
                                    </td>
                                    <td>
                                        <x-patient-waiting :visit="$visit" :current_location="'nurses'" />
                                    </td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn {{ $visit->status == 'in_use' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($visit->status) }}
                                        </button>
                                    </td>
                                    <td>
                                        <livewire:re-usable-components.visit-session-location-change
                                            :visit="$visit"
                                            :locations="$this->locations"
                                            :key="$visit->id"
                                        />
                                    </td>
                                    <td>
                                        <a
                                            href="#?"
                                            title="Create {{ $type }}"
                                            {{-- data-bs-toggle="modal" --}}
                                            {{-- data-bs-target="#add_vital{{ $visit->id }}" --}}
                                            wire:click="showAdd{{ $type }}Modal('{{ $visit->visit_number }}','{{ $visit->patient->id }}')"
                                        >
                                            <i class="ri-add-line text-success icons-base"></i>
                                        </a>
                                        <a
                                            href="#?"
                                            title="View Latest {{ $type }}"
                                            {{-- data-bs-toggle="modal" --}}
                                            {{-- data-bs-target="#show_vital{{ $visit->vitals->first()->id }}" data-bs-target="#show_vital{{ $visit->id }}" --}}
                                            wire:click="openShowLatest{{ $type }}Modal('{{ $visit->visit_number }}')"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                        <a
                                            href="#?"
                                            title="Edit Latest {{ $type }}"
                                            data-bs-toggle="modal"
                                            wire:click="openEditLatest{{ $type }}Modal('{{ $visit->visit_number }}')"
                                        >
                                            <i class="me-2 ri-edit-line text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="13" class="w-100 text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $visits->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}

    {{-- dressing --}}
    @include('livewire.nurses-station.patient-records.modals.dressing.edit')
    @include('livewire.nurses-station.patient-records.modals.dressing.show')
    @include('livewire.nurses-station.patient-records.modals.dressing.create')

    {{-- injection --}}
    @include('livewire.nurses-station.patient-records.modals.injection.edit')
    @include('livewire.nurses-station.patient-records.modals.injection.show')
    @include('livewire.nurses-station.patient-records.modals.injection.create')

    {{-- vitals --}}
    @include('livewire.nurses-station.patient-records.modals.vitals.edit')
    @include('livewire.nurses-station.patient-records.modals.vitals.show')
    @include('livewire.nurses-station.patient-records.modals.vitals.create')
</div>

@script
    <script>
        const modal_type = '{{ strtolower($type) }}';
        console.log(modal_type);
        $wire.on('close_add_' + modal_type + '_modal', function () {
            $('#add_' + modal_type).modal('hide');
        });
        $wire.on('open_add_' + modal_type + '_modal', function () {
            $('#add_' + modal_type).modal('show');
        });
        $wire.on('close_edit_' + modal_type + '_modal', function () {
            $('#edit_' + modal_type).modal('hide');
        });
        $wire.on('open_edit_' + modal_type + '_modal', function () {
            $('#edit_' + modal_type).modal('show');
        });
        $wire.on('open_show_' + modal_type + '_modal', function () {
            $('#show_' + modal_type).modal('show');
        });
    </script>
@endscript
