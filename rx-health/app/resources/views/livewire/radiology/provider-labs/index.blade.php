<div>
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
                                    placeholder="Search for Item"
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
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table cursor table-hover table-borderless table-striped">
                        <thead>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="#">#</th>
                                <th scope="col" data-sortable="true" data-field="Item">Item</th>
                                <th scope="col" data-sortable="true" data-field="Item Code">Item Code</th>
                                <th scope="col" data-sortable="true" data-field="Service Type">Service Type</th>
                                <th scope="col" data-sortable="true" data-field="Category">Category</th>
                                <th scope="col" data-sortable="true" data-field="Status">Status</th>
                                <th scope="col" data-sortable="true" data-field="Action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($labs as $lab)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration + $labs->firstItem() - 1 }}
                                    </th>
                                    <td>
                                        {{ $lab->item_name }}
                                    </td>
                                    <td>{{ $lab->item_code }}</td>
                                    <td>
                                        {{ $lab->category->category_name }}
                                    </td>
                                    <td>
                                        {{ Str::headline($lab->lab_category) }}
                                    </td>
                                    <td>
                                        <span
                                            class="btn {{ strtolower($lab->status) == 'active' ? 'iq-bg-success' : 'iq-bg-danger' }} btn-rounded btn-sm my-0"
                                        >
                                            {{ Str::headline($lab->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="{{ route('radiology.provider_radiology_details', $lab->id) }}"
                                            class="text-primary me-2"
                                            title="View"
                                        >
                                            <i class="ri-eye-line m-0 icons-sm"></i>
                                        </a>
                                        {{--
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit_item_"
                                            class="text-dark me-2" title="Edit"><i class="fa fa-pen m-0"></i></a>
                                            <a href="#" class="text-danger" title="Delete"><i
                                            class="fa fa-trash m-0 icons-sm"></i></a>
                                        --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center">No Lab Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $labs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
