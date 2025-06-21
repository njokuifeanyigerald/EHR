<?php

use App\Helpers\ReferenceHelper;

?>

<div class="row">
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title me-1">
                    <h4 class="card-title">Default Examination</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    <button class="btn btn-danger me-3 my-2" data-bs-toggle="modal" data-bs-target="#PatientAllergy">
                        Patient Allergy
                    </button>
                    <button class="btn btn-primary me-3 my-2" data-bs-toggle="modal" data-bs-target="#PatientHistory">
                        Patient History
                    </button>
                    {{-- <livewire:re-usable-components.visit-session-location-change :visit="$this->visit" /> --}}
                </div>
            </div>
        </div>
    </div>

    @include('livewire.re-usable-components.consultation-patient-side-info', ['visit' => $this->visit])

    <div
        x-data="{
            mainDiv: true,
            openTeleHealth: false,
            openMedicalNotes: false,
            openDiagnosis: false,
            openInvestigations: false,
            openPrescriptions: false,
            openProcedure: false,
            openNursesOrder: false,
            openDoctorDrawing: false,
            openPatientStatus: false,
            openOccupationalHealth: false,
            openPhysioTherapy: false,
            openEye: false,
            openDental: false,
            openDiet: false,
        }"
        class="col-lg-10"
    >
        {{-- Vitals --}}
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="iq-card-header-toolbar d-flex justify-content-end mb-3">
                        {{-- patient status --}}
                        <button
                            @click="mainDiv = !mainDiv; openPatientStatus = !openPatientStatus"
                            class="btn btn-warning me-3"
                        >
                            Patient Status
                        </button>
                        {{-- patient vitals --}}
                        <button class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#prevoius-vitals">
                            All Vitals
                        </button>
                        @if ($this->visit->sign == 'No')
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_vital_exam">
                                <i class="fa fa-plus"></i>
                                Add New Vital
                            </button>
                        @endif
                    </div>
                    <div class="table-responsive">
                        @include('livewire.nurses-station.includes.vitals', ['vitals' => $vitals])
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    @include('livewire.consultation.includes.action_cards_or_menu_cards')
                    <div x-show="openTeleHealth" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Tele Health',
                                    'tab_name' => 'openTeleHealth',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.tele-health :visit="$this->visit" />
                    </div>
                    <div x-show="openMedicalNotes" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Medical Notes',
                                    'tab_name' => 'openMedicalNotes',
                                ]
                            )
                        </div>
                        @include('livewire.consultation.examination.medical_notes')
                    </div>
                    <div x-show="openDiagnosis" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Diagnosis',
                                    'tab_name' => 'openDiagnosis',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.diagnosis
                            :visit="$this->visit"
                            :ai_model_allowed="$ai_model_allowed"
                        />
                    </div>
                    <div x-show="openInvestigations" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Investigations',
                                    'tab_name' => 'openInvestigations',
                                ]
                            )
                        </div>

                        <livewire:consultation.examination.investigations :visit="$this->visit" />
                    </div>
                    <div x-show="openPrescriptions" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Prescriptions',
                                    'tab_name' => 'openPrescriptions',
                                ]
                            )
                        </div>

                        <livewire:consultation.examination.prescriptions :visit="$this->visit" />
                    </div>
                    <div x-show="openProcedure" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Procedure',
                                    'tab_name' => 'openProcedure',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.procedures :visit="$this->visit" />
                    </div>

                    <div x-show="openNursesOrder">
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Nurses Order',
                                    'tab_name' => 'openNursesOrder',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.nurses-order :visit="$this->visit" />
                    </div>

                    <div x-show="openDoctorDrawing" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Doctor Drawing',
                                    'tab_name' => 'openDoctorDrawing',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.doctors-drawing :visit="$this->visit" />
                    </div>
                    <div x-show="openPatientStatus" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Patient Status',
                                    'tab_name' => 'openPatientStatus',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.patient-status :visit="$this->visit" />
                    </div>
                    <div x-show="openOccupationalHealth" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Occupational Health',
                                    'tab_name' => 'openOccupationalHealth',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.occupational-health :visit="$this->visit" />
                    </div>
                    <div x-show="openPhysioTherapy" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Physiotherapy',
                                    'tab_name' => 'openPhysioTherapy',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.physiotherapy :visit="$this->visit" />
                    </div>

                    <div x-show="openEye" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Eye',
                                    'tab_name' => 'openEye',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.eye :visit="$this->visit" />
                    </div>
                    <div x-show="openDental" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Dental',
                                    'tab_name' => 'openDental',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.dental :visit="$this->visit" />
                    </div>
                    <div x-show="openDiet" x-transition>
                        <div>
                            @include(
                                'livewire.consultation.includes.back_button',
                                [
                                    'title' => 'Diet',
                                    'tab_name' => 'openDiet',
                                ]
                            )
                        </div>
                        <livewire:consultation.examination.diet :visit="$this->visit" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}

    {{-- edit vitals --}}
    <div wire:ignore.self id="edit_vital_exam" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Vital</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <form class="form-horizontal" wire:submit="updateVital">
                        @include('livewire.nurses-station.patient-records.modals.vitals.form', ['edit' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>

    <livewire:consultation.modals.add-vital :visit="$this->visit" />
    <livewire:consultation.modals.vital-list :vitals="$this->vitals" />
    <livewire:consultation.modals.patient-history
        :patient_id="$this->visit->patient_id"
        :visit_number="$this->visit->visit_number"
    />
    <livewire:consultation.modals.patient-allergy :visit="$this->visit" :patient_id="$this->visit->patient_id" />
</div>

@script
    <script>
        $('#presentComplains').select2({
            placeholder: 'Search Item Name',
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            width: '100%',
            serverSide: true,
            ajax: {
                url: "{{ route('select2search.symptoms') }}",
                type: "GET",
                dataType: 'json',
                delay: 250,
                cache: true,
                theme: "bootstrap4",
            },
        });
        $('#presentComplains').on('change', function (e) {
            var data = $('#presentComplains').select2('val');
            @this.
            set('presenting_complaints_new_ids', data);
            // @this.addPresentingComplaint(data);
        });

        $('#drug_history_select').select2({
            placeholder: 'Search Item Name',
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            width: '100%',
            serverSide: true,
            ajax: {
                url: "{{ route('select2search.drugs') }}",
                type: "GET",
                dataType: 'json',
                delay: 250,
                cache: true,
                theme: "bootstrap4",
            },
        });

        $('#drug_history_select').on('change', function (e) {
            var data = $('#drug_history_select').select2("val");
            @this.
            set('drug_history_new_ids', data);
            // Livewire.emit('updatedSelectItemId', e.target.value);
        });

        $('#allergyReaction').select2({
            placeholder: 'Search Reaction Name',
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            width: '100%',
            serverSide: true,
            ajax: {
                url: "{{ route('select2search.allergy-reactions') }}",
                type: "GET",
                dataType: 'json',
                delay: 250,
                cache: true,
                theme: "bootstrap4",
            },
        });
        $('#allergyReaction').on('change', function (e) {
            var data = $('#allergyReaction').select2('val');
            @this.        set('allergy_reactions', data);
        });

        // $('#drug_history_select').on('change', function(e) {
        //     var data = $('#drug_history_select').select2('val');
        //     @this.set('drug_history', data);
        // });
        $wire.on('close_add_vital_exam_modal', function () {
            $('#add_vital_exam').modal('hide');
            // @this.render();
        });
        $wire.on('close_edit_vital_exam_modal', function () {
            $('#edit_vital_exam').modal('hide');
        });
        $wire.on('open_edit_vital_exam_modal', function () {
            $('#edit_vital_exam').modal('show');
        });
    </script>
    <script type="text/javascript">
        var images = ['/test/uploads/wPaint.png'];

        function saveImg(image) {
            var visit_number = $('#visit_number').val();
            var image_tag = $('#image_tag').val();
            var _this = this;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
            });

            $.ajax({
                type: 'get',
                url: '/consultation/attach_drawing',
                data: {
                    image: image,
                    visit_number: visit_number,
                    image_tag: image_tag,
                },
                success: function (resp) {
                    $('#image_tag').val('');
                    $('#display_image_here').html('');
                    $('#display_image_here').load('/consultation/preview_drawing/' + visit_number);

                    // internal function for displaying status messages in the canvas
                    _this._displayStatus('Image saved successfully');

                    // doesn't have to be json, can be anything
                    // returned from server after upload as long
                    // as it contains the path to the image url
                    // or a base64 encoded png, either will work
                    resp = $.parseJSON(resp);

                    // update images array / object or whatever
                    // is being used to keep track of the images
                    // can store path or base64 here (but path is better since it's much smaller)
                    images.push(resp.img);

                    // do something with the image
                    $('#wPaint-img').attr('src', image);
                },

                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    Swal.fire({
                        title: errorThrown,
                        text: textStatus,
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn btn-danger',
                        },
                    });
                },
            });
        }

        function loadImgBg() {
            // internal function for displaying background images modal
            // where images is an array of images (base64 or url path)
            // NOTE: that if you can't see the bg image changing it's probably
            // becasue the foregroud image is not transparent.
            this._showFileModal('bg', images);
        }

        function loadImgFg() {
            // internal function for displaying foreground images modal
            // where images is an array of images (base64 or url path)
            this._showFileModal('fg', images);
        }

        // init wPaint
        $('#wPaint').wPaint({
            menuOffsetLeft: -35,
            menuOffsetTop: -50,
            saveImg: saveImg,
            loadImgBg: loadImgBg,
            loadImgFg: loadImgFg,
        });
    </script>
@endscript
