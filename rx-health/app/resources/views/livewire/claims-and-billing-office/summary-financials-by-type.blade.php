<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Year</th>
                                <th scope="col">No Of Claims.</th>
                                <th scope="col">Sum</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details_by_years as $detail_by_year)
                                <tr>
                                    <td scope="row">{{ $loop->iteration + $details_by_years->firstItem() - 1 }}</td>
                                    <td>
                                        {{ $detail_by_year->year }}
                                    </td>
                                    <td>
                                        {{ $detail_by_year->no_of_claims }}
                                    </td>
                                    <td>
                                        {{ number_format($detail_by_year->total_amount, 2, '.', ',') }}
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{
                                                $this->billing_code == '*'
                                                    ? route('claims_billing.summary_financials_details', [
                                                        'year' => $detail_by_year->year,
                                                    ])
                                                    : route('claims_billing.summary_financials_details_by_billing_code_for_year', [
                                                        'billing_code' => $this->billing_code,
                                                        'year' => $detail_by_year->year,
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
                                    <td colspan="5" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $details_by_years->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
