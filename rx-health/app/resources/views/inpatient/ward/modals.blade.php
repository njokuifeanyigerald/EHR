{{-- Add bed Modal --}}
<div id="add_bed" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Bed</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body mx-5">
                    <div class="form-group">
                        <label for="bed_name" class="fw-bold">
                            Bed Name
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control my-2" id="bed_name" name="bed_name" />
                    </div>
                    <div class="form-group">
                        <label for="status" class="fw-bold">
                            Status
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select my-2" id="status" name="status">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward_id" class="fw-bold">
                            Ward
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select my-2" id="ward_id" name="ward_id">
                            {{-- <option value="1">Ward1</option> --}}
                            <option value="2">Male</option>
                            <option value="3">Surgical</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Bed</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Add Ward --}}
<div id="add_ward" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Ward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body mx-5">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="ward_name" class="fw-bold">
                                Ward Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control my-2" id="ward_name" name="ward_name" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status" class="fw-bold">
                                Status
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="status" name="status">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="price" class="fw-bold">
                                Price
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control my-2" id="price" name="price" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="floor" class="fw-bold">
                                Floor
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="floor" name="floor">
                                <option value="1">Ground Floor</option>
                                <option value="2">First Floor</option>
                                <option value="3">Second Floor</option>
                                <option value="4">Third Floor</option>
                                <option value="5">Fouth Floor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Ward</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Update Ward --}}
<div id="update_ward" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Add Ward</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body mx-5">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="ward_name" class="fw-bold">
                                Ward Name
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control my-2" id="ward_name" value="Male" name="ward_name" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="status" class="fw-bold">
                                Status
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="status" name="status">
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="price" class="fw-bold">
                                Price
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control my-2" id="price" value="10000" name="price" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="floor" class="fw-bold">
                                Floor
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select my-2" id="floor" name="floor">
                                <option value="1">Ground Floor</option>
                                <option value="2">First Floor</option>
                                <option value="3" selected>Second Floor</option>
                                <option value="4">Third Floor</option>
                                <option value="5">Fouth Floor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Ward</button>
                </div>
            </form>
        </div>
    </div>
</div>
