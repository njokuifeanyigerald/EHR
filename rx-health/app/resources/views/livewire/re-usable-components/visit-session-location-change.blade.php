<div>
    <select class="form-select my-2 bg-white" style="width: 160px" id="location" wire:model.live="session_location">
        @foreach ($this->locations as $location)
            <option value="{{ $location->code }}">{{ Str::headline($location->name) }}</option>
        @endforeach
    </select>
</div>
