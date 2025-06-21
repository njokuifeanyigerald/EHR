<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title me-1">
                        <h4 class="card-title">Patient in Ward</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <livewire:re-usable-components.visit-session-location-change :visit="$this->visit" />
                    </div>
                </div>
            </div>
        </div>

        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        @include('livewire.re-usable-components.consultation-patient-side-info', ['visit' => $this->visit])

        <div class="col-md-10">
            {{-- <div class="iq-card"> --}}
            {{-- <div class="iq-card-body"> --}}
            <div
                x-data="{
                    mainDiv: true,
                    openWardOverview: false,
                    openPrescriptions: false,
                    openTreatmentSheet: false,
                    openObservation: false,
                    openNursesNotes: false,
                }"
            >
                <div x-show="mainDiv" x-transition class="row">
                    @include(
                        'livewire.consultation.includes.action_card_template',
                        [
                            'tab_name' => 'openWardOverview',
                            'mainDiv' => 'mainDiv',
                            'title' => 'Medical Overview',
                            'icon' => 'la la-globe',
                            'color' => 'primary',
                        ]
                    )

                    @include(
                        'livewire.consultation.includes.action_card_template',
                        [
                            'tab_name' => 'openPrescriptions',
                            'mainDiv' => 'mainDiv',
                            'title' => 'Prescriptions',
                            'icon' => 'la la-pills',
                            'color' => 'success',
                        ]
                    )

                    @include(
                        'livewire.consultation.includes.action_card_template',
                        [
                            'tab_name' => 'openTreatmentSheet',
                            'mainDiv' => 'mainDiv',
                            'title' => 'Treatment Sheet',
                            'icon' => 'la la-file-prescription',
                            'color' => 'danger',
                        ]
                    )

                    @include(
                        'livewire.consultation.includes.action_card_template',
                        [
                            'tab_name' => 'openObservation',
                            'mainDiv' => 'mainDiv',
                            'title' => 'Observation Chart',
                            'icon' => 'la la-heartbeat',
                            'color' => 'warning',
                        ]
                    )

                    @include(
                        'livewire.consultation.includes.action_card_template',
                        [
                            'tab_name' => 'openNursesNotes',
                            'mainDiv' => 'mainDiv',
                            'title' => 'Nurses Notes',
                            'icon' => 'la la-user-nurse',
                            'color' => 'secondary',
                        ]
                    )
                </div>

                <div x-show="openWardOverview" x-transition class="row">
                    @include('livewire.consultation.ward-rounds.patient-in-ward.overview.index')
                </div>

                <div x-show="openPrescriptions" x-transition class="row">
                    @include('livewire.consultation.ward-rounds.patient-in-ward.prescriptions.index')
                </div>

                <div x-show="openTreatmentSheet" x-transition class="row">
                    @include('livewire.consultation.ward-rounds.patient-in-ward.treatment-sheet.index')
                </div>

                <div x-show="openObservation" x-transition class="row">
                    @include('livewire.consultation.ward-rounds.patient-in-ward.observation.index')
                </div>

                <div x-show="openNursesNotes" x-transition class="row">
                    @include('livewire.consultation.ward-rounds.patient-in-ward.nurses_notes.index')
                </div>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
