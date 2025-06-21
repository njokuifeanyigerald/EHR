<div wire:ignore.self id="client_preview" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl rounded-3">
        <div class="modal-content px-3">
            <div class="modal-header">
                <h5 class="modal-title">Pending Client Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 my-3 border rounded-3 p-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="add-img-user">
                                <img
                                    class="profile-img-edit img-fluid ms-4 d-block doc-profile-bg rx-profile-circle"
                                    src="{{ asset('/images/user/Image2.png') }}"
                                    alt="profile-pic"
                                />
                            </div>
                        </div>
                        <div class="col-sm-9 my-auto">
                            <div class="row">
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-2">Name:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->getFullnameAndTitle() }}
                                    </span>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-1">Gender:</span>
                                    <span class="text-dark">
                                        {{ Str::headline($patients?->find($this->selected_patient_id)?->sex) }}
                                    </span>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-1">Email:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->email }}
                                    </span>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-1">Visit Number:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->visits?->first()?->visit_number }}
                                    </span>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-1">Nationality:</span>
                                    <span class="text-dark">
                                        {{ $countryHelper->getCountryByCode($patients?->find($this->selected_patient_id)?->nationality) }}
                                    </span>
                                </div>
                                <div class="col-sm-4 mb-3">
                                    <span class="text-dark me-1">Postal Addrress:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->postal_address }}
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="text-dark me-1">Date of Birth:</span>
                                    <span class="text-dark">
                                        {{ now()->parse($patients?->find($this->selected_patient_id)?->date_of_birth) ?->format('jS F Y') }}
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="text-dark me-1">Telephone:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->telephone }}
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="text-dark me-1">Home Address:</span>
                                    <span class="text-dark">
                                        {{ $patients?->find($this->selected_patient_id)?->residential_address }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 my-4">
                    {{--
                        <a  class="btn btn-info">
                        <i class="fa fa-check-double">
                        </i>
                        Assign Price
                        </a>
                    --}}
                    @if ($this->approve_specimen)
                        <a wire:click="approveSpecimen({{ $this->selected_patient_id }})" class="btn btn-dark">
                            <i class="fa fa-thumbs-up"></i>
                            Approve specimen collection
                        </a>
                    @endif
                </div>
                <div class="col-sm-12 mt-4 mb-0">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <td>#</td>
                                    <td>Item</td>
                                    <td>Date Added</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->selected_patientLabs ?? [] as $lab)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lab->item->item_name }}</td>
                                        <td>{{ $lab->created_at->format('jS F Y g:i A') }}</td>
                                        <td>{{ $lab->quantity }}</td>
                                        <td>{{ $lab->unit_price * $lab->quantity }}</td>
                                        <td>
                                            <span
                                                class="service_type p-2 badge badge-pill {{ $lab->payment_status == 'owing' ? 'badge-danger' : 'badge-success' }}"
                                            >
                                                {{ $lab->payment_status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div>
                                                <button
                                                    type="button"
                                                    class="btn btn-dark"
                                                    wire:click="outSourceLab({{ $lab->id }},'outsource')"
                                                >
                                                    <i class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i>
                                                    Outsource
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary"
                                                    wire:click="outSourceLab({{ $lab->id }},'external')"
                                                >
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                    Send Out
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="12">No Lab Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
