<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Search for Return - using Destination/Source</p>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Form</th>
                                <th scope="col">To</th>
                                <th scope="col">Time Created</th>
                                <th scope="col">Status</th>
                                <th scope="col">Requested By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($returns as $return)
                                <tr>
                                    <td scope="row">{{ $loop->iteration + $returns->firstItem() - 1 }}</td>
                                    <td>
                                        {{ Str::title($return->source->location_name) }}
                                    </td>
                                    <td>
                                        {{ Str::title($return->destination->location_name) }}
                                    </td>
                                    <td>
                                        {{ $return->created_at }}
                                    </td>
                                    <td>
                                        @if (in_array($this->type, ['pending_incoming', 'confirmed_incoming']))
                                            <span
                                                class="badge {{
                                                    $return->confirmed_status == 'draft'
                                                        ? 'badge-secondary'
                                                        : ($return->confirmed_status == 'pending'
                                                            ? 'badge-info'
                                                            : ($return->confirmed_status == 'approved'
                                                                ? 'badge-success'
                                                                : 'badge-primary'))
                                                }}"
                                            >
                                                {{ Str::headline($return->confirmed_status) }}
                                            </span>
                                        @else
                                            <span
                                                class="badge {{
                                                    $return->status == 'draft'
                                                        ? 'badge-secondary'
                                                        : ($return->status == 'pending'
                                                            ? 'badge-info'
                                                            : ($return->status == 'approved'
                                                                ? 'badge-success'
                                                                : 'badge-primary'))
                                                }}"
                                            >
                                                {{ Str::headline($return->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ Str::headline($return->createdBy->full_names) }}
                                    </td>
                                    <td class="text-center">
                                        @if (in_array($this->type, ['pending_incoming', 'confirmed_incoming']))
                                            <a
                                                href="{{ route('departmental_inventory.returns_order', $return->id) }}"
                                                class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                title=""
                                            >
                                                <i class="ri-eye-line m-0 icons-sm"></i>
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('departmental_inventory.return.edit', $return->id) }}"
                                                class="btn btn-outline-primary px-1 py-0 me-1 me-2"
                                                title=""
                                            >
                                                <i class="ri-eye-line m-0 icons-sm"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $returns->links() }}
            </div>
        </div>
    </div>
</div>
