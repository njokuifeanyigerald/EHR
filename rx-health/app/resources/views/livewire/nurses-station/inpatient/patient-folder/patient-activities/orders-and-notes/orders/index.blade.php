<div>
    <div class="table-responsive">
        <table
            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
        >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Note</th>
                    <th>Added By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($records as $record)
                    <tr>
                        <td>
                            {{ $loop->iteration + $records->firstItem() - 1 }}
                        </td>
                        <td>
                            {{ $record->updated_at->format('jS F, Y') }}
                        </td>
                        <td>
                            {!! Str::limit(json_decode($record?->record_data)?->message ?? 'N/A', 60) !!}
                        </td>
                        <td>
                            {{ Str::title($record?->user?->full_names) }}
                        </td>
                        <td>
                            <a
                                href="#"
                                data-bs-toggle="modal"
                                data-bs-target="#nurses_order_view"
                                title="View"
                                wire:click="loadDataToEditForMedicalRecord({{ $record->id }})"
                            >
                                <i class="ri-eye-line text-primary icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $records == [] ? '' : $records->links() }}
    </div>

    @include('livewire.nurses-station.inpatient.patient-folder.patient-activities.orders-and-notes.orders.view')
</div>
