<!-- Search -->
<div class="col-sm-12">
    <div class="iq-card">
        <div class="iq-card-body">
            <p>Search for a patient using folder number,telephone,visit number,visit date.</p>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        <div class="input-icon input-icon-right">
                            <input
                                type="search"
                                class="form-control"
                                placeholder="Enter Folder Number/Tel/Visit Number"
                                name="item_name"
                                wire:model.live="search"
                            />
                            <span><i class="fa fa-search"></i></span>
                            {{-- <input type="hidden" name="diagnosis_id" id="diagnosis_id" value="0" /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
