@extends('layouts.app')

<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Lab Results</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:laboratory.provider-labs.result-templates :lab_id="$lab_id" />
    </div>
    {{-- @include('lab.modals.pending_client_preview') --}}
@endsection
