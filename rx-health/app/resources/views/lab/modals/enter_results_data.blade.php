{{-- Enter Results Modal --}}
<div id="enter_results_data_" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa-solid fa-chart-line me-2"></i>
                    Enter Results - Physical examination and vital signs
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 26%">Test</th>
                                <th style="width: 5%">Result Value</th>
                                <th style="width: 14%">Range</th>
                                <th style="width: 14%">User</th>
                                <th style="width: 14%">Last Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="sms_template_rw_">
                                <td>1</td>
                                <td>Physical examination and vital signs</td>
                                <td>
                                    <input
                                        onchange=""
                                        value=""
                                        tabindex="1"
                                        name="result_value_"
                                        style="width: 100px; text-transform: uppercase"
                                        id="result_value_"
                                        class="form-control"
                                        type="text"
                                    />
                                </td>
                                <td>-</td>
                                <td>N/A</td>
                                <td>4 days Ago</td>
                            </tr>

                            <tr class="sms_template_rw_">
                                <td>3</td>
                                <td>Height</td>
                                <td>
                                    <input
                                        onchange=""
                                        value=""
                                        tabindex="3"
                                        name="result_value_"
                                        style="width: 100px; text-transform: uppercase"
                                        id="result_value_"
                                        class="form-control"
                                        type="number"
                                    />
                                </td>
                                <td>- cm</td>
                                <td>N/A</td>
                                <td>4 days Ago</td>
                            </tr>

                            <tr class="sms_template_rw_">
                                <td>5</td>
                                <td>Weight</td>
                                <td>
                                    <input
                                        onchange=""
                                        value=""
                                        tabindex="5"
                                        name="result_value_"
                                        style="width: 100px; text-transform: uppercase"
                                        id="result_value_"
                                        class="form-control"
                                        type="number"
                                    />
                                </td>
                                <td>- kg</td>
                                <td>N/A</td>
                                <td>4 days Ago</td>
                            </tr>

                            <tr class="sms_template_rw_">
                                <td>7</td>
                                <td>Bmi</td>
                                <td>
                                    <input
                                        onchange=""
                                        value=""
                                        tabindex="7"
                                        name="result_value_"
                                        style="width: 100px; text-transform: uppercase"
                                        id="result_value_"
                                        class="form-control"
                                        type="number"
                                    />
                                </td>
                                <td>- Kg/m2</td>
                                <td>N/A</td>
                                <td>4 days Ago</td>
                            </tr>

                            <tr class="sms_template_rw_">
                                <td>9</td>
                                <td>Blood pressure</td>
                                <td>
                                    <input
                                        onchange=""
                                        value=""
                                        tabindex="9"
                                        name="result_value_"
                                        style="width: 100px; text-transform: uppercase"
                                        id="result_value_"
                                        class="form-control"
                                        type="number"
                                    />
                                </td>
                                <td>- mmHg</td>
                                <td>N/A</td>
                                <td>4 days Ago</td>
                            </tr>

                            <tr class="sms_template_rw_">
                                <td colspan="2">Comments / Notes</td>
                                <td colspan="3">
                                    <textarea name="comments_notes" id="comments_notes" class="form-control"></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Click to Finish this Diagnostics</button>
            </div>
        </div>
    </div>
</div>
