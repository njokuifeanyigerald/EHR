@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>
                            SMS -
                            <small>Notify Patients & Anyone through SMS</small>
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                id="smsPortal-tab"
                                data-bs-toggle="tab"
                                href="#smsPortal"
                                role="tab"
                                aria-controls="sms-profile"
                                aria-selected="true"
                            >
                                SMS Portal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="smsTemplate-tab"
                                data-bs-toggle="tab"
                                href="#smsTemplate"
                                role="tab"
                                aria-controls="sms-template"
                                aria-selected="false"
                            >
                                SMS Template
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                id="smsSettings-tab"
                                data-bs-toggle="tab"
                                href="#smsSettings"
                                role="tab"
                                aria-controls="pills-contact"
                                aria-selected="false"
                            >
                                SMS Settings
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
                        <!-- SMS form -->
                        <div
                            class="tab-pane fade show active"
                            id="smsPortal"
                            role="tabpanel"
                            aria-labelledby="smsPortal-tab"
                        >
                            <p>To send an SMS please fill the forms below</p>
                            <form class="form-horizontal" action="#" method="">
                                @csrf
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 align-self-center mb-0" for="send">
                                        Send To
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-select my-2" id="send">
                                            <option selected="">Select Receiver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 align-self-center mb-0" for="template">
                                        SMS Template
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-select my-2" id="template">
                                            <option selected="">Select Template</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 align-self-center mb-0" for="template">
                                        Send On
                                    </label>
                                    <div class="col-sm-10">
                                        <input
                                            type="date"
                                            class="form-control my-2"
                                            id="pno"
                                            placeholder="Visit Date"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 align-self-center mb-0" for="template">
                                        Frequency
                                    </label>
                                    <div class="col-sm-10">
                                        <select class="form-select my-2" id="template">
                                            <option value="One time" selected>One time</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 align-self-center mb-0" for="message">
                                        Message
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="form-floating">
                                            <textarea
                                                class="form-control"
                                                placeholder="Enter message here"
                                                id="message"
                                                style="height: 150px"
                                            ></textarea>
                                            <label for="message">Enter message here</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary me-1 mt-2">Send Message</button>
                                    <button type="submit" class="btn iq-bg-danger me-2 mt-2">cancel</button>
                                </div>
                            </form>
                        </div>

                        <!-- SMS Template -->
                        <div class="tab-pane fade" id="smsTemplate" role="tabpanel" aria-labelledby="smsTemplate-tab">
                            <div class="form-group d-flex flex-row-reverse">
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#add_template"
                                >
                                    <i class="fa fa-plus-circle"></i>
                                    Add New Template
                                </button>
                            </div>

                            <div class="table-responsive">
                                <table
                                    id="sms_templates_table"
                                    data-classes="table table-hover table-striped"
                                    data-toggle="table"
                                    data-sortable="true"
                                    data-pagination="true"
                                    data-filter-control="true"
                                    data-show-toggle="true"
                                    data-show-columns="true"
                                    data-search="true"
                                    data-page-size="15"
                                    data-buttons-class="light"
                                    data-search-align="left"
                                >
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col" data-sortable="true" data-field="No">
                                                No
                                            </th>
                                            <th
                                                class="text-center"
                                                scope="col"
                                                data-sortable="true"
                                                data-field="template"
                                            >
                                                TEMPLATE NAME
                                            </th>
                                            <th
                                                class="text-center"
                                                scope="col"
                                                data-sortable="true"
                                                data-field="action"
                                            >
                                                ACTION
                                            </th>
                                            <th
                                                class="text-center"
                                                scope="col"
                                                data-sortable="true"
                                                data-field="status"
                                            >
                                                STATUS
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Independence Day Notice</td>
                                            <td class="text-center">
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(1)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".view_template"
                                                    title="View"
                                                >
                                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(1)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".edit_template"
                                                    title="Edit"
                                                >
                                                    <i class="ri-pencil-line text-dark icons-base"></i>
                                                </a>
                                                <a
                                                    href="{{ route('scheduler.sms') }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-base"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn iq-bg-success mt-3">Active</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>Invoice Alert</td>
                                            <td class="text-center">
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(2)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".view_template"
                                                    title="View"
                                                >
                                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(2)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".edit_template"
                                                    title="Edit"
                                                >
                                                    <i class="ri-pencil-line text-dark icons-base"></i>
                                                </a>
                                                <a
                                                    href="{{ route('scheduler.sms') }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-base"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn iq-bg-warning mt-3">Inactive</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>Stock Alert</td>
                                            <td class="text-center">
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(3)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".view_template"
                                                    title="View"
                                                >
                                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(3)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".edit_template"
                                                    title="Edit"
                                                >
                                                    <i class="ri-pencil-line text-dark icons-base"></i>
                                                </a>
                                                <a
                                                    href="{{ route('scheduler.sms') }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-base"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn iq-bg-success mt-3">Active</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">4</td>
                                            <td>Birthday Message</td>
                                            <td class="text-center">
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(4)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".view_template"
                                                    title="View"
                                                >
                                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(4)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".edit_template"
                                                    title="Edit"
                                                >
                                                    <i class="ri-pencil-line text-dark icons-base"></i>
                                                </a>
                                                <a
                                                    href="{{ route('scheduler.sms') }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-base"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn iq-bg-success mt-3">Active</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row">5</td>
                                            <td>Appointment Reminder</td>
                                            <td class="text-center">
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(5)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".view_template"
                                                    title="View"
                                                >
                                                    <i class="ri-eye-line me-2 text-primary icons-base"></i>
                                                </a>
                                                <a
                                                    href="#"
                                                    onclick="get_template_data(5)"
                                                    data-bs-toggle="modal"
                                                    data-bs-target=".edit_template"
                                                    title="Edit"
                                                >
                                                    <i class="ri-pencil-line text-dark icons-base"></i>
                                                </a>
                                                <a
                                                    href="{{ route('scheduler.sms') }}"
                                                    onclick="return confirm('Are you sure you want to delete?')"
                                                    title="Delete"
                                                >
                                                    <i class="ri-delete-bin-line text-danger icons-base"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn iq-bg-success mt-3">Active</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- SMS Settings -->
                        <div
                            class="tab-pane fade"
                            id="smsSettings"
                            role="tabpanel"
                            aria-labelledby="smsSettings-tab"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('scheduler.modals.add_template')
    @include('scheduler.modals.edit_template')
    @include('scheduler.modals.view_template')
@endsection
