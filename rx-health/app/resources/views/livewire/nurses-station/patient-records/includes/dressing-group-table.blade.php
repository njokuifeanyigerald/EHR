<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Dressing Site">
                    <span class="text-muted">Dressing Site</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Condition Of Wound">
                    <span class="text-muted">Condition Of Wound</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div
                    class="me-2 d-flex justify-content-start align-content-center gap-2"
                    title="Dressing Materials Used"
                >
                    <span class="text-muted">Dressing Materials Used</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Observation">
                    <span class="text-muted">Observation</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Added At">
                    <span class="text-muted">Added At</span>
                </div>
            </th>
            <th scope="col" class="p-2">
                <div class="me-2 d-flex justify-content-start align-content-center gap-2" title="Updated At">
                    <span class="text-muted">Updated At</span>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($visit->dressing ?? collect() as $record)
            <tr>
                @php
                    $recordData = json_decode(
                        $record->record_data,
                    );
                @endphp

                <td class="text-left">
                    {{ $recordData->dressing_site ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{ $recordData->condition_of_wound ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{-- add and to the last one appropriately --}}
                    @php
                        $materials = $recordData->dressing_materials ?? [];
                        $count = count($materials);
                    @endphp

                    {{ $count > 1 ? implode(', ', array_slice($materials, 0, -1)) . ' and ' . end($materials) : implode(', ', $materials) }}
                </td>
                <td class="text-left">
                    {{ $recordData->observation ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{ $record->created_at ?? 'N/A' }}
                </td>
                <td class="text-left">
                    {{ $record->updated_at ?? 'N/A' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No Record Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
