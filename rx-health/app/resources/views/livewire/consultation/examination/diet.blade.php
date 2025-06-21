<div>
    <div class="row">
        <div class="col-sm-3 border-end border-muted">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a
                    class="nav-link p-1 mb-2 active"
                    id="anthropometric-tab"
                    data-bs-toggle="pill"
                    href="#anthropometric"
                    role="tab"
                    aria-controls="anthropometric"
                    aria-selected="true"
                >
                    {{-- Dietician Management (Anthropometric Parameters & History) --}}
                    Anthropometric Parameters
                </a>
                <a
                    class="nav-link p-1 mb-2"
                    id="intervention-eval-tab"
                    data-bs-toggle="pill"
                    href="#intervention-eval"
                    role="tab"
                    aria-controls="intervention-eval"
                    aria-selected="false"
                    tabindex="-1"
                >
                    {{-- Dietician Management (Intervention & Evaluation) --}}
                    Intervention & Evaluation
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="tab-content mt-0" id="v-pills-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="anthropometric"
                    role="tabpanel"
                    aria-labelledby="anthropometric-tab"
                >
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="ant-params-tab"
                                data-bs-toggle="pill"
                                href="#ant-params"
                                role="tab"
                                aria-controls="ant-params"
                                aria-selected="true"
                            >
                                Anthropometric Parameters
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="dietary-history-tab"
                                data-bs-toggle="pill"
                                href="#dietary-history"
                                role="tab"
                                aria-controls="dietary-history"
                                aria-selected="false"
                                wire:click="dispatch('loadDietHistoryRecords');"
                            >
                                Dietary History
                            </a>
                        </li>
                        {{--
                            <li class="nav-item">
                            <a
                            class="nav-link"
                            id="miscellaneous-tab"
                            data-bs-toggle="pill"
                            href="#miscellaneous"
                            role="tab"
                            aria-controls="miscellaneous"
                            aria-selected="false"
                            >
                            Miscellaneous
                            </a>
                            </li>
                        --}}
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="impressions-tab"
                                data-bs-toggle="pill"
                                href="#impressions"
                                role="tab"
                                aria-controls="impressions"
                                aria-selected="false"
                            >
                                Impressions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="diet-plan-tab"
                                data-bs-toggle="pill"
                                href="#diet-plan"
                                role="tab"
                                wire:click="dispatch('loadDietPlanRecords');"
                                aria-controls="diet-plan"
                                aria-selected="false"
                            >
                                Diet Plan
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div
                            class="tab-pane fade show active"
                            id="ant-params"
                            role="tabpanel"
                            aria-labelledby="ant-params-tab"
                        >
                            <livewire:consultation.examination.diet.anthropometric-parameters :visit="$this->visit" />
                        </div>
                        <div
                            class="tab-pane fade"
                            id="dietary-history"
                            role="tabpanel"
                            aria-labelledby="dietary-history-tab"
                        >
                            <livewire:consultation.examination.diet.diet-history :visit="$this->visit" />
                        </div>
                        <div
                            class="tab-pane fade"
                            id="miscellaneous"
                            role="tabpanel"
                            aria-labelledby="miscellaneous-tab"
                        >
                            <div class="table-responsive">
                                <div class="d-flex justify-content-end mb-2">
                                    <button
                                        data-bs-toggle="modal"
                                        data-bs-target="#new_misc"
                                        class="btn btn-sm btn-primary"
                                    >
                                        Add Miscellaneous
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-head-custom cursor text-center mt-3">
                                        <thead class="">
                                            <tr>
                                                <th>Intake</th>
                                                <th>Dosage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="impressions" role="tabpanel" aria-labelledby="impressions-tab">
                            <livewire:consultation.includes.c-k-editor :model_type="'impression'" :visit="$visit" />
                        </div>
                        <div class="tab-pane fade" id="diet-plan" role="tabpanel" aria-labelledby="diet-plan-tab">
                            <livewire:consultation.examination.diet.diet-plan :visit="$visit" />
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="intervention-eval"
                    role="tabpanel"
                    aria-labelledby="intervention-eval-tab"
                >
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="intervention-tab"
                                data-bs-toggle="pill"
                                href="#intervention"
                                role="tab"
                                aria-controls="intervention"
                                aria-selected="true"
                            >
                                Intervention
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="monitoring-evaluation-tab"
                                data-bs-toggle="pill"
                                href="#monitoring-evaluation"
                                role="tab"
                                aria-controls="monitoring-evaluation"
                                aria-selected="false"
                            >
                                Monitoring & Evaluation
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div
                            class="tab-pane fade show active"
                            id="intervention"
                            role="tabpanel"
                            aria-labelledby="intervention-tab"
                        >
                            <livewire:consultation.includes.c-k-editor
                                :model_type="'diet_intervention'"
                                :visit="$visit"
                            />
                        </div>
                        <div
                            class="tab-pane fade"
                            id="monitoring-evaluation"
                            role="tabpanel"
                            aria-labelledby="monitoring-evaluation-tab"
                        >
                            <livewire:consultation.includes.c-k-editor
                                :model_type="'diet_monitoring_and_evaluation'"
                                :visit="$visit"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.consultation.modals.new_misc')
</div>
