<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <div wire:ignore.self class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Index</th>
                                <th class="count">Test Name</th>
                                <th>Result type</th>
                                <th>Code</th>
                                <th>Gender</th>
                                <th>Units</th>
                                <th>Start Value</th>
                                <th>End Value</th>
                                <th>Power of</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->templates as $template)
                                <tr class="test_row{{ $loop->index }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input
                                            wire:key="order_no_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.order_number"
                                            class="form-control"
                                            {{-- type="text" --}}
                                            type="number"
                                            name="order_no{{ $loop->index }}"
                                            id="order_no_{{ $loop->index }}"
                                        />
                                    </td>
                                    <td>
                                        <div>
                                            <input
                                                wire:key="test_name_1_{{ $loop->index }}"
                                                class="form-control"
                                                type="text"
                                                name="test_name{{ $loop->index }}"
                                                id="test_name_{{ $loop->index }}"
                                                style="width: 80%"
                                                wire:model="templates.{{ $loop->index }}.test_name"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <select
                                            wire:key="result_type_1_{{ $loop->index }}"
                                            wire:model.live="templates.{{ $loop->index }}.result_type"
                                            class="form-select"
                                            style="width: 120px; padding: 3px"
                                            type="text"
                                            name="result_type{{ $loop->index }}"
                                            id="result_type_{{ $loop->index }}"
                                        >
                                            <option value="no_range">No Range</option>
                                            <option value="range">With Range</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                            wire:key="test_code_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.test_code"
                                            class="form-control"
                                            type="text"
                                            name="test_code{{ $loop->index }}"
                                            id="test_code{{ $loop->index }}"
                                            readonly
                                        />
                                    </td>
                                    <td>
                                        <select
                                            wire:key="gender_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.gender"
                                            class="form-select"
                                            name="gender{{ $loop->index }}"
                                            style="width: 80px; padding: 3px"
                                            id="gender{{ $loop->index }}"
                                        >
                                            <option value="M">Male</option>
                                            <option value="U">Unisex</option>
                                            <option value="F">Female</option>
                                            <option value="C">Child</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input
                                            wire:key="unit_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.unit"
                                            class="form-control"
                                            type="text"
                                            name="unit{{ $loop->index }}"
                                            id="unit{{ $loop->index }}"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            wire:key="start_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.start_value"
                                            type="number"
                                            class="form-control range_1 {{ $templates[$loop->index]['result_type'] == 'range' ? '' : 'd-none' }}"
                                            name="start{{ $loop->index }}"
                                            id="start{{ $loop->index }}"
                                            style="display:"
                                        />
                                    </td>
                                    <td>
                                        <input
                                            wire:key="end_1_{{ $loop->index }}"
                                            wire:model="templates.{{ $loop->index }}.end_value"
                                            type="number"
                                            class="form-control range_1 {{ $templates[$loop->index]['result_type'] == 'range' ? '' : 'd-none' }}"
                                            name="end{{ $loop->index }}"
                                            id="end{{ $loop->index }}"
                                            style="display:"
                                        />
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <input
                                                wire:key="power_of_1_{{ $loop->index }}"
                                                wire:model="templates.{{ $loop->index }}.power_of"
                                                class="form-control {{ $templates[$loop->index]['result_type'] == 'range' ? '' : 'd-none' }}"
                                                value=""
                                                type="number"
                                                name="power_of{{ $loop->index }}"
                                                id="power_of{{ $loop->index }}"
                                            />
                                            <div
                                                class="text-center text-nowrap h-full align-content-center {{ $templates[$loop->index]['result_type'] == 'range' ? '' : 'd-none' }}"
                                            >
                                                x 10
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 100px">
                                        <a wire:key="addTemplate" wire:click="addTemplate" class="text-success">
                                            <i class="fa fa-plus-circle icons-sm me-0"></i>
                                        </a>
                                        <span class="mx-1">|</span>
                                        <a
                                            wire:key="removeTemplate"
                                            wire:click="removeTemplate({{ $loop->index }})"
                                            class="text-danger"
                                        >
                                            <i class="fa fa-trash icons-sm me-0"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12">
                                        <div class="d-flex justify-content-center">
                                            <div
                                                wire:key="addTemplate"
                                                wire:click="addTemplate"
                                                class="w-full text-center btn btn-success text-black"
                                            >
                                                <i class="fa fa-plus-circle icons-sm me-0"></i>
                                                Add Template
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if ($this->templates)
                        <div wire:target="addTemplate">
                            @foreach ($errors->all() as $error)
                                <x-input-error :messages="$error" class="mt-1" />
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-end my-2">
                    <button class="btn btn-primary" wire:click="saveTemplates">Save Template</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4>Lab Results Comment</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div wire:ignore class="table-responsive">
                    <div id="editor" class="form-group"></div>
                </div>
                <x-input-error :messages="$errors->get('lab_comment')" class="mt-1 d-flex justify-content-center" />
                <div class="d-flex justify-content-end my-2">
                    <button class="btn btn-primary" wire:click="saveLabComment">Save Lab Comment</button>
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
