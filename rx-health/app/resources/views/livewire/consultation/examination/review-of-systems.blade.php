<div class="form-group row">
    @forelse ($this->systems as $system)
        <div class="col-md-4 cursor-pointer">
            <div class="input-group my-2" wire:click="openModalFor('{{ $system->group_name }}')">
                <input type="text" class="form-control" value="{{ $system->group_name }}" readonly />
                <span class="input-group-text bg-primary" id="urine">
                    <i class="fa fa-plus text-white"></i>
                </span>
            </div>
        </div>
    @empty
        <div class="d-flex justify-content-center align-content-center">No System Set for Review</div>
    @endforelse

    {{-- Review of systems modal --}}

    <div wire:ignore.self id="reviewSystem_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $this->selected_system_group }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Symptom</th>
                                    <th>Presence</th>
                                    <th style="width: 40%">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->systems_to_review as $system_to_review)
                                    <tr>
                                        <td class="pt-3-half">{{ $system_to_review->item }}</td>
                                        <td class="pt-3-half">
                                            <div class="form-group my-auto">
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <div
                                                        class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                                    >
                                                        <input
                                                            type="radio"
                                                            id="admit_{{ $loop->iteration }}"
                                                            value="admit"
                                                            class="custom-control-input bg-success me-1"
                                                            wire:model.live="review_to_save.{{ $this->selected_system_group }}.{{ $system_to_review->item }}.response"
                                                            @if ($this->visit->sign != 'No') @disabled(true) @endif
                                                        />
                                                        <label
                                                            class="custom-control-label"
                                                            for="admit_{{ $loop->iteration }}"
                                                        >
                                                            Admit
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                                    >
                                                        <input
                                                            type="radio"
                                                            id="deny_{{ $loop->iteration }}"
                                                            value="deny"
                                                            wire:model.live="review_to_save.{{ $this->selected_system_group }}.{{ $system_to_review->item }}.response"
                                                            @if ($this->visit->sign != 'No') @disabled(true) @endif
                                                            class="custom-control-input bg-danger me-1"
                                                        />
                                                        <label
                                                            class="custom-control-label"
                                                            for="deny_{{ $loop->iteration }}"
                                                        >
                                                            Deny
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                                    >
                                                        <input
                                                            type="radio"
                                                            id="not_checked_{{ $loop->iteration }}"
                                                            value="not checked"
                                                            wire:model.live="review_to_save.{{ $this->selected_system_group }}.{{ $system_to_review->item }}.response"
                                                            class="custom-control-input bg-primary me-1"
                                                            @if ($this->visit->sign != 'No') @disabled(true) @endif
                                                        />
                                                        <label
                                                            class="custom-control-label"
                                                            for="not_checked_{{ $loop->iteration }}"
                                                        >
                                                            Not Checked
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pt-3-half">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Type notes here..."
                                                id="comment_{{ $loop->iteration }}"
                                                wire:model.live="review_to_save.{{ $this->selected_system_group }}.{{ $system_to_review->item }}.comment"
                                                @if ($this->visit->sign != 'No') @readonly(true) @endif
                                            />
                                        </td>
                                        <td>
                                            @if ($this->visit->sign == 'No')
                                                <i
                                                    class="fa fa-check cursor-pointer icons-sm"
                                                    style="color: #0bb7af"
                                                    title="Save Review"
                                                    wire:click="saveReview"
                                                ></i>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="d-flex justify-content-center align-content-center">
                                        No System Set for Review
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('openReviewModal', function () {
            $('#reviewSystem_').modal('show');
        });
    </script>
@endscript
