@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Provider Item</h4>
                    </div>
                    {{--
                        <div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_new_item" class="btn btn-primary">
                        <fa class="fa fa-plus"></fa> New Item
                        </a>
                        </div>
                    --}}
                </div>
            </div>
        </div>

        <livewire:laboratory.provider-labs.index />
    </div>
    {{-- @include('lab.modals.new_item') --}}
    {{-- @include('lab.modals.edit_item') --}}
@endsection
