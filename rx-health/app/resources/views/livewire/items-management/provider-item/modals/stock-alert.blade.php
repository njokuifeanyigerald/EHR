<div>
    <!-- Price settings modal -->
    <div
        wire:ignore.self
        class="modal fade"
        id="stock_alert"
        tabindex="-1"
        aria-labelledby="outsource"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outsource request">
                        <h5>
                            Alert Settings -
                            <small>
                                Low Stock
                                <span class="fw-semibold">({{ $this->item->item_name }})</span>
                            </small>
                        </h5>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group row">
                            <label class="col-md-3 col-sm-12 col-form-label">Alert Status</label>
                            <div class="col-md-12 col-sm-12">
                                <select class="form-control" name="currency" wire:model="alert_status">
                                    <option value="0">OFF</option>
                                    <option value="1">ON</option>
                                </select>
                                <x-input-error :messages="$errors->get('alert_status')" class="mt-1" />
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
                                    wire:model="alert_percentage"
                                />
                                <x-input-error :messages="$errors->get('alert_percentage')" class="mt-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveAlertSettings" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
