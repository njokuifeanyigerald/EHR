@props([
    'investigations' => [],
])
<div wire:ignore.self id="labCollapse" class="collapse show bg-white rounded">
    <div class="card-body">
        <div wire:ignore.self style="display: none" class="card card-custom card-stretch addLab shadow-lg mb-5">
            <div class="card-header bg-white">
                <div class="card-title mb-0">
                    <h4 class="card-label fw-bold text-dark">Add Investigation</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group col-12 my-2">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                        {{--
                            <div class="input-icon input-icon-right">
                            <input
                            type="search"
                            class="form-control"
                            placeholder="Search for Lab"
                            name="item_name"
                            id="item_name"
                            />
                            <span><i class="fa fa-search"></i></span>
                            </div>
                            <br />
                        --}}
                        @include('livewire.consultation.includes.investigation_add_form')
                    </div>
                </div>
                {{--
                    <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary">Add Investigation</button>
                    </div>
                --}}
            </div>
        </div>
        <div class="table-responsive">
            <table
                class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
            >
                <thead class="">
                    <tr>
                        <th class="text-muted">DATE TIME ADDED</th>
                        <th class="text-muted">DIAGNOSTICS ADDED</th>
                        <th class="text-muted">ADDED BY</th>
                        <th class="text-muted">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($investigations as $investigation)
                        <tr>
                            <td class="text-muted">
                                {{ now()->parse($investigation->created_at)->format('d-m-Y h:i A') }}
                            </td>
                            <td class="text-muted">
                                {{ $investigation->item->item_name }}
                            </td>

                            <td class="text-muted">
                                {{ $investigation->user->full_names }}
                            </td>

                            <td class="text-muted">
                                @if ($investigation->labResults->where('approved_status', 'approved')->count() > 0)
                                    <a
                                        href="#"
                                        data-bs-toggle="modal"
                                        data-bs-target="#view_lab_result"
                                        wire:click="dispatch('viewLabResult',[{{ $investigation->id }}])"
                                    >
                                        <i class="ri-eye-line m-0 icons-sm"></i>
                                        View
                                    </a>
                                @endif

                                <a href="#" wire:click="deleteInvestigation({{ $investigation->id }})">
                                    <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                    {{-- Delete --}}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <livewire:consultation.modals.lab-results
        :labs="$investigations->filter(function ($item) {
              return $item->labResults->where('approved_status', 'approved')->count() > 0;
        })"
    />
</div>
