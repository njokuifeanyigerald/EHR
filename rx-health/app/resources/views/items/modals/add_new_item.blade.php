<!-- Add purchase order Modal -->
<div class="modal fade" id="add_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Code</label>
                                <div class="col-md-9 col-sm-12">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="item_code"
                                        disabled=""
                                        readonly=""
                                        value=""
                                        placeholder="Item code will generate after creation"
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Name</label>
                                <div class="col-md-9 col-sm-12">
                                    <input type="text" class="form-control" name="item_name" value="" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Price</label>
                                <div class="col-md-9 col-sm-12">
                                    <input type="number" class="form-control" name="item_price" value="" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Item Category</label>
                                <div class="col-md-9 col-sm-12">
                                    <select class="form-select" name="item_category" id="item_category">
                                        <option value="Drugs">Drugs</option>
                                        <option value="Laboratory">Laboratory</option>
                                        <option value="Administrative">Administrative</option>
                                        <option value="Procurement">Procurement</option>
                                        <option value="Dental">Dental</option>
                                        <option value="ENT">ENT</option>
                                        <option value="Consumable">Consumable</option>
                                        <option value="Hearing aids">Hearing aids</option>
                                        <option value="Medical">Medical</option>
                                        <option value="Occupational Therapy">Occupational Therapy</option>
                                        <option value="Optical">Optical</option>
                                        <option value="Physiotherapy">Physiotherapy</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                        <option value="Psychology">Psychology</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Speech Therapy">Speech Therapy</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Generic Name</label>
                                <div class="col-md-9 col-sm-12">
                                    <select
                                        class="form-select select2"
                                        id="kt_select2_1"
                                        name="generic_name"
                                        aria-placeholder=" Select Generic Name"
                                    >
                                        <option value="" data-select2-id="870">Select Generic Name</option>
                                        <option value="ABACAVIR" data-select2-id="905">ABACAVIR</option>
                                        <option value="MULTIVITAMINS AND MINERALS" data-select2-id="906">
                                            MULTIVITAMINS AND MINERALS
                                        </option>
                                        <option value="ACECLOFENAC" data-select2-id="907">ACECLOFENAC</option>
                                        <option value="ACETAZOLAMIDE" data-select2-id="909">ACETAZOLAMIDE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Stocking Unit</label>
                                <div class="col-md-9 col-sm-12">
                                    <select
                                        class="form-select select2"
                                        id="kt_select2_2"
                                        name="unit_of_measurement"
                                        id="unit_of_measurement"
                                    >
                                        <option value="">Please Select Stocking Unit</option>
                                        <option value="Bottle" data-select2-id="1773">Bottle</option>
                                        <option value="Apply" data-select2-id="1774">Apply</option>
                                        <option value="Cap" data-select2-id="1775">Cap</option>
                                        <option value="Tube" data-select2-id="1778">Tube</option>
                                        <option value="Unit" data-select2-id="1783">Unit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Opening Stock</label>
                                <div class="col-md-9 col-sm-12">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="opening_stock"
                                        id="opening_stock"
                                        value=""
                                    />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-sm-12 col-form-label">Status</label>
                                <div class="col-md-9 col-sm-12">
                                    <select class="form-select" name="status" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Item</button>
            </div>
        </div>
    </div>
</div>
