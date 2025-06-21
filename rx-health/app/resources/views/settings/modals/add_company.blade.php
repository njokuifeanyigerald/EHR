{{-- Add company settings --}}
<div class="modal fade" id="add_company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Corporate/Insurance Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input id="company_name" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="company_code">Company Code</label>
                    <input id="company_code" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="company_telephone">Company Telephone</label>
                    <input id="company_telephone" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="company_email">Company Email</label>
                    <input id="company_email" type="email" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="company_type">Company Type</label>
                    <select id="company_type" class="form-select my-2">
                        <option value="company">Corporate Company</option>
                        <option value="insurance">Insurance Company</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="company_address">Company Address</label>
                    <input id="company_address" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="supplier_status">Status</label>
                    <select class="form-select my-2">
                        <option value="">Active</option>
                        <option value="">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Company</button>
            </div>
        </div>
    </div>
</div>
