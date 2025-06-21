{{-- facility modal --}}
<div id="facility_form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add/Edit Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-4">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="facility_name">Facility Name</label>
                        <input
                            id="facility_name"
                            type="text"
                            class="form-control my-2"
                            placeholder="Facility Name"
                            required
                        />
                    </div>
                    <div class="form-group">
                        <label for="facility_code">Facility Code</label>
                        <input
                            id="facility_code"
                            type="text"
                            class="form-control my-2"
                            placeholder="Facility Code"
                            required
                        />
                    </div>
                </div>
                <div class="my-4">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="settings_facility_form_address_pane-tab"
                                data-bs-toggle="tab"
                                href="#settings_facility_form_address_pane"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                            >
                                Address/Contact Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="settings_facility_form_appsettings_pane-tab"
                                data-bs-toggle="tab"
                                href="#settings_facility_form_appsettings_pane"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                            >
                                Application Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="tax_setting-tab"
                                data-bs-toggle="tab"
                                href="#tax_setting"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                            >
                                Tax Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="my-4">
                    <div class="tab-content" id="pills-tabContent-2">
                        {{-- Address/contact info --}}
                        <div
                            class="tab-pane fade show active"
                            id="settings_facility_form_address_pane"
                            role="tabpanel"
                            aria-labelledby="settings_facility_form_address_pane-tab"
                        >
                            <div class="form-group">
                                <label for="facility_location">Facility Location</label>
                                <input
                                    id="facility_location"
                                    type="text"
                                    class="form-control my-2"
                                    placeholder="Facility Location"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="facility_address">Facility Address</label>
                                <input
                                    id="facility_address"
                                    type="text"
                                    class="form-control my-2"
                                    placeholder="Facility Address"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="contact_info">Contact Information</label>
                                <input
                                    id="contact_info"
                                    type="text"
                                    class="form-control my-2"
                                    placeholder="Contact Information"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="state">State</label>
                                <select class="form-select">
                                    <option value="">Select a State</option>
                                </select>
                            </div>
                        </div>
                        {{-- app Settings --}}
                        <div
                            class="tab-pane fade"
                            id="settings_facility_form_appsettings_pane"
                            role="tabpanel"
                            aria-labelledby="settings_facility_form_appsettings_pane-tab"
                        >
                            <div class="form-group">
                                <label>Require payment to switch location?</label>
                                <select class="form-select my-2">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Review_Period">Review Period</label>
                                <input id="Review_Period" type="number" class="form-control my-2" required />
                            </div>
                            <div class="form-group">
                                <label for="Review_Period">CMS Provider ID</label>
                                <input id="Review_Period" type="text" class="form-control my-2" required />
                            </div>
                            <div class="form-group">
                                <label>System Type</label>
                                <select class="form-select my-2">
                                    <option value="EMR">EMR</option>
                                    <option value="Pharmacy-Benefit">Pharmacy Benefit</option>
                                </select>
                            </div>
                        </div>
                        {{-- tax settings --}}
                        <div class="tab-pane fade" id="tax_setting" role="tabpanel" aria-labelledby="tax_setting-tab">
                            <div class="form-group my-3">
                                <div class="table-responsive">
                                    <table class="table cursor table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tax Exclusive</td>
                                                <td><input class="form-control" type="text" value="0.8385744" /></td>
                                                <td>
                                                    <select class="form-select">
                                                        <option selected="" value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Covid Levy</td>
                                                <td><input class="form-control" type="text" value="0.0100000" /></td>
                                                <td>
                                                    <select class="form-select">
                                                        <option selected="" value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NHIL</td>
                                                <td><input class="form-control" type="text" value="0.0250000" /></td>
                                                <td>
                                                    <select class="form-select">
                                                        <option selected="" value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>GetFund</td>
                                                <td><input class="form-control" type="text" value="0.0250000" /></td>
                                                <td>
                                                    <select class="form-select">
                                                        <option selected="" value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
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
                <button type="button" class="btn btn-primary">Save Settings</button>
            </div>
        </div>
    </div>
</div>
