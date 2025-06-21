@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List Of System Users</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_user" class="btn btn-primary my-2">
                            <i class="fa fa-plus"></i>
                            Add New User
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <livewire:user-management.users.index />
    </div>
@endsection
