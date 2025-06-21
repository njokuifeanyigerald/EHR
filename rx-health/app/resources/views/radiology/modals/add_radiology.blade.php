<!-- Add Radiology Modal -->
<div class="modal fade" id="add_radiology" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Radiology</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    {{-- Filters --}}
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
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Change Billing Mode</label>
                                        <select class="form-select my-2" id="billing_mode">
                                            <option value="CASH">Cash Clients</option>
                                        </select>
                                    </div>
                                </form>
                                <div class="table-responsive overflow-auto" style="max-height: 260px">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-wrap">Item Name</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-wrap">Obstetric Scan (Ultrasound)</td>
                                                <td>180.00</td>
                                                <td><i class="fa fa-plus text-primary" style="cursor: pointer"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap">Percutaneous Biopsy - CT Scan Guide</td>
                                                <td>650.00</td>
                                                <td><i class="fa fa-plus text-primary" style="cursor: pointer"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap">MRI - 1 Region + Contrast</td>
                                                <td>300.00</td>
                                                <td><i class="fa fa-plus text-primary" style="cursor: pointer"></i></td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap">ECG</td>
                                                <td>700.00</td>
                                                <td><i class="fa fa-plus text-primary" style="cursor: pointer"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Table --}}
                    <div class="col-lg-8">
                        <div class="iq-card shadow">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title me-1">
                                    <h5 class="card-title">Diagnosis</h5>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <p class="text-dark">Current Location: Consulting Room</p>
                                    </div>
                                    <div class="col-sm-7">
                                        <p class="text-dark">Default: Company | IT CONSORTIUM MEDICAL SCREENING</p>
                                    </div>
                                </div>
                                <div>
                                    <button type="button" class="btn mb-3 me-2 btn-warning rounded-pill">
                                        <i class="fa fa-arrow-right-from-bracket"></i>
                                        Out Source
                                    </button>
                                    <a
                                        href="{{ route('payments.receipt', 1) }}"
                                        class="btn mb-3 me-2 btn-dark rounded-pill"
                                        target="_blank"
                                    >
                                        <i class="fa fa-print"></i>
                                        Bill
                                    </a>
                                </div>
                                <div>
                                    <table class="table mb-0">
                                        <thead class="table-dark text-white">
                                            <tr>
                                                <th scope="col" class="text-white">Total: 20.00</th>
                                                <th scope="col" class="text-white">Company: 20.00</th>
                                                <th scope="col" class="text-white">Cash: 0.00</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col" class="text-white">Visit No:</th>
                                                <th scope="col" class="text-white">1000192</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Mode</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>X-ray</td>
                                                <td>
                                                    <input
                                                        type="number"
                                                        class="form-control my-2"
                                                        name="price"
                                                        id="price"
                                                        value="50.00"
                                                    />
                                                </td>
                                                <td>
                                                    <select
                                                        class="form-select my-2"
                                                        id="payment_mode"
                                                        style="width: 120px"
                                                    >
                                                        <option value="company">Company</option>
                                                    </select>
                                                </td>
                                                <td><span class="badge badge-success">Paid</span></td>
                                                <td>
                                                    <div style="width: 100px">
                                                        <button
                                                            type="button"
                                                            class="btn mb-3 btn-warning rounded-pill"
                                                            title="Out Source"
                                                        >
                                                            <i class="fa fa-arrow-right-from-bracket me-0"></i>
                                                        </button>
                                                        <button
                                                            type="button"
                                                            class="btn mb-3 btn-danger rounded-pill"
                                                            onclick="return confirm('Are you sure you want to delete?')"
                                                            title="Delete"
                                                        >
                                                            <i class="fa fa-trash me-0"></i>
                                                        </button>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
