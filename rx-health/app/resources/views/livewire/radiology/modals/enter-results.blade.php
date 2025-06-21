<div>
    {{-- Enter Results Modal --}}
    <div wire:ignore.self id="enter_results_data_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-chart-line me-2"></i>
                        {{ Str::headline($this->title) }} - {{ $this->lab_templates_and_comment?->item_name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 my-3 border rounded-3 p-3 bg-light">
                        <div class="row">
                            {{-- <x-patient_info_lab-results :title="'Patient Name'" :value="'kkjdf'" /> --}}
                            <x-patient_info_lab-results :title="'User'" :value="$result['user'] ?? 'N/A'" />
                            <x-patient_info_lab-results
                                :title="'Last Updated'"
                                :value="($result['updated_at'] ?? null) == null ? 'N/A' : now()->parse($result['updated_at'])"
                            />

                            <x-patient_info_lab-results
                                :title="'Approved Status'"
                                :value="Str::headline(($result['approved_status'] ?? null) == null ? 'N/A' : $result['approved_status'])"
                            />
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title fw-semibold">Result</h4>
                            </div>
                        </div>
                        @if (strtolower($result['approved_status'] ?? null) == null || strtolower($result['approved_status'] ?? null) == 'pending')
                            <div wire:ignore class="table-responsive">
                                <div id="editor" class="form-group"></div>
                            </div>
                        @else
                            {!! $this->lab_result !!}
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @if ($this->type == 'enter_results')
                            <button wire:click="enterResults" class="btn btn-primary">
                                Click to Finish this Diagnostics
                            </button>
                        @endif

                        @if ($this->type != 'enter_results' &&
                            (strtolower($result['approved_status'] ?? null) == null ||
                                strtolower($result['approved_status'] ?? null) == 'pending'))
                            <button wire:click="approveAllResults" class="btn btn-primary">Approve</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ckeditor -->
    <script src="{{ asset('packages/ckeditor5-build-classic/ckeditor.js') }}"></script>

    @script
        <script>
            $wire.on('openEnterResultsFormContentModal', function () {
                $('#enter_results_data_').modal('show');
                document.querySelector('#editor').innerHTML = @this.get('lab_result');

                //remove any existing editor
                document.querySelectorAll('.ck-editor').forEach(ck => ck.remove());

                //create new editor
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(function(editor) {
                        editor.setData(@this.get('lab_result'));
                        editor.model.document.on('change:data', () => {
                            @this.set('lab_result', editor.getData());
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    @endscript
</div>
