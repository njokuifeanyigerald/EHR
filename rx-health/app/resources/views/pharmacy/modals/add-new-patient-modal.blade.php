{{-- Add patient modal --}}
<div
    wire:ignore.self
    class="modal fade"
    id="add_new_patient"
    tabindex="-1"
    aria-labelledby="add_new_patientLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_new_patientLabel">Add New Patient</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <livewire:front-desk.register-guest location="pharmacy" />
            {{-- <div class="modal-body"> --}}
            {{-- <div class="my-2"> --}}
            {{-- <div class="form-group row"> --}}
            {{-- <label class="col-md-3 col-sm-3 col-3 col-form-label col-md-12 col-sm-12">Full Name</label> --}}
            {{-- <div class="col-md-12"> --}}
            {{-- <input --}}
            {{-- class="form-control" --}}
            {{-- type="text" --}}
            {{-- name="client_fullname" --}}
            {{-- id="client_fullname" --}}
            {{-- wire:model="full_name" --}}
            {{-- /> --}}
            {{-- </div> --}}
            {{-- </div> --}}

            {{-- <div class="form-group row"> --}}
            {{-- <label class="col-md-3 col-sm-3 col-3 col-form-label col-md-12 col-sm-12">Contact</label> --}}
            {{-- <div class="col-md-12"> --}}
            {{-- <input --}}
            {{-- class="form-control" --}}
            {{-- type="text" --}}
            {{-- name="client_tel" --}}
            {{-- id="client_tel" --}}
            {{-- wire:model="contact" --}}
            {{-- /> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <div class="modal-footer"> --}}
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            {{-- <button type="button" class="btn btn-primary" wire:click="addNewUser">Save changes</button> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
