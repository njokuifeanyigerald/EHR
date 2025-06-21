<div class="col-sm-12">
    <div class="iq-card px-3 py-3">
        <form id="dynamic-report-filter" action="{{ route('reports.submit_report') }}" method="POST">
            @csrf
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 d-flex justify-content-start">
                    <div class="col-md-12 row">
                        <div class="col-md-4">
                            <label
                                class="control-label align-self-center mb-0 font-size-12 gx-4 gx-0"
                                for="report_type"
                            >
                                Type Of Report
                            </label>
                            <select class="form-select my-2" id="report_type" name="report_type" required>
                                <option value="">--Select Report Type--</option>
                                @foreach ($reportTypes as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach ($additionalData as $hiddenKey => $hiddenValue)
                            <input type="hidden" name="{{ $hiddenKey }}" value="{{ $hiddenValue }}" />
                        @endforeach

                        @foreach ($dynamicFields as $fieldKey => $fieldData)
                            <div id="{{ $fieldKey }}" class="row col-md-6" style="display: none">
                                <div class="col-md-8">
                                    <label
                                        class="control-label align-self-center mb-0 font-size-12 gx-4 gx-0"
                                        for="{{ $fieldKey }}"
                                    >
                                        {{ $fieldData['fieldType']['label'] }}
                                    </label>

                                    @if ($fieldData['fieldType']['type'] === 'radio')
                                        @foreach ($fieldData['fieldType']['options'] as $optionValue => $optionLabel)
                                            <div class="custom-control custom-radio">
                                                <input
                                                    type="radio"
                                                    id="{{ $optionValue }}"
                                                    name="{{ $fieldKey }}_type"
                                                    class="custom-control-input"
                                                    required
                                                    value="{{ $optionValue }}"
                                                />
                                                <label
                                                    class="custom-control-label font-size-12"
                                                    for="{{ $optionValue }}"
                                                >
                                                    {{ $optionLabel }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @elseif ($fieldData['fieldType']['type'] === 'select')
                                        {{-- Default to select dropdown --}}
                                        <select
                                            class="form-select my-2"
                                            id="{{ $fieldKey }}_type"
                                            name="{{ $fieldKey }}_type"
                                        >
                                            @foreach ($fieldData['fieldType']['options'] as $optionKey => $optionLabel)
                                                <option value="{{ $optionKey }}">{{ $optionLabel }}</option>
                                            @endforeach
                                        </select>
                                    @elseif ($fieldData['fieldType']['type'] === 'search')
                                        @livewire('re-usable-components.search-item-dropdown')
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @php
                    $startDate = date('Y-m-d', strtotime(request()->input('start_date')));
                    $endDate = date('Y-m-d', strtotime(request()->input('end_date')));
                @endphp

                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <div class="row gx-md-3 gx-0">
                        <div class="col-md-10 col-12 d-flex justify-content-end row gx-md-3 gx-0">
                            <div class="col-md-6">
                                <label class="control-label align-self-center mb-0 font-size-12" for="start_date">
                                    Start Date:
                                </label>
                                <input
                                    type="date"
                                    class="form-control my-2"
                                    id="start_date"
                                    required
                                    value="{{ $startDate }}"
                                    name="start_date"
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="control-label align-self-center mb-0 font-size-12" for="end_date">
                                    End Date:
                                </label>
                                <input
                                    type="date"
                                    class="form-control my-2"
                                    id="end_date"
                                    required
                                    {{ $startDate ? '' : 'disabled' }}
                                    value="{{ $endDate }}"
                                    name="end_date"
                                />
                            </div>
                        </div>
                        <div class="col-md-2 col-12 align-self-center text-md-center text-start">
                            <button type="submit" class="btn btn-lg btn-primary align-self-center">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $('#report_type').change(function () {
            const selectedType = $(this).children('option:selected').val();
            const arrayData = Object.keys({!! json_encode($dynamicFields) !!});

            // Hide all possible fields and remove the `required` attribute
            arrayData.forEach((report) => {
                const inputField = $(`#${report}`);
                inputField.hide().find('input, select, textarea, radio').prop('required', false);
            });

            // Show the selected field and make its inputs required
            if (arrayData.includes(selectedType)) {
                const selectedField = $(`#${selectedType}`);
                selectedField.show().find('input, select, textarea, radio').prop('required', true);
            }
        });
    </script>

    <script>
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        // Function to set min and max dates for the end date field
        function updateEndDateLimits() {
            const startDate = new Date(startDateInput.value);
            if (startDateInput.value) {
                // Enable end date input when start date is set
                endDateInput.disabled = false;

                // Calculate one year from the start date
                const endDateMin = new Date(startDate);
                endDateMin.setFullYear(startDate.getFullYear() + 1);
                const endDateMax = new Date(startDate);
                endDateMax.setFullYear(startDate.getFullYear() + 1);

                // Set the min and max values for end date
                endDateInput.setAttribute('min', startDate.toISOString().split('T')[0]);
                endDateInput.setAttribute('max', endDateMin.toISOString().split('T')[0]);

                // If end date is less than start date, reset it
                if (new Date(endDateInput.value) < startDate) {
                    endDateInput.value = startDate.toISOString().split('T')[0];
                }
            } else {
                // Disable end date if start date is not set
                endDateInput.disabled = true;
                endDateInput.value = ''; // Clear the end date if disabled
            }
        }

        // Update end date when the start date changes
        startDateInput.addEventListener('change', updateEndDateLimits);

        // Ensure end date is valid when changed
        endDateInput.addEventListener('change', function () {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            if (endDate < startDate) {
                alert('End date cannot be earlier than start date.');
                endDateInput.value = startDate.toISOString().split('T')[0]; // Reset to start date
            }
        });
    </script>
@endpush
