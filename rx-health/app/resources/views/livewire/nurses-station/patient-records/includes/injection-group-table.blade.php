<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Injection Type">
                    <span class="text-muted">Injection Type</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Injection Site">
                    <span class="text-muted">Injection Site</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Medications Given">
                    <span class="text-muted">Medications Given</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Injection Reaction">
                    <span class="text-muted">Injection Reaction</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Added At">
                    <span class="text-muted">Time Of Injection</span>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($visit->injection ?? collect() as $record)
            <tr>
                @php
                    $recordData = json_decode(
                        $record->record_data,
                    );
                @endphp

                <td class="text-left">
                    {{ $recordData->injection_type ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{ $recordData->injection_site ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{-- add and to the last one appropriately --}}
                    @php
                        $medications = $recordData->medications_given ?? [];
                        $count = count($medications);
                    @endphp

                    {{ $count > 1 ? implode(', ', array_slice($medications, 0, -1)) . ' and ' . end($medications) : implode(', ', $medications) }}
                </td>
                <td class="text-left">
                    {{ $recordData->injection_reaction ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{ $recordData->time_of_injection->date . ' ' . $recordData->time_of_injection->time ?? 'N/A' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No Record Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
