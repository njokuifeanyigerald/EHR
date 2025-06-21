@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>Duty Roster</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('scheduler.index') }}" class="btn btn-primary">
                            <i class="ri-add-line me-2"></i>
                            Add New Roster
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-body d-flex justify-content-between">
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('scheduler.printroster') }}" class="btn btn-primary">
                            <i class="ri-printer-fill me-2"></i>
                            Print Roster
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    {{--
                        @include(
                        'scheduler.duty_view_table',
                        [
                        'shifts' => $shifts,
                        'duties' => $duties,
                        'dates' => $dates,
                        ]
                        )
                    --}}

                    <livewire:schedular.view-roster />
                </div>
            </div>
        </div>
    </div>
@endsection
