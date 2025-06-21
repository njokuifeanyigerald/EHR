@props([
    'visits' => [],
])

<div class="mb-1 mt-3">
    @forelse ($visits as $visit)
        {{-- @dd(json_decode($visit->medicalRecords->where('record_type', 'Allergy')->first()?->record_data)) --}}

        <div class="d-flex">
            <!--Icon-->
            <div class="timeline-media bg-light-primary">
                <i class="ri-message-fill icons-base"></i>
            </div>
            <!--Info-->
            <div class="p-2 w-100">
                <span class="text-primary">
                    {{ $visit->created_at->format('jS F Y') }} @
                    <span class="text-warning">{{ $visit->created_at->format('G:m A') }}</span>
                </span>
                -
                <span class="font-weight-bolder">{{ $visit->visit_number }}</span>
                <div
                    style="cursor: pointer"
                    class="timeline-content bg-light-primary"
                    onclick="$('.historyDetails{{ $visit->id }}').fadeToggle('slow')"
                >
                    <div class="chat-message float-none text-start">
                        <p>Click to view details</p>
                    </div>
                </div>
                <div style="display: none" class="historyDetails{{ $visit->id }} mt-2 ml-10 mx-3">
                    @include('livewire.re-usable-components.patient.medical_records', ['visit' => $visit])
                </div>
            </div>
        </div>
    @empty
        No Visit Found
    @endforelse

    {{--
        <div class="d-flex justify-content-end my-2">
        <a class="btn btn-primary" type="submit" href="{{ route('dashboard') }}" target="_blank">See more</a>
        </div>
    --}}
    {{--
        <nav aria-label="Page navigation example">
        <ul class="pagination mt-3 mb-1 justify-content-end">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&lt;</span>
        </a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&gt;</span>
        </a>
        </li>
        </ul>
        </nav>
    --}}
</div>
