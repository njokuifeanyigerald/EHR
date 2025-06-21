@props([
    'shifts',
    'dates',
    'duties',
])

{{-- shift keys --}}
@php
    $shift_keys = [];
@endphp

<div class="table-responsive">
    <table id="datatable" class="table table-striped table-head-custom cursor table-hover table-responsive-lg">
        <thead>
            <tr>
                @foreach ($shifts as $shift)
                    <th class="text-center">
                        {{ Str::headline($shift->name) }}
                        <br />
                        {{ $shift->start_time . ' - ' . $shift->end_time }}
                    </th>
                    @php
                        $shift_keys[] = $shift->id;
                    @endphp
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{-- loop for the shift dates --}}
            @forelse ($dates as $key => $date)
                <tr>
                    <td colspan="12" class="font-weight-bolder text-center" style="color: #606060">
                        {{ now()->parse($key)->format('jS F Y') }}
                    </td>
                </tr>

                {{-- get the full row for the table --}}
                <tr>
                    @foreach ($shift_keys as $shift)
                        {{-- division for the shift --}}
                        <td>
                            {{-- {{$shift}} --}}
                            @foreach ($duties->where('start', $key)->where('shift_id', $shift) as $duty)
                                {{-- rows for shift duties --}}
                                <div class="text-center flex-wrap">
                                    {{ $duty->user->fullname() }} -
                                    <span
                                        class="font-italic service_type badge badge-lg badge-primary"
                                        style="font-size: 9px"
                                    >
                                        {{-- {{ $duty->sessionLocation->name }} --}}
                                        {{ $duty?->departmentUnit?->unit_name }}
                                    </span>
                                </div>
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No Duty Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
