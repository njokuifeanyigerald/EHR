<div>
    <div
        wire:ignore.self
        id="add_or_edit_blood_glucose_monitoring"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Blood Glucose Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    {{--
                        <form action="">
                        @csrf
                    --}}
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="date">
                                    Date
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control my-2" id="date" name="date" wire:model="date" />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-6">
                            {{--
                                <div class="form-group">
                                <label for="time">
                                Time
                                <span class="text-danger">*</span>
                                </label>
                                <input type="time" class="form-control my-2" id="time" name="time" value="" />
                                </div>
                            --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-head-custom cursor">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Fasting</th>
                                        <th>Before Eating</th>
                                        <th>2hrs Post</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feeding_types as $feeding_type)
                                        <tr>
                                            <td>{{ Str::headline($feeding_type) }}</td>
                                            @foreach ($check_times as $check_time)
                                                <td class="border-1">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="time">
                                                                    Time
                                                                    {{-- <span class="text-danger">*</span> --}}
                                                                </label>
                                                                <input
                                                                    type="time"
                                                                    class="form-control my-1"
                                                                    id="time"
                                                                    name="time"
                                                                    wire:model="monitoring.{{ $feeding_type }}.{{ $check_time }}.time"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="glucose_level">
                                                                    G.L.
                                                                    {{-- <span class="text-danger">*</span> --}}
                                                                </label>
                                                                <input
                                                                    type="number"
                                                                    class="form-control my-1"
                                                                    id="glucose_level"
                                                                    name="glucose_level"
                                                                    wire:model="monitoring.{{ $feeding_type }}.{{ $check_time }}.glucose_level"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="sugar_level">
                                                                    S.L.
                                                                    {{-- <span class="text-danger">*</span> --}}
                                                                </label>
                                                                <input
                                                                    type="number"
                                                                    class="form-control my-1"
                                                                    id="sugar_level"
                                                                    name="sugar_level"
                                                                    wire:model="monitoring.{{ $feeding_type }}.{{ $check_time }}.sugar_level"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-input-error
                                                        :messages="$errors->get('monitoring.' .$feeding_type. '.'. $check_time .'.time')"
                                                        class="mt-1"
                                                    />
                                                    <x-input-error
                                                        :messages="$errors->get('monitoring.' .$feeding_type. '.'. $check_time .'.glucose_level')"
                                                        class="mt-1"
                                                    />
                                                    <x-input-error
                                                        :messages="$errors->get('monitoring.' .$feeding_type. '.'. $check_time .'.sugar_level')"
                                                        class="mt-1"
                                                    />
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--
                        <div class="form-group">
                        <label for="sugar_level">
                        Sugar Level
                        <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control my-2" id="sugar_level" value="" />
                        </div>
                    --}}
                    {{-- </form> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveBloodGlucoseMonitoring" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
