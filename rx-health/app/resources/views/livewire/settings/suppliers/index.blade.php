<div>
    <div class="form-group d-flex flex-row-reverse">
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#add_supplier"
            class="btn btn-primary font-weight-bold"
        >
            <i class="fa fa-plus"></i>
            Add New supplier
        </button>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="col-md-12 col-lg-12">
                <div class="table-responsive">
                    <table id="datatable" class="table cursor table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-field="No">#</th>
                                <th scope="col" data-field="Name">Name</th>
                                <th scope="col" data-field="Contact">Contact</th>
                                <th scope="col" data-field="Address">Address</th>
                                <th scope="col" data-field="Email">Email</th>
                                <th scope="col" data-field="Status">Status</th>
                                <th scope="col" data-field="Dispatch Endpoint">Dispatch Endpoint</th>
                                <th scope="col" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $loop->iteration + $suppliers->firstItem() - 1 }}</td>
                                    <td>{{ Str::headline($supplier->name ?? 'N/A') }}</td>
                                    <td>{{ $supplier->phone_number ?? 'N/A' }}</td>
                                    <td>{{ Str::headline($supplier->address ?? 'N/A') }}</td>
                                    <td>{{ $supplier->email ?? 'N/A' }}</td>
                                    <td>{{ Str::headline($supplier->status) }}</td>
                                    <td>{{ $supplier->dispatch_endpoint ?? 'N/A' }}</td>
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#add_supplier"
                                            wire:click="dispatch('editSupplier', [{{ $supplier->id }}])"
                                        >
                                            View/Edit
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $suppliers->links() }}
                </div>
            </div>
        </div>
    </div>

    <livewire:settings.suppliers.modals.add-or-edit :suppliers="$suppliers" />
</div>
