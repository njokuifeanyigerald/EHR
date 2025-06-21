<div
    wire:ignore.self
    id="add_petty_cash"
    class="modal fade bd-example-modal-lg"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add A Petty Cash Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="confirmExpense">
                <div class="modal-body">
                    <div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Date:</label>
                                <input type="date" class="form-control my-2" id="date_taken" wire:model="date_taken" />

                                @error('date_taken')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pno">Prepared By:</label>
                                {{-- <input type="text" class="form-control my-2" id="user" placeholder="Name"> --}}
                                <select class="form-control my-2" id="taken_by" wire:model="taken_by">
                                    <option value="">Select User</option>
                                    @forelse ($this->users as $user)
                                        <option value="{{ $user->id }}">{{ $user->full_names }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>

                                @error('taken_by')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Purpose:</label>
                                <input
                                    type="text"
                                    class="form-control my-2"
                                    id="purpose"
                                    wire:model="purpose"
                                    placeholder="Reason"
                                />

                                @error('purpose')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount:</label>
                                <input
                                    type="number"
                                    min="0"
                                    class="form-control my-2"
                                    id="amount"
                                    wire:model="amount"
                                    placeholder="Cash Amount"
                                />

                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
