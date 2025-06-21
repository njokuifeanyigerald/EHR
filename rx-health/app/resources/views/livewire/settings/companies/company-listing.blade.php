<div>
    <div class="form-group d-flex flex-row-reverse">
        @if ($this->type)
            <button
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#add_company_{{ $this->type }}"
                class="btn btn-primary font-weight-bold"
            >
                <i class="fa fa-plus"></i>
                Add New {{ $this->type == 'company' ? 'Corporate' : 'Insurance' }} Company
            </button>
        @endif
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="table-responsive">
                <table id="datatable" class="table cursor table-hover table-borderless table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Type</th>
                            <th>Company ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company)
                            <tr>
                                <td>{{ Str::title($company->name) }}</td>
                                <td>{{ $company->code }}</td>
                                <td>{{ strtoupper($company->type) }}</td>
                                <td>{{ $company->company_id }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button
                                            data-bs-toggle="modal"
                                            data-bs-target="#add_company_{{ $this->type }}"
                                            class="btn btn-outline-primary"
                                            wire:click="dispatch('editCompany{{ $this->type }}', [{{ $company->id }}])"
                                        >
                                            View/Edit
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $companies->links() }}
            </div>
        </div>
    </div>

    <livewire:settings.companies.modals.add-or-edit :type="$type" :companies="$companies" :key="$type" />
</div>
