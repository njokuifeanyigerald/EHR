<div>
    <div
        wire:ignore.self
        class="modal fade"
        id="outSourceFromNeppModal"
        tabindex="-1"
        aria-labelledby="outSourceFromNeppModal"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl p-lg-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="outSourceFromNeppModal">Out Source From Nepp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- loading --}}
                    <div class="row col-12" wire:loading wire:target="outSourceFromNepp">
                        <div class="d-flex justify-content-center align-content-center">
                            <div class="spinner-border" role="status"></div>
                            <br />
                            <div>Loading...</div>
                        </div>
                    </div>

                    {{-- actual data --}}
                    <div class="row col-12" wire:loading.remove wire:target="outSourceFromNepp">
                        <div class="col-3">
                            <div class="form-group">
                                <label>Nepp Pharmacy</label>
                                <select
                                    class="form-select my-2"
                                    id="receiving_pharmacy"
                                    wire:model="nepp_payload.receiving_pharmacy_id"
                                >
                                    <option value="0" selected>Any Pharmacy</option>
                                    @foreach ($this->nepp_pharmacies ?? [] as $nepp_pharmacy)
                                        <option value="{{ $nepp_pharmacy['facility_id'] }}">
                                            {{ $nepp_pharmacy['facility_name'] . ' (' . $nepp_pharmacy['facility_location'] . ')' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Delivery Option</label>
                                <select
                                    class="form-select my-2"
                                    id="delivery_option"
                                    wire:model="nepp_payload.delivery_option"
                                >
                                    <option value="" selected disabled>Select A Delivery Option</option>
                                    <option value="Pickup">Pick Up</option>
                                    <option value="Delivery">Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div style="max-height: 60vh" class="col-12 overflow-auto">
                            <h4 class="my-3 fw-bold text-black">Drug List</h4>
                            <div class="table-responsive">
                                <table class="table table-head-custom table-striped table-hover fixed-header">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Drug Name</th>
                                            <th scope="col">Drug Code</th>
                                            <th scope="col">Dose</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Frequency</th>
                                            <th scope="col">Duration</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($this->nepp_payload['items'] ?? [] as $drug)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $drug['drug_name'] }}</td>
                                                <td>{{ $drug['item_code'] }}</td>
                                                <td>{{ $drug['quantity'] }}</td>
                                                <td>{{ $drug['unit'] }}</td>
                                                <td>{{ $drug['frequency'] }}</td>
                                                <td>{{ $drug['duration'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">
                                                    No drugs found. Please add items to the list.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="confirmOutSourceFromNepp">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- outSourceFromNeppModal --}}

    @script
        <script>
            // close the modal by listening to the event
            $wire.on('close_outsource_from_nepp_modal', function () {
                // console.log('hits');
                $('#outSourceFromNeppModal').modal('hide');
            });
        </script>
    @endscript
</div>
