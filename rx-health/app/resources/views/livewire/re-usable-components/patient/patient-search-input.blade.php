<div>
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                <form class="form-group col-md-6">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        <div class="col-9">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    autofocus
                                    wire:model.live.debounce.700ms="search_query"
                                    placeholder="Search for Patient"
                                    name="search_query"
                                />
                                <span class="input-icon-addon clickable-cursor">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
