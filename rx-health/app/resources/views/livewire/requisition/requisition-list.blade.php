<div>
    <div class="row">
        @if (! in_array($this->type, ['pending_incoming', 'confirmed_incoming', 'pending_received', 'confirmed_received']))
            <!-- Header title -->
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4>{{ Str::headline($this->type) }} Requisitions</h4>
                        </div>
                        @if (in_array($this->type, ['draft', 'pending']))
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('requisitions.create') }}" class="btn btn-primary my-2">
                                    <i class="fa fa-plus"></i>
                                    Add New
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <p>Search for Requisition - using Destination/Source</p>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                                <div class="input-icon input-icon-right">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Search"
                                        wire:model.live.debounce.500ms="search"
                                    />
                                    <span>
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div wire:ignore.self class="table-responsive">
                        <table class="table table-striped table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">From</th>
                                    <th scope="col">To</th>
                                    <th scope="col">Time Created</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Requested By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($requisitions as $requisition)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            {{ $requisition->requestSource->location_name ?? 'Not Specified' }}
                                        </td>
                                        <td>
                                            {{ $requisition->requestDestination->location_name ?? 'Not Specified' }}
                                        </td>
                                        <td>
                                            {{ $requisition->created_at }}
                                        </td>
                                        <td>
                                            @if (in_array($this->type, ['pending_incoming', 'confirmed_incoming']))
                                                <span
                                                    class="badge {{
                                                        $requisition->confirmed_status == 'draft'
                                                            ? 'badge-secondary'
                                                            : ($requisition->confirmed_status == 'pending'
                                                                ? 'badge-info'
                                                                : ($requisition->confirmed_status == 'approved'
                                                                    ? 'badge-success'
                                                                    : 'badge-primary'))
                                                    }}"
                                                >
                                                    {{ Str::headline($requisition->confirmed_status) }}
                                                </span>
                                            @elseif (in_array($this->type, ['pending_received', 'confirmed_received']))
                                                <span
                                                    class="badge {{
                                                        $requisition->received_status == 'draft'
                                                            ? 'badge-secondary'
                                                            : ($requisition->received_status == 'pending'
                                                                ? 'badge-info'
                                                                : ($requisition->received_status == 'approved'
                                                                    ? 'badge-success'
                                                                    : 'badge-primary'))
                                                    }}"
                                                >
                                                    {{ Str::headline($requisition->received_status) }}
                                                </span>
                                            @else
                                                <span
                                                    class="badge {{
                                                        $requisition->status == 'draft'
                                                            ? 'badge-secondary'
                                                            : ($requisition->status == 'pending'
                                                                ? 'badge-info'
                                                                : ($requisition->status == 'approved'
                                                                    ? 'badge-success'
                                                                    : 'badge-primary'))
                                                    }}"
                                                >
                                                    {{ Str::headline($requisition->status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $requisition->createdBy->fullName() ?? 'Not Specified' }}
                                        </td>
                                        <td class="text-center">
                                            @if ($this->type == 'draft')
                                                <a
                                                    href="{{ route('requisitions.edit', $requisition->id) }}"
                                                    class="btn btn-outline-dark px-1 py-0 me-1 me-2"
                                                    title="Edit Purchase Order"
                                                >
                                                    <i class="ri-pencil-line m-0 icons-sm"></i>
                                                </a>
                                            @elseif (in_array($this->type, ['pending_incoming', 'confirmed_incoming']))
                                                <a
                                                    href="{{ route('requisitions.confirm_order', ['id' => $requisition->id, 'type' => 'incoming']) }}"
                                                    class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                    title="View Approved"
                                                >
                                                    <i class="ri-eye-line m-0 icons-sm"></i>
                                                    Open Order
                                                </a>
                                            @elseif (in_array($this->type, ['pending_received', 'confirmed_received']))
                                                <a
                                                    href="{{ route('requisitions.confirm_order', ['id' => $requisition->id, 'type' => 'received']) }}"
                                                    class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                    title="View Approved"
                                                >
                                                    <i class="ri-eye-line m-0 icons-sm"></i>
                                                    Open Order
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('requisitions.edit', $requisition->id) }}"
                                                    class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                    title="View/Edit requisition Order"
                                                >
                                                    <i class="ri-eye-line m-0 icons-sm"></i>
                                                    View
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="12">
                                            <div class="w-full text-center">No Requisition Available</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $requisitions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
