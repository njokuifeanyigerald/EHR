{{-- Pescription modal --}}
<div id="searchDrug_examination" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Pescription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-2">
                <form action="">
                    @csrf
                    <div class="form-group px-0">
                        <div class="mt-2">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    placeholder="Search Drug"
                                    name="item_name"
                                    id="item_name"
                                />
                                <span><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                            Frequency
                        </label>

                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tid" name="cb_name" class="custom-control-input" value="tid" />
                                <label class="custom-control-label" for="tid">tid</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bid" name="cb_name" class="custom-control-input" value="bid" />
                                <label class="custom-control-label" for="bid">bid</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="od" name="cb_name" class="custom-control-input" value="od" />
                                <label class="custom-control-label" for="od">od</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    id="stat"
                                    name="cb_name"
                                    class="custom-control-input"
                                    value="stat"
                                />
                                <label class="custom-control-label" for="stat">stat</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="prn" name="cb_name" class="custom-control-input" value="prn" />
                                <label class="custom-control-label" for="prn">prn</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input
                                    type="radio"
                                    id="nocte"
                                    name="cb_name"
                                    class="custom-control-input"
                                    value="nocte"
                                />
                                <label class="custom-control-label" for="nocte">nocte</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="qid" name="cb_name" class="custom-control-input" value="qid" />
                                <label class="custom-control-label" for="qid">qid</label>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-4 col-3 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="q4h" name="cb_name" class="custom-control-input" value="q4h" />
                                <label class="custom-control-label" for="q4h">q4h</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Dose</label>
                            <input type="number" class="form-control" id="dose" name="dose" />
                        </div>

                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Unit</label>
                            <select class="form-select" name="dosage_form" id="dosage_form">
                                <option value="Bottle">Bottle</option>
                                <option value="Apply">Apply</option>
                                <option value="Cap">Cap</option>
                                <option value="Tab">Tab</option>
                                <option value="IM">IM</option>
                                <option value="Tube">Tube</option>
                                <option value="Drop">Drop</option>
                                <option value="SC">SC</option>
                                <option value="mg">mg</option>
                                <option value="IV">IV</option>
                                <option value="Unit">Unit</option>
                                <option value="g">g</option>
                                <option value="Supp">Supp</option>
                                <option value="L">L</option>
                                <option value="OC">OC</option>
                                <option value="Puff">Puff</option>
                                <option value="ug">ug</option>
                                <option value="kg">kg</option>
                                <option value="OC">OC</option>
                                <option value="Ml">Ml</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">#Days</label>
                            <input type="number" class="form-control" name="days" id="days" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <label class="col-form-label font-size-base font-weight-bolder">Route</label>
                            <select class="form-select" id="route" name="route">
                                <option>Externally</option>
                                <option>Oral</option>
                                <option>Inhale</option>
                                <option>Rectally</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label font-size-base font-weight-bolder col-md-12 col-sm-12">
                            Payment Mode
                        </label>
                        <div class="col-md-6 col-sm-12 col-lg-12 col-12">
                            <div wire:id="lR2hZasQMM6SMxy1EcCw">
                                <select
                                    class="form-select"
                                    name="payment_mode"
                                    id="payment_mode"
                                    onchange="changeInsurance(this.value)"
                                    wire:model="mode_of_payment"
                                >
                                    <option value="CASH">Cash Clients</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
