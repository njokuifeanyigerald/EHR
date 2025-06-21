<div class="form-group">
    <input
        type="search"
        class="form-control my-2 shadow"
        id="exampleInputText1"
        placeholder="Search Investigation..."
        wire:key="investigation_search"
        wire:model.live="investigation_search"
        autofocus="on"
        autocomplete="off"
    />

    <div class="position-relative relative z-20">
        <div class="position-absolute absolute z-10 w-100 rounded-xl list-group bg-black">
            <div
                wire:loading
                wire:target="investigation_search"
                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group-item"
            >
                <div class="list-item">Searching...</div>
            </div>

            @if (! empty($this->investigation_search))
                <div
                    class="absolute z-10 w-full rounded-t-none shadow-lg list-group-item bg-white"
                    style="display: flex"
                >
                    <div style="flex: 0 0 60%">Item</div>
                    <div style="flex: 0 0 30%">Item Code</div>
                    <div style="flex: 0 0 10%">Action</div>
                </div>
                @forelse ($this->items as $i => $item)
                    <div
                        class="absolute z-100 w-full rounded-t-none shadow-lg list-group-item {{-- {{ $this->highlight_index === $i ? 'active' : 'bg-white' }} --}}"
                        style="display: flex; z-index: 100"
                        {{-- wire:click="saveSelecteditem( {{ $item }} )" --}}
                    >
                        <div class="flex-wrap" style="flex: 0 0 60%">
                            {{ $item->item_name }}
                        </div>
                        <div style="flex: 0 0 30%">
                            {{ $item->item_code }}
                        </div>
                        <div style="flex: 0 0 10%">
                            <button
                                class="btn btn-sm btn-primary rounded"
                                wire:click="addInvestigation( {{ $item->id }} , {{ $item->item_category_id }})"
                            >
                                <i class="fa fa-add"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="list-group-item active text-center">No result</div>
                @endforelse
            @endif
        </div>
    </div>
</div>
