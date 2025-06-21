@props([
    'doctors_orders' => [],
])

<div>
    <div id="doctorCollapse" class="collapse show bg-white rounded">
        <div class="card-body">
            <div
                wire:ignore.self
                style="display: none"
                class="card card-custom card-stretch addDoctorsNote shadow-lg mb-5"
            >
                <div class="card-header bg-white">
                    <div class="card-title mb-0">
                        <h4 class="card-label fw-bold text-dark">Add Doctors Note</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit="saveNursesOrders">
                        {{-- @csrf --}}
                        <div class="form-group" wire:key="nursesOrder">
                            {{--
                                <textarea
                                class="form-control my-2"
                                id="content_insert"
                                name="content_insert"
                                rows="5"
                                wire:model.live="message"
                                ></textarea>
                            --}}
                            <x-ck_editor
                                :component_to_update="'record'"
                                :is_array_element="true"
                                :wire_model="'message'"
                            />
                            <x-input-error :messages="$errors->get('record')" class="mt-1" />
                        </div>
                        <div>
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
                        <th>Added By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors_orders as $doctors_order)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $doctors_order->updated_at->format('jS F, Y') }}
                            </td>
                            <td>
                                {!! Str::limit(json_decode($doctors_order?->record_data)?->message ?? 'N/A', 60) !!}
                            </td>
                            <td>
                                {{ Str::title($doctors_order?->user?->full_names) }}
                            </td>
                            <td>
                                <a
                                    href="#"
                                    data-bs-toggle="modal"
                                    data-bs-target="#nurses_order_view"
                                    title="View"
                                    wire:click="loadDataToEditForMedicalRecord({{ $doctors_order->id }})"
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
