@props(['edit' => false])
@php
    use App\Enums\InjectionSites;
    use App\Enums\InjectionTypes;
@endphp

<div>
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="injection_type">Injection Type</label>
        <div>
            {{-- <input type="text" class="form-control my-2" id="injection_type" wire:model="injection_type" /> --}}
            <select wire:model="injection_type" class="form-select my-2" id="injection_type">
                <option selected="">Select Option</option>
                @forelse (InjectionTypes::options() ?? [] as $injection_type_sample)
                    <option value="{{ $injection_type_sample }}">{{ $injection_type_sample }}</option>
                @empty
                    <option value="">No Injection Type Found</option>
                @endforelse
            </select>
        </div>
        <x-input-error :messages="$errors->get('injection_type')" class="mt-1" />
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3 align-self-center mb-0" for="injection_site">Injection Site</label>
        <div>
            {{-- <input type="text" class="form-control my-2" id="injection_site" wire:model="injection_site" /> --}}
            <select wire:model="injection_site" class="form-select my-2" id="injection_site">
                <option selected="">Select Option</option>
                @forelse (InjectionSites::options() ?? [] as $injection_site_sample)
                    <option value="{{ $injection_site_sample }}">{{ $injection_site_sample }}</option>
                @empty
                    <option value="">No Injection Type Found</option>
                @endforelse
            </select>
        </div>
        <x-input-error :messages="$errors->get('injection_site')" class="mt-1" />
    </div>

    <div>
        {{-- <label class="control-label col-sm-3 align-self-center mb-0" for="medications_given[]">Medications Given</label> --}}

        <div class="form-group">
            <label class="col-form-label col-12">Medications Given</label>
            <div class="position-relative">
                <div class="input-icon input-icon-right">
                    <input
                        type="search"
                        class="form-control"
                        placeholder="{{ $searchQueryForDrugs == '' ? 'Start typing to search' : 'Searching...' }}"
                        name="searchQueryForDrugs"
                        id="searchQueryForDrugs"
                        wire:model.live.debounce.550ms="searchQueryForDrugs"
                        wire:keydown.escape="resetSearchQueryForDrugs"
                        wire:click="resetSearchQueryForDrugs"
                    />
                    <span><i class="fa fa-search"></i></span>
                </div>

                <div class="position-absolute" style="z-index: 1000; width: 100%; max-height: 300px; overflow-y: auto">
                    <div class="list-group" id="searchQueryForDrugs">
                        @if ($searchQueryForDrugs && $drugs)
                            @forelse ($drugs as $drug)
                                <a
                                    href="#"
                                    class="list-group-item list-group-item-action"
                                    wire:click="addInjectionMedicationsGiven('{{ $drug->item_name }}')"
                                >
                                    {{ $drug->item_name }}
                                </a>
                            @empty
                                <div class="list-group mt-2">
                                    <a href="#" class="list-group-item list-group-item-action">No results found</a>
                                </div>
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 flex-wrap">
            @if ($injection)
                {{ $injection->updated_at->format('jS F Y') }}
                -
            @endif

            @foreach ($medications_given as $data)
                <span wire:key="{{ $loop->index }}" class="badge badge-secondary">
                    {{ $data }}
                    &nbsp;
                    <a href="#" wire:click="removeInjectionMedicationsGiven({{ $loop->index }})" title="Delete">
                        <i class="ri-delete-bin-line text-danger icons-sm"></i>
                    </a>
                </span>
            @endforeach
        </div>
    </div>

    <div class="form-group mt-3">
        <label class="control-label col-sm-3 align-self-center mb-0" for="time_of_injection">Time of Injection</label>
        <div class="d-flex gap-2">
            <input
                type="date"
                class="form-control my-2"
                id="time_of_injection.date"
                wire:model="time_of_injection.date"
            />
            <input
                type="time"
                class="form-control my-2"
                id="time_of_injection.time"
                wire:model="time_of_injection.time"
            />
        </div>
        <x-input-error :messages="$errors->get('time_of_injection')" class="mt-1" />
        <x-input-error :messages="$errors->get('time_of_injection.date')" class="mt-1" />
        <x-input-error :messages="$errors->get('time_of_injection.time')" class="mt-1" />
    </div>

    <div class="form-group mt-3">
        <label class="control-label col-sm-3 align-self-center mb-0" for="injection_reaction">Injection Reaction</label>
        <div>
            <input type="text" class="form-control my-2" id="injection_reaction" wire:model="injection_reaction" />
        </div>
        <x-input-error :messages="$errors->get('injection_reaction')" class="mt-1" />
    </div>
    <div class="form-group d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary me-1 mt-2">
            {{ $edit ? 'Update' : 'Create New' }} Injection
        </button>
    </div>
</div>
@script
    <script>
         $('#medications_given_select').select2({
            placeholder: 'Search Item Name',
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            width: '100%',
            serverSide: true,
            ajax: {
                url: "{{ route('select2search.drugs') }}",
                type: "GET",
                dataType: 'json',
                delay: 250,
                cache: true,
                theme: "bootstrap4",
            },
        });

        $('#medications_given_select').on('change', function (e) {
            var data = $('#medications_given_select').select2("val");
            @this.            set('medications_given_new_ids', data);
        });
    </script>
@endscript
