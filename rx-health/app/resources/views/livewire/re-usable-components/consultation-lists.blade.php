<div>
    <div class="col-md-12 col-lg-12">
        <div class="iq-card">
            <div class="iq-card-body">
                <p>Fill the inputs below to find a Patient.</p>
                <form action="" method="">
                    @csrf
                    <div class="row">
                        <div class="col-sm-2 col-md">
                            <input
                                type="text"
                                class="form-control my-2"
                                placeholder="Enter Folder Number..."
                                wire:model.live="folder_number"
                            />
                        </div>
                        <div class="col-sm-2 col-md">
                            <input
                                type="text"
                                class="form-control my-2"
                                placeholder="Enter Surname..."
                                wire:model.live="surname"
                            />
                        </div>
                        <div class="col-sm-2 col-md">
                            <input
                                type="text"
                                class="form-control my-2"
                                placeholder="Enter Other Names..."
                                wire:model.live="other_names"
                            />
                        </div>
                        <div class="col-sm-2 col-md">
                            <input
                                type="text"
                                class="form-control my-2"
                                placeholder="Enter Telephone..."
                                wire:model.live="telephone"
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include(
        'livewire.re-usable-components.consultation-patients-cards',
        [
            'type' => 'consultation',
            'visits' => $visits,
        ]
    )
</div>
