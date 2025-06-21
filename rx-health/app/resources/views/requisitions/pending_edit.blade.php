@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Pending Requisition</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Pending</h5>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="new-user-info">
                        <form action="">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="from">
                                    From
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" wire:model.lazy="requisition_from" required="">
                                        <option value="">Select from options</option>
                                        <option value="1" selected>Main Stores</option>
                                        <option value="2">Central Medical Stores</option>
                                        <option value="3">Pharmacy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="to">
                                    To
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-select" wire:model.lazy="requisition_to" required="">
                                        <option value="">Select from options</option>
                                        <option value="1">Main Stores</option>
                                        <option value="2">Central Medical Stores</option>
                                        <option value="3" selected>Pharmacy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="Remarks">
                                    Remarks
                                </label>
                                <div class="col-sm-10">
                                    <textarea
                                        class="form-control"
                                        wire:model="requisition_remarks"
                                        placeholder="Remarks (Optional)"
                                    ></textarea>
                                </div>
                            </div>
                            <div class="form-group row my-5">
                                <label class="control-label col-sm-2 align-self-center mb-0" for="to">Status</label>
                                <div class="col-sm-10">
                                    <span class="form-control">submitted</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h5>Requisition Details</h5>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a
                            href="#"
                            data-bs-toggle="modal"
                            data-bs-target="#add_edit_item"
                            class="btn btn-primary me-3 my-2"
                        >
                            <i class="fa fa-plus"></i>
                            Add Item
                        </a>
                    </div>
                </div>
                <div class="iq-card-body">
                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Pack Size</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chlorpheniramine/Paracetamol Tablet</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>
                                        <div class="">
                                            <a
                                                href="#"
                                                class="text-dark me-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#add_edit_item"
                                            >
                                                <i class="ri-pencil-line icons-sm"></i>
                                            </a>
                                            <a
                                                href="#"
                                                class="text-danger"
                                                onclick="confirm('Are you sure you want to remove this item?')"
                                            >
                                                <i class="ri-delete-bin-line icons-sm"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- buttons --}}
                    <div class="my-4 d-flex justify-content-end">
                        <a href="{{ route('requisitions.index') }}" class="btn btn-light me-2">
                            <i class="fa fa-arrow-rotate-left"></i>
                            Return to Requisitions
                        </a>
                        <button type="button" class="btn btn-warning me-2" wire:click="">
                            <i class="fa fa-circle-down"></i>
                            Save Changes
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick=""
                            data-bs-toggle="modal"
                            data-bs-target="#pharmacy-payment-modal"
                        >
                            <i class="fa fa-paper-plane"></i>
                            Approve this requisition
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modals --}}
    @include('requisitions.modals.add_edit_requisitions_item')
@endsection
