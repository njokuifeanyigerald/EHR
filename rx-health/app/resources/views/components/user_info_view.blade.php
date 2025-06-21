@props([
    'title',
    'value',
])

<div class="col-sm-4">
    <div class="form-group mb-0">
        <div class="img-extension mt-1">
            <div class="d-inline-block">
                <b class="text-dark fw-bolder">{{ $title }}:</b>
                <p class="text-dark">{{ $value ?? 'N/A' }}</p>
            </div>
        </div>
    </div>
</div>
