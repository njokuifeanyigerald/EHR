@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Report Filter -->
        <x-elements.dynamic-report-filter
            :report-types="[
                'lab_requisition_report' => 'Requisition Report',
                'lab_revenue_report' => 'Revenue Report',
                'top_labs' => 'Top Radiology Report',
            ]"
            :dynamic-fields="[
                'lab_revenue_report' => [
                    'fieldType' => [
                        'label' => 'Select User',
                        'type' => 'select',
                        'options' => $usersOptions,
                    ],
                ],
                'top_labs' => [
                    'fieldType' => [
                        'label' => 'Graph',
                        'type' => 'radio',
                        'options' => [
                            'bar' => 'View Bar Chart',
                            'pie' => 'View Pie Chart',
                        ],
                    ],
                ],
            ]"
            :additional-data="[
                'is_radiology' => 1,
            ]"
        />

        @if ($reportData && in_array($reportType, ['lab_requisition_report', 'lab_revenue_report', 'top_labs']))
            <!-- Report title -->
            <div class="col-sm-12">
                <div class="iq-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="iq-header-title my-auto">
                            <h5>
                                {{ Str::headline($reportType) }}
                                ({{
                                    isset($reportData[0]['user_lab_revenue_option'])
                                        ? $reportData[0]['user_lab_revenue_option']
                                        : (isset($reportData[0]['graph_option'])
                                            ? $reportData[0]['graph_option'] . ' Chart'
                                            : 'Unspecified')
                                }})
                                -
                                <small>
                                    showing results from {{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }}
                                    to
                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }}
                                </small>
                            </h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge badge-warning p-2 my-auto">Showing Cached Data</span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($reportType == 'lab_requisition_report')
                {{-- Requisition Report --}}
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
                                    data-show-columns="true"
                                    data-page-size="25"
                                    data-buttons-class="light"
                                    data-search="true"
                                    data-search-align="left"
                                    data-show-print="true"
                                    data-show-export="true"
                                    data-export-data-type="all"
                                    data-export-types="[ 'csv', 'pdf','excel']"
                                    data-export-footer="true"
                                    data-export-options='{"fileName": "Radiology-Requisition-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="9">
                                                <p class="m-0">
                                                    Requisition Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Qty Requested">
                                                Qty Requested
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Qty Supplied">
                                                Qty Supplied
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Qty Available">
                                                Qty Available
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Date Requested">
                                                Date Requested
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Date Supplied">
                                                Date Supplied
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Requested By">
                                                Requested By
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Supplied By">
                                                Supplied By
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $requisitionRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $requisitionRecord['item_name'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_requested'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_supplied'] }}</td>
                                                <td>{{ $requisitionRecord['quantity_available'] }}</td>
                                                <td>{{ $requisitionRecord['date_requested'] }}</td>
                                                <td>{{ $requisitionRecord['date_supplied'] }}</td>
                                                <td>{{ $requisitionRecord['requested_by'] }}</td>
                                                <td>{{ $requisitionRecord['supplied_by'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'lab_revenue_report')
                {{-- Revenue Report --}}
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
                                    data-show-columns="true"
                                    data-page-size="25"
                                    data-buttons-class="light"
                                    data-search="true"
                                    data-search-align="left"
                                    data-show-print="true"
                                    data-show-export="true"
                                    data-export-data-type="all"
                                    data-export-types="[ 'csv', 'pdf','excel']"
                                    data-export-footer="true"
                                    data-export-options='{"fileName": "Radiology-Revenue-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="7">
                                                <p class="m-0">
                                                    Revenue Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Sold By">Sold By</th>
                                            <th scope="col" data-sortable="true" data-field="Quantity Sold">
                                                Quantity Sold
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Unit Price">Unit Price</th>
                                            <th scope="col" data-sortable="true" data-field="Sub Total">Sub Total</th>
                                            <th scope="col" data-sortable="true" data-field="Date">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $labRequisitionRecord)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $labRequisitionRecord['item_name'] }}</td>
                                                <td>{{ $labRequisitionRecord['sold_by'] }}</td>
                                                <td>{{ $labRequisitionRecord['quantity_sold'] }}</td>
                                                <td>{{ $labRequisitionRecord['unit_price'] }}</td>
                                                <td>{{ $labRequisitionRecord['total_price'] }}</td>
                                                <td>{{ $labRequisitionRecord['date'] }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="4"></td>
                                            <td><b>Total:</b></td>
                                            <td id="total_value" style="font-weight: bold">
                                                {{
                                                    array_reduce(
                                                        $reportData,
                                                        function ($carry, $item) {
                                                            return $carry + $item['unit_price'] * $item['quantity_sold'];
                                                        },
                                                        0,
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'top_labs')
                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'bar')
                    {{-- top Radiology by quantity sold Report --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Radiology (By Quantity Sold)</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                {{-- bar chart --}}
                                <div class="card-body">
                                    <div id="bar_qty_sold" style="width: 100%; height: 400px"></div>
                                </div>

                                {{-- bar chart --}}
                                <div class="card-body">
                                    <div id="bar_radiology_value" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'pie')
                    {{-- top Radiology by value Report --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Radiology (By value)</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                {{-- pie chart --}}
                                <div class="card-body">
                                    <div id="pie_qty_sold" style="width: 100%; height: 400px"></div>
                                </div>

                                {{-- pie chart --}}
                                <div class="card-body">
                                    <div id="pie_radiology_value" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @else
            <div class="col-md-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <h4 class="card-title text-center">No record found. Filter with different date.</h4>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('custom_js')
    <script>
        //charts
        document.addEventListener('DOMContentLoaded', function () {
            const jsonData = {!! json_encode($reportData) !!};

            // check if json data is empty
            if (jsonData != null && jsonData.length > 0) {
                if (jsonData[0]['graph_option'] == 'bar') {
                    const labItems = jsonData.map((item) => item.lab_item_name);
                    const quantitySold = jsonData.map((item) => item.quantity_sold);
                    const labValues = jsonData.map((item) => item.top_value);

                    //display Bar charts
                    display_bar_chart(
                        'bar_qty_sold',
                        'Top labs by quantity sold',
                        labItems,
                        'Quantity of labs sold',
                        'Quantity Sold',
                        quantitySold,
                    );

                    //display Bar charts
                    display_bar_chart(
                        'bar_radiology_value',
                        'Top labs by value',
                        labItems,
                        'Quantity of labs sold',
                        'Value',
                        labValues,
                    );
                }

                if (jsonData[0]['graph_option'] == 'pie') {
                    const quantitySoldData = jsonData.reduce((acc, item) => {
                        acc[item.lab_item_name] = item.quantity_sold;
                        return acc;
                    }, {});

                    const labValueData = jsonData.reduce((acc, item) => {
                        acc[item.lab_item_name] = item.top_value;
                        return acc;
                    }, {});

                    display_pie_chart(
                        'pie_qty_sold',
                        'Top labs by quantity sold',
                        'Quantity Sold',
                        Object.entries(quantitySoldData),
                    );

                    display_pie_chart(
                        'pie_radiology_value',
                        'Top labs by value',
                        'Value',
                        Object.entries(labValueData),
                    );
                }
            }
        });
    </script>
@endsection
