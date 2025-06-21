@props([
    'visit',
    'current_location',
])

{{-- <div> --}}
<span class="me-2">
    {{--
        <img
        class="user-image rx-patient-rounded"
        src="{{ asset('images/user/Image2.png') }}"
        alt="Patient profile picture"
        />
    --}}
    {{ $visit->session_location == $current_location ? now()->parse($visit->session_location_modified_at)->diffForHumans() : '--' }}
</span>
{{-- </div> --}}
