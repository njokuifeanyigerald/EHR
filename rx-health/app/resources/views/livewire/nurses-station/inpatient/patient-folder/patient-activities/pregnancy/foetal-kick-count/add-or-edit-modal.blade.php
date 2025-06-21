<div>
    <div
        wire:ignore.self
        id="add_or_edit_foetal_kick_count"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Foetal Kick Count Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="date_time" class="font-weight-bolder">Date</label>
                        <input
                            d="date"
                            wire:model="date"
                            class="form-control"
                            type="date"
                            {{-- value="" --}}
                            name="date_time"
                        />
                        <x-input-error :messages="$errors->get('date')" class="mt-1" />
                    </div>
                    {{-- {{ $errors }} --}}
                    @foreach ($kick_check_types as $kick_check_type)
                        <div class="form-group">
                            <label class="font-weight-bolder fw-bolder">{{ Str::headline($kick_check_type) }}</label>
                            <div class="row">
                                <div class="col">
                                    <label class="font-weight-bolder">Start Time</label>
                                    <input
                                        class="form-control"
                                        type="time"
                                        wire:model="monitoring.{{ $kick_check_type }}.start_time"
                                        placeholder="Start Time"
                                        name="after_breakfast_start"
                                    />
                                    <x-input-error
                                        :messages="$errors->get('monitoring.'. $kick_check_type .'.start_time')"
                                        class="mt-1"
                                    />
                                </div>
                                <div class="col">
                                    <label class="font-weight-bolder">End Time</label>
                                    <input
                                        class="form-control"
                                        type="time"
                                        placeholder="End Time"
                                        wire:model="monitoring.{{ $kick_check_type }}.end_time"
                                        name="after_breakfast_end"
                                    />
                                    <x-input-error
                                        :messages="$errors->get('monitoring.'. $kick_check_type .'.end_time')"
                                        class="mt-1"
                                    />
                                </div>
                                <div class="col">
                                    <label class="font-weight-bolder">Kick Count</label>
                                    <input
                                        class="form-control"
                                        type="number"
                                        step="any"
                                        wire:model="monitoring.{{ $kick_check_type }}.kick_count"
                                        placeholder="Kick Count"
                                        name="after_breakfast_kick_count"
                                    />
                                    <x-input-error
                                        :messages="$errors->get('monitoring.'. $kick_check_type .'.kick_count')"
                                        class="mt-1"
                                    />
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="total_kick_count" class="font-weight-bolder">Total Kick Count</label>
                        <input
                            id="total_kick_count"
                            class="form-control"
                            wire:model="monitoring.total_kick_count"
                            type="number"
                            step="any"
                            name="total_kick_count"
                        />
                        <x-input-error :messages="$errors->get('monitoring.total_kick_count')" class="mt-1" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveFoetalKickCount" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
