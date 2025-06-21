<div>
    <div class="iq-card-body">
        <ul wire:ignore.self class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a
                    wire:ignore.self
                    class="nav-link active"
                    id="CurrentVisits-tab"
                    data-bs-toggle="tab"
                    wire:click="searchingQuery('in_use')"
                    href="#CurrentVisits"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true"
                >
                    Current Visits
                </a>
            </li>
            <li class="nav-item">
                <a
                    wire:ignore.self
                    class="nav-link"
                    id="ServedVisits-tab"
                    data-bs-toggle="tab"
                    wire:click="searchingQuery('done')"
                    href="#ServedVisits"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false"
                >
                    Discharged Visits
                </a>
            </li>
            <li class="nav-item">
                <a
                    wire:ignore.self
                    class="nav-link"
                    id="GuestVisits-tab"
                    data-bs-toggle="tab"
                    wire:click="searchingQuery('guest')"
                    href="#GuestVisits"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false"
                >
                    Guest Visits
                </a>
            </li>
        </ul>
        <div class="mt-4">
            {{-- Search --}}
            <p>
                Search for a patient -
                <small>using Folder Number/Tel/Vist Number/Visit Date.</small>
            </p>
            <div class="row">
                <form class="form-group col-md-6">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        <div class="input-icon input-icon-right">
                            <input
                                type="search"
                                class="form-control"
                                autofocus
                                wire:model.live.debounce.550ms="searchTerm"
                                placeholder="Enter Folder Number/Tel/Vist Number/Visit Date"
                                name="search_term"
                            />
                            <span style="cursor: pointer" class="input-icon-addon" wire:click="searchingQuery">
                                <i class="fa fa-search"></i>
                            </span>
                            {{-- <input type="hidden" name="visit_number" id="visit_number" value="0"> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
