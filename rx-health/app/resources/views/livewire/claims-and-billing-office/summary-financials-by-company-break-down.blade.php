<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Code</th>
                                <th scope="col">Month</th>
                                <th scope="col">Year</th>
                                {{--
                                    <th scope="col">Mode Of Payment</th>
                                    <th scope="col">Type Of Client</th>
                                --}}
                                <th scope="col">No Of Claims.</th>
                                <th scope="col">Sum</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies ?? [] as $company)
                                <tr>
                                    <td scope="row">
                                        {{ $loop->iteration + $companies->firstItem() - 1 }}
                                    </td>
                                    <td>
                                        {{ $company->name }}
                                    </td>
                                    <td>
                                        {{ $company->code }}
                                    </td>
                                    <td>
                                        {{ now()->month($this->month)->format('F') }}
                                    </td>
                                    <td>
                                        {{ $this->year }}
                                    </td>

                                    <td>
                                        {{ count($details_by_companies->where('visit.insurance_company', $company->code)) }}
                                    </td>

                                    <td>
                                        {{ number_format($this->calculateTotalAmountFromVisitDetails($details_by_companies->where('visit.insurance_company', $company->code)), 2, '.', ',') }}
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{
                                                route('claims_billing.summary_financials_by_billing_code_breakdown', [
                                                    'billing_code' => $this->billing_code,
                                                    'year' => $this->year,
                                                    'month' => $this->month,
                                                    'company_code' => $company->code,
                                                ])
                                            }}"
                                            title="View Details"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>
