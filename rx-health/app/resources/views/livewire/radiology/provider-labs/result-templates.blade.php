<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>Rad. Results Comment</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div wire:ignore class="table-responsive">
                    <div id="editor" class="form-group"></div>
                </div>
                <x-input-error :messages="$errors->get('lab_comment')" class="mt-1 d-flex justify-content-center" />
                <div class="d-flex justify-content-end my-2">
                    <button class="btn btn-primary" wire:click="saveLabComment">Save Rad. Comment</button>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(function(editor) {
                editor.setData(@this.get('lab_comment'));
                editor.model.document.on('change:data', () => {
                    @this.set('lab_comment', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endscript
