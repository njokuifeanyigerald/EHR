<div class="col-md-12 col-lg-12">
    <div class="iq-card">
        <div class="iq-card-body">
            <div class="">
                {{-- Search --}}
                <p>Search for an item</p>
                <div class="row">
                    <div class="form-group col-md-9">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12 d-flex gap-3">
                            {{-- Check boxes for begin with contains or ends with --}}
                            <div class="w-full">
                                <label for="item_name">Search Type</label>
                                <select class="form-select" name="search_type" wire:model="search_type">
                                    <option value="begins_with">Begins With</option>
                                    <option value="contains">Contains</option>
                                    <option value="ends_with">Ends With</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="item_name">Search for</label>
                                <div class="form-group d-flex gap-2">
                                    <div class="input-icon input-icon-right">
                                        <input
                                            type="search"
                                            class="form-control"
                                            {{-- autofocus --}}
                                            wire:model="search_query"
                                            {{-- wire:model.blur="search_query" --}}
                                            placeholder="Search for Provider Item"
                                            wire:keydown.enter="search"
                                            name="search_query"
                                        />

                                        <span class="input-icon-addon clickable-cursor">
                                            <i class="fa fa-search"></i>
                                        </span>

                                        {{-- <input type="hidden" name="visit_number" id="visit_number" value="0"> --}}
                                    </div>
                                    <button
                                        type="button"
                                        class="btn btn-primary input-group-append"
                                        wire:click="search"
                                    >
                                        {{-- <i class="fa fa-search"></i> --}}

                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
