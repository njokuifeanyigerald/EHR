<div>
    <div
        wire:ignore.self
        id="add_or_edit_nurses_note"
        class="modal fade"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->medical_record ? 'Edit' : 'Add' }} Nurses Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-3">
                    <div class="new-user-info">
                        <div class="form-horizontal">
                            <div class="row">
                                <div>
                                    <label for="nurses_note" class="fw-bolder">Notes</label>
                                    {{-- <x-ck_editor wire:model="message" :wire_model="'message'" /> --}}
                                    {{--
                                        <x-ck_editor
                                        :component_to_update="'record'"
                                        :is_array_element="true"
                                        :wire_model="'nurses_note'"
                                        />
                                    --}}
                                    <x-ck_editor
                                        :is_array_element="true"
                                        :component_to_update="'record'"
                                        :wire_model="'nurses_note_add'"
                                        id="nurses_note_add"
                                    />
                                    <x-input-error :messages="$errors->get('record')" class="mt-1" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button wire:click="saveNursesNote" type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
