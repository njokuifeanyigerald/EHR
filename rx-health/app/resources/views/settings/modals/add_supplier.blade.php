{{-- Add supplier --}}
<div class="modal fade" id="add_supplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="supplier_name">Supplier Name</label>
                    <input id="supplier_name" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="supplier_contact">Contact</label>
                    <input id="supplier_contact" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="supplier_address">Address</label>
                    <input id="supplier_address" type="text" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="supplier_email">Email</label>
                    <input id="supplier_email" type="email" class="form-control my-2" required />
                </div>
                <div class="form-group">
                    <label for="dispatch_endpoint">Dispatch Endpoint</label>
                    <input id="dispatch_endpoint" type="text" class="form-control my-2" required />
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
                <button type="button" class="btn btn-primary">Save Room</button>
            </div>
        </div>
    </div>
</div>
