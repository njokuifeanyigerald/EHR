{{-- <div wire:ignore.self class="tab-pane fade" id="NursesOrder" role="tabpanel" aria-labelledby="v-pills-NursesOrder-tab"> --}}
<div>
    @if ($this->visit->sign == 'No')
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
                <x-ck_editor :component_to_update="'record'" :is_array_element="true" :wire_model="'message'" />
                <x-input-error :messages="$errors->get('record')" class="mt-1" />
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    @endif

    <div class="mt-3" id="consultation_nurses_orders_preview">
        <div class="table-responsive">
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

                <tbody></tbody>
                <tbody>
                    @forelse ($this->nurses_orders as $order)
                        @php
                            $message = json_decode($order->record_data);
                        @endphp

                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $order->updated_at->format('jS F Y') }}
                            </td>
                            <td class="text-truncate clickable-cursor">
                                <div
                                    class="ps-2 pe-2 w-85 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                    role="alert"
                                    wire:click="viewNursesOrder({{ $order->id }})"
                                    style="font-size: 5px"
                                >
                                    {!! Str::limit($message->message, 30, '...') !!}
                                    {{--
                                        <span class="d-inline-block text-truncate" style="max-width: 0">
                                        {{ Str::substr($message->message, 30) }}
                                        </span>
                                    --}}
                                </div>
                            </td>
                            <td>
                                {{ $order->user->fullname() }}
                            </td>
                            <td class="text-center">
                                @if ($this->visit->sign == 'No')
                                    <a
                                        href="#"
                                        wire:click="deleteNursesOrder({{ $order->id }})"
                                        {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                        title="Delete"
                                    >
                                        <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">
                                <div class="w-full text-center">No Nurse Order Available</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div wire:ignore.self id="nurses_order_preview" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg rounded-3">
            <div class="modal-content px-3">
                <div class="modal-header">
                    <h5 class="modal-title">Nurses Order Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex gap-4">
                        <div>By : {{ $this->preview_nurses_order?->user?->full_names }}</div>
                        <div>At : {{ $this->preview_nurses_order?->updated_at->format('jS F Y') }}</div>
                    </div>
                    <div>
                        Message:
                        <div class="text-black">
                            {!! json_decode($this->preview_nurses_order?->record_data)?->message !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('open_preview_nurses_order_modal', function () {
            $('#nurses_order_preview').modal('show');
        });
    </script>
@endscript
