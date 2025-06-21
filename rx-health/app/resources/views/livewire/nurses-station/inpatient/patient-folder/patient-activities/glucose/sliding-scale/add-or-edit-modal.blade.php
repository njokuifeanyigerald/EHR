<div>
    <div
        wire:ignore.self
        id="add_or_edit_sliding_scale"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Sliding Scale Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <div class="mt-2 mb-4">
                        <button class="btn btn-primary" onclick="$('.benchmarks').fadeToggle('slow')">
                            View Benchmarks
                        </button>
                    </div>
                    <div class="hide benchmarks" style="display: none">
                        <div class="row mb-5">
                            <div class="col-lg-6 col-md-6 col-12">
                                <h3 class="card-label text-primary"><u>Blood Sugar Level</u></h3>
                                <span class="text-primary">0-5 (mml)</span>
                                <br />
                                <span class="text-primary">5-10 (mml)</span>
                                <br />
                                <span class="text-primary">10-15 (mml)</span>
                                <br />
                                <span class="text-primary">15-20 (mml)</span>
                                <br />
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <h3 class="card-label text-primary"><u>Actrapid</u></h3>
                                <span class="text-primary">0 units (Before Meals)</span>
                                <br />
                                <span class="text-primary">5 units (Before Meals)</span>
                                <br />
                                <span class="text-primary">10 units (Before Meals)</span>
                                <br />
                                <span class="text-primary">15 units (Before Meals)</span>
                                <br />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input wire:model="date" type="date" class="form-control my-2" id="date" name="date" />
                                <x-input-error :messages="$errors->get('date')" class="mt-1" />
                            </div>
                        </div>
                        {{--
                            <div class="col-6">
                            <div class="form-group">
                            <label for="time">
                            Time
                            <span class="text-danger">*</span>
                            </label>
                            <input
                            wire:model="time"
                            type="time"
                            class="form-control my-2"
                            id="time"
                            name="time"
                            value=""
                            />
                            </div>
                            </div>
                        --}}
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th style="width: 150px !important"></th>
                                        <th>Time</th>
                                        <th>Sugar Level</th>
                                        <th>Time</th>
                                        <th>Actrapid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pre Breakfast</td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_breakfast.sugar_level_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_breakfast.sugar_level_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_breakfast.sugar_level"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_breakfast.sugar_level')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_breakfast.actrapid_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_breakfast.actrapid_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_breakfast.actrapid"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_breakfast.actrapid')"
                                                class="mt-1"
                                            />
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pre Lunch</td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_lunch.sugar_level_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_lunch.sugar_level_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_lunch.sugar_level"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_lunch.sugar_level')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_lunch.actrapid_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_lunch.actrapid_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_lunch.actrapid"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_lunch.actrapid')"
                                                class="mt-1"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pre Supper</td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_supper.sugar_level_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_supper.sugar_level_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_supper.sugar_level"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">mml</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_supper.sugar_level')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <input
                                                wire:model="monitoring.pre_supper.actrapid_time"
                                                class="form-control"
                                                type="time"
                                            />
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_supper.actrapid_time')"
                                                class="mt-1"
                                            />
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input
                                                    wire:model="monitoring.pre_supper.actrapid"
                                                    type="number"
                                                    min="0"
                                                    step="any"
                                                    class="form-control"
                                                />
                                                <span class="input-group-text">units</span>
                                            </div>
                                            <x-input-error
                                                :messages="$errors->get('monitoring.pre_supper.actrapid')"
                                                class="mt-1"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveSlidingScale" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
