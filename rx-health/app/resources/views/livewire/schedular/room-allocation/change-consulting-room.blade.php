<div>
    <select class="form-select my-2" id="room" wire:model.live="consulting_room">
        <option selected>Select a Consulting Room</option>
        @foreach ($this->consulting_rooms as $consulting_room)
            <option
                value="{{ $consulting_room->id }}"
                {{ $consulting_room->id == $this->consulting_room ? 'selected=""' : '' }}
            >
                {{ Str::headline($consulting_room->unit_name) }}
                {{-- {{ Str::headline($consulting_room->room_name) }} --}}
            </option>
        @endforeach
    </select>
</div>
