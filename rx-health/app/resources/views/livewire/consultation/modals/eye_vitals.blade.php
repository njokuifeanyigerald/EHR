{{-- Eye vitals modal --}}
<div>
    <div wire:ignore.self id="add_eye_vitals" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="height: 700px">
                <div class="modal-header">
                    <h5 class="modal-title">New Patient Vitals (Eye)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rx-dash-lists" style="height: 400px">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Right Eye</th>
                                    <th></th>
                                    <th>Left Eye</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.visual_acuity.right" class="form-select my-2">
                                            <option value="">Select Visual Acuity</option>
                                            <optgroup label="Normal Vision">
                                                <option value="20/20">20/20 (6/6)</option>
                                            </optgroup>
                                            <optgroup label="Mild Vision Impairment">
                                                <option value="20/25">20/25 (6/7.5)</option>
                                                <option value="20/30">20/30 (6/9)</option>
                                                <option value="20/40">20/40 (6/12)</option>
                                            </optgroup>
                                            <optgroup label="Moderate Vision Impairment">
                                                <option value="20/50">20/50 (6/15)</option>
                                                <option value="20/60">20/60 (6/18)</option>
                                            </optgroup>
                                            <optgroup label="Severe Vision Impairment">
                                                <option value="20/70">20/70 (6/21)</option>
                                                <option value="20/80">20/80 (6/24)</option>
                                                <option value="20/100">20/100 (6/30)</option>
                                            </optgroup>
                                            <optgroup label="Profound Vision Impairment / Legal Blindness">
                                                <option value="20/200">20/200 (6/60)</option>
                                            </optgroup>
                                            <optgroup label="Hand Motion / Light Perception">
                                                <option value="HM">Hand Motion (HM)</option>
                                                <option value="LP">Light Perception (LP)</option>
                                                <option value="NLP">No Light Perception (NLP)</option>
                                            </optgroup>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.visual_acuity.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Visual Acuity</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.visual_acuity.left" class="form-select my-2">
                                            <option value="">Select Visual Acuity</option>
                                            <optgroup label="Normal Vision">
                                                <option value="20/20">20/20 (6/6)</option>
                                            </optgroup>
                                            <optgroup label="Mild Vision Impairment">
                                                <option value="20/25">20/25 (6/7.5)</option>
                                                <option value="20/30">20/30 (6/9)</option>
                                                <option value="20/40">20/40 (6/12)</option>
                                            </optgroup>
                                            <optgroup label="Moderate Vision Impairment">
                                                <option value="20/50">20/50 (6/15)</option>
                                                <option value="20/60">20/60 (6/18)</option>
                                            </optgroup>
                                            <optgroup label="Severe Vision Impairment">
                                                <option value="20/70">20/70 (6/21)</option>
                                                <option value="20/80">20/80 (6/24)</option>
                                                <option value="20/100">20/100 (6/30)</option>
                                            </optgroup>
                                            <optgroup label="Profound Vision Impairment / Legal Blindness">
                                                <option value="20/200">20/200 (6/60)</option>
                                            </optgroup>
                                            <optgroup label="Hand Motion / Light Perception">
                                                <option value="HM">Hand Motion (HM)</option>
                                                <option value="LP">Light Perception (LP)</option>
                                                <option value="NLP">No Light Perception (NLP)</option>
                                            </optgroup>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.visual_acuity.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.aided.right" class="form-select my-2">
                                            <option selected="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.aided.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">(Aided)</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.aided.left" class="form-select my-2">
                                            <option selected="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.aided.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select
                                            wire:model="vital_details.pinhole_vision.right"
                                            class="form-select my-2"
                                        >
                                            <option value="">Select Pinhole Vision</option>
                                            <optgroup label="Normal Vision">
                                                <option value="20/20">20/20 (6/6)</option>
                                            </optgroup>
                                            <optgroup label="Mild Vision Impairment">
                                                <option value="20/25">20/25 (6/7.5)</option>
                                                <option value="20/30">20/30 (6/9)</option>
                                                <option value="20/40">20/40 (6/12)</option>
                                            </optgroup>
                                            <optgroup label="Moderate Vision Impairment">
                                                <option value="20/50">20/50 (6/15)</option>
                                                <option value="20/60">20/60 (6/18)</option>
                                            </optgroup>
                                            <optgroup label="Severe Vision Impairment">
                                                <option value="20/70">20/70 (6/21)</option>
                                                <option value="20/80">20/80 (6/24)</option>
                                                <option value="20/100">20/100 (6/30)</option>
                                            </optgroup>
                                            <optgroup label="Profound Vision Impairment / Legal Blindness">
                                                <option value="20/200">20/200 (6/60)</option>
                                            </optgroup>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.pinhole_vision.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">PinHole Vision</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.pinhole_vision.left" class="form-select my-2">
                                            <option value="">Select Pinhole Vision</option>
                                            <optgroup label="Normal Vision">
                                                <option value="20/20">20/20 (6/6)</option>
                                            </optgroup>
                                            <optgroup label="Mild Vision Impairment">
                                                <option value="20/25">20/25 (6/7.5)</option>
                                                <option value="20/30">20/30 (6/9)</option>
                                                <option value="20/40">20/40 (6/12)</option>
                                            </optgroup>
                                            <optgroup label="Moderate Vision Impairment">
                                                <option value="20/50">20/50 (6/15)</option>
                                                <option value="20/60">20/60 (6/18)</option>
                                            </optgroup>
                                            <optgroup label="Severe Vision Impairment">
                                                <option value="20/70">20/70 (6/21)</option>
                                                <option value="20/80">20/80 (6/24)</option>
                                                <option value="20/100">20/100 (6/30)</option>
                                            </optgroup>
                                            <optgroup label="Profound Vision Impairment / Legal Blindness">
                                                <option value="20/200">20/200 (6/60)</option>
                                            </optgroup>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.pinhole_vision.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <input
                                            wire:model="vital_details.applanation.right"
                                            type="text"
                                            class="form-control my-2"
                                            placeholder="Click here to start typing..."
                                        />
                                        <x-input-error
                                            :messages="$errors->get('vital_details.applanation.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Applanation</td>
                                    <td class="pt-3-half">
                                        <input
                                            wire:model="vital_details.applanation.left"
                                            type="text"
                                            class="form-control my-2"
                                            placeholder="Click here to start typing..."
                                        />
                                        <x-input-error
                                            :messages="$errors->get('vital_details.applanation.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-center">On Examination</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.lid.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="ptosis">Ptosis (Drooping)</option>
                                            <option value="swelling">Swelling</option>
                                            <option value="inflammation">Inflammation</option>
                                            <option value="entropion">Entropion (Inward Turning)</option>
                                            <option value="ectropion">Ectropion (Outward Turning)</option>
                                            <option value="blepharitis">Blepharitis (Lid Margin Inflammation)</option>
                                            <option value="chalazion">Chalazion (Lid Cyst)</option>
                                            <option value="stye">Stye (Eyelid Infection)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.lid.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Lid</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.lid.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="ptosis">Ptosis (Drooping)</option>
                                            <option value="swelling">Swelling</option>
                                            <option value="inflammation">Inflammation</option>
                                            <option value="entropion">Entropion (Inward Turning)</option>
                                            <option value="ectropion">Ectropion (Outward Turning)</option>
                                            <option value="blepharitis">Blepharitis (Lid Margin Inflammation)</option>
                                            <option value="chalazion">Chalazion (Lid Cyst)</option>
                                            <option value="stye">Stye (Eyelid Infection)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.lid.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.conjunctiva.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="conjunctivitis">Conjunctivitis (Pink Eye)</option>
                                            <option value="hyperemia">Hyperemia (Redness)</option>
                                            <option value="petechiae">Petechiae (Small Red Spots)</option>
                                            <option value="chemosis">Chemosis (Swelling)</option>
                                            <option value="conjunctival-follicles">Conjunctival Follicles</option>
                                            <option value="subconjunctival-hemorrhage">
                                                Subconjunctival Hemorrhage (Bruise)
                                            </option>
                                            <option value="yellowing">Yellowing (Jaundice)</option>
                                            <option value="dryness">Dryness</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.conjunctiva.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Conjunctiva</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.conjunctiva.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="conjunctivitis">Conjunctivitis (Pink Eye)</option>
                                            <option value="hyperemia">Hyperemia (Redness)</option>
                                            <option value="petechiae">Petechiae (Small Red Spots)</option>
                                            <option value="chemosis">Chemosis (Swelling)</option>
                                            <option value="conjunctival-follicles">Conjunctival Follicles</option>
                                            <option value="subconjunctival-hemorrhage">
                                                Subconjunctival Hemorrhage (Bruise)
                                            </option>
                                            <option value="yellowing">Yellowing (Jaundice)</option>
                                            <option value="dryness">Dryness</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.conjunctiva.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.cornea.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="clear">Clear</option>
                                            <option value="opacity">Opacity</option>
                                            <option value="scarring">Scarring</option>
                                            <option value="edema">Edema (Swelling)</option>
                                            <option value="abrasion">Abrasion</option>
                                            <option value="ulcer">Ulcer</option>
                                            <option value="keratoconus">Keratoconus</option>
                                            <option value="neovascularization">
                                                Neovascularization (Abnormal Blood Vessels)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.cornea.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Cornea</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.cornea.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="clear">Clear</option>
                                            <option value="opacity">Opacity</option>
                                            <option value="scarring">Scarring</option>
                                            <option value="edema">Edema (Swelling)</option>
                                            <option value="abrasion">Abrasion</option>
                                            <option value="ulcer">Ulcer</option>
                                            <option value="keratoconus">Keratoconus</option>
                                            <option value="neovascularization">
                                                Neovascularization (Abnormal Blood Vessels)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.cornea.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.sclera.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="white">White</option>
                                            <option value="yellowing">Yellowing (Jaundice)</option>
                                            <option value="scleral-icterus">Scleral Icterus</option>
                                            <option value="blue-sclera">Blue Sclera</option>
                                            <option value="scleral-thinning">Scleral Thinning</option>
                                            <option value="conjunctival-hemorrhage">Conjunctival Hemorrhage</option>
                                            <option value="scleral-cyst">Scleral Cyst</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.sclera.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Sclera</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.sclera.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="white">White</option>
                                            <option value="yellowing">Yellowing (Jaundice)</option>
                                            <option value="scleral-icterus">Scleral Icterus</option>
                                            <option value="blue-sclera">Blue Sclera</option>
                                            <option value="scleral-thinning">Scleral Thinning</option>
                                            <option value="conjunctival-hemorrhage">Conjunctival Hemorrhage</option>
                                            <option value="scleral-cyst">Scleral Cyst</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.sclera.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select
                                            wire:model="vital_details.anterior_chamber.right"
                                            class="form-select my-2"
                                        >
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="shallow">Shallow</option>
                                            <option value="deep">Deep</option>
                                            <option value="cells-flare">Cells and Flare (Inflammation)</option>
                                            <option value="hyphema">Hyphema (Blood)</option>
                                            <option value="clear">Clear</option>
                                            <option value="haziness">Haziness</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.anterior_chamber.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Anterior Chamber</td>
                                    <td class="pt-3-half">
                                        <select
                                            wire:model="vital_details.anterior_chamber.left"
                                            class="form-select my-2"
                                        >
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="shallow">Shallow</option>
                                            <option value="deep">Deep</option>
                                            <option value="cells-flare">Cells and Flare (Inflammation)</option>
                                            <option value="hyphema">Hyphema (Blood)</option>
                                            <option value="clear">Clear</option>
                                            <option value="haziness">Haziness</option>
                                        </select>
                                    </td>
                                    <x-input-error
                                        :messages="$errors->get('vital_details.anterior_chamber.left')"
                                        class="mt-2"
                                    />
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.iris.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="round">Round</option>
                                            <option value="irregular">Irregular</option>
                                            <option value="coloboma">Coloboma (Defect in the Iris)</option>
                                            <option value="heterochromia">
                                                Heterochromia (Different colored eyes)
                                            </option>
                                            <option value="aniridia">Aniridia (Absence of the Iris)</option>
                                            <option value="inflammation">Inflammation (Iritis)</option>
                                            <option value="atrophy">Atrophy (Shrinking or Loss of Tissue)</option>
                                            <option value="pigment-deposits">Pigment Deposits</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.iris.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Iris</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.iris.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal</option>
                                            <option value="round">Round</option>
                                            <option value="irregular">Irregular</option>
                                            <option value="coloboma">Coloboma (Defect in the Iris)</option>
                                            <option value="heterochromia">
                                                Heterochromia (Different colored eyes)
                                            </option>
                                            <option value="aniridia">Aniridia (Absence of the Iris)</option>
                                            <option value="inflammation">Inflammation (Iritis)</option>
                                            <option value="atrophy">Atrophy (Shrinking or Loss of Tissue)</option>
                                            <option value="pigment-deposits">Pigment Deposits</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.iris.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.pupils.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Equal and Reactive to Light)</option>
                                            <option value="anisocoria">Anisocoria (Unequal Pupils)</option>
                                            <option value="dilated">Dilated (Mydriasis)</option>
                                            <option value="constricted">Constricted (Miosis)</option>
                                            <option value="non-reactive">Non-reactive to Light</option>
                                            <option value="irregular">Irregular</option>
                                            <option value="absent">Absent (Nonexistent Pupil)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.pupils.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Pupils</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.pupils.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Equal and Reactive to Light)</option>
                                            <option value="anisocoria">Anisocoria (Unequal Pupils)</option>
                                            <option value="dilated">Dilated (Mydriasis)</option>
                                            <option value="constricted">Constricted (Miosis)</option>
                                            <option value="non-reactive">Non-reactive to Light</option>
                                            <option value="irregular">Irregular</option>
                                            <option value="absent">Absent (Nonexistent Pupil)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.pupils.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.lens.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Transparent)</option>
                                            <option value="cataract">Cataract (Clouding of the Lens)</option>
                                            <option value="subcapsular-cataract">Subcapsular Cataract</option>
                                            <option value="nuclear-cataract">Nuclear Cataract</option>
                                            <option value="cortical-cataract">Cortical Cataract</option>
                                            <option value="dislocated">Dislocated Lens</option>
                                            <option value="subluxation">Subluxation (Partial Dislocation)</option>
                                            <option value="lens-opacity">Lens Opacity</option>
                                            <option value="clear">Clear</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.lens.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Lens</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.lens.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Transparent)</option>
                                            <option value="cataract">Cataract (Clouding of the Lens)</option>
                                            <option value="subcapsular-cataract">Subcapsular Cataract</option>
                                            <option value="nuclear-cataract">Nuclear Cataract</option>
                                            <option value="cortical-cataract">Cortical Cataract</option>
                                            <option value="dislocated">Dislocated Lens</option>
                                            <option value="subluxation">Subluxation (Partial Dislocation)</option>
                                            <option value="lens-opacity">Lens Opacity</option>
                                            <option value="clear">Clear</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.lens.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.vitreous.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Transparent)</option>
                                            <option value="floaters">Floaters (Small particles in the vitreous)</option>
                                            <option value="vitreous-detachment">Vitreous Detachment</option>
                                            <option value="vitreous-hemorrhage">
                                                Vitreous Hemorrhage (Blood in the Vitreous)
                                            </option>
                                            <option value="vitreous-opacity">Vitreous Opacity</option>
                                            <option value="tobacco-dust">Tobacco Dust (Sign of Retinal Tear)</option>
                                            <option value="clear">Clear</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.vitreous.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Vitreous</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.vitreous.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Transparent)</option>
                                            <option value="floaters">Floaters (Small particles in the vitreous)</option>
                                            <option value="vitreous-detachment">Vitreous Detachment</option>
                                            <option value="vitreous-hemorrhage">
                                                Vitreous Hemorrhage (Blood in the Vitreous)
                                            </option>
                                            <option value="vitreous-opacity">Vitreous Opacity</option>
                                            <option value="tobacco-dust">Tobacco Dust (Sign of Retinal Tear)</option>
                                            <option value="clear">Clear</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.vitreous.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.fundus.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Retina)</option>
                                            <option value="retinal-disease">Retinal Disease</option>
                                            <option value="hypertensive-retinopathy">Hypertensive Retinopathy</option>
                                            <option value="diabetic-retinopathy">Diabetic Retinopathy</option>
                                            <option value="macular-degeneration">Macular Degeneration</option>
                                            <option value="retinal-hemorrhage">Retinal Hemorrhage</option>
                                            <option value="retinal-detachment">Retinal Detachment</option>
                                            <option value="optic-disc-swelling">Optic Disc Swelling</option>
                                            <option value="normal-optic-disc">Normal Optic Disc</option>
                                            <option value="papilledema">
                                                Papilledema (Optic Disc Swelling due to Increased Intracranial Pressure)
                                            </option>
                                            <option value="disc-cup">Disc Cup Ratio Abnormalities</option>
                                            <option value="drusen">Drusen (Yellow Deposits on Retina)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.fundus.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Fundus</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.fundus.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Retina)</option>
                                            <option value="retinal-disease">Retinal Disease</option>
                                            <option value="hypertensive-retinopathy">Hypertensive Retinopathy</option>
                                            <option value="diabetic-retinopathy">Diabetic Retinopathy</option>
                                            <option value="macular-degeneration">Macular Degeneration</option>
                                            <option value="retinal-hemorrhage">Retinal Hemorrhage</option>
                                            <option value="retinal-detachment">Retinal Detachment</option>
                                            <option value="optic-disc-swelling">Optic Disc Swelling</option>
                                            <option value="normal-optic-disc">Normal Optic Disc</option>
                                            <option value="papilledema">
                                                Papilledema (Optic Disc Swelling due to Increased Intracranial Pressure)
                                            </option>
                                            <option value="disc-cup">Disc Cup Ratio Abnormalities</option>
                                            <option value="drusen">Drusen (Yellow Deposits on Retina)</option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.fundus.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.blood_vessels.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Retinal Vessels)</option>
                                            <option value="arterial-attenuation">
                                                Arterial Attenuation (Narrowing of the Arteries)
                                            </option>
                                            <option value="retinal-hemorrhage">
                                                Retinal Hemorrhage (Bleeding in Retinal Vessels)
                                            </option>
                                            <option value="cotton-wool-spots">
                                                Cotton Wool Spots (Ischemic Areas of the Retina)
                                            </option>
                                            <option value="retinal-vein-occlusion">
                                                Retinal Vein Occlusion (Blockage of Vein)
                                            </option>
                                            <option value="diabetic-retinopathy">
                                                Diabetic Retinopathy (Damage to Blood Vessels)
                                            </option>
                                            <option value="hypertensive-retinopathy">
                                                Hypertensive Retinopathy (Changes due to High Blood Pressure)
                                            </option>
                                            <option value="neovascularization">
                                                Neovascularization (New Abnormal Blood Vessel Growth)
                                            </option>
                                            <option value="microaneurysms">
                                                Microaneurysms (Small Bulges in Blood Vessels)
                                            </option>
                                            <option value="vascular-tortuosity">
                                                Vascular Tortuosity (Twisting of Blood Vessels)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.blood_vessels.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Blood Vessels</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.blood_vessels.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Retinal Vessels)</option>
                                            <option value="arterial-attenuation">
                                                Arterial Attenuation (Narrowing of the Arteries)
                                            </option>
                                            <option value="retinal-hemorrhage">
                                                Retinal Hemorrhage (Bleeding in Retinal Vessels)
                                            </option>
                                            <option value="cotton-wool-spots">
                                                Cotton Wool Spots (Ischemic Areas of the Retina)
                                            </option>
                                            <option value="retinal-vein-occlusion">
                                                Retinal Vein Occlusion (Blockage of Vein)
                                            </option>
                                            <option value="diabetic-retinopathy">
                                                Diabetic Retinopathy (Damage to Blood Vessels)
                                            </option>
                                            <option value="hypertensive-retinopathy">
                                                Hypertensive Retinopathy (Changes due to High Blood Pressure)
                                            </option>
                                            <option value="neovascularization">
                                                Neovascularization (New Abnormal Blood Vessel Growth)
                                            </option>
                                            <option value="microaneurysms">
                                                Microaneurysms (Small Bulges in Blood Vessels)
                                            </option>
                                            <option value="vascular-tortuosity">
                                                Vascular Tortuosity (Twisting of Blood Vessels)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.blood_vessels.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.disc_margin.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Well-defined Disc Margin)</option>
                                            <option value="blurred">
                                                Blurred (Indicating Swelling or Papilledema)
                                            </option>
                                            <option value="notched">
                                                Notched (Optic Nerve Damage, Common in Glaucoma)
                                            </option>
                                            <option value="fuzzy">Fuzzy (Possible Swelling or Raised Pressure)</option>
                                            <option value="excavated">
                                                Excavated (Depressed Disc, Often Seen in Glaucoma)
                                            </option>
                                            <option value="cup-disc-ratio-abnormalities">
                                                Cup-Disc Ratio Abnormalities (Increased Cup Size, Possible Glaucoma)
                                            </option>
                                            <option value="pallor">
                                                Pallor (Pale Disc, Indicating Optic Nerve Damage)
                                            </option>
                                            <option value="asymmetric">
                                                Asymmetric (Difference in Disc Margins between Eyes)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.disc_margin.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Disc Margin</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.disc_margin.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Clear and Well-defined Disc Margin)</option>
                                            <option value="blurred">
                                                Blurred (Indicating Swelling or Papilledema)
                                            </option>
                                            <option value="notched">
                                                Notched (Optic Nerve Damage, Common in Glaucoma)
                                            </option>
                                            <option value="fuzzy">Fuzzy (Possible Swelling or Raised Pressure)</option>
                                            <option value="excavated">
                                                Excavated (Depressed Disc, Often Seen in Glaucoma)
                                            </option>
                                            <option value="cup-disc-ratio-abnormalities">
                                                Cup-Disc Ratio Abnormalities (Increased Cup Size, Possible Glaucoma)
                                            </option>
                                            <option value="pallor">
                                                Pallor (Pale Disc, Indicating Optic Nerve Damage)
                                            </option>
                                            <option value="asymmetric">
                                                Asymmetric (Difference in Disc Margins between Eyes)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.disc_margin.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.cdr.right" class="form-select my-2">
                                            <option value="normal">Normal (Ratio between 0.2 and 0.4)</option>
                                            <option value="borderline">Borderline (Ratio between 0.4 and 0.5)</option>
                                            <option value="increased">
                                                Increased (Ratio greater than 0.5, Possible Glaucoma)
                                            </option>
                                            <option value="very-increased">
                                                Very Increased (Ratio greater than 0.7, Severe Risk of Glaucoma)
                                            </option>
                                            <option value="asymmetric">
                                                Asymmetric (Difference between Eyes, Possible Glaucoma)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.cdr.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">CDR</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.cdr.left" class="form-select my-2">
                                            <option value="normal">Normal (Ratio between 0.2 and 0.4)</option>
                                            <option value="borderline">Borderline (Ratio between 0.4 and 0.5)</option>
                                            <option value="increased">
                                                Increased (Ratio greater than 0.5, Possible Glaucoma)
                                            </option>
                                            <option value="very-increased">
                                                Very Increased (Ratio greater than 0.7, Severe Risk of Glaucoma)
                                            </option>
                                            <option value="asymmetric">
                                                Asymmetric (Difference between Eyes, Possible Glaucoma)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.cdr.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.macula.right" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Macula)</option>
                                            <option value="hyperpigmentation">
                                                Hyperpigmentation (Darkened Areas, Could Indicate Macular Degeneration)
                                            </option>
                                            <option value="hypopigmentation">
                                                Hypopigmentation (Lightened Areas, May Suggest Retinal Damage)
                                            </option>
                                            <option value="macular-edema">
                                                Macular Edema (Swelling, Often Due to Diabetic Retinopathy)
                                            </option>
                                            <option value="macular-degeneration">
                                                Macular Degeneration (Age-related, Leading to Vision Loss)
                                            </option>
                                            <option value="drusen">
                                                Drusen (Yellow Deposits, Common in Macular Degeneration)
                                            </option>
                                            <option value="retinal-tear">
                                                Retinal Tear (Tears in the Retina, Can Lead to Retinal Detachment)
                                            </option>
                                            <option value="choroidal-neovascularization">
                                                Choroidal Neovascularization (New Abnormal Blood Vessel Growth under the
                                                Macula)
                                            </option>
                                            <option value="macular-hole">
                                                Macular Hole (Break in the Retina, Leading to Central Vision Loss)
                                            </option>
                                            <option value="macular-scarring">
                                                Macular Scarring (Permanent Damage to the Macula)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.macula.right')"
                                            class="mt-2"
                                        />
                                    </td>
                                    <td class="pt-3-half text-center">Macula</td>
                                    <td class="pt-3-half">
                                        <select wire:model="vital_details.macula.left" class="form-select my-2">
                                            <option value="">Select Condition</option>
                                            <option value="normal">Normal (Healthy Macula)</option>
                                            <option value="hyperpigmentation">
                                                Hyperpigmentation (Darkened Areas, Could Indicate Macular Degeneration)
                                            </option>
                                            <option value="hypopigmentation">
                                                Hypopigmentation (Lightened Areas, May Suggest Retinal Damage)
                                            </option>
                                            <option value="macular-edema">
                                                Macular Edema (Swelling, Often Due to Diabetic Retinopathy)
                                            </option>
                                            <option value="macular-degeneration">
                                                Macular Degeneration (Age-related, Leading to Vision Loss)
                                            </option>
                                            <option value="drusen">
                                                Drusen (Yellow Deposits, Common in Macular Degeneration)
                                            </option>
                                            <option value="retinal-tear">
                                                Retinal Tear (Tears in the Retina, Can Lead to Retinal Detachment)
                                            </option>
                                            <option value="choroidal-neovascularization">
                                                Choroidal Neovascularization (New Abnormal Blood Vessel Growth under the
                                                Macula)
                                            </option>
                                            <option value="macular-hole">
                                                Macular Hole (Break in the Retina, Leading to Central Vision Loss)
                                            </option>
                                            <option value="macular-scarring">
                                                Macular Scarring (Permanent Damage to the Macula)
                                            </option>
                                        </select>
                                        <x-input-error
                                            :messages="$errors->get('vital_details.macula.left')"
                                            class="mt-2"
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3-half">Other</td>
                                    <td class="pt-3-half text-center" colspan="2">
                                        <input
                                            wire:model="vital_details.other"
                                            type="text"
                                            class="form-control my-2 bg-white"
                                            placeholder="Click here to start typing..."
                                        />
                                        <x-input-error :messages="$errors->get('vital_details.other')" class="mt-2" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveEyeVital" type="submit" class="btn btn-primary">
                        Save Patient Vitals (Eye)
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
