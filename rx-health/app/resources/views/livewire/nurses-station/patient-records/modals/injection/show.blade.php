<div>
    {{-- show injection --}}
    <div wire:ignore.self id="show_injection" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Latest Injection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-5 mx-3">
                        <div class="mb-2">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 rx-font-size-lg">
                                    <b>Injection Type</b>
                                </span>
                                <span class="text-muted">{{ $injection_type ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 rx-font-size-lg">
                                    <b>Injection Site</b>
                                </span>
                                <span class="text-muted">{{ $injection_site ?? 'N/A' }}</span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 rx-font-size-lg">
                                    <b>Condition Of Wound</b>
                                </span>
                                <span class="text-muted">
                                    {{ $condition_of_wound ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 rx-font-size-lg">
                                    <b>Medications Given</b>
                                </span>
                                @foreach ($medications_given as $medication_given)
                                    <span class="text-muted">
                                        {{ $loop->index + 1 . '. ' . $medication_given }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex flex-column font-weight-bold">
                                <span class="text-dark mb-1 rx-font-size-lg">
                                    <b>Injection Reaction</b>
                                </span>
                                <span class="text-muted">
                                    {{ $injection_reaction ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
