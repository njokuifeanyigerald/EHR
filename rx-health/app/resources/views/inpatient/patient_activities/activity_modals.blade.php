{{-- Patient Activities modals --}}

{{-- General --}}
{{-- fluid intake and output chart modal --}}
<div id="fluid_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Fluid Intake & Output Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="type_of_oral">
                                    Type Of Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_oral"
                                    name="type_of_oral"
                                    value=""
                                    placeholder=""
                                />
                                <p>No fluid type added yet</p>
                            </div>
                            <div class="form-group">
                                <label for="type_of_iv">
                                    Type Of IV
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_iv"
                                    name="type_of_iv"
                                    value=""
                                    placeholder=""
                                />
                                <p>No IV type added yet</p>
                            </div>
                            <div class="form-group">
                                <label for="in_chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="in_chloride_in_urine"
                                        name="in_chloride_in_urine"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="in_chloride_in_urine">mml</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="oral">
                                    Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="oral"
                                        name="oral"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="oral">mml</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="iv">
                                    IV
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="iv"
                                        name="iv"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="iv">mml</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="out_chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="out_chloride_in_urine"
                                        name="out_chloride_in_urine"
                                        value=""
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="out_chloride_in_urine">mml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label>
                            Output Route
                            <span class="text-danger">*</span>
                        </label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="urine"
                                        name="urine"
                                        value=""
                                        placeholder="Urine(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="urine">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="tube"
                                        name="tube"
                                        value=""
                                        placeholder="Tube(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="tube">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="vomit"
                                        name="vomit"
                                        value=""
                                        placeholder="Vomit(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="vomit">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="other"
                                        name="other"
                                        value=""
                                        placeholder="Other(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="other">mml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Fluid Edit modal --}}
<div id="fluid_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Fluid Intake & Output Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="type_of_oral">
                                    Type Of Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_oral"
                                    name="type_of_oral"
                                    value="ORT Suspension"
                                    placeholder=""
                                />
                                <p>No fluid type added yet</p>
                            </div>
                            <div class="form-group">
                                <label for="type_of_iv">
                                    Type Of IV
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control mt-2"
                                    id="type_of_iv"
                                    name="type_of_iv"
                                    value="Normal Saline"
                                    placeholder=""
                                />
                                <p>No IV type added yet</p>
                            </div>
                            <div class="form-group">
                                <label for="in_chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="in_chloride_in_urine"
                                        name="in_chloride_in_urine"
                                        value="11"
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="in_chloride_in_urine">mml</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="oral">
                                    Oral
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group mb-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="oral"
                                        name="oral"
                                        value="100"
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="oral">mml</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="iv">
                                    IV
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="iv"
                                        name="iv"
                                        value="1000"
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="iv">mml</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="out_chloride_in_urine">
                                    Chloride in urine
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="out_chloride_in_urine"
                                        name="out_chloride_in_urine"
                                        value="0"
                                        placeholder="10-12"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="out_chloride_in_urine">mml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label>
                            Output Route
                            <span class="text-danger">*</span>
                        </label>
                        <div class="row">
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="urine"
                                        name="urine"
                                        value="0"
                                        placeholder="Urine(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="urine">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="tube"
                                        name="tube"
                                        value="0"
                                        placeholder="Tube(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="tube">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="vomit"
                                        name="vomit"
                                        value="12"
                                        placeholder="Vomit(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="vomit">mml</span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group my-2">
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="other"
                                        name="other"
                                        value="0"
                                        placeholder="Other(10-12)"
                                        min="10"
                                        max="20"
                                    />
                                    <span class="input-group-text" id="other">mml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- observation chart modal --}}
<div id="observation_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Observation Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="new-user-info">
                    <div class="row">
                        <form class="form-horizontal" action="/action_page.php">
                            @csrf
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                        Blood Pressure
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control my-2" id="bp" />
                                    </div>
                                    <div class="col-sm-1">
                                        <h1>/</h1>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control my-2" id="bp" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">
                                        Temperature
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="temperature" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">
                                        Respiratory Rate
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="respiratory Rate" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                        Pulse
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="pulse" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                        Height (Cm)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="height" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                        Weight (Kg)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="weight" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                        Blood Sugar Level
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="sugar_level" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label
                                        class="control-label col-sm-3 align-self-center mb-0"
                                        for="oxygen_saturation"
                                    >
                                        Oxygen Saturation
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="oxygen_saturation" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit observation modal --}}
<div id="observation_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Observation Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="new-user-info">
                    <div class="row">
                        <form class="form-horizontal" action="/action_page.php">
                            @csrf
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                        Blood Pressure
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" value="120" class="form-control my-2" id="bp" />
                                    </div>
                                    <div class="col-sm-1">
                                        <h1>/</h1>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" value="80" class="form-control my-2" id="bp" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">
                                        Temperature
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="37" class="form-control my-2" id="temperature" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">
                                        Respiratory Rate
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="65" class="form-control my-2" id="respiratory Rate" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                        Pulse
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="59" class="form-control my-2" id="pulse" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                        Height (Cm)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="180" class="form-control my-2" id="height" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                        Weight (Kg)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="103" class="form-control my-2" id="weight" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                        Blood Sugar Level
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="72" class="form-control my-2" id="sugar_level" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label
                                        class="control-label col-sm-3 align-self-center mb-0"
                                        for="oxygen_saturation"
                                    >
                                        Oxygen Saturation
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            value="23"
                                            class="form-control my-2"
                                            id="oxygen_saturation"
                                        />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- urine monitoring chart modal --}}
<div id="urine_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Urine Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="urine_protein">Urine Protein</label>
                                <input type="number" class="form-control my-2" id="urine_protein" value="" />
                            </div>
                            <div class="form-group">
                                <label for="urine_sugar">Urine Sugar</label>
                                <input type="number" class="form-control my-2" id="urine_sugar" value="" />
                            </div>
                            <div class="form-group">
                                <label for="other">Other</label>
                                <input type="number" class="form-control my-2" id="other" value="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kerotones">Kerotones</label>
                                <input type="number" class="form-control my-2" id="kerotones" value="" />
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <div class="input-group my-2">
                                    <input type="number" class="form-control" id="weight" name="weight" value="" />
                                    <span class="input-group-text" id="weight">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit monitoring chart modal --}}
<div id="urine_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Urine Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="urine_protein">Urine Protein</label>
                                <input type="number" class="form-control my-2" id="urine_protein" value="23" />
                            </div>
                            <div class="form-group">
                                <label for="urine_sugar">Urine Sugar</label>
                                <input type="number" class="form-control my-2" id="urine_sugar" value="22" />
                            </div>
                            <div class="form-group">
                                <label for="other">Other</label>
                                <input type="number" class="form-control my-2" id="other" value="0" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kerotones">Kerotones</label>
                                <input type="number" class="form-control my-2" id="kerotones" value="22" />
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <div class="input-group my-2">
                                    <input type="number" class="form-control" id="weight" name="weight" value="103" />
                                    <span class="input-group-text" id="weight">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Treatment sheet modal --}}
<div id="treatment_add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Treatment Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <div class="rx-custom-alert-dark" role="alert">
                            <div class="text-dark d-flex justify-content-between py-1">
                                <span class="my-auto">Abidec Drops: 2 Drop bid 5 days Externally</span>
                                <span class="btn btn-sm btn-primary">
                                    <i class="fa fa-plus m-auto"></i>
                                    Add
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prescription">Prescription</label>
                        <input type="text" class="form-control my-2" id="prescription" value="" readonly />
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input
                                    type="date"
                                    class="form-control my-2"
                                    id="date"
                                    name="date"
                                    value="2019-12-18"
                                    readonly
                                />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Select Input</label>
                        <select class="form-select my-2" id="status" name="status">
                            <option selected="" disabled="">--select status--</option>
                            <option>Taken</option>
                            <option>Refused</option>
                            <option>Vommited</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control my-2" id="remarks" cols="6" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Glucose --}}
{{-- Blood Glucose Monitoring --}}
<div id="newBGM" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Blood Glucose Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Fasting</th>
                                        <th>Before Eating</th>
                                        <th>2hrs Post</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Supper</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sugar_level">
                            Sugar Level
                            <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control my-2" id="sugar_level" value="" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Blood Glucose Monitoring --}}
<div id="edit_BGM" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Blood Glucose Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" value="2024-04-03" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="10:36" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Fasting</th>
                                        <th>Before Eating</th>
                                        <th>2hrs Post</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="3" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="1" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="2" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="1" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="2" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="4" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Supper</td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="4" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="2" />
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" step="any" value="3" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sugar_level">
                            Sugar Level
                            <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control my-2" id="sugar_level" value="3" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- For Sliding Scale Blood Glucose --}}
<div id="newFSC" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New For Sliding Scale Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mt-2 mb-4">
                    <button class="btn btn-primary" onclick="$('.benchmarks').fadeToggle('slow')">
                        View Benchmarks
                    </button>
                </div>
                <div class="hide benchmarks" style="display: none">
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-12">
                            <h3 class="card-label text-primary"><u>Blood Sugar Level</u></h3>
                            <span class="text-primary">0-5 (mml)</span>
                            <br />
                            <span class="text-primary">5-10 (mml)</span>
                            <br />
                            <span class="text-primary">10-15 (mml)</span>
                            <br />
                            <span class="text-primary">15-20 (mml)</span>
                            <br />
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h3 class="card-label text-primary"><u>Atrapid</u></h3>
                            <span class="text-primary">0 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">5 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">10 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">15 units (Before Meals)</span>
                            <br />
                        </div>
                    </div>
                </div>
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th style="width: 150px !important"></th>
                                        <th>Time</th>
                                        <th>Sugar Level</th>
                                        <th>Time</th>
                                        <th>Atrapid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pre Breakfast</td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pre Lunch</td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pre Supper</td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" min="0" step="any" class="form-control" />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit For Sliding Scale Blood Glucose --}}
<div id="edit_FSC" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New For Sliding Scale Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <div class="mt-2 mb-4">
                    <button class="btn btn-primary" onclick="$('.benchmarks').fadeToggle('slow')">
                        View Benchmarks
                    </button>
                </div>
                <div class="hide benchmarks" style="display: none">
                    <div class="row mb-5">
                        <div class="col-lg-6 col-md-6 col-12">
                            <h3 class="card-label text-primary"><u>Blood Sugar Level</u></h3>
                            <span class="text-primary">0-5 (mml)</span>
                            <br />
                            <span class="text-primary">5-10 (mml)</span>
                            <br />
                            <span class="text-primary">10-15 (mml)</span>
                            <br />
                            <span class="text-primary">15-20 (mml)</span>
                            <br />
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h3 class="card-label text-primary"><u>Atrapid</u></h3>
                            <span class="text-primary">0 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">5 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">10 units (Before Meals)</span>
                            <br />
                            <span class="text-primary">15 units (Before Meals)</span>
                            <br />
                        </div>
                    </div>
                </div>
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" value="2024-03-07" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="10:41" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th style="width: 150px !important"></th>
                                        <th>Time</th>
                                        <th>Sugar Level</th>
                                        <th>Time</th>
                                        <th>Atrapid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pre Breakfast</td>
                                        <td>
                                            <input class="form-control" type="time" value="6:34" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="11"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="3"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pre Lunch</td>
                                        <td>
                                            <input class="form-control" type="time" value="9:00" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="20"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" value="9:30" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="5"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pre Supper</td>
                                        <td>
                                            <input class="form-control" type="time" value="10:00" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="15"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" type="time" value="4:40" />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                    value="12"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Glucose Monitoring --}}
<div id="newGM" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Glucose Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FBS">
                                    FBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control my-2" id="FBS" value="" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sugar_level">
                                    RBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control my-2" id="RBS" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control my-2" id="remarks" cols="6" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Glucose Monitoring --}}
<div id="edit_GM" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Glucose Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" value="2024-02-14" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="time">
                                    Time
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="12:00" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FBS">
                                    FBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control my-2" id="FBS" value="3" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="sugar_level">
                                    RBS
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control my-2" id="RBS" value="2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control my-2" id="remarks" cols="6" rows="3">
Blood Glucose is normal</textarea
                        >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Pregnancy --}}
{{-- Foetal Kick Count --}}
<div id="newFKCR" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Foetal Kick Count Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="date_time" class="font-weight-bolder">Date Time</label>
                        <input d="date_time" class="form-control" type="datetime-local" value="" name="date_time" />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">2Hrs After Breakfast</label>
                        <div class="row">
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="Start Time"
                                    name="after_breakfast_start"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="End Time"
                                    name="after_breakfast_end"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="any"
                                    placeholder="Kick Count"
                                    name="after_breakfast_kick_count"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">2Hrs After Supper</label>
                        <div class="row">
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="Start Time"
                                    name="after_supper_start"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="End Time"
                                    name="after_supper_end"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="any"
                                    placeholder="Kick Count"
                                    name="after_supper_kick_count"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total_kick_count" class="font-weight-bolder">Total Kick Count</label>
                        <input
                            id="total_kick_count"
                            class="form-control"
                            type="number"
                            step="any"
                            name="total_kick_count"
                        />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Foetal Kick Count --}}
<div id="edit_FKCR" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Foetal Kick Count Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="date_time" class="font-weight-bolder">Date Time</label>
                        <input
                            d="date_time"
                            class="form-control"
                            type="datetime-local"
                            value=""
                            name="date_time"
                            value="2024-03-04/10:00"
                        />
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">2Hrs After Breakfast</label>
                        <div class="row">
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="Start Time"
                                    name="after_breakfast_start"
                                    value="18:00"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="End Time"
                                    name="after_breakfast_end"
                                    value="17:30"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="any"
                                    placeholder="Kick Count"
                                    name="after_breakfast_kick_count"
                                    value="10:00"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bolder">2Hrs After Supper</label>
                        <div class="row">
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="Start Time"
                                    name="after_supper_start"
                                    value="13:00"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="time"
                                    placeholder="End Time"
                                    name="after_supper_end"
                                    value="13:45"
                                />
                            </div>
                            <div class="col">
                                <input
                                    class="form-control"
                                    type="number"
                                    step="any"
                                    placeholder="Kick Count"
                                    name="after_supper_kick_count"
                                    value="14:10"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="total_kick_count" class="font-weight-bolder">Total Kick Count</label>
                        <input
                            id="total_kick_count"
                            class="form-control"
                            type="number"
                            step="any"
                            name="total_kick_count"
                            value="5"
                        />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Operation --}}
{{-- Anaesthetic Record --}}
<div id="newAnaes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anaesthetic Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder">Date Time</label>
                                <input class="form-control" type="datetime-local" value="" name="date_time" />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-light-primary nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#operationsTab">
                                        <span class="nav-text">Operation</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#medicationTab">
                                        <span class="nav-text">Medication</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#vitalsTab">
                                        <span class="nav-text">Vitals &amp; Intubation</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#othersTab">
                                        <span class="nav-text">Others</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-5">
                                <div
                                    class="tab-pane fade active show"
                                    id="operationsTab"
                                    role="tabpanel"
                                    aria-labelledby="operationsTab"
                                >
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Pre op Assessment
                                                </label>
                                                <input class="form-control" type="text" name="pre_op_assessment" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Post Op Instructions
                                                </label>
                                                <input class="form-control" type="text" name="post_op_assessment" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Operation</label>
                                                <input class="form-control" type="text" name="operation" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Imm. Post op Condition
                                                </label>
                                                <select
                                                    class="form-select"
                                                    id="exampleSelectd"
                                                    name="imm_post_op_condition"
                                                >
                                                    <option>Fully Conscious</option>
                                                    <option>Semi Conscious</option>
                                                    <option>Unconscious</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="medicationTab"
                                    role="tabpanel"
                                    aria-labelledby="medicationTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Recent Medication
                                                </label>
                                                <input class="form-control" type="text" name="recent_medication" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Current Medication
                                                </label>
                                                <input class="form-control" type="text" name="current_medication" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pre Med</label>
                                                <input class="form-control" type="text" name="pre_medi" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Time</label>
                                                <input class="form-control" type="time" name="time" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="vitalsTab" role="tabpanel" aria-labelledby="vitalsTab">
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP on Admission
                                                </label>
                                                <input class="form-control" type="text" name="bp_on_admission" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP at Assessment
                                                </label>
                                                <input class="form-control" type="text" name="bp_at_assessment" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">BP</label>
                                                <input class="form-control" type="text" name="bp" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pulse</label>
                                                <input class="form-control" type="text" name="pulse" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Respiratory Rate
                                                </label>
                                                <input class="form-control" type="text" name="respiratory" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Extubated</label>
                                                <input class="form-control" type="text" name="extubated" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Intubation
                                                </label>
                                                <input class="form-control" type="text" name="intubation" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="othersTab" role="tabpanel" aria-labelledby="othersTab">
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    ASA Status
                                                </label>
                                                <select class="form-select" id="exampleSelectd" name="asa_status">
                                                    <option>ASA I</option>
                                                    <option>ASA II</option>
                                                    <option>ASA III</option>
                                                    <option>ASA IV</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">IV Fluid</label>
                                                <input class="form-control" type="text" name="ive_fluid" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Electrolyte
                                                </label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="na"
                                                            name="electrolite_na"
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Kg"
                                                            name="electrolite_kg"
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="CI"
                                                            name="electrolite_ci"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Diagnosis</label>
                                                <input class="form-control" type="text" name="diagnosis" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Anaesthetic Technique
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="anaesthtics_techniquies"
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Blood Required
                                                </label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="yes"
                                                        />
                                                        <span></span>
                                                        Yes
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="no"
                                                        />
                                                        <span></span>
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">HB</label>
                                                <input class="form-control" type="text" name="hb" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Sickling</label>
                                                <input class="form-control" type="text" name="sickling" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Anaesthetic Record --}}
<div id="edit_Anaes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Anaesthetic Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder">Date Time</label>
                                <input
                                    class="form-control"
                                    type="datetime-local"
                                    value=""
                                    name="date_time"
                                    value="2024-03-12"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-light-primary nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#edit_operationsTab">
                                        <span class="nav-text">Operation</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#edit_medicationTab">
                                        <span class="nav-text">Medication</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#edit_vitalsTab">
                                        <span class="nav-text">Vitals &amp; Intubation</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#edit_othersTab">
                                        <span class="nav-text">Others</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-5">
                                <div
                                    class="tab-pane fade active show"
                                    id="edit_operationsTab"
                                    role="tabpanel"
                                    aria-labelledby="edit_operationsTab"
                                >
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Pre op Assessment
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="pre_op_assessment"
                                                    value=""
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Post Op Instructions
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="post_op_assessment"
                                                    value=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Operation</label>
                                                <input class="form-control" type="text" name="operation" value="" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Imm. Post op Condition
                                                </label>
                                                <select
                                                    class="form-select"
                                                    id="exampleSelectd"
                                                    name="imm_post_op_condition"
                                                >
                                                    <option>Fully Conscious</option>
                                                    <option selected>Semi Conscious</option>
                                                    <option>Unconscious</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="edit_medicationTab"
                                    role="tabpanel"
                                    aria-labelledby="edit_medicationTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Recent Medication
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="recent_medication"
                                                    value=""
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Current Medication
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="current_medication"
                                                    value=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pre Med</label>
                                                <input class="form-control" type="text" name="pre_medi" value="" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Time</label>
                                                <input class="form-control" type="time" name="time" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="edit_vitalsTab"
                                    role="tabpanel"
                                    aria-labelledby="edit_vitalsTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP on Admission
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="bp_on_admission"
                                                    value=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP at Assessment
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="bp_at_assessment"
                                                    value=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">BP</label>
                                                <input class="form-control" type="text" name="bp" value="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pulse</label>
                                                <input class="form-control" type="text" name="pulse" value="" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Respiratory Rate
                                                </label>
                                                <input class="form-control" type="text" name="respiratory" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Extubated</label>
                                                <input class="form-control" type="text" name="extubated" value="" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Intubation
                                                </label>
                                                <input class="form-control" type="text" name="intubation" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="edit_othersTab"
                                    role="tabpanel"
                                    aria-labelledby="edit_othersTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    ASA Status
                                                </label>
                                                <select
                                                    class="form-select"
                                                    id="exampleSelectd"
                                                    name="asa_status"
                                                    value=""
                                                >
                                                    <option selected>ASA I</option>
                                                    <option>ASA II</option>
                                                    <option>ASA III</option>
                                                    <option>ASA IV</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">IV Fluid</label>
                                                <input class="form-control" type="text" name="ive_fluid" value="" />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Electrolyte
                                                </label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="na"
                                                            name="electrolite_na"
                                                            value=""
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Kg"
                                                            name="electrolite_kg"
                                                            value=""
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="CI"
                                                            name="electrolite_ci"
                                                            value=""
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Diagnosis</label>
                                                <input class="form-control" type="text" name="diagnosis" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Anaesthetic Technique
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="anaesthtics_techniquies"
                                                    value=""
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Blood Required
                                                </label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="yes"
                                                        />
                                                        <span></span>
                                                        Yes
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="no"
                                                        />
                                                        <span></span>
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">HB</label>
                                                <input class="form-control" type="text" name="hb" value="" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Sickling</label>
                                                <input class="form-control" type="text" name="sickling" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- View Anaesthetic Record --}}
<div id="view_Anaes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Anaesthetic Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bolder">Date Time</label>
                                <input
                                    class="form-control"
                                    type="datetime-local"
                                    value=""
                                    name="date_time"
                                    value="2024-03-12"
                                    disabled
                                />
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-light-primary nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#view_operationsTab">
                                        <span class="nav-text">Operation</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#view_medicationTab">
                                        <span class="nav-text">Medication</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#view_vitalsTab">
                                        <span class="nav-text">Vitals &amp; Intubation</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="pill" href="#view_othersTab">
                                        <span class="nav-text">Others</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mt-5">
                                <div
                                    class="tab-pane fade active show"
                                    id="view_operationsTab"
                                    role="tabpanel"
                                    aria-labelledby="view_operationsTab"
                                >
                                    <div class="row">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Pre op Assessment
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="pre_op_assessment"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Post Op Instructions
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="post_op_assessment"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Operation</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="operation"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Imm. Post op Condition
                                                </label>
                                                <select
                                                    class="form-select"
                                                    id="exampleSelectd"
                                                    name="imm_post_op_condition"
                                                    disabled
                                                >
                                                    <option selected>Fully Conscious</option>
                                                    <option>Semi Conscious</option>
                                                    <option>Unconscious</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="view_medicationTab"
                                    role="tabpanel"
                                    aria-labelledby="view_medicationTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Recent Medication
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="recent_medication"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Current Medication
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="current_medication"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pre Med</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="pre_medi"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Time</label>
                                                <input class="form-control" type="time" name="time" value="" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="view_vitalsTab"
                                    role="tabpanel"
                                    aria-labelledby="view_vitalsTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP on Admission
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="bp_on_admission"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    BP at Assessment
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="bp_at_assessment"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">BP</label>
                                                <input class="form-control" type="text" name="bp" value="" disabled />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Pulse</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="pulse"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Respiratory Rate
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="respiratory"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Extubated</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="extubated"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Intubation
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="intubation"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="tab-pane fade"
                                    id="view_othersTab"
                                    role="tabpanel"
                                    aria-labelledby="view_othersTab"
                                >
                                    <div class="row mt-2">
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    ASA Status
                                                </label>
                                                <select
                                                    class="form-select"
                                                    id="exampleSelectd"
                                                    name="asa_status"
                                                    disabled
                                                >
                                                    <option>ASA I</option>
                                                    <option>ASA II</option>
                                                    <option selected>ASA III</option>
                                                    <option>ASA IV</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">IV Fluid</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="ive_fluid"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Electrolyte
                                                </label>
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="na"
                                                            name="electrolite_na"
                                                            value=""
                                                            disabled
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="Kg"
                                                            name="electrolite_kg"
                                                            value=""
                                                            disabled
                                                        />
                                                    </div>
                                                    <div class="col-12 col-lg-4 col-md-4">
                                                        <input
                                                            class="form-control"
                                                            type="text"
                                                            placeholder="CI"
                                                            name="electrolite_ci"
                                                            value=""
                                                            disabled
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Diagnosis</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="diagnosis"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Anaesthetic Technique
                                                </label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="anaesthtics_techniquies"
                                                    value=""
                                                    disabled
                                                />
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">
                                                    Blood Required
                                                </label>
                                                <div class="radio-inline">
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="yes"
                                                            disabled
                                                        />
                                                        <span></span>
                                                        Yes
                                                    </label>
                                                    <label class="radio radio-primary">
                                                        <input
                                                            type="radio"
                                                            name="radios11"
                                                            name="blood_required"
                                                            value="no"
                                                            disabled
                                                        />
                                                        <span></span>
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">HB</label>
                                                <input class="form-control" type="text" name="hb" value="" disabled />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleSelectd" class="font-weight-bolder">Sickling</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    name="sickling"
                                                    value=""
                                                    disabled
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Operating Theatre --}}
<div id="newOpt" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Theatre Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <ul class="nav nav-light-primary nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#dateTab">
                                <span class="nav-text">Date Time</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#operationDetailsTab">
                                <span class="nav-text">Operation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#staffTab">
                                <span class="nav-text">Staff</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5">
                        <div class="tab-pane fade show active" id="dateTab" role="tabpanel" aria-labelledby="dateTab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Date</label>
                                        <input class="form-control" type="date" value="" name="start_date" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Date Date</label>
                                        <input class="form-control" type="date" value="" name="end_date" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Time</label>
                                        <input class="form-control" type="time" value="" name="start_time" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Time</label>
                                        <input class="form-control" type="time" value="" name="end_time" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="operationDetailsTab"
                            role="tabpanel"
                            aria-labelledby="operationDetailsTab"
                        >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Operation Name</label>
                                        <input class="form-control" type="text" name="operation_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Pre Op Diagnosis</label>
                                        <input class="form-control" type="text" name="pre_op_diagnosis" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Estimated Blood Loss</label>
                                        <input class="form-control" type="text" name="estimated_blood_loss" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Indication</label>
                                        <input class="form-control" type="text" name="indication" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Post Op Diagnosis</label>
                                        <input class="form-control" type="text" name="post_op_diagnosis" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Unit</label>
                                        <select class="form-select" id="exampleSelectd" name="unit">
                                            <option>Please select unit</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="staffTab" role="tabpanel" aria-labelledby="staffTab">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="surgeon">
                                            <option>Please Select a Surgeon</option>
                                            <option>Default Admin</option>
                                            <option>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Scrub Nurse</label>
                                        <select class="form-select" id="exampleSelectd" name="scrub_nurse">
                                            <option>Please select a nurse</option>
                                            <option>No nurse available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Assistant Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="ass_surgeon">
                                            <option>Please Select a Surgeon</option>
                                            <option>Default Admin</option>
                                            <option>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Anaesthetist</label>
                                        <select class="form-select" id="exampleSelectd" name="anaesthetist">
                                            <option>Please select a nurse</option>
                                            <option>No nurse available</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Operating Theatre --}}
<div id="edit_Opt" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Theatre Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <ul class="nav nav-light-primary nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#edit_dateTab">
                                <span class="nav-text">Date Time</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#edit_operationDetailsTab">
                                <span class="nav-text">Operation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#edit_staffTab">
                                <span class="nav-text">Staff</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5">
                        <div
                            class="tab-pane fade show active"
                            id="edit_dateTab"
                            role="tabpanel"
                            aria-labelledby="dateTab"
                        >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Date</label>
                                        <input class="form-control" type="date" value="2024-03-01" name="start_date" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Date Date</label>
                                        <input class="form-control" type="date" value="2024-03-05" name="end_date" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Time</label>
                                        <input class="form-control" type="time" value="07:00" name="start_time" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Time</label>
                                        <input class="form-control" type="time" value="09:30" name="end_time" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="edit_operationDetailsTab"
                            role="tabpanel"
                            aria-labelledby="operationDetailsTab"
                        >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Operation Name</label>
                                        <input class="form-control" type="text" value="" name="operation_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Pre Op Diagnosis</label>
                                        <input class="form-control" type="text" value="" name="pre_op_diagnosis" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Estimated Blood Loss</label>
                                        <input class="form-control" type="text" value="" name="estimated_blood_loss" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Indication</label>
                                        <input class="form-control" type="text" value="" name="indication" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Post Op Diagnosis</label>
                                        <input class="form-control" type="text" value="" name="post_op_diagnosis" />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Unit</label>
                                        <select class="form-select" id="exampleSelectd" name="unit">
                                            <option>Please select unit</option>
                                            <option selected>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="edit_staffTab" role="tabpanel" aria-labelledby="staffTab">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="surgeon">
                                            <option>Please Select a Surgeon</option>
                                            <option selected>Default Admin</option>
                                            <option>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Scrub Nurse</label>
                                        <select class="form-select" id="exampleSelectd" name="scrub_nurse">
                                            <option>Please select a nurse</option>
                                            <option selected>No nurse available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Assistant Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="ass_surgeon">
                                            <option>Please Select a Surgeon</option>
                                            <option>Default Admin</option>
                                            <option selected>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Anaesthetist</label>
                                        <select class="form-select" id="exampleSelectd" name="anaesthetist">
                                            <option>Please select a nurse</option>
                                            <option selected>No nurse available</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- View Operating Theatre --}}
<div id="view_Opt" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Theatre Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <ul class="nav nav-light-primary nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#view_dateTab">
                                <span class="nav-text">Date Time</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#view_operationDetailsTab">
                                <span class="nav-text">Operation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#view_staffTab">
                                <span class="nav-text">Staff</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5">
                        <div
                            class="tab-pane fade show active"
                            id="view_dateTab"
                            role="tabpanel"
                            aria-labelledby="view_dateTab"
                        >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Date</label>
                                        <input
                                            class="form-control"
                                            type="date"
                                            value="2024-03-01"
                                            name="start_date"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Date Date</label>
                                        <input
                                            class="form-control"
                                            type="date"
                                            value="2024-03-06"
                                            name="end_date"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Start Time</label>
                                        <input
                                            class="form-control"
                                            type="time"
                                            value="09:30"
                                            name="start_time"
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">End Time</label>
                                        <input
                                            class="form-control"
                                            type="time"
                                            value="11:30"
                                            name="end_time"
                                            disabled
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="view_operationDetailsTab"
                            role="tabpanel"
                            aria-labelledby="view_operationDetailsTab"
                        >
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Operation Name</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="operation_name"
                                            value=""
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Pre Op Diagnosis</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="pre_op_diagnosis"
                                            value=""
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Estimated Blood Loss</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="estimated_blood_loss"
                                            value=""
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Indication</label>
                                        <input class="form-control" type="text" name="indication" value="" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Post Op Diagnosis</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="post_op_diagnosis"
                                            value=""
                                            disabled
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bolder">Unit</label>
                                        <select class="form-select" id="exampleSelectd" name="unit" disabled>
                                            <option>Please select unit</option>
                                            <option>1</option>
                                            <option selected>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="view_staffTab" role="tabpanel" aria-labelledby="view_staffTab">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="surgeon" disabled>
                                            <option>Please Select a Surgeon</option>
                                            <option selected>Default Admin</option>
                                            <option>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Scrub Nurse</label>
                                        <select class="form-select" id="exampleSelectd" name="scrub_nurse" disabled>
                                            <option>Please select a nurse</option>
                                            <option selected>No nurse available</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Assistant Surgeon</label>
                                        <select class="form-select" id="exampleSelectd" name="ass_surgeon" disabled>
                                            <option>Please Select a Surgeon</option>
                                            <option selected>Default Admin</option>
                                            <option>Mercy Iburuoma</option>
                                            <option>Joy Eneh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelectd" class="font-weight-bolder">Anaesthetist</label>
                                        <select class="form-select" id="exampleSelectd" name="anaesthetist" disabled>
                                            <option>Please select a nurse</option>
                                            <option selected>No nurse available</option>
                                        </select>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Orders & Notes --}}
{{-- Nurses Notes --}}
<div id="newNurseNote" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Nurses Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="content_insert" class="fw-bolder">Notes</label>
                        <textarea
                            class="form-control my-2"
                            id="content_insert"
                            name="content_insert"
                            rows="5"
                        ></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Nurses Notes --}}
<div id="edit_NurseNote" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Nurses Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="content_insert" class="fw-bolder">Notes</label>
                        <textarea class="form-control my-2" id="content_insert" name="content_insert" rows="5">
Patient has been vommiting
                    </textarea
                        >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
