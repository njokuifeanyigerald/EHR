<div>
    <div>
        <div class="iq-card-body">
            <div class="row">
                {{-- vertical Tabs --}}
                <div class="col-sm-3 border-end border-muted">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a
                            class="nav-link p-1 mb-2 active"
                            id="physical-exams-tab"
                            data-bs-toggle="pill"
                            href="#physical-exams"
                            role="tab"
                            aria-controls="physical-exams"
                            wire:ignore.self
                            aria-selected="true"
                        >
                            Physical Exams
                        </a>
                        <a
                            class="nav-link p-1 mb-2"
                            id="analysis-of-findings-tab"
                            data-bs-toggle="pill"
                            href="#analysis-of-findings"
                            role="tab"
                            aria-controls="analysis-of-findings"
                            wire:ignore.self
                            aria-selected="true"
                        >
                            Analysis of Findings
                        </a>
                        <a
                            class="nav-link p-1 mb-2"
                            id="treatment-plans-tab"
                            data-bs-toggle="pill"
                            href="#treatment-plans"
                            role="tab"
                            aria-controls="treatment-plans"
                            wire:ignore.self
                            aria-selected="true"
                        >
                            Treatment Plans
                        </a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content mt-0" id="v-pills-tabContent">
                        <div
                            class="tab-pane fade show active"
                            id="physical-exams"
                            role="tabpanel"
                            aria-labelledby="physical-exams-tab"
                            wire:ignore.self
                        >
                            <div>
                                <livewire:consultation.examination.physiotherapy.physical-exams :visit="$visit" />
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="analysis-of-findings"
                            role="tabpanel"
                            aria-labelledby="analysis-of-findings-tab"
                            wire:ignore.self
                        >
                            <div>
                                <livewire:consultation.examination.physiotherapy.analysis-of-findings :visit="$visit" />
                            </div>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="treatment-plans"
                            role="tabpanel"
                            aria-labelledby="treatment-plans-tab"
                            wire:ignore.self
                        >
                            <div>
                                <livewire:consultation.examination.physiotherapy.treatment-plan :visit="$visit" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
