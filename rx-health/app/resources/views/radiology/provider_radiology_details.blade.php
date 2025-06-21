@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Radiology Results</h4>
                    </div>
                </div>
            </div>
        </div>

        <livewire:radiology.provider-labs.result-templates :lab_id="$lab_id" />
    </div>

    <!-- Ckeditor -->
    <script src="{{ asset('packages/ckeditor5-build-classic/ckeditor.js') }}"></script>
@endsection
