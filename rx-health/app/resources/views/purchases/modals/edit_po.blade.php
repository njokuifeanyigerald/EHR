<!-- Add purchase order Modal -->
<div class="modal fade" id="edit_po" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- Supplier and delivery information --}}
                    <div class="col-lg-12">
                        <div class="iq-card shadow">
                            <div class="iq-card-header d-flex justify-content-between bg-light">
                                <div class="iq-header-title me-1">
                                    <h5 class="card-title">Supplier & Delivery Information</h5>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6 row">
                                            <div class="form-group col-md-6">
                                                <label>Supplier</label>
                                                <select class="form-select my-2" id="supplier_add_po">
                                                    <option value="">Select a Supplier</option>
                                                    <option value="1" selected>Central Medical Stores</option>
                                                    <option value="3">Delta dealers or medical</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="order_memo_add_po">Memo</label>
                                                <input
                                                    type="text"
                                                    class="form-control my-2"
                                                    id="order_memo_add_po"
                                                    value=""
                                                />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Supplied Order ID</label>
                                                    <span class="form-control"></span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <span
                                                    class="iq-bg-secondary ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block"
                                                >
                                                    Dispatch not available
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 row">
                                            <div class="form-group col-md-6">
                                                <label>Deliver To</label>
                                                <select
                                                    name="delivery_location_add_po"
                                                    class="form-select"
                                                    id="delivery_location_add_po"
                                                >
                                                    <option selected="" value="1">KADUNA STATE HOSPITAL</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Due Date</label>
                                                <input
                                                    type="date"
                                                    class="form-control"
                                                    name="item_due_date_add_po"
                                                    id="item_due_date_add_po"
                                                    value="2024-09-15"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-card shadow">
                            <div class="iq-card-header d-flex justify-content-between bg-light">
                                <div class="iq-header-title me-1">
                                    <h5 class="card-title">Item Information</h5>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <span class="me-2">Order Date: 15th May 2024</span>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    {{-- Add item --}}
                                    <div class="col-lg-4">
                                        <div class="iq-card shadow">
                                            <div class="iq-card-body">
                                                <form>
                                                    <div class="form-group">
                                                        <input
                                                            type="search"
                                                            class="form-control my-2 shadow"
                                                            id="exampleInputText1"
                                                            placeholder="Search Items..."
                                                            value="Abidec Drops"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pack Size</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            name="pack_size"
                                                            id="pack_size"
                                                            wire:model="pack_size"
                                                            class="form-control"
                                                            value="1"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Quantity</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            class="form-control"
                                                            name="quantity"
                                                            id="quantity"
                                                            wire:model="quantity"
                                                            value="5"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input
                                                            type="number"
                                                            min="0"
                                                            class="form-control"
                                                            name="price"
                                                            id="price"
                                                            wire:model="price"
                                                            value="100"
                                                        />
                                                    </div>
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-plus"></i>
                                                        Add Item
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Table --}}
                                    <div class="col-lg-8">
                                        <div class="iq-card shadow">
                                            <div class="iq-card-body">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Item</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Qty</th>
                                                                <th scope="col">Pack Size</th>
                                                                <th scope="col">Total</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Abidec Drops</td>
                                                                <td>100.00</td>
                                                                <td>5</td>
                                                                <td>1</td>
                                                                <td>500.00</td>
                                                                <td>
                                                                    <div>
                                                                        <a
                                                                            href="#"
                                                                            class="text-dark me-2"
                                                                            title="Edit Purchase Order"
                                                                        >
                                                                            <i class="ri-pencil-line m-0 icons-sm"></i>
                                                                        </a>
                                                                        <a href="#" class="text-danger" title="Delete">
                                                                            <i
                                                                                class="ri-delete-bin-line m-0 icons-sm"
                                                                            ></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary my-2">Approve Purchase Order</button>
            </div>
        </div>
    </div>
</div>
