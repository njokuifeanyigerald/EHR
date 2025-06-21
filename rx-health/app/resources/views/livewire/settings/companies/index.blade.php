<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="corporate-tab"
                            data-bs-toggle="tab"
                            href="#corporate"
                            role="tab"
                            aria-controls="pills-home"
                            aria-selected="true"
                        >
                            Corporate
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="insurance-tab"
                            data-bs-toggle="tab"
                            href="#insurance"
                            role="tab"
                            aria-controls="pills-home"
                        >
                            Insurance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="lab-tab"
                            data-bs-toggle="tab"
                            href="#lab"
                            role="tab"
                            aria-controls="pills-home"
                        >
                            Unknown
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent-2">
            <div class="tab-pane fade show active" id="corporate" role="tabpanel" aria-labelledby="corporate-tab">
                <livewire:settings.companies.company-listing :type="'company'" />
            </div>
            <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
                <livewire:settings.companies.company-listing :type="'insurance'" />
            </div>
            <div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">
                <livewire:settings.companies.company-listing :type="''" />
            </div>
        </div>
    </div>
</div>
