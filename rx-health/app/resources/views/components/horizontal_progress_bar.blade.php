@props([
    'title',
    'percentage',
    'color',
    'message',
])

<div class="row mb-1">
    <div class="col-md-2 mb-0 align-content-center"><p class="mb-0 text-dark font-size-14">{{ $title }}</p></div>
    <div class="col-6 my-auto">
        <div class="iq-progress-bar-linear d-inline-block w-100">
            <div class="iq-progress-bar rx-progress-bar-h">
                <span
                    class="bg-{{ $color }}"
                    data-percent="{{ $percentage }}"
                    style="transition: width 2s; width: {{ $percentage }}%"
                ></span>
            </div>
        </div>
    </div>
    <div class="col align-content-center">
        <span class="text-dark font-size-14">{{ $percentage }}%</span>
        <span class="text-secondary font-size-14">{{ $message }}</span>
    </div>
</div>
