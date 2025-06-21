{{-- All Investigations  Modal --}}
<div id="observation_1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Observation Chart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-end my-2">
                    <a href="{{ route('inpatient.graph', 1) }}" class="btn btn-primary" target="_blank">View Graph</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-head-custom cursor table-hover table-responsive-lg">
                        <thead>
                            <tr>
                                <th style="width: 100px !important">DATE</th>
                                <th>TEMP</th>
                                <th>WT</th>
                                <th>HT</th>
                                <th>PULSE</th>
                                <th style="width: 70px !important">BP</th>
                                <th>SUGAR</th>
                                <th>BMI REMARK</th>
                                <th>HTN</th>
                                <th>USER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    2nd October 2023
                                    <span class="badge badge-primary badge-sm">10:58:52</span>
                                </td>
                                <td>37</td>
                                <td>103</td>
                                <td>180</td>
                                <td>59</td>
                                <td>120/80</td>
                                <td>72</td>
                                <td>
                                    <span>OBESE</span>
                                </td>
                                <td>
                                    <div>
                                        <span>High</span>
                                    </div>
                                </td>
                                <td>Default Admin</td>
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
