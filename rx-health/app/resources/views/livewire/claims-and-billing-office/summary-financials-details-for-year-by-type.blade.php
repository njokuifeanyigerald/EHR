<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Month</th>
                                <th scope="col">Year</th>
                                {{--
                                    <th scope="col">Mode Of Payment</th>
                                    <th scope="col">Type Of Client</th>
                                --}}
                                <th scope="col">No Of Visits.</th>
                                <th scope="col">Sum</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details_by_months as $details_by_month)
                                <tr>
                                    <td scope="row">
                                        {{ $loop->iteration + $details_by_months->firstItem() - 1 }}
                                    </td>
                                    <td>
                                        {{ now()->month($details_by_month->month)->format('F') }}
                                    </td>
                                    <td>
                                        {{ $this->year }}
                                    </td>
                                    {{--
                                        <td>INSURANCE</td>
                                        <td>Acacia Health Insurance</td>
                                    --}}
                                    <td>
                                        {{ $visit_counts_by_months->where('month', $details_by_month->month)->first()->no_of_visits ?? 0 }}
                                    </td>
                                    <td>
                                        {{ number_format($details_by_month->total_amount, 2, '.', ',') }}
                                    </td>
                                    <td class="text-center">
                                        <a
                                            {{-- href="{{ route('claims_billing.insurance_submission', 1) }}" --}}
                                            href="{{
                                                $this->billing_code == '*'
                                                    ? route('claims_billing.summary_financials_details_by_billing_code', [
                                                        'month' => $details_by_month->month,
                                                        'year' => $this->year,
                                                    ])
                                                    : (in_array($this->billing_code, ['insurance', 'credit_corporate'])
                                                        ? route('claims_billing.summary_financials_by_companies', [
                                                            'billing_code' => $this->billing_code,
                                                            'year' => $this->year,
                                                            'month' => $details_by_month->month,
                                                        ])
                                                        : route('claims_billing.summary_financials_by_billing_code_breakdown', [
                                                            'billing_code' => $this->billing_code,
                                                            'year' => $this->year,
                                                            'month' => $details_by_month->month,
                                                        ]))
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

                    {{ $details_by_months->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
