<div>
    <div class="iq-card shadow-lg">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title me-1">
                <h5 class="card-title">Drugs</h5>
            </div>
        </div>
        <div class="iq-card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input
                            type="search"
                            class="form-control my-2 shadow"
                            id="exampleInputText1"
                            placeholder="Search Items..."
                            wire:model.live.debounce.550ms="searchDrug"
                        />
                    </div>
                </div>
            </div>
            <div class="table-responsive overflow-auto" style="max-height: 260px">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col" class="text-wrap">Item Name</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1594</td>
                            <td class="text-wrap">obstetric usg scan report</td>
                            <td class="text-center">
                                <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>1593</td>
                            <td class="text-wrap">Paracetamol Tablet</td>
                            <td class="text-center">
                                <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>1592</td>
                            <td class="text-wrap">Aceclofenac Tablet 100mg</td>
                            <td class="text-center">
                                <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>1592</td>
                            <td class="text-wrap">Betatop Tablet 12.5mg</td>
                            <td class="text-center">
                                <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>1591</td>
                            <td class="text-wrap">Rocephine injection 2g</td>
                            <td class="text-center">
                                <i class="fa fa-plus text-primary" style="cursor: pointer"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-12">
                <div class="form-group row">
                    <label class="control-label col-sm-2 align-self-center mb-0" for="email">Price Mode:</label>
                    <div class="col-sm-12">
                        <select class="form-select my-2" id="billing_mode">
                            <option value="Company">Company</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
