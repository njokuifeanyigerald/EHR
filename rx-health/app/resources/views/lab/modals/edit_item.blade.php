<!-- Edit item Modal -->
<div class="modal fade" id="edit_item_" tabindex="-1" aria-labelledby="outsource" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="outsource request">Edit Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="provider_item_name">Item name</label>
                        <input
                            type="number"
                            class="form-control my-2"
                            id="provider_item_name"
                            name="provider_item_name"
                            value="UREA & CREATININE FOR CT"
                        />
                    </div>
                    <div class="form-group">
                        <label for="cash_price">Cash Price</label>
                        <input type="number" class="form-control my-2" id="cash_price" name="cash_price" value="1650" />
                    </div>
                    <div class="form-group">
                        <label for="insurance_price">Insurance Price</label>
                        <input
                            type="number"
                            class="form-control my-2"
                            id="insurance_price"
                            name="insurance_price"
                            value="1650"
                        />
                    </div>
                    <div class="form-group">
                        <label for="company_price">Company Price</label>
                        <input
                            type="number"
                            class="form-control my-2"
                            id="company_price"
                            name="company_price"
                            value="0"
                        />
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control my-2" id="price" name="price" value="0" />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Service Type</label>
                        <select class="form-select" name="Category" id="Category">
                            <option value="">Please select</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Laboratory" selected>Laboratory</option>
                            <option value="Optical">Optical</option>
                            <option value="Dental">Dental</option>
                            <option value="Administrative">Administrative</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select
                            required=""
                            name="subCategory"
                            aria-required="true"
                            class="form-select"
                            placeholder="Sub Category"
                        >
                            <option value="">Please select</option>
                            <option value=""></option>
                            ";
                            <option value=""></option>
                            ";
                            <option value="Auto Immune/Connective Tissue Disease">
                                Auto Immune/Connective Tissue Disease
                            </option>
                            ";
                            <option value="BIOPSY">BIOPSY</option>
                            ";
                            <option value="BMI &amp; HYPERTENSION">BMI &amp; HYPERTENSION</option>
                            ";
                            <option value="Chemical Pathology" selected>Chemical Pathology</option>
                            ";
                            <option value="Endocrinology/Immunology">Endocrinology/Immunology</option>
                            ";
                            <option value="Haematology">Haematology</option>
                            ";
                            <option value="Histology and Cytology">Histology and Cytology</option>
                            ";
                            <option value="Infectious Diseases">Infectious Diseases</option>
                            ";
                            <option value="Microbiology">Microbiology</option>
                            ";
                            <option value="Molecular Biology">Molecular Biology</option>
                            ";
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select
                            required=""
                            name="status"
                            id="status"
                            aria-required="true"
                            class="form-select"
                            placeholder="Sub Category"
                        >
                            <option selected="" value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update Item</button>
            </div>
        </div>
    </div>
</div>
