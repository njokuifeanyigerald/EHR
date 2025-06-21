{{-- Modals for selecting investigations --}}
<div
    wire:ignore.self
    class="modal fade"
    id="all_investigations"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="font-size: 25px" id="exampleModalLabel">
                    All Investigations
                </h5>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button wire:click="saveLabs" class="btn btn-primary">Save</button>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form wire:submit="saveLabs" id="bulk_diagnostics"> --}}
                {{-- Tab section end --}}

                <div class="tab-content -mt-4" id="v-pills-tabContent">
                    {{-- Tab section --}}
                    <div
                        class="row mx-2 tab-pane fade show active"
                        id="patient-all-labs"
                        role="tabpanel"
                        aria-labelledby="patient-all-labs-tab"
                    >
                        <div class="pt-4 row">
                            <div class="col-3">
                                <h5 class="card-title fw-medium" style="text-decoration: underline">Categories</h5>
                                <div
                                    class="nav flex-column nav-pills"
                                    id="v-pills-tab"
                                    role="tablist"
                                    aria-orientation="vertical"
                                >
                                    @forelse ($labs?->groupBy('lab_category')?->all() ?? [] as $key => $labCatogoryLabs)
                                        <a
                                            class="nav-link {{ $this->selectedCategory == $key ? 'active' : 'text-black' }} my-1 iq-bg-primary-hover"
                                            id="v-pills-all-investigations-tab"
                                            wire:click="categorySelected('{{ $key }}')"
                                            data-bs-toggle="pill"
                                            href="#{{ empty($key) ? 'General' : $key ?? 'General' }}"
                                            role="tab"
                                            aria-controls="v-pills-all-investigations"
                                            aria-selected="true"
                                        >
                                            {{ empty($key) ? 'General' : $key ?? 'General' }}
                                        </a>
                                    @empty
                                        <div class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block w-100">
                                            No Categories
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-9">
                                <h5 class="card-title fw-medium" style="text-decoration: underline">
                                    Investigations for
                                    {{ $this->selectedCategory == '' ? 'General' : $this->selectedCategory }}
                                </h5>
                                <div class="row">
                                    @forelse ($labs?->where('lab_category', $this->selectedCategory) ?? [] as $lab)
                                        <div class="col-4">
                                            <div
                                                class="custom-control custom-checkbox custom-checkbox-color custom-control-inline"
                                            >
                                                <input
                                                    type="checkbox"
                                                    class="custom-control-input bg-info"
                                                    name="lab_{{ $lab->id }}"
                                                    id="serum_progesterone_{{ $lab->id }}"
                                                    wire:model.live="selectedLabs.{{ $lab->id }}"
                                                />
                                                <label
                                                    class="custom-control-label"
                                                    for="serum_progesterone_{{ $lab->id }}"
                                                >
                                                    <span></span>
                                                    {{ $lab->item_name }}
                                                </label>
                                            </div>
                                        </div>
                                    @empty
                                        <div
                                            class="iq-bg-info bg-info px-2 pt-2 pb-2 rounded-5 d-inline-block w-100 text-center"
                                        >
                                            No Investigation Found
                                        </div>
                                    @endforelse
                                </div>
                            </div>

                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button wire:click="saveLabs" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
                @script
                    <script>
                        $wire.on('closeModal', function () {
                            $('#all_investigations').modal('hide');
                        });
                    </script>
                @endscript
            </div>
        </div>
    </div>
</div>
