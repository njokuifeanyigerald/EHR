@props([
    'tab_name',
    'title',
])

<div class="iq-header-title mt-2">
    <button class="btn btn-light me-3 my-2" @click="mainDiv = !mainDiv; {{ $tab_name }} = !{{ $tab_name }}">
        <i class="fa fa-circle-chevron-left"></i>
        Go back
    </button>
    <h5 class="card-title mt-2">{{ Str::title($title) }}</h5>
</div>
