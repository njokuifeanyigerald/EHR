{{--
    <div
    wire:ignore.self
    class="tab-pane fade"
    id="Prescriptions"
    role="tabpanel"
    aria-labelledby="v-pills-Prescriptions-tab"
    >
--}}
<div>
    <div class="mt-3" style="overflow: auto; overflow-y: hidden; -ms-overflow-y: hidden">
        @if ($this->visit->sign == 'No')
            <button data-bs-toggle="modal" data-bs-target="#searchDrug_examination" class="btn btn-sm btn-primary">
                Add Prescription
            </button>
        @endif

        <table
            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center mt-3"
        >
            <thead class="">
                <tr>
                    {{-- <th></th> --}}
                    <th>No</th>
                    <th>Prescription</th>
                    <th>Switched From</th>
                    <th>Status</th>
                    <th>Action</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($this->prescriptions as $prescription)
                    <tr
                        class="accordion col-lg-12 w-100 clickable-cursor"
                        id="prescriptionAccordion{{ $prescription->id }}"
                    >
                        <td
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $prescription->id }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $prescription->id }}"
                        >
                            {{ $loop->iteration }}
                        </td>
                        <td
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $prescription->id }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $prescription->id }}"
                        >
                            @include(
                                'livewire.consultation.examination.prescriptions.prescription_name_component',
                                [
                                    'prescription' => $prescription,
                                ]
                            )
                        </td>
                        <td
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $prescription->id }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $prescription->id }}"
                        >
                            {{ $prescription->switched_from }}
                            {{--
                                <input type="number" min="1" class="form-control" readonly="" name="quantity"
                                id="quantity" value="1" style="width:70px" onchange="">
                            --}}
                        </td>

                        <td
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $prescription->id }}"
                            aria-expanded="false"
                            aria-controls="collapse{{ $prescription->id }}"
                        >
                            <span
                                class="service_type p-2 badge badge-pill {{ $prescription->pharmacy_status == 'pending' || $prescription->pharmacy_status == null ? 'badge-danger' : 'badge-success' }}"
                            >
                                {{ $prescription->pharmacy_status ?? 'pending' }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if ($this->visit->sign == 'No')
                                <a
                                    href="#"
                                    wire:click="deletePrescription({{ $prescription->id }})"
                                    {{-- onclick="return confirm('Are you sure you want to delete?')" --}}
                                    title="Delete"
                                >
                                    <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                    @if ($this->visit->sign == 'No')
                        <tr
                            class="accordion-collapse collapse"
                            id="collapse{{ $prescription->id }}"
                            aria-labelledby="headingOne"
                            data-bs-parent="#prescriptionAccordion{{ $prescription->id }}"
                        >
                            <td colspan="5" wire:ignore>
                                <livewire:consultation.examination.prescriptions.edit-prescription
                                    :prescription="$prescription"
                                />
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="12">
                            <div class="w-full text-center">No Prescriptions Available</div>
                        </td>
                    </tr>
                @endforelse
                {{-- Item switching --}}
                {{--
                    <tr style="display:none;" class="details2_29 text-left">
                    <td class="datatable-detail" colspan="8">
                    <div class="row">
                    <div class="col-12">
                    <div class="card shadow">
                    <div class="card-body" style="background-color: rgba(255, 184, 34, 0.1);">
                    <table
                    class="table table-responsive-lg table-responsive-md table-responsive-sm">
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Prescription</th>
                    <th>Price</th>
                    <th>Reason</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                    Item not Switched
                    </td>
                    </tr>
                    
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                    </tr>
                --}}

                {{-- Update pescription --}}
                {{--
                    <tr style="display:none;" class="details22_29 text-left">
                    <td class="datatable-detail" colspan="8">
                    <div class="row">
                    <div class="col-12">
                    <div class="card shadow">
                    <div class="card-body">
                    <form id="update_dose29">
                    <div class="row">
                    
                    <div class="col-4">
                    <label>Dose</label>
                    <input type="number" name="dose" id="dose"
                    class="form-control" value="2">
                    </div>
                    <div class="col-4">
                    <label>Dosage Unit</label>
                    <select class="form-control" name="dosage_unit"
                    id="dosage_unit">
                    <option value="Bottle">
                    Bottle </option>
                    <option value="Apply">
                    Apply </option>
                    <option value="Cap">
                    Cap
                    </option>
                    <option value="Tab">
                    Tab
                    </option>
                    <option value="IM">
                    IM
                    </option>
                    <option value="Tube">
                    Tube </option>
                    <option selected="" value="Drop">
                    Drop
                    </option>
                    <option value="SC">
                    SC
                    </option>
                    <option value="mg">
                    mg
                    </option>
                    <option value="IV">
                    IV
                    </option>
                    <option value="Unit">
                    Unit </option>
                    <option value="g">
                    g
                    </option>
                    <option value="Supp">
                    Supp </option>
                    <option value="L">
                    L
                    </option>
                    <option value="OC">
                    OC
                    </option>
                    <option value="Puff">
                    Puff </option>
                    <option value="ug">
                    ug
                    </option>
                    <option value="kg">
                    kg
                    </option>
                    <option value="OC">
                    OC
                    </option>
                    <option value="Ml">
                    Ml
                    </option>
                    </select>
                    </div>
                    <div class="col-4">
                    <label>Frequency</label>
                    <select class="form-control" name="frequency" id="frequency">
                    <option value="tid">
                    tid
                    </option>
                    <option selected="" value="bid"> bid
                    </option>
                    <option value="od">
                    od
                    </option>
                    <option value="stat">
                    stat </option>
                    <option value="prn">
                    prn
                    </option>
                    <option value="nocte">
                    nocte </option>
                    <option value="qid">
                    qid
                    </option>
                    <option value="q4h">
                    q4h
                    </option>
                    </select>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-4">
                    <label>Days</label>
                    <input type="number" name="days" id="days"
                    class="form-control" value="5">
                    </div>
                    <div class="col-4">
                    <label>Route</label>
                    <select class="form-control" name="route" id="route">
                    <option selected="" value="Externally">
                    Externally </option>
                    <option value="Oral">
                    Oral </option>
                    <option value="Inhale">
                    Inhale </option>
                    <option value="Rectally">
                    Rectally </option>
                    </select>
                    </div>
                    <div class="col-4">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-primary btn-sm w-150px"
                    onclick="">
                    Update
                    </button>
                    </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                    </tr>
                --}}
                {{--
                    <tr>
                    <td>
                    <span></span>
                    </td>
                    <td>2</td>
                    <td>
                    <div class="ps-3 pe-3 w-75 pt-2 pb-2 rounded-3 alert-light text-dark mx-auto"
                    role="alert">
                    <span class="text-dark">Paracetamol Tablet
                    500mg:</span> <span class="text-secondary">2
                    Tab
                    tid 5 days Oral</span>
                    
                    <input type="hidden" name="item_name" id="item"
                    value="Paracetamol Tablet 500mg">
                    
                    <input type="hidden" name="cb_name_frequency" id="cb_name_dose" value=" 2 ">
                    
                    <input type="hidden" name="cb_name_frequency" id="cb_name_frequency"
                    value=" tid">
                    
                    <input type="hidden" name="cb_name_tablet" id="cb_name_tablet" value="Tab">
                    
                    <input type="hidden" name="cb_name_days" id="cb_name_days" value=" 5">
                    
                    <input type="hidden" name="cb_name_oral" id="cb_name_oral" value=" Oral">
                    
                    </div>
                    
                    </td>
                    <td>
                    <input disabled="" type="number" min="1" class="form-control" readonly=""
                    name="quantity" id="quantity" value="4" style="width:70px" onchange="">
                    </td>
                    
                    <td>
                    <span class="service_type p-2 badge badge-pill badge-success ">Paid
                    </span>
                    </td>
                    <td class="text-center">
                    </td>
                    </tr>
                --}}
                {{-- Item switching --}}
                {{--
                    <tr style="display:none;" class="details2_24 text-left">
                    <td class="datatable-detail" colspan="8">
                    <div class="row">
                    <div class="col-12">
                    <div class="card shadow">
                    <div class="card-body" style="background-color: rgba(255, 184, 34, 0.1);">
                    <table
                    class="table table-responsive-lg table-responsive-md table-responsive-sm">
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Prescription</th>
                    <th>Price</th>
                    <th>Reason</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td>
                    Item not Switched
                    </td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                    </tr>
                --}}
                {{-- Update pescription --}}
                {{--
                    <tr style="display:none;" class="details22_24 text-left">
                    <td class="datatable-detail" colspan="8">
                    <div class="row">
                    <div class="col-12">
                    <div class="card shadow">
                    <div class="card-body">
                    <form id="update_dose24">
                    <div class="row">
                    
                    <div class="col-4">
                    <label>Dose</label>
                    <input type="number" name="dose" id="dose"
                    class="form-control" value="2">
                    </div>
                    <div class="col-4">
                    <label>Dosage Unit</label>
                    <select class="form-control" name="dosage_unit"
                    id="dosage_unit">
                    <option value="Bottle">
                    Bottle </option>
                    <option value="Apply">
                    Apply </option>
                    <option value="Cap">
                    Cap
                    </option>
                    <option selected="" value="Tab"> Tab
                    </option>
                    <option value="IM">
                    IM
                    </option>
                    <option value="Tube">
                    Tube </option>
                    <option value="Drop">
                    Drop </option>
                    <option value="SC">
                    SC
                    </option>
                    <option value="mg">
                    mg
                    </option>
                    <option value="IV">
                    IV
                    </option>
                    <option value="Unit">
                    Unit </option>
                    <option value="g">
                    g
                    </option>
                    <option value="Supp">
                    Supp </option>
                    <option value="L">
                    L
                    </option>
                    <option value="OC">
                    OC
                    </option>
                    <option value="Puff">
                    Puff </option>
                    <option value="ug">
                    ug
                    </option>
                    <option value="kg">
                    kg
                    </option>
                    <option value="OC">
                    OC
                    </option>
                    <option value="Ml">
                    Ml
                    </option>
                    </select>
                    </div>
                    
                    <div class="col-4">
                    <label>Frequency</label>
                    <select class="form-control" name="frequency" id="frequency">
                    <option selected="" value="tid"> tid
                    </option>
                    <option value="bid">
                    bid
                    </option>
                    <option value="od">
                    od
                    </option>
                    <option value="stat">
                    stat </option>
                    <option value="prn">
                    prn
                    </option>
                    <option value="nocte">
                    nocte </option>
                    <option value="qid">
                    qid
                    </option>
                    <option value="q4h">
                    q4h
                    </option>
                    </select>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-4">
                    <label>Days</label>
                    <input type="number" name="days" id="days"
                    class="form-control" value="5">
                    </div>
                    <div class="col-4">
                    <label>Route</label>
                    <select class="form-control" name="route" id="route">
                    <option value="Externally">
                    Externally </option>
                    <option selected="" value="Oral">
                    Oral
                    </option>
                    <option value="Inhale">
                    Inhale </option>
                    <option value="Rectally">
                    Rectally </option>
                    </select>
                    </div>
                    <div class="col-4">
                    <label>&nbsp;</label>
                    <button type="button" class="btn btn-primary btn-sm w-150px"
                    onclick="">
                    Update
                    </button>
                    </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </td>
                    </tr>
                --}}
            </tbody>
        </table>
    </div>
    @if ($this->visit->sign == 'No')
        <livewire:consultation.modals.add-prescription
            :visit_number="$this->visit_number"
            :billing_code="$this->billing_code"
            {{-- :type="'examination'" --}}
        />
    @endif
</div>
