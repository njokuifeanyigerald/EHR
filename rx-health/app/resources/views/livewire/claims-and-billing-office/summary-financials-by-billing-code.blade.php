<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Billing Code</th>
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
                            @forelse ($details_by_billing_codes as $details_by_billing_code)
                                <tr>
                                    <td scope="row">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $this->billingCodeActualName($details_by_billing_code->payment_type) }}
                                    </td>
                                    <td>
                                        {{ now()->month($this->month)->format('F') }}
                                    </td>
                                    <td>
                                        {{ $this->year }}
                                    </td>
                                    {{--
                                        <td>INSURANCE</td>
                                        <td>Acacia Health Insurance</td>
                                    --}}

                                    <td>
                                        {{ $details_by_billing_code->no_of_claims }}
                                    </td>

                                    <td>
                                        {{ number_format($details_by_billing_code->total_amount, 2, '.', ',') }}
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{
                                                in_array($details_by_billing_code->payment_type, ['insurance', 'credit_corporate'])
                                                    ? route('claims_billing.summary_financials_by_companies', [
                                                        'billing_code' => $details_by_billing_code->payment_type,
                                                        'year' => $this->year,
                                                        'month' => $this->month,
                                                    ])
                                                    : route('claims_billing.summary_financials_by_billing_code_breakdown', [
                                                        'billing_code' => $details_by_billing_code->payment_type,
                                                        'year' => $this->year,
                                                        'month' => $this->month,
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
            </div>
        </div>
    </div>
</div>
