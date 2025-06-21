<div>
    <div class="col-md-12 px-md-0">
        @if ($this->selected_drug_name)
            <input
                type="text"
                class="form-control my-2 shadow"
                wire:model.live="selected_drug_name"
                name="item_name"
                wire:click="resetSelectedDrug"
                autofocus
                required
            />
            <input type="hidden" wire:model.live="drug" name="drug" />
        @else
            <input
                type="search"
                class="form-control my-2 shadow"
                id="query"
                placeholder="Search Drug..."
                wire:key="drug_search"
                wire:model.live="drug_search"
                wire:keydown.arrow-up="decrementDrugsHighlight"
                wire:keydown.arrow-down="incrementDrugsHighlight"
                wire:keydown.enter="selectDrug"
                autofocus="on"
                autocomplete="off"
            />
        @endif

        {{--
            <div class="col-md-8 px-md-0">
            <input id="query" type="search" class="form-control my-2 shadow" placeholder="Search Items...">
            </div>
        --}}

        <x-input-error :messages="$errors->get('drug')" class="mt-1" />
        <div class="position-relative relative z-20" style="z-index: 100">
            <div class="position-absolute absolute z-10 w-100 rounded-xl list-group bg-black">
                <div
                    wire:loading
                    wire:target="drug_search"
                    class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
                >
                    <div class="list-item">Searching...</div>
                </div>

                @if (! empty($this->drug_search) && ! $this->selected_drug_name)
                    <div
                        class="absolute z-10 w-full rounded-t-none shadow-lg list-group-item bg-white"
                        style="display: flex"
                    >
                        <div style="flex: 0 0 70%">Item</div>
                        <div style="flex: 0 0 30%">Item Code</div>
                    </div>
                    @forelse ($this->drugs as $i => $drug)
                        <div
                            class="absolute z-20 w-full rounded-t-none shadow-lg list-group-item {{ $this->highlight_index === $i ? 'active' : 'bg-white' }}"
                            style="display: flex"
                            wire:click="setSelectedDrug( {{ $drug }} )"
                        >
                            <div class="flex-wrap" style="flex: 0 0 70%">
                                {{ $drug->item_name }}
                            </div>
                            <div style="flex: 0 0 30%">
                                {{ $drug->item_code }}
                            </div>
                        </div>
                    @empty
                        <div class="list-group-item active text-center">No result</div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
</div>
