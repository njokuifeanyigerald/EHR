<!-- Price settings modal -->
<div class="modal fade" id="stock_alert" tabindex="-1" aria-labelledby="outsource" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outsource request">
                    <h5>
                        Alert Settings -
                        <small>Low Stock</small>
                    </h5>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Alert Status</label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control" name="currency" wire:model="low_stock_items">
                                <option value="0">OFF</option>
                                <option value="1">ON</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-sm-12 col-form-label">Alert Value (%)</label>
                        <div class="col-md-12 col-sm-12">
                            <input
                                type="number"
                                min="0"
                                max="100"
                                class="form-control"
                                placeholder="Stock Alert Value"
                                wire:model="low_stock_qty_alert"
                            />
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
