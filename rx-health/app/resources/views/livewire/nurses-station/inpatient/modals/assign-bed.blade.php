<div>
    {{-- Assign bed Modal --}}
    <div wire:ignore.self id="assign_bed" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Assign Patient To Ward</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <form action=""> --}}
                <div class="modal-body mx-5">
                    <div class="form-group">
                        <label for="bed_id" class="fw-bold">
                            Available Bed
                            <span class="text-danger">*</span>
                        </label>
                        <select class="form-select my-2" id="bed_id" name="status" wire:model.live="bed">
                            <option>Please select bed</option>
                            @forelse ($this->beds ?? [] as $bed)
                                <option value="{{ $bed->id }}">
                                    Ward: {{ $bed->ward->ward_name }} -- Bed: {{ $bed->bed_name }} -- Price:
                                    {{ number_format($bed->ward->price, 2, '.', ',') }} -- Type:
                                    {{ Str::headline($bed->ward->ward_type) }}
                                </option>
                            @empty
                                <option>No bed Available</option>
                            @endforelse
                        </select>
                        <x-input-error :messages="$errors->get('bed')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="status" class="fw-bold">
                            Booking Date
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="date" id="booking_date" wire:model.live="booking_date" />
                        <x-input-error :messages="$errors->get('booking_date')" class="mt-1" />
                    </div>
                    <div class="form-group">
                        <label for="ward_id" class="fw-bold">
                            Booking Time
                            <span class="text-danger">*</span>
                        </label>
                        <input
                            class="form-control"
                            type="time"
                            step="1"
                            id="booking_time"
                            wire:model.live="booking_time"
                        />
                        <x-input-error :messages="$errors->get('booking_time')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" wire:click="assignBed">Assign Bed</button>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('closeAssignBedModal', function () {
            $('#assign_bed').modal('hide');
        });
    </script>
@endscript
