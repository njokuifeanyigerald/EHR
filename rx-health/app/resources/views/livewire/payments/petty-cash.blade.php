<div>
    <div class="iq-card">
        <div class="iq-card">
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Date</th>
                                <th scope="col">Taken By</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->petty_cashes as $petty_cash)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $petty_cash->date_taken }}</td>
                                    <td>{{ $petty_cash->takenByUser?->full_names }}</td>
                                    <td>{{ $petty_cash->purpose }}</td>
                                    <td>{{ $petty_cash->amount }}</td>
                                    <td>
                                        <a
                                            href="#!"
                                            title="Delete"
                                            wire:click="confirmDeletion({{ $petty_cash->id }})"
                                        >
                                            <i class="ri-delete-bin-line text-danger icons-sm"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No Petty Cash Record Yet!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('payments.modals.petty_cash_form')
</div>
@script
    <script>
        // close the modal by listening to the event
        window.addEventListener('expenseCreated', (event) => {
            $('#add_petty_cash').modal('hide');
        });
    </script>
@endscript
