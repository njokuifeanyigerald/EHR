<div>
    {{-- New miscellaneous --}}
    <div wire:ignore.self id="new_misc" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Miscellaneous</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new-user-info">
                        <div class="form-horizontal">
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Intake">
                                        Intake
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="" class="form-control my-2" id="Intake" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Dosage">
                                        Dosage
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" value="" class="form-control my-2" id="Dosage" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
