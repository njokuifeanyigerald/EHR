<div>
    <!-- Header title -->
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>
                        {{ $this->billingCodeActualName($this->billing_code) }} Submissions for
                        {{ now()->parse($this->year . '-' . $this->month)->format('F Y') }}
                    </h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                    @if ($this->year != now()->year || $this->month != now()->month)
                        <a
                            href="{{
                                route('claims_billing.summary_financials_by_billing_code_breakdown', [
                                    'billing_code' => $this->billing_code,
                                    'year' => now()->year,
                                    'month' => now()->month,
                                ])
                            }}"
                            class="btn btn-secondary px-1 py-1 me-2"
                            title="View Claims For This Month"
                        >
                            <i class="fa-regular fa-eye"></i>
                            View Claims For This Month
                        </a>
                    @endif

                    <a href="{{ url()->current() }}" class="btn btn-success px-1 py-1 me-2" title="Refresh">
                        <i class="fa fa-arrows-rotate"></i>
                        Refresh
                    </a>
                    <a href="#" class="btn btn-dark px-2 py-1 me-2" title="Print Test Result">
                        <i class="fa fa-print"></i>
                        Print
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h5 class="card-title">Summary Of Claims</h5>
                        </div>
                    </div>
                    @include('livewire.claims-and-billing-office.includes.breakdown_summary_of_claims')
                </div>
            </div>

            <div class="col-lg-6">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="text-center">
                            <button class="btn btn-primary">
                                Click to Close Account and Receive Payment Invoice Number
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h5 class="card-title">Details By Item Categories</h5>
                </div>
            </div>
            @include('livewire.claims-and-billing-office.includes.breakdown_summary_by_item_categories')
        </div>
    </div>
</div>
