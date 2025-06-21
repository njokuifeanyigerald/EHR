{{--
    <div
    wire:ignore.self
    class="tab-pane fade"
    id="Investigations"
    role="tabpanel"
    aria-labelledby="v-pills-Investigations-tab"
    >
--}}
<div>
    <div class="iq-card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a
                    class="nav-link active"
                    id="pills-AddInvestigation-tab"
                    data-bs-toggle="pill"
                    href="#AddInvestigation"
                    role="tab"
                    aria-controls="pills-AddInvestigation"
                    aria-selected="true"
                >
                    @if ($this->visit->sign == 'No')
                        Add Investigation
                    @else
                        Investigations
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a
                    wire:ignore.self
                    class="nav-link"
                    id="pills-ViewResult-tab"
                    data-bs-toggle="pill"
                    href="#ViewResult"
                    role="tab"
                    aria-controls="pills-ViewResult"
                    aria-selected="false"
                >
                    View Results
                </a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent-2">
            <div
                class="tab-pane fade show active"
                id="AddInvestigation"
                role="tabpanel"
                aria-labelledby="pills-AddInvestigation-tab"
            >
                @if ($this->visit->sign == 'No')
                    <div class="input-group w-100 d-flex justify-content-between align-content-center">
                        {{--
                            <select
                            wire:ignore
                            id="investigation"
                            class="select2 form-control"
                            name="presenting_compliant[]"
                            ></select>
                        --}}

                        <div class="w-75">
                            @include('livewire.consultation.includes.investigation_add_form')
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="input-group-prepend d-flex align-content-center">
                            <button
                                data-bs-toggle="modal"
                                data-bs-target="#all_investigations"
                                wire:click="dispatch('viewAllInvestigations',[{{ $this->investigations->where('lab_status', '!=', 'results_entered') }}])"
                                class="btn btn-sm btn-primary my-3"
                            >
                                All Investigations
                            </button>
                        </div>
                    </div>
                @endif

                <div class="mt-3">
                    <div class="table-responsive">
                        <table
                            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                        >
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Diagnosis Added</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->investigations as $lab)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div
                                                class="ps-3 pe-3 w-75 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                                role="alert"
                                            >
                                                <span>
                                                    {{ $lab->item->item_name }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="service_type p-2 badge badge-pill {{ $lab->payment_status == 'owing' ? 'badge-danger' : 'badge-success' }}"
                                            >
                                                {{ $lab->payment_status }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($this->visit->sign == 'No')
                                                <a
                                                    href="#"
                                                    wire:click="deleteInvestigation({{ $lab->id }})"
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
                                            <div class="w-full text-center">No Record Found</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ViewResult" role="tabpanel" aria-labelledby="pills-ViewResult-tab">
                <div class="table-responsive">
                    <table
                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                    >
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Diagnosis Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($this->investigations->filter(function ($item) {
                                    return $item->labResults->where('approved_status', 'approved')->count() > 0;
                                })
                                as $lab)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <div
                                            class="ps-3 pe-3 w-75 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                            role="alert"
                                        >
                                            <span>{{ $lab->item->item_name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href="#"
                                            data-bs-toggle="modal"
                                            data-bs-target="#view_lab_result"
                                            wire:click="dispatch('viewLabResult',[{{ $lab->id }}])"
                                            title="View"
                                        >
                                            <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="w-full text-center">No Record Found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @dd($this->visit->sign) --}}
    @if ($this->visit->sign == 'No')
        <livewire:consultation.modals.all-investigations
            {{-- :category="$this->category" --}}
            :visit_number="$this->visit_number"
            :billing_code="$this->billing_code"
        />
    @endif

    <livewire:consultation.modals.lab-results
        :labs="$this->investigations->filter(function ($item) {
        return $item->labResults->where('approved_status', 'approved')->count() > 0;
    })"
    />
</div>
{{--
    @script
    <script>
    $('#investigation').select2({
    placeholder: 'Search Investigation',
    minimumInputLength: 2,
    minimumResultsForSearch: 20,
    width: '70%',
    serverSide: true,
    ajax: {
    url: "{{ route('select2search.investigations') }}",
    type: "GET",
    dataType: 'json',
    delay: 250,
    cache: true,
    theme: "bootstrap4",
    },
    });
    $('#investigation').on('change', function(e) {
    var data = $('#investigation').select2('val');
    // @this.set('item_id', data);
    @this.addInvestigation(data);
    });
    </script>
    @endscript
--}}
