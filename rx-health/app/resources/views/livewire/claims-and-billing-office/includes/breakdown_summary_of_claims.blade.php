<div class="iq-card-body">
    <table class="table">
        <tbody>
            @if ($this->billing_code == 'insurance' || $this->billing_code == 'credit_corporate')
                <tr>
                    <td class="text-start fw-bold">Company Name:</td>
                    <td class="text-end">{{ $this->company_name }}</td>
                </tr>
                <tr>
                    <td class="text-start fw-bold">Company Code:</td>
                    <td class="text-end">{{ $this->company_code }}</td>
                </tr>
                {{--
                    @elseif ($this->billing_code == 'credit_corporate')
                    <tr>
                    <td class="text-start fw-bold">Company Name:</td>
                    <td class="text-end">ACACIA HEALTH INSURANCE</td>
                    </tr>
                --}}
            @endif

            <tr>
                <td class="text-start fw-bold">Period:</td>
                <td class="text-end">
                    {{ now()->parse($this->year . '-' . $this->month)->format('F Y') }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="text-end bg-success text-white fw-bold">SUM OF CLAIMS</td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Submitted (Out-Patient):</td>
                <td class="text-end">
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details->where('visit.serviceType.code', 'OUTP')), 2, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Not Submitted (Out-Patient):</td>
                <td class="text-end">
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details->where('visit.serviceType.code', 'OUTP')), 2, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Submitted (In-Patient):</td>
                <td class="text-end">
                    {{-- {{ dd($visit_details->first()) }} --}}
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details->where('visit.serviceType.code', 'INP')), 2, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Expected Total:</td>
                <td class="text-end">
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details->where('visit.serviceType.code', 'INP')), 2, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Not Submitted (In-Patient):</td>
                <td class="text-end">
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details), 2, '.', ',') }}
                </td>
            </tr>
            <tr>
                <td class="text-start fw-bold">Overall Total:</td>
                <td class="text-end">
                    {{ number_format($this->calculateTotalAmountFromVisitDetails($visit_details), 2, '.', ',') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
