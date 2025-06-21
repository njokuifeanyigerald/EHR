<div>
    {{-- <div class="form-group"> --}}
    <select
        class="form-control form-select {{ $this->status == 'inactive' ? 'text-danger' : 'text-success' }}"
        name="status"
        id="status{{ $item->id }}"
        wire:key="item_status_{{ $item->id }}"
        wire:model.live="status"
    >
        <option value="active" class="text-success">Active</option>
        <option value="inactive" class="text-danger">Inactive</option>
    </select>
</div>
{{-- </div> --}}
