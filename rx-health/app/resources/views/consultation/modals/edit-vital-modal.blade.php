{{-- Edit observation modal --}}
<div id="EditVitals_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vital</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" action="">
                @csrf
                <div class="modal-body">
                    <div class="new-user-info">
                        <div class="row">
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
                                        <input type="text" value="60" class="form-control my-2" id="bp" />
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
                                        <input type="text" value="67" class="form-control my-2" id="respiratory Rate" />
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
                                        <input type="text" value="160" class="form-control my-2" id="height" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                        Weight (Kg)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="52" class="form-control my-2" id="weight" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                        Blood Sugar Level
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="52" class="form-control my-2" id="sugar_level" />
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
                                            value="50"
                                            class="form-control my-2"
                                            id="oxygen_saturation"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Vital</button>
                </div>
            </form>
        </div>
    </div>
</div>
