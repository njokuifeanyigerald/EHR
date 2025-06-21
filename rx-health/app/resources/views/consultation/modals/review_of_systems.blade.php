{{-- Review of systems modal --}}
<div id="reviewSystem_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cardio Vascular</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <th>Symptom</th>
                                <th>Presence</th>
                                <th style="width: 40%">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3-half">Chest pain</td>
                                <td class="pt-3-half">
                                    <div class="form-group my-auto">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="admit"
                                                    name="reviewChest pain"
                                                    value="16@@Chest pain@@Cardio_Vascular@@Admit"
                                                    class="custom-control-input bg-success me-1"
                                                />
                                                <label class="custom-control-label" for="admit">Admit</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="reviewChestpain"
                                                    value="16@@Chest pain@@Cardio_Vascular@@not checked"
                                                    name="reviewChest pain"
                                                    class="custom-control-input bg-danger me-1"
                                                />
                                                <label class="custom-control-label" for="reviewChestpain">Deny</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="reviewChest"
                                                    value="16@@Chest pain@@Cardio_Vascular@@not checked"
                                                    name="reviewChest pain"
                                                    class="custom-control-input bg-primary me-1"
                                                />
                                                <label class="custom-control-label" for="reviewChest">
                                                    Not Checked
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pt-3-half">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="comment_16"
                                        placeholder="Type notes here..."
                                        id="comment_16"
                                    />
                                </td>
                                <td>
                                    <i
                                        class="fa fa-check cursor-pointer icons-sm"
                                        style="color: #0bb7af"
                                        title="Save Review"
                                    ></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half">Palpitation</td>
                                <td class="pt-3-half">
                                    <div class="form-group my-auto">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="pal-admit"
                                                    name="reviewPalpitation"
                                                    value=" 17@@Palpitation @@Cardio_Vascular@@Admit"
                                                    class="custom-control-input bg-success me-1"
                                                />
                                                <label class="custom-control-label" for="pal-admit">Admit</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="pal-deny"
                                                    value=" 17@@Palpitation @@Cardio_Vascular@@denies"
                                                    name="reviewPalpitation"
                                                    class="custom-control-input bg-danger me-1"
                                                />
                                                <label class="custom-control-label" for="pal-deny">Deny</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="pal-not-checked"
                                                    value="17@@Palpitation @@Cardio_Vascular@@not checked"
                                                    name="reviewPalpitation"
                                                    class="custom-control-input bg-primary me-1"
                                                />
                                                <label class="custom-control-label" for="pal-not-checked">
                                                    Not Checked
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pt-3-half">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="comment_17"
                                        placeholder="Type notes here..."
                                        id="comment_17"
                                    />
                                </td>
                                <td>
                                    <i
                                        class="fa fa-check cursor-pointer icons-sm"
                                        style="color: #0bb7af"
                                        title="Save Review"
                                    ></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-3-half">Edema</td>
                                <td class="pt-3-half">
                                    <div class="form-group my-auto">
                                        <div class="d-flex gap-2 flex-wrap">
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="edema-admit"
                                                    name="reviewEdema"
                                                    value="18@@Edema@@Cardio_Vascular@@Admit"
                                                    class="custom-control-input bg-success me-1"
                                                />
                                                <label class="custom-control-label" for="edema-admit">Admit</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="edema-deny"
                                                    value="18@@Edema@@Cardio_Vascular@@denies"
                                                    name="reviewEdema"
                                                    class="custom-control-input bg-danger me-1"
                                                />
                                                <label class="custom-control-label" for="edema-deny">Deny</label>
                                            </div>
                                            <div
                                                class="custom-control custom-radio custom-radio-color-checked custom-control-inline"
                                            >
                                                <input
                                                    type="radio"
                                                    id="edema-not-checked"
                                                    value="18@@Edema@@Cardio_Vascular@@not checked"
                                                    name="reviewEdema"
                                                    class="custom-control-input bg-primary me-1"
                                                />
                                                <label class="custom-control-label" for="edema-not-checked">
                                                    Not Checked
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pt-3-half">
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="comment_18"
                                        placeholder="Type notes here..."
                                        id="comment_18"
                                    />
                                </td>
                                <td>
                                    <i
                                        class="fa fa-check cursor-pointer icons-sm"
                                        style="color: #0bb7af"
                                        title="Save Review"
                                    ></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
