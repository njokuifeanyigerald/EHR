@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Header title -->
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4>List Of Receipts</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <a href="{{ route('payments.payment_list') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Add New Payment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table
                            data-classes="table table-hover"
                            data-toggle="table"
                            data-sortable="true"
                            data-pagination="true"
                            data-filter-control="true"
                            data-show-toggle="true"
                            data-show-columns="true"
                            data-page-size="15"
                            data-buttons-class="light"
                            data-search="true"
                            data-search-align="left"
                        >
                            <thead>
                                <tr>
                                    <th scope="col" data-sortable="true" data-field="No">No</th>
                                    <th scope="col" data-sortable="true" data-field="Time">Time</th>
                                    <th scope="col" data-sortable="true" data-field="Patient">Patient</th>
                                    <th scope="col" data-sortable="true" data-field="Visit Number">Receipt Number</th>
                                    <th scope="col" data-sortable="true" data-field="Channel">Channel</th>
                                    <th scope="col" data-sortable="true" data-field="Amount">Amount</th>
                                    <th class="text-center" scope="col" data-sortable="true" data-field="Action">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payment_records as $payment_record)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $payment_record->created_at }}</td>
                                        <td>
                                            {{ $payment_record->full_name_title ?? 'N/A' }}
                                        </td>
                                        <td>{{ $payment_record->receipt_number }}</td>
                                        <td>{{ Str::upper($payment_record->payment_methods) ?? 'Cash' }}</td>
                                        <td>
                                            {{ $payment_record->currency_code . ' ' . $payment_record->payment_amount }}
                                        </td>
                                        <td class="text-center">
                                            {{--
                                                <a href="{{ route('payments.show', $payment_record->visit_number) }}"
                                                class="btn btn-outline-primary px-1 py-0 me-1" title="View Receipt Details">
                                                <i class="ri-eye-line m-0 icons-base"></i>
                                                </a>
                                            --}}
                                            <a
                                                href="{{ route('payments.receipt', $payment_record->receipt_number) }}"
                                                class="btn btn-outline-dark px-1 py-0 me-1"
                                                title="Receipt"
                                                target="_blank"
                                            >
                                                <i class="ri-printer-fill m-0 icons-base"></i>
                                            </a>
                                            <a
                                                href="{{ route('payments.pos_receipt', $payment_record->receipt_number) }}"
                                                class="btn btn-outline-danger px-1 py-0"
                                                title="POS Receipt"
                                                target="_blank"
                                            >
                                                <i class="ri-printer-line m-0 icons-base"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Receipts Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
