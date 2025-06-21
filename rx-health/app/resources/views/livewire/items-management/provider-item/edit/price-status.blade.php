{{-- <div> --}}
<select
    class="form-select {{ $this->status == 'inactive' ? 'text-danger' : 'text-success' }}"
    name="status"
    id="status_734"
    wire:model.live="status"
>
    <option class="text-success" selected="" value="active">Active</option>
    <option class="text-danger" value="inactive">Inactive</option>
</select>
{{-- </div> --}}
