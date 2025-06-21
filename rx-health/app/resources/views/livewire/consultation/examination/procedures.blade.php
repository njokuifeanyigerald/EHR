{{-- <div wire:ignore.self class="tab-pane fade" id="Procedure" role="tabpanel" aria-labelledby="v-pills-Procedure-tab"> --}}
<div>
    @if ($this->visit->sign == 'No')
        <form wire:submit="saveProcedure">
            <div class="card-body">
                <div class="form-group mb-1">
                    <span id="procedure_content_area">
                        <div class="form-group col-12 mt-1">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                                <label for="item_name">Procedure Date</label>

                                @if ($this->selected_search_name)
                                    <div class="input-icon input-icon-right">
                                        <input
                                            type="text"
                                            class="form-control my-2 shadow"
                                            wire:model.live="selected_search_name"
                                            wire:click="resetSearch"
                                            {{ $this->selected_search_name ? 'autofocus' : '' }}
                                        />
                                        <span><i class="fa fa-search"></i></span>
                                    </div>
                                @else
                                    <div class="input-icon input-icon-right">
                                        <input
                                            type="search"
                                            class="form-control"
                                            placeholder="Search for Procedure"
                                            name="item_name"
                                            id="item_name"
                                            wire:key="search"
                                            wire:model.live="search"
                                            {{ ! $this->selected_search_name ? 'autofocus' : '' }}
                                        />
                                        <span><i class="fa fa-search"></i></span>
                                    </div>
                                @endif

                                <x-input-error :messages="$errors->get('procedure')" class="mt-1" />

                                <div class="position-absolute z-10 rounded-xl list-group bg-black">
                                    <div
                                        wire:loading
                                        wire:target="search"
                                        class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                                    >
                                        <div class="list-item">Searching...</div>
                                    </div>

                                    @if (! empty($this->search) && ! $this->selected_search_name)
                                        <div class="list-group-item text-bold" style="display: flex">
                                            <div style="flex: 0 0 100%">
                                                <b>Procedure</b>
                                            </div>
                                        </div>
                                        @forelse ($this->search_procedure_results as $i => $procedure)
                                            <div
                                                class="list-group-item pe-auto"
                                                style="display: flex"
                                                wire:click="saveSelectedProcedure( {{ $procedure }} )"
                                            >
                                                <div class="flex-wrap" style="flex: 0 0 100%">
                                                    {{ $procedure->item_name }}
                                                    {{-- <span class=" text-primary">{{ $procedure->code }}</span> --}}
                                                </div>
                                            </div>
                                        @empty
                                            <div
                                                class="list-group-item active text-center flex-wrap"
                                                style="flex: 0 0 100%"
                                            >
                                                No result
                                            </div>
                                        @endforelse
                                    @endif
                                </div>

                                <label for="procedure_time">Procedure Date</label>
                                <input
                                    class="my-2 form-control"
                                    type="datetime-local"
                                    min="{{ now()->format('Y-m-d\TH:i') }}"
                                    name="procedure_time"
                                    id="procedure_time"
                                    wire:model.live="procedure_date"
                                />
                                <x-input-error :messages="$errors->get('procedure_date')" class="mt-1" />
                            </div>
                        </div>
                    </span>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 col-12 mt-2">
                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    @endif

    <div class="row mt-3">
        <div class="col">
            <div class="borderless" id="consultation_procedure_preview">
                <div class="table-responsive">
                    <table
                        class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
                    >
                        <thead class="">
                            <tr>
                                <th>No</th>
                                <th>Procedure Added</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                        <tbody>
                            @forelse ($this->procedures as $procedure)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <div
                                            class="ps-3 pe-3 w-75 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                                            role="alert"
                                        >
                                            <span class="text-dark">
                                                {{ $procedure->item->item_name }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark">
                                            {{ now()->parse($procedure->procedure_date)->format('jS F Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="service_type p-2 badge badge-pill {{ $procedure->payment_status == 'owing' ? 'badge-danger' : 'badge-success' }}"
                                        >
                                            {{ $procedure->payment_status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @if ($this->visit->sign == 'No')
                                            <a
                                                href="#"
                                                wire:click="deleteProcedure({{ $procedure->id }})"
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
                                        <div class="w-full text-center">No Procedure Available</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
