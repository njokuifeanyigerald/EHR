@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Settings</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="settings_org-tab"
                                data-bs-toggle="tab"
                                href="#settings_org"
                                role="tab"
                                aria-controls="pills-home"
                                aria-selected="true"
                            >
                                Organization
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="settings_facilities-tab"
                                data-bs-toggle="tab"
                                href="#settings_facilities"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                            >
                                Facilities
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="settings_rooms-tab"
                                data-bs-toggle="tab"
                                href="#settings_rooms"
                                role="tab"
                                aria-controls="pills-contact"
                                aria-selected="false"
                            >
                                Consulting Rooms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="corporate_insurance_companies-tab"
                                data-bs-toggle="tab"
                                href="#corporate_insurance_companies"
                                role="tab"
                                aria-controls="pills-profile"
                                aria-selected="false"
                            >
                                Corporate/Insurance Company
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="tab-content" id="pills-tabContent-2">
                        {{-- Organization settings --}}
                        <div
                            class="tab-pane fade show active"
                            id="settings_org"
                            role="tabpanel"
                            aria-labelledby="settings_org-tab"
                        >
                            <div class="mx-5 px-5 py-5">
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Company Name</label>
                                    <div class="col-md-9 col-sm-12">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Company Name"
                                            required=""
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Country</label>
                                    <div class="col-md-9 col-sm-12">
                                        <select class="form-select">
                                            <option value="">Select a Country</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">AndorrA</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, The Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote D"Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and Mcdonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic Of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People"S Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People"S Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">RWANDA</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="CS">Serbia and Montenegro</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Region or State</label>
                                    <div class="col-md-9 col-sm-12">
                                        <select class="form-select">
                                            <option value="">Select a State</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">District</label>
                                    <div class="col-md-9 col-sm-12">
                                        <select class="form-select">
                                            <option value="">Select a LGA</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Purchase Mark Up(%)</label>
                                    <div class="col-md-9 col-sm-12">
                                        <input
                                            type="number"
                                            min="0"
                                            max="100"
                                            class="form-control"
                                            placeholder="Mark Up for all Purchase"
                                            required=""
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Low Stock Qty(%)</label>
                                    <div class="col-md-9 col-sm-12">
                                        <input
                                            type="number"
                                            min="0"
                                            max="100"
                                            class="form-control"
                                            placeholder="Low Stock Qty for all Item by %"
                                            required=""
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label">Expiry Date (By Days)</label>
                                    <div class="col-md-9 col-sm-12">
                                        <input
                                            type="number"
                                            min="1"
                                            class="form-control"
                                            placeholder="Expiry Date for all Item by Days"
                                            required=""
                                        />
                                    </div>
                                </div>

                                <div class="form-group d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary me-1 mt-2">Save Settings</button>
                                </div>
                            </div>
                        </div>
                        {{-- Settings facilities --}}
                        <div
                            class="tab-pane fade"
                            id="settings_facilities"
                            role="tabpanel"
                            aria-labelledby="settings_facilities-tab"
                        >
                            <div class="p-4">
                                <div class="iq-card-header">
                                    <div class="form-group d-flex flex-row-reverse">
                                        <button
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#facility_form"
                                            class="btn btn-primary font-weight-bold"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Add New Facility
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table
                                        id="datatable"
                                        class="table table-head-custom cursor table-hover table-responsive-md"
                                    >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Facility Name</th>
                                                <th>System type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Aligbe, Jimoh and Habeeb</td>
                                                <td>EMR</td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#facility_form"
                                                        class="btn btn-outline-primary btn-sm"
                                                    >
                                                        View/Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Yaqub, Isaac and Ayisat</td>
                                                <td>EMR</td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#facility_form"
                                                        class="btn btn-outline-primary btn-sm"
                                                    >
                                                        View/Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- Settings rooms --}}
                        <div
                            class="tab-pane fade"
                            id="settings_rooms"
                            role="tabpanel"
                            aria-labelledby="settings_rooms-tab"
                        >
                            <div class="p-4">
                                <div class="iq-card-header">
                                    <div class="form-group d-flex flex-row-reverse">
                                        <button
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#add_room_settings"
                                            class="btn btn-primary font-weight-bold"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Add New Room
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table cursor table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="7">No data found</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- Corporate/Insurance companies --}}
                        <div
                            class="tab-pane fade"
                            id="corporate_insurance_companies"
                            role="tabpanel"
                            aria-labelledby="corporate_insurance_companies-tab"
                        >
                            <div class="p-4">
                                <div class="iq-card-header">
                                    <div class="form-group d-flex flex-row-reverse">
                                        <button
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#add_company"
                                            class="btn btn-primary font-weight-bold"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Add New Company
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="datatable" class="table cursor table-hover">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Type</th>
                                                <th>Company ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ELECTRICITY COMPANY OF GHANA</td>
                                                <td>ECG</td>
                                                <td>company</td>
                                                <td>6383</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#add_company"
                                                            class="btn btn-outline-primary"
                                                        >
                                                            View/Edit
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>OCEANIC INSURANCE</td>
                                                <td>OHI</td>
                                                <td>insurance</td>
                                                <td>6383</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#add_company"
                                                            class="btn btn-outline-primary"
                                                        >
                                                            View/Edit
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
        </div>
    </div>

    @include('settings.modals.facilities-form')
    @include('settings.modals.add_room')
    @include('settings.modals.add_company')
@endsection
