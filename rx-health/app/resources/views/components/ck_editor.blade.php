@props([
    'wire_model',
    'is_array_element' => false,
    'component_to_update' => null,
])

<div>
    {{-- Wrapper for CKEditor --}}
    <div wire:ignore>
        <div id="{{ $wire_model }}" class="form-group"></div>
    </div>
</div>

@script
    <script>
        // Initialize editor name and Livewire property to update
        editor_name = @json($wire_model);
        component_to_update = @json($is_array_element ? $component_to_update : $wire_model);

        // Function to create CKEditor
        function createEditor() {
            ClassicEditor
                .create(document.querySelector('#' + editor_name))
                .then((editor) => {
                    // Initialize editor data from Livewire property
                    editor.setData(@this.get(component_to_update));

                    // Update Livewire property on editor data change
                    editor.model.document.on('change:data', () => {
                        @this.set(component_to_update, editor.getData());
                    });

                    // Listen for reset event and clear editor data when triggered
                    document.addEventListener('reset-message-' + editor_name, () => {
                        console.log('Received reset event for: ' + editor_name);
                        console.log(@this.get(component_to_update));
                        editor.setData(@this.get(component_to_update));  // Clear CKEditor content
                        // @this.set(component_to_update, '');  // Clear Livewire data
                    });
                })
                .catch(error => {
                    console.error('Error creating CKEditor:', error);
                });
        }

        // Create the editor on page load
        createEditor();

        // Listen for Livewire "resetMessage" event to dispatch a reset browser event
        $wire.on('resetMessage', () => {
            const resetEvent = new Event('reset-message-' + editor_name);
            console.log('Dispatching reset event for:', editor_name);

            // Dispatch the reset event to clear the editor
            document.dispatchEvent(resetEvent);
        });
    </script>
@endscript
