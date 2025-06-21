<!-- add item Modal -->
<div class="modal fade" id="add_edit_item" tabindex="-1" aria-labelledby="outsource" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add item">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="item_name">Item Name (Abidec Drops)</label>
                        <input
                            type="search"
                            class="form-control my-2 shadow"
                            id="item_name"
                            placeholder="Search Item..."
                        />
                    </div>
                    <div class="form-group">
                        <label for="item_code">Item Quantity</label>
                        <input
                            type="number"
                            class="form-control my-2"
                            id="item_code"
                            min="0"
                            value=""
                            placeholder="Quantity to return"
                        />
                    </div>
                    <div class="form-group">
                        <label for="remark">Reason</label>
                        <textarea
                            class="form-control my-2"
                            id="remark"
                            rows="3"
                            placeholder="Enter Reason Here"
                        ></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add New</button>
            </div>
        </div>
    </div>
</div>
