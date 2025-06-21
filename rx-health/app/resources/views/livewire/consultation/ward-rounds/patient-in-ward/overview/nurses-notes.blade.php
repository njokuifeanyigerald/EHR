@props([
    'nurses_notes' => [],
])

<div>
    <div id="nurseCollapse" class="collapse show bg-white rounded">
        <div class="card-body">
            <div style="display: none" class="card card-custom card-stretch addNursesOrder shadow-lg mb-5">
                <div class="card-header bg-white">
                    <div class="card-title mb-0">
                        <h4 class="card-label fw-bold text-dark">Add Nurses order</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <textarea
                                class="form-control my-2"
                                id="content_insert"
                                name="content_insert"
                                rows="5"
                                placeholder="Nurse note"
                            ></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <table
                class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
            >
                <thead class="">
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Added by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nurses_notes as $nurse_note)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $nurse_note->updated_at->format('jS F, Y') }}
                            </td>
                            <td>
                                {!! Str::limit(json_decode($nurse_note?->record_data)?->message ?? 'N/A', 60) !!}
                            </td>
                            <td>
                                {{ Str::title($nurse_note?->user?->full_names) }}
                            </td>
                            <td>
                                <a
                                    href="#"
                                    data-bs-toggle="modal"
                                    data-bs-target="#nurses_notes_view"
                                    title="View"
                                    wire:click="loadDataToEditForMedicalRecord({{ $nurse_note->id }})"
                                >
                                    <i class="ri-eye-line text-primary icons-sm"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
