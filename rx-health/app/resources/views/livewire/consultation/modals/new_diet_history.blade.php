<div>
    {{-- New Dietary history --}}
    <div wire:ignore.self id="new_diet_history" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'New' }} Dietary History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new-user-info form-horizontal">
                        <div class="row">
                            <div class="form-group row col-sm-6">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="Meal">
                                    {{-- Time/Meal Type --}}
                                    Meal Type
                                </label>
                                <div class="col-sm-9">
                                    <select wire:model="diet_history.meal_type" class="form-select my-2">
                                        <option selected="">Select Option</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Snack">Snack</option>
                                    </select>

                                    <x-input-error :messages="$errors->get('diet_history.meal_type')" class="mt-1" />
                                </div>
                            </div>
                            <div class="form-group row col-sm-6">
                                <div class="col-sm-12">
                                    <input
                                        type="datetime-local"
                                        value=""
                                        class="form-control my-2"
                                        id="Time"
                                        placeholder="Time"
                                        wire:model="diet_history.time"
                                    />

                                    <x-input-error :messages="$errors->get('diet_history.time')" class="mt-1" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-12">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Food">Food</label>
                                    <div class="col-sm-9">
                                        <textarea
                                            wire:model="diet_history.food"
                                            class="form-control my-2"
                                            id="Food"
                                            rows="5"
                                        ></textarea>

                                        <x-input-error :messages="$errors->get('diet_history.food')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-12">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="Quantity">
                                        Quantity
                                    </label>
                                    <div class="col-sm-9">
                                        <input
                                            wire:model="diet_history.quantity"
                                            type="number"
                                            class="form-control my-2"
                                            id="Quantity"
                                            rows="5"
                                        />

                                        <x-input-error
                                            :messages="$errors->get('diet_history.quantity')"
                                            class="mt-1"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveDietHistory" type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
