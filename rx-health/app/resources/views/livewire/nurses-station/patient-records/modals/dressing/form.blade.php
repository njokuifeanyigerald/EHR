@props(['edit' => false])
<div>
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="dressing_site">Dressing Site</label>
        <div>
            <input type="text" class="form-control my-2" id="dressing_site" wire:model="dressing_site" />
        </div>
        <x-input-error :messages="$errors->get('dressing_site')" class="mt-1" />
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="condition_of_wound">Condition Of Wound</label>
        <div>
            <input type="text" class="form-control my-2" id="condition_of_wound" wire:model="condition_of_wound" />
        </div>
        <x-input-error :messages="$errors->get('condition_of_wound')" class="mt-1" />
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="dressing_materials[]">
            Dressing Materials Used
        </label>
        @foreach ($dressing_materials as $dressing_material)
            <div class="row d-flex justify-content-center align-content-center form-group">
                <label
                    class="control-label col-sm-1 align-self-center mb-0"
                    for="dressing_materials{{ $loop->index }}"
                >
                    {{ $loop->index + 1 }}.
                </label>
                <div class="col-sm-8">
                    <input
                        type="text"
                        class="form-control my-2"
                        id="dressing_materials{{ $loop->index }}"
                        wire:model="dressing_materials.{{ $loop->index }}"
                    />
                </div>
                <div class="col-sm-3">
                    @if (count($dressing_materials) > 1 && ! $loop->last)
                        <button
                            type="button"
                            class="btn btn-danger my-2"
                            wire:click="removeDressingMaterial({{ $loop->index }})"
                        >
                            <i class="fa fa-trash"></i>
                        </button>
                    @endif

                    <button type="button" class="btn btn-success my-2" wire:click="addDressingMaterial">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <x-input-error :messages="$errors->get('dressing_materials.'. $loop->index )" class="mt-1" />
        @endforeach
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="observation">Observation</label>
        <div>
            <input type="text" class="form-control my-2" id="observation" wire:model="observation" />
        </div>
        <x-input-error :messages="$errors->get('observation')" class="mt-1" />
    </div>
    <div class="form-group d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary me-1 mt-2">{{ $edit ? 'Update' : 'Create New' }} Dressing</button>
    </div>
</div>
