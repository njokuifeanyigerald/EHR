<div>
    <x-ck_editor :is_array_element="true" :component_to_update="'record'" :wire_model="$this->model_type" />
    <x-input-error :messages="$errors->get('record')" class="mt-1" />
    <button wire:click="saveReportData" class="btn btn-sm btn-primary mt-2">Save</button>
</div>
