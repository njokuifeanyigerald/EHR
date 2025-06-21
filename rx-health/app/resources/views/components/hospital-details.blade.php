<p class="text-dark mb-0">
    {{ Str::title(auth()->user()->hospital->name) }}
    <br />
    {{ Str::title(auth()->user()->hospital->address) }}
    <br />
    {{ Str::lower(auth()->user()->hospital->email) }}
    <br />
    {{ Str::title(auth()->user()->hospital->contact_number) }}
</p>
