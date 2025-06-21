<div>
    <div
        class="row mx-2 tab-pane fade show active"
        id="patient-activities"
        role="tabpanel"
        aria-labelledby="patient-activities-tab"
    >
        <div class="iq-card">
            <div class="iq-card-body pt-4 row">
                <div
                    x-data="{
                        mainDiv: true,
                        openGeneral: false,
                        openGlucose: false,
                        openPregnancy: false,
                        openOperation: false,
                        openOrdersNotes: false,
                    }"
                >
                    <div x-show="mainDiv" x-transition>
                        @include('livewire.nurses-station.inpatient.patient-folder.includes.patient_activities_cards')
                    </div>
                    <div x-show="openGeneral" x-transition>
                        @include(
                            'livewire.consultation.includes.back_button',
                            [
                                'title' => 'General',
                                'tab_name' => 'openGeneral',
                            ]
                        )
                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.general.index
                            :visit="$this->visit"
                        />
                    </div>
                    <div x-show="openGlucose" x-transition>
                        @include(
                            'livewire.consultation.includes.back_button',
                            [
                                'title' => 'Glucose',
                                'tab_name' => 'openGlucose',
                            ]
                        )

                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.glucose.index
                            :visit="$this->visit"
                        />
                    </div>
                    <div x-show="openPregnancy" x-transition>
                        @include(
                            'livewire.consultation.includes.back_button',
                            [
                                'title' => 'Pregnancy',
                                'tab_name' => 'openPregnancy',
                            ]
                        )

                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.pregnancy.index
                            :visit="$this->visit"
                        />
                    </div>
                    <div x-show="openOperation" x-transition>
                        @include(
                            'livewire.consultation.includes.back_button',
                            [
                                'title' => 'Operation',
                                'tab_name' => 'openOperation',
                            ]
                        )
                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.operation.index
                            :visit="$this->visit"
                        />
                    </div>
                    <div x-show="openOrdersNotes" x-transition>
                        @include(
                            'livewire.consultation.includes.back_button',
                            [
                                'title' => 'Orders & Notes',
                                'tab_name' => 'openOrdersNotes',
                            ]
                        )

                        <livewire:nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.index
                            :visit="$this->visit"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
