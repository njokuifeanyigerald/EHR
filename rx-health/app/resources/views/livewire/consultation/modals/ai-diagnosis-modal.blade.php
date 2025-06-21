{{-- Modals for selecting investigations --}}
<div
    wire:ignore.self
    class="modal fade"
    id="ai-diagnosis-modal"
    tabindex="-1"
    aria-labelledby="ai-diagnosis-modal"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" style="font-size: 25px" id="ai-diagnosis-modal">
                    View AI Diagnosis
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    <strong>N/B:</strong>
                    <br />
                    <span class="text-danger">
                        Suggested Diagnosis based on the symptoms provided by the patient.
                        <br />
                        Please note that you may need to confirm the diagnosis with a physician.
                    </span>
                </p>

                <div class="accordion" id="diseasesAccordion">
                    @foreach ($this->ai_diagnosis ?? [] as $index => $disease)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button
                                    class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}"
                                >
                                    {{ $disease['disease_name'] }} (ICD-10: {{ $disease['icd_10_code'] }})
                                </button>
                            </h2>
                            <div
                                id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}"
                                data-bs-parent="#diseasesAccordion"
                            >
                                <div class="accordion-body">
                                    <strong>Related Symptoms:</strong>
                                    <ul>
                                        @foreach ($disease['related_symptoms'] as $symptom)
                                            <li>{{ $symptom }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
