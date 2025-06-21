<div>
    {{-- search for packages --}}

    <div class="form-group d-flex flex-row-reverse">
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#add_package"
            class="btn btn-primary font-weight-bold"
        >
            <i class="fa fa-plus"></i>
            Add New Package
        </button>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="row">
                <form class="form-group col-md-6">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                        <div class="col-9">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    autofocus
                                    wire:model.live.debounce.700ms="search_query"
                                    placeholder="Search for Package"
                                    name="search_query"
                                />
                                <span class="input-icon-addon clickable-cursor">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>
                                Price (
                                {{ auth()->user()->hospital->currencies->where('pivot.hospital_default', 'yes')->first()->code }}
                                )
                            </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($packages as $package)
                            <tr>
                                <td>{{ $loop->iteration + $packages->firstItem() - 1 }}</td>
                                <td>{{ $package->name }}</td>
                                <td>{{ Str::headline($package->gender) }}</td>
                                <td>{{ number_format($package->price, 2, '.', ',') }}</td>
                                <td>{{ Str::headline($package->status) }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-outline-primary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#add_package"
                                        wire:click="dispatch('editPackage', [{{ $package->id }}])"
                                    >
                                        View/Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No packages found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $packages->links() }}
            </div>
        </div>
    </div>

    <livewire:settings.packages.modals.add-or-edit :packages="$packages" />
</div>
