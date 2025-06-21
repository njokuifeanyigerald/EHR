<div>
    <div wire:ignore.self id="PatientAllergy" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Allergy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Allergy</th>
                                    <th>Reactions</th>
                                    <th style="width: 40%">New Reaction</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($this->allergies as $allergy)
                                    <tr>
                                        <td class="pt-3-half">{{ $allergy->allergy }}</td>
                                        <td class="pt-3-half">
                                            <div class="form-group my-auto">
                                                <div class="d-flex gap-2 flex-wrap">
                                                    @foreach (json_decode($allergy->allergy_reactions) as $reaction)
                                                        {{ $reaction }},
                                                    @endforeach
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pt-3-half">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="New Allergy"
                                                id="allergy_{{ $loop->iteration }}"
                                                wire:model.live="allergy_data.{{ $allergy->id }}.reaction"
                                                @if ($this->visit->sign != 'No') @readonly(true) @endif
                                            />
                                        </td>
                                        <td>
                                            @if ($this->visit->sign == 'No')
                                                <i
                                                    class="fa fa-check cursor-pointer icons-sm"
                                                    style="color: #0bb7af"
                                                    title="Save Reaction"
                                                    wire:click="saveReaction({{ $allergy->id }})"
                                                ></i>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12">
                                            <div class="d-flex justify-content-center align-content-center">
                                                No Allergy Found
                                            </div>
                                        </td>
                                    </tr>
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
