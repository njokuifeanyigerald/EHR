<!-- Price settings modal -->
<div class="modal fade" id="price_settings" tabindex="-1" aria-labelledby="outsource" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outsource request">
                    <h5>
                        Price Setting -
                        <small>Abacavir 300mg Tablet</small>
                    </h5>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12 px-3">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Billing Type</label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-select" name="billing_code" wire:model="billing_code">
                                <option value="CASH">Cash Clients</option>
                                <option value="CREDIT">Credit/Coorporate Client</option>
                                <option value="INS">Insurance Client</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">company</label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-select" name="company" wire:model="company1">
                                <option value="0">CASH</option>
                                <option value="1">ELECTRICITY COMPANY OF GHANA</option>
                                <option value="2">OCEANIC INSURANCE</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Currency</label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-select" name="currency" wire:model="currency">
                                <option value="NGN">Nigerian Naira</option>
                                <option value="GHS">Ghanaian Cedis</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Price</label>
                        <div class="col-md-12 col-sm-12">
                            <input
                                type="number"
                                class="form-control"
                                name="price"
                                value=""
                                min="1"
                                wire:model="price"
                            />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Status</label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-select" name="currency" wire:model="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
