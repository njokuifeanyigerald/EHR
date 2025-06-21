<div>
    <div class="form-group d-flex flex-row-reverse">
        <button
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#facility_form"
            class="btn btn-primary font-weight-bold"
        >
            <i class="fa fa-plus"></i>
            Add New Facility
        </button>
    </div>

    <div class="iq-card">
        <div class="iq-card-body">
            <div class="table-responsive mt-2">
                <table id="datatable" class="table table-head-custom cursor table-hover table-responsive-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility Name</th>
                            <th>System type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Aligbe, Jimoh and Habeeb</td>
                            <td>EMR</td>
                            <td>
                                <button
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#facility_form"
                                    class="btn btn-outline-primary btn-sm"
                                >
                                    View/Edit
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Yaqub, Isaac and Ayisat</td>
                            <td>EMR</td>
                            <td>
                                <button
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#facility_form"
                                    class="btn btn-outline-primary btn-sm"
                                >
                                    View/Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <livewire:settings.facilities.modals.add-or-edit />
</div>
