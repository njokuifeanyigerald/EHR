{{-- Create vital modal --}}
<div id="AddVitals1111" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Vital</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="new-user-info">
                    <div class="row">
                        <form class="form-horizontal" action="/action_page.php">
                            @csrf
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="bp">
                                        Blood Pressure
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control my-2" id="bp" />
                                    </div>
                                    <div class="col-sm-1">
                                        <h1>/</h1>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control my-2" id="bp" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="temperature">
                                        Temperature
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="temperature" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="respiratory">
                                        Respiratory Rate
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="respiratory Rate" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="pulse">
                                        Pulse
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="pulse" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="height">
                                        Height (Cm)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="height" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="weight">
                                        Weight (Kg)
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="weight" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-sm-6">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="sugar_level">
                                        Blood Sugar Level
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="sugar_level" />
                                    </div>
                                </div>
                                <div class="form-group row col-sm-6">
                                    <label
                                        class="control-label col-sm-3 align-self-center mb-0"
                                        for="oxygen_saturation"
                                    >
                                        Oxygen Saturation
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control my-2" id="oxygen_saturation" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create New Vital</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Previous vitals list modal --}}
    <div id="prevoius-vitals11" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">All Vitals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-head-custom table-hover table-responsive-lg cursor">
                            <thead>
                                <tr>
                                    <th style="width: 150px !important">Date</th>
                                    <th>Temp</th>
                                    <th>Wt</th>
                                    <th>Ht</th>
                                    <th>Pulse</th>
                                    <th style="width: 70px !important">BP</th>
                                    <th>Sugar</th>
                                    <th>BMI</th>
                                    <th>BMI Remark</th>
                                    <th>BP Remark</th>
                                    <th>User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2nd October 2023</td>
                                    <td>37</td>
                                    <td>52</td>
                                    <td>160</td>
                                    <td>53</td>
                                    <td>
                                        <span>60</span>
                                        /
                                        <span>120</span>
                                    </td>
                                    <td>52</td>
                                    <td>0.002</td>
                                    <td>
                                        <div>
                                            <span>OBESE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>Elevated</span>
                                        </div>
                                    </td>
                                    <td>Mercy Iburuoma</td>
                                </tr>
                                <tr>
                                    <td>28th September 2023</td>
                                    <td>37</td>
                                    <td>52</td>
                                    <td>160</td>
                                    <td>29</td>
                                    <td>
                                        <span>70</span>
                                        /
                                        <span>110</span>
                                    </td>
                                    <td>52</td>
                                    <td>0.002</td>
                                    <td>
                                        <div>
                                            <span>OBESE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>Normal</span>
                                        </div>
                                    </td>
                                    <td>Mercy Iburuoma</td>
                                </tr>
                                <tr>
                                    <td>28th September 2023</td>
                                    <td>42</td>
                                    <td>90</td>
                                    <td>180</td>
                                    <td>59</td>
                                    <td>
                                        <span>70</span>
                                        /
                                        <span>120</span>
                                    </td>
                                    <td>52</td>
                                    <td>0.003</td>
                                    <td>
                                        <div>
                                            <span>OBESE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span>Elevated</span>
                                        </div>
                                    </td>
                                    <td>Default Admin</td>
                                </tr>
                                <tr>
                                    <td>28th September 2023</td>
                                    <td>37</td>
                                    <td>90</td>
                                    <td>180</td>
                                    <td>59</td>
                                    <td>
                                        <span>80</span>
                                        /
                                        <span>120</span>
                                    </td>
                                    <td>56</td>
                                    <td>0.003</td>
                                    <td>
                                        <div>
                                            <span>OBESE</span>
                                        </div>
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

    {{-- All Investigations  Modal --}}
    <div id="view_lab_result" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lab Result 27</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- patient history modal --}}
    <div id="PatientHistory1" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4">
                    <ul class="nav nav-pills mb-4" id="myTab-1" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="DateSpecificHistory-tab"
                                data-bs-toggle="tab"
                                href="#DateSpecificHistory"
                                role="tab"
                                aria-controls="DateSpecificHistory"
                                aria-selected="true"
                            >
                                Date Specific History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="CombinedHistory-tab"
                                data-bs-toggle="tab"
                                href="#CombinedHistory"
                                role="tab"
                                aria-controls="CombinedHistory"
                                aria-selected="false"
                            >
                                Combined History
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent-2">
                        {{-- Date Specific History --}}
                        <div
                            class="tab-pane fade show active"
                            id="DateSpecificHistory"
                            role="tabpanel"
                            aria-labelledby="DateSpecificHistory-tab"
                        >
                            <div class="mb-1 mt-3">
                                <div class="d-flex">
                                    <!--Icon-->
                                    <div class="timeline-media bg-light-primary">
                                        <i class="ri-message-fill icons-base"></i>
                                    </div>
                                    <!--Info-->
                                    <div class="p-2 w-100">
                                        <span class="text-primary">
                                            28th September 2023 @
                                            <span class="text-warning">9:35 AM</span>
                                        </span>
                                        -
                                        <span class="font-weight-bolder">1000001</span>
                                        <div
                                            style="cursor: pointer"
                                            class="timeline-content bg-light-primary"
                                            onclick="$('.historyDetails1').fadeToggle('slow')"
                                        >
                                            <div class="chat-message float-none text-start">
                                                <p>Click to view details</p>
                                            </div>
                                        </div>
                                        <div style="display: none" class="historyDetails1 mt-2 ml-10 mx-3">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bolder">Medical Notes</h3>
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Cholera,&nbsp; Shigellosis,&nbsp;</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>History Presenting Complaints</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>ok</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Introvert and always indoors</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Review of Systems
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>Chest pain on right side,</label>
                                                                <label>Normal,</label>
                                                                <label>Mild case of sore throat,</label>
                                                                <label>No pain,</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                    ></div>

                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Diagnosis</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    Peptic ulcer, site unspecified
                                                                    <span
                                                                        style="font-size: x-small"
                                                                        class="text-danger"
                                                                    >
                                                                        Queried
                                                                    </span>
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Investigation</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">Widal Test</li>
                                                                <li style="list-style: none">Urine C/S</li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Prescriptions</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <span style="color: #000000">:</span>
                                                                    days
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Procedure</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <li style="list-style: none">DENTAL-TWEEZERS</li>
                                                                <li style="list-style: none">physio-Polar Ice gel</li>
                                                                <li style="list-style: none">
                                                                    dental-upper premolar forceps
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Nurses Orders</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <p>Please check BP regularly</p>
                                                                </li>
                                                                <li style="list-style: none">
                                                                    <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                </li>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Doctors Note</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <!--Icon-->
                                    <div class="timeline-media bg-light-primary">
                                        <i class="ri-message-fill icons-base"></i>
                                    </div>
                                    <!--Info-->
                                    <div class="p-2 w-100">
                                        <span class="text-primary">
                                            29th September 2023 @
                                            <span class="text-warning">9:01 AM</span>
                                        </span>
                                        -
                                        <span class="font-weight-bolder">1000004</span>
                                        <div
                                            style="cursor: pointer"
                                            class="timeline-content bg-light-primary"
                                            onclick="$('.historyDetails2').fadeToggle('slow')"
                                        >
                                            <div class="chat-message float-none text-start">
                                                <p>Click to view details</p>
                                            </div>
                                        </div>
                                        <div style="display: none" class="historyDetails2 mt-2 ml-10 mx-3">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bolder">Medical Notes</h3>
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Cholera,&nbsp; Shigellosis,&nbsp;</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>History Presenting Complaints</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>ok</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Introvert and always indoors</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Review of Systems
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>Chest pain on right side,</label>
                                                                <label>Normal,</label>
                                                                <label>Mild case of sore throat,</label>
                                                                <label>No pain,</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                    ></div>

                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Diagnosis</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    Peptic ulcer, site unspecified
                                                                    <span
                                                                        style="font-size: x-small"
                                                                        class="text-danger"
                                                                    >
                                                                        Queried
                                                                    </span>
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Investigation</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">Widal Test</li>
                                                                <li style="list-style: none">Urine C/S</li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Prescriptions</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <span style="color: #000000">:</span>
                                                                    days
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Procedure</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <li style="list-style: none">DENTAL-TWEEZERS</li>
                                                                <li style="list-style: none">physio-Polar Ice gel</li>
                                                                <li style="list-style: none">
                                                                    dental-upper premolar forceps
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Nurses Orders</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <p>Please check BP regularly</p>
                                                                </li>
                                                                <li style="list-style: none">
                                                                    <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                </li>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Doctors Note</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <!--Icon-->
                                    <div class="timeline-media bg-light-primary">
                                        <i class="ri-message-fill icons-base"></i>
                                    </div>
                                    <!--Info-->
                                    <div class="p-2 w-100">
                                        <span class="text-primary">
                                            29th September 2023 @
                                            <span class="text-warning">10:47 AM</span>
                                        </span>
                                        -
                                        <span class="font-weight-bolder">1000005</span>
                                        <div
                                            style="cursor: pointer"
                                            class="timeline-content bg-light-primary"
                                            onclick="$('.historyDetails3').fadeToggle('slow')"
                                        >
                                            <div class="chat-message float-none text-start">
                                                <p>Click to view details</p>
                                            </div>
                                        </div>
                                        <div style="display: none" class="historyDetails3 mt-2 ml-10 mx-3">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bolder">Medical Notes</h3>
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Cholera,&nbsp; Shigellosis,&nbsp;</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>History Presenting Complaints</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>ok</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Introvert and always indoors</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Review of Systems
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>Chest pain on right side,</label>
                                                                <label>Normal,</label>
                                                                <label>Mild case of sore throat,</label>
                                                                <label>No pain,</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                    ></div>

                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Diagnosis</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    Peptic ulcer, site unspecified
                                                                    <span
                                                                        style="font-size: x-small"
                                                                        class="text-danger"
                                                                    >
                                                                        Queried
                                                                    </span>
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Investigation</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">Widal Test</li>
                                                                <li style="list-style: none">Urine C/S</li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Prescriptions</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <span style="color: #000000">:</span>
                                                                    days
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Procedure</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <li style="list-style: none">DENTAL-TWEEZERS</li>
                                                                <li style="list-style: none">physio-Polar Ice gel</li>
                                                                <li style="list-style: none">
                                                                    dental-upper premolar forceps
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Nurses Orders</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <p>Please check BP regularly</p>
                                                                </li>
                                                                <li style="list-style: none">
                                                                    <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                </li>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Doctors Note</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <!--Icon-->
                                    <div class="timeline-media bg-light-primary">
                                        <i class="ri-message-fill icons-base"></i>
                                    </div>
                                    <!--Info-->
                                    <div class="p-2 w-100">
                                        <span class="text-primary">
                                            29th September 2023 @
                                            <span class="text-warning">10:59 AM</span>
                                        </span>
                                        -
                                        <span class="font-weight-bolder">1000007</span>
                                        <div
                                            style="cursor: pointer"
                                            class="timeline-content bg-light-primary"
                                            onclick="$('.historyDetails4').fadeToggle('slow&quot;')"
                                        >
                                            <div class="chat-message float-none text-start">
                                                <p>Click to view details</p>
                                            </div>
                                        </div>
                                        <div style="display: none" class="historyDetails4 mt-2 ml-10 mx-3">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bolder">Medical Notes</h3>
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Cholera,&nbsp; Shigellosis,&nbsp;</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>History Presenting Complaints</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>ok</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>Introvert and always indoors</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Review of Systems
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>Chest pain on right side,</label>
                                                                <label>Normal,</label>
                                                                <label>Mild case of sore throat,</label>
                                                                <label>No pain,</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                    ></div>

                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Diagnosis</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    Peptic ulcer, site unspecified
                                                                    <span
                                                                        style="font-size: x-small"
                                                                        class="text-danger"
                                                                    >
                                                                        Queried
                                                                    </span>
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Investigation</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">Widal Test</li>
                                                                <li style="list-style: none">Urine C/S</li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Prescriptions</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <span style="color: #000000">:</span>
                                                                    days
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Procedure</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <li style="list-style: none">DENTAL-TWEEZERS</li>
                                                                <li style="list-style: none">physio-Polar Ice gel</li>
                                                                <li style="list-style: none">
                                                                    dental-upper premolar forceps
                                                                </li>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Nurses Orders</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <li style="list-style: none">
                                                                    <p>Please check BP regularly</p>
                                                                </li>
                                                                <li style="list-style: none">
                                                                    <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                </li>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Doctors Note</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <span>No Record Found</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination mt-3 mb-1 justify-content-end">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&lt;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&gt;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        {{-- Combined History --}}
                        <div
                            class="tab-pane fade"
                            id="CombinedHistory"
                            role="tabpanel"
                            aria-labelledby="CombinedHistory-tab"
                        >
                            <div class="mb-1 mt-2">
                                <div class="d-flex">
                                    <div class="bg-light-primary p-0">
                                        <i class="ri-message-fill icons-base"></i>
                                    </div>
                                    <div class="p-2 w-100">
                                        <div
                                            style="cursor: pointer"
                                            class="bg-light-primary"
                                            onclick="$('.historyDetails_1').fadeToggle('slow')"
                                        >
                                            <div class="chat-message float-none text-start">
                                                <p>Click to view details</p>
                                            </div>
                                        </div>
                                        <div style="display: none" class="historyDetails_1 mt-2 ml-10 mx-3">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <h3 class="font-weight-bolder">Medical Notes</h3>
                                                    <div class="row d-flex justify-content-between">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Presenting Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>
                                                                    Cholera,&nbsp; Shigellosis,&nbsp;
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    Cholera,&nbsp;
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            History of Complaints
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    History Presenting Complaints
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    2 weeks
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">
                                                                            Past Medical History
                                                                        </h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    ok
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    ulcer in 2020
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Drug History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <label>
                                                                    Abidec Syrup Paracetamol Tablet 500mg Amoxil
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                                <label>
                                                                    Paracetamol Tablet 500mg
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        2nd October 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Social History</h5>
                                                                    </u>
                                                                </label>
                                                                <br />
                                                                <label>
                                                                    Introvert and always indoors
                                                                    <span
                                                                        class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                    >
                                                                        28th September 2023
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label>
                                                                    <u>
                                                                        <h5 class="font-weight-bold">Allergy</h5>
                                                                    </u>
                                                                </label>
                                                                <br />

                                                                <span style="font-weight: bolder">
                                                                    Allergy:
                                                                    <br />
                                                                </span>
                                                                Aspirin
                                                                <span
                                                                    class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                >
                                                                    2nd October 2023
                                                                </span>
                                                                <br />
                                                                <span style="font-weight: bolder">Reaction:</span>
                                                                <span>
                                                                    <li>Vomiting</li>
                                                                </span>
                                                                <span style="font-weight: bolder">Severity:</span>
                                                                <span>Mild</span>
                                                                <br />

                                                                <span style="font-weight: bolder">Status:</span>
                                                                <span>Inactive</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="separator separator-dashed separator-border-2 separator-primary mb-5"
                                                        ></div>

                                                        <div class="row d-flex justify-content-between">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">Diagnosis</h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        Peptic ulcer, site unspecified
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>

                                                                    <li style="list-style: none">
                                                                        Peptic ulcer, site unspecified: Acute with
                                                                        haemorrhage
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>

                                                                    <li style="list-style: none">
                                                                        Typhoid and paratyphoid fevers
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Investigation
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        Widal Test
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        Urine C/S
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        Widal Test
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        BF for Malaria Parasites
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Prescriptions
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Abidec Drops:
                                                                        </span>
                                                                        days
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Paracetamol Tablet 500mg:
                                                                        </span>
                                                                        2 Tab tid 5 days Oral
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <span style="color: #000000">
                                                                            Abidec Drops:
                                                                        </span>
                                                                        days
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">Procedure</h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        DENTAL-TWEEZERS
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        physio-Polar Ice gel
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            29th September 2023
                                                                        </span>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        dental-upper premolar forceps
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Nurses Notes
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <p>Patient has been vommiting</p>
                                                                        <span
                                                                            class="iq-bg-success ps-3 pe-3 pt-2 pb-2 rounded-5 d-inline-block fst-italic fw-bold"
                                                                        >
                                                                            2nd October 2023
                                                                        </span>
                                                                    </li>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Doctors Note
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
                                                                    <li style="list-style: none">
                                                                        <p>Please check BP regularly</p>
                                                                    </li>
                                                                    <li style="list-style: none">
                                                                        <p>gfgbcsjxmnbkjdasmgcbxjmn</p>
                                                                    </li>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        <u>
                                                                            <h5 class="font-weight-bold">
                                                                                Patient Status
                                                                            </h5>
                                                                        </u>
                                                                    </label>
                                                                    <br />
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
