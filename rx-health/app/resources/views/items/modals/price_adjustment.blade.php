<!-- Price adjustment Modal -->
<div class="modal fade" id="price_adjustment" tabindex="-1" aria-labelledby="outsource" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outsource request">Set all Item Price</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="flex flex-col mb-3">
                        <label for="item_category">Item Category</label>
                        <select class="form-select" name="item_category" id="item_category">
                            <option value="">Select Category</option>
                            <option value="Drugs" selected>Drugs</option>
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

                <div class="col-12">
                    <div class="flex flex-col mb-3">
                        <label for="price_percent">Price Percent(%)</label>
                        <input
                            class="form-control"
                            type="number"
                            min="0"
                            max="100"
                            placeholder="Change all item price by percent"
                        />
                    </div>
                </div>

                <div class="col-12">
                    <div class="flex flex-col mb-3">
                        <label for="price_percent">Billing Code</label>
                        <select class="form-select" name="billing_code" id="billing_code">
                            <option value="" disabled="" selected="" hidden="">Please Select Billing type</option>
                            <option value="CASH" selected>Cash Clients</option>
                            <option value="CREDIT">Credit/Coorporate Client</option>
                            <option value="INS">Insurance Client</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="flex flex-col mb-3">
                        <label for="price_percent">Company</label>
                        <select class="form-select" name="company" id="company" wire:model.lazy="company">
                            <option value="">CASH</option>
                            <option value="1">ELECTRICITY COMPANY OF GHANA</option>
                            <option value="2">OCEANIC INSURANCE</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="flex flex-col mb-3">
                        <label for="price_change_type">Price Change Type</label>
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                <input
                                    type="radio"
                                    id="increment"
                                    name="customRadio-10"
                                    class="custom-control-input bg-success me-1"
                                    value="increment"
                                    checked
                                />
                                <label class="custom-control-label" for="increment">Increase Price</label>
                            </div>
                            <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                <input
                                    type="radio"
                                    id="decrement"
                                    name="customRadio-10"
                                    class="custom-control-input bg-danger"
                                    value="decrement"
                                />
                                <label class="custom-control-label" for="decrement">Decrease Price</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
