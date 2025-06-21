<div>
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Search for a patient using folder number,telephone,visit number,visit date.</p>
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="col-md-12 col-sm-12 col-lg-12 col-12">
                            <div class="input-icon input-icon-right">
                                <input
                                    type="search"
                                    class="form-control"
                                    wire:model.live.debounce.500ms="search"
                                    placeholder="Enter Folder Number/Tel/Vist Number/Visit Date"
                                    name="search"
                                />
                                <span><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="iq-card">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Folder No.</th>
                                    <th scope="col">Member Type</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $patient->full_name_title }}</td>
                                        <td>{{ $patient->new_folder_number }}</td>
                                        <td>{{ $patient->member_type }}</td>
                                        <td>
                                            {{ \App\Helpers\ReferenceHelper::patientOverallCurrentBalance($patient->id) }}
                                        </td>
                                        <td class="text-center">
                                            <a
                                                href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_patient_deposit"
                                                wire:click="deposit({{ $patient->id }})"
                                                class="btn btn-primary px-2 py-1 me-2"
                                                title="Add A Deposit"
                                            >
                                                <i class="fa fa-plus"></i>
                                                Deposit
                                            </a>
                                            <a
                                                href="#"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_patient_refund"
                                                wire:click="refund({{ $patient->id }})"
                                                class="btn btn-danger px-2 py-1"
                                                title="Refund"
                                            >
                                                <i class="fa fa-arrow-rotate-left"></i>
                                                Refund
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $patients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('payments.modals.deposit_form')
    @include('payments.modals.refund')
</div>
@script
    <script>
        // close the modal by listening to the event
        window.addEventListener('paymentRecorded', (event) => {
            $('#add_patient_deposit').modal('hide');
            $('#add_patient_refund').modal('hide');
        });
    </script>
@endscript
