{{-- Modals for selecting investigations --}}
<div class="modal fade" id="all_investigations" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">All investigations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bulk_diagnostics">
                    <div class="modal-body">
                        <div class="row d-flex justify-content-between">
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">General</span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="2498@@132.00@@1"
                                            id="serum_progesterone"
                                        />
                                        <label class="custom-control-label" for="serum_progesterone">
                                            <span></span>
                                            serum progesterone(prog)
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="2687@@60.00@@1"
                                            id="c-reactive-protein"
                                        />
                                        <label class="custom-control-label" for="c-reactive-protein">
                                            <span></span>
                                            C-REACTIVE PROTEIN (CRP)
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="2773@@800.00@@1"
                                            id="diagnostic_set"
                                        />
                                        <label class="custom-control-label" for="diagnostic_set">
                                            <span></span>
                                            DIAGNOSTIC SET
                                        </label>
                                        c
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3473@@28.00@@1"
                                            id="2-hr_glucose"
                                        />
                                        <label class="custom-control-label" for="2-hr_glucose">
                                            <span></span>
                                            2 Hour Post Prandial Blood Glucose /2HPP
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3474@@0.00@@1"
                                            id="24hrUrine"
                                        />
                                        <label class="custom-control-label" for="24hrUrine">
                                            24hr Urine for Protein
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3475@@22.00@@1"
                                            id="alanine_amino"
                                        />
                                        <label class="custom-control-label" for="alanine_amino">
                                            Alanine Aminotransferase (ALT)
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3476@@77.00@@1"
                                            id="alpha_amylase"
                                        />
                                        <label class="custom-control-label" for="alpha_amylase">
                                            Alpha Amylase (Serum/Urine)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">
                                    CLINICAL CHEMISTRY
                                </span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3484@@72.00@@1"
                                            id="creatinine"
                                        />
                                        <label class="custom-control-label" for="creatinine">
                                            Bue &amp; Creatinine
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3496@@19.00@@1"
                                            id="fasting_blood_sg"
                                        />
                                        <label class="custom-control-label" for="fasting_blood_sg">
                                            Fasting Blood Sugar/Random Blood Sugar
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3516@@88.00@@1"
                                            id="lft"
                                        />
                                        <label class="custom-control-label" for="lft">LFT</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3545@@40.00@@1"
                                            id="sickling_test"
                                        />
                                        <label class="custom-control-label" for="sickling_test">Sickling Test</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">
                                    HAEMATOLOGY
                                </span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3479@@26.00@@1"
                                            id="Parasites"
                                        />
                                        <label class="custom-control-label" for="Parasites">
                                            BF for Malaria Parasites
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3485@@55.00@@1"
                                            id="coombs"
                                        />
                                        <label class="custom-control-label" for="coombs">Coombs Test (Direct)</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3500@@44.00@@1"
                                            id="fbc"
                                        />
                                        <label class="custom-control-label" for="fbc">
                                            Full Blood Count FBC (Automation)
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3548@@56.00@@1"
                                            id="stool"
                                        />
                                        <label class="custom-control-label" for="stool">Stool C/S</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3932@@55.00@@1"
                                            id="sputum"
                                        />
                                        <label class="custom-control-label" for="sputum">Sputum culture</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3969@@308.00@@1"
                                            id="blood_transfusion"
                                        />
                                        <label class="custom-control-label" for="blood_transfusion">
                                            Blood transfusion
                                        </label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="4236@@88.00@@1"
                                            id="clotting_profile"
                                        />
                                        <label class="custom-control-label" for="clotting_profile">
                                            CLOTTING PROFILE
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">
                                    MICROBIOLOGY
                                </span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="4157@@61.00@@1"
                                            id="urethra"
                                        />
                                        <label class="custom-control-label" for="urethra">URETHRA SWAB FOR GNID</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">MISC</span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="5158@@600.00@@1"
                                            id="excision_biopsy"
                                        />
                                        <label class="custom-control-label" for="excision_biopsy">
                                            excision biopsy
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <span class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block">SEROLOGY</span>
                                <div class="checkbox-list mt-5">
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3507@@55.00@@1"
                                            id="pylori"
                                        />
                                        <label class="custom-control-label" for="pylori">H. Pylori (BLOOD)</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="3939@@55.00@@1"
                                            id="h_pylori"
                                        />
                                        <label class="custom-control-label" for="h_pylori">H. Pylori stool test</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="4377@@121.00@@1"
                                            id="hbv"
                                        />
                                        <label class="custom-control-label" for="hbv">Hbv PROFILE</label>
                                    </div>
                                    <div
                                        class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                    >
                                        <input
                                            type="checkbox"
                                            class="custom-control-input bg-info"
                                            multiple=""
                                            name="lab[]"
                                            value="5140@@42.00@@1"
                                            id="rheumatoid_factor"
                                        />
                                        <label class="custom-control-label" for="rheumatoid_factor">
                                            rheumatoid factor (rf)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
