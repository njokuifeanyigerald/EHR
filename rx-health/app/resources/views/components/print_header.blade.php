@props([
    'title',
])
<div class="col-6">
    <img src="{{ App\Helpers\GeneralHelper::applicationLogo() }}" alt="logo" class="img-fluid" width="200" />
</div>
<div class="col-6 d-flex justify-content-end rounded-3 p-2">
    <div class="w-auto">
        @if (isset($title))
            <h5 class="fw-bold">{{ Str::headline($title) }}</h5>
        @endif

        <x-hospital-details />
    </div>
</div>
