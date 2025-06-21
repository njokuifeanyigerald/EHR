<div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="updatePrescription">
                        <div class="row">
                            <div class="col-4">
                                <label>Dose</label>
                                <input
                                    type="number"
                                    name="dose"
                                    id="dose"
                                    class="form-control"
                                    value="2"
                                    wire:model.live="dose"
                                />
                                <x-input-error :messages="$errors->get('dose')" class="mt-1" />
                            </div>
                            <div class="col-4">
                                <label>Dosage Unit</label>
                                <select class="form-control" name="dosage_unit" id="dosage_unit" wire:model.live="unit">
                                    <option value="Bottle">Bottle</option>
                                    <option value="Apply">Apply</option>
                                    <option value="Cap">Cap</option>
                                    <option value="Tab">Tab</option>
                                    <option value="IM">IM</option>
                                    <option value="Tube">Tube</option>
                                    <option value="Drop">Drop</option>
                                    <option value="SC">SC</option>
                                    <option value="mg">mg</option>
                                    <option value="IV">IV</option>
                                    <option value="Unit">Unit</option>
                                    <option value="g">g</option>
                                    <option value="Supp">Supp</option>
                                    <option value="L">L</option>
                                    <option value="OC">OC</option>
                                    <option value="Puff">Puff</option>
                                    <option value="ug">ug</option>
                                    <option value="kg">kg</option>
                                    <option value="OC">OC</option>
                                    <option value="Ml">Ml</option>
                                </select>
                                <x-input-error :messages="$errors->get('unit')" class="mt-1" />
                            </div>
                            <div class="col-4">
                                <label>Frequency</label>
                                <select
                                    class="form-control"
                                    name="frequency"
                                    id="frequency"
                                    wire:model.live="frequency"
                                >
                                    <option value="tid">tid</option>
                                    <option selected="" value="bid">bid</option>
                                    <option value="od">od</option>
                                    <option value="stat">stat</option>
                                    <option value="prn">prn</option>
                                    <option value="nocte">nocte</option>
                                    <option value="qid">qid</option>
                                    <option value="q4h">q4h</option>
                                </select>
                                <x-input-error :messages="$errors->get('frequency')" class="mt-1" />
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-4">
                                <label>Days</label>
                                <input
                                    type="number"
                                    name="days"
                                    id="days"
                                    class="form-control"
                                    value="5"
                                    wire:model.live="number_of_days"
                                />
                                <x-input-error :messages="$errors->get('number_of_days')" class="mt-1" />
                            </div>
                            <div class="col-4">
                                <label>Route</label>
                                <select class="form-control" name="route" id="route" wire:model.live="route">
                                    <option value="Externally">Externally</option>
                                    <option value="Oral">Oral</option>
                                    <option value="Inhale">Inhale</option>
                                    <option value="Rectally">Rectally</option>
                                </select>
                                <x-input-error :messages="$errors->get('route')" class="mt-1" />
                            </div>
                            <div class="col-4">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-primary btn-sm w-150px" onclick="">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
