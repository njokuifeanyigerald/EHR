@props([
    'tab_name',
    'mainDiv',
    'title',
    'icon',
    'color',
])

<div
    @click="{{ $mainDiv }} = !{{ $mainDiv }}; {{ $tab_name }} = !{{ $tab_name }}"
    class="col-md-3 col-sm-3 col-lg-3 col-6 cursor-pointer g-4"
>
    <div class="d-flex bg-white flex-column align-items-center iq-card-body shadow rounded-4">
        <div class="iq-bg-{{ $color }} rounded-circle d-flex" style="width: 88px; height: 88px">
            <i class="text-primary {{ $icon }} icons-large text-dark m-auto"></i>
        </div>
        <div class="d-flex flex-column font-weight-bold mt-3">
            <h5>
                {{ Str::title($title) }}
            </h5>
        </div>
    </div>
</div>
