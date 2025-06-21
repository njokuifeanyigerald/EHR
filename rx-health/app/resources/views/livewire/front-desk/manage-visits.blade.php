<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $type == 'current' ? 'active' : '' }}"
                            id="CurrentVisits-tab"
                            data-bs-toggle="tab"
                            href="#CurrentVisits"
                            role="tab"
                            wire:click="setType('current')"
                            aria-controls="pills-home"
                            aria-selected="true"
                        >
                            Current Visits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $type == 'served' ? 'active' : '' }}"
                            id="ServedVisits-tab"
                            data-bs-toggle="tab"
                            href="#ServedVisits"
                            role="tab"
                            wire:click="setType('served')"
                            aria-controls="pills-profile"
                            aria-selected="false"
                        >
                            Served Visits
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ $type == 'guest' ? 'active' : '' }}"
                            id="GuestVisits-tab"
                            data-bs-toggle="tab"
                            href="#GuestVisits"
                            wire:click="setType('guest')"
                            role="tab"
                            aria-controls="pills-contact"
                            aria-selected="false"
                        >
                            Guest Visits
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                <form class="form-group col-md-6">
                    <p>
                        Search for Patient -
                        <small>using Patient Name/Vist Number</small>
                    </p>
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

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="tab-content" id="pills-tabContent-2">
                    {{-- current visits --}}
                    <div
                        class="tab-pane fade {{ $type == 'current' ? 'show active' : '' }}"
                        id="CurrentVisits"
                        role="tabpanel"
                        aria-labelledby="CurrentVisits-tab"
                    >
                        @include('visits.visit_listing', ['visits' => $visits, 'type' => 'current'])
                    </div>

                    {{-- Served visits --}}
                    <div
                        class="tab-pane fade {{ $type == 'served' ? 'show active' : '' }}"
                        id="ServedVisits"
                        role="tabpanel"
                        aria-labelledby="ServedVisits-tab"
                    >
                        @include('visits.visit_listing', ['visits' => $visits, 'type' => 'served'])
                    </div>

                    {{-- Guest visits --}}
                    <div
                        class="tab-pane fade {{ $type == 'guest' ? 'show active' : '' }}"
                        id="GuestVisits"
                        role="tabpanel"
                        aria-labelledby="GuestVisits-tab"
                    >
                        @include('visits.visit_listing', ['visits' => $visits, 'type' => 'guest'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
