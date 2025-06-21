@props([
    'type' => 'current',
    'admissions' => [],
])

<div>
    <div class="table-responsive">
        <table class="table table-head-custom">
            <thead>
                <tr>
                    <th>Admission Date</th>
                    <th>Ward</th>
                    <th>Floor</th>
                    <th>Bed</th>
                    {{-- <th>Payment Method</th> --}}
                    <th>Admission Status</th>
                    <th>Days Admitted</th>
                    <th>Discharge Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admissions as $admission)
                    <tr>
                        <td>
                            {{ now()->parse($admission->booking_date)->format('jS F Y') }}
                        </td>
                        <td>
                            {{ Str::title($admission->ward->ward_name ?? 'N/A') }}
                        </td>
                        <td>
                            {{ Str::title($admission->ward->floor->floor_name ?? 'N/A') }}
                        </td>
                        <td>
                            {{ Str::title($admission->bed->bed_name ?? 'N/A') }}
                        </td>
                        {{--
                            <td>
                            {{ Str::title($admission->payment_method ?? 'N/A') }}
                            </td>
                        --}}
                        <td>
                            @if ($admission->discharge_date)
                                Discharged for payment
                                {{--
                                    <br />
                                    {{ now()->parse($admission->discharge_date)->format('jS F Y') }}
                                    <br />
                                --}}
                            @else
                                In Admission
                            @endif
                        </td>
                        <td>
                            @if ($admission->discharge_date)
                                {{
                                    now()
                                        ->parse($admission->booking_date)
                                        ->diffInDays(now()->parse($admission->discharge_date)) . ' days'
                                }}
                            @else
                                {{
                                    now()
                                        ->parse($admission->booking_date)
                                        ->diffInDays(now()) . ' days'
                                }}
                            @endif
                        </td>
                        <td>
                            @if ($admission->discharge_date)
                                {{ now()->parse($admission->discharge_date)->format('jS F Y') }}
                            @else
                                {{ 'N/A' }}
                            @endif
                        </td>
                        <td>
                            @if (! $admission->discharge_date)
                                <button
                                    wire:click="dischargeFromWard({{ $admission->id }},'{{ $admission->ward->ward_name }}')"
                                    class="btn btn-primary btn-s"
                                >
                                    Discharge for Payment
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No Admissions</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($type == 'previous')
        {{ $admissions->links() }}
    @endif
</div>
