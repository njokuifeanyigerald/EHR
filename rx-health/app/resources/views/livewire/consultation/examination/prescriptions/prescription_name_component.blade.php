@props([
    'prescription',
])

@if ($prescription)
    <div
        class="ps-3 pe-3 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
        role="alert"
        {{-- onclick="$('.details22_29').fadeToggle('slow')" --}}
    >
        <span class="text-dark">{{ $prescription->item->item_name }}:</span>
        <span class="text-secondary">
            {{ $prescription->dose . ' ' . $prescription->dosage_unit . ' ' . $prescription->frequency . ' for ' . $prescription->days . ' days ' . $prescription->route }}
        </span>

        {{--
            <input type="hidden" name="item_name" id="item" value="Abidec Drops">
            
            <input type="hidden" name="cb_name_frequency" id="cb_name_dose" value=" 2 ">
            
            <input type="hidden" name="cb_name_frequency" id="cb_name_frequency"
            value=" bid">
            
            <input type="hidden" name="cb_name_tablet" id="cb_name_tablet" value="Drop">
            
            <input type="hidden" name="cb_name_days" id="cb_name_days" value=" 5">
            
            <input type="hidden" name="cb_name_oral" id="cb_name_oral" value=" Externally">
        --}}
    </div>
@endif
