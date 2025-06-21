@extends('layouts.app')
@section('content')
    <div class="row">
        <x-elements.dynamic-report-filter
            :report-types="[
                'stock_report' => 'Stock Report',
                'po_report' => 'Purchase Order Report',
                'sales_report' => 'Sales Report',
                'individual_drug_sales_report' => 'Individual Drug Sales Report',
                'report_on_top_drugs' => 'Top Drugs Report',
            ]"
            :dynamic-fields="[
                'sales_report' => [
                    'fieldType' => [
                        'label' => 'Select User',
                        'type' => 'select',
                        'options' => $usersOptions,
                    ],
                ],
                'individual_drug_sales_report' => [
                    'fieldType' => [
                        'label' => 'Search Item',
                        'type' => 'search',
                    ],
                ],
                'report_on_top_drugs' => [
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
        />

        @if ($reportData &&
            in_array($reportType, [
                'stock_report',
                'po_report',
                'sales_report',
                'individual_drug_sales_report',
                'report_on_top_drugs'
            ]))
            <div class="col-sm-12">
                <div class="iq-card p-3">
                    <div class="d-flex justify-content-between">
                        <div class="iq-header-title my-auto">
                            <h5>
                                {{ Str::headline($reportType) }}
                                ({{
                                    isset($reportData[0]['sales_user_selected'])
                                        ? $reportData[0]['sales_user_selected']
                                        : (isset($reportData[0]['graph_option'])
                                            ? $reportData[0]['graph_option'] . ' Chart'
                                            : (isset($reportData[0]['individual_drug_selected'])
                                                ? $reportData[0]['individual_drug_selected']
                                                : 'Unspecified'))
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

            @if ($reportType == 'po_report')
                {{-- Purchase Order Report --}}
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
                                    data-export-options='{"fileName": "Purchase-Order-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="13" data-sortable="true">
                                                <p class="m-0">
                                                    Purchase Order Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Batch No.">Batch No.</th>
                                            <th scope="col" data-sortable="true" data-field="Ordered Qty">
                                                Ordered Qty
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Supplied Qty">
                                                Supplied Qty
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="Supplier">Supplier</th>
                                            <th scope="col" data-sortable="true" data-field="Exp Date">Exp Date</th>
                                            <th scope="col" data-sortable="true" data-field="Order Date">Order Date</th>
                                            <th scope="col" data-sortable="true" data-field="Date Supply">
                                                Date Supply
                                            </th>
                                            <th scope="col" data-sortable="true" data-field="CP">CP</th>
                                            <th scope="col" data-sortable="true" data-field="Markup">Markup</th>
                                            <th scope="col" data-sortable="true" data-field="SP">SP</th>
                                            <th scope="col" data-sortable="true" data-field="Purchase Return">
                                                Purchase Return
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['item_name'] }}</td>
                                                <td>{{ $data['batch_number'] }}</td>
                                                <td>{{ $data['qty_ordered'] }}</td>
                                                <td>{{ $data['qty_supplied'] }}</td>
                                                <td>{{ $data['supplier'] }}</td>
                                                <td>{{ $data['expiry_date'] }}</td>
                                                <td>{{ $data['order_date'] }}</td>
                                                <td>{{ $data['date_supplied'] }}</td>
                                                <td>{{ $data['cost_price'] }}</td>
                                                <td>{{ $data['markup'] }}</td>
                                                <td>{{ $data['selling_price'] }}</td>
                                                <td>{{ $data['purchase_returned'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($reportType == 'sales_report')
                {{-- Sales Report --}}
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
                                    data-export-options='{"fileName": "Drug-Sales-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="7">
                                                <p class="m-0">
                                                    Sales Report
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
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['item_name'] }}</td>
                                                <td>{{ $data['sold_by'] }}</td>
                                                <td>{{ $data['qty_sold'] }}</td>
                                                <td>{{ $data['unit_price'] }}</td>
                                                <td>{{ $data['subtotal'] }}</td>
                                                <td>{{ $data['date'] }}</td>
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
                                                            return $carry + $item['subtotal'];
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

            @if ($reportType == 'individual_drug_sales_report')
                {{-- Individual Drug Sales Report --}}
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
                                    data-export-options='{"fileName": "Individual-Drug-Sales-Report-date"}'
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="8">
                                                <p class="m-0">
                                                    Individual Drug Sales Report
                                                    ({{ date('dS F, Y', strtotime($reportData[0]['start_date'])) }} to
                                                    {{ date('dS F, Y', strtotime($reportData[0]['end_date'])) }})
                                                </p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" data-sortable="true" data-field="No">No</th>
                                            <th scope="col" data-sortable="true" data-field="Item Name">Item Name</th>
                                            <th scope="col" data-sortable="true" data-field="Batch No.">Batch No.</th>
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
                                        @foreach ($reportData as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data['item_name'] }}</td>
                                                <td>{{ $data['batch_number'] }}</td>
                                                <td>{{ $data['sold_by'] }}</td>
                                                <td>{{ $data['qty_sold'] }}</td>
                                                <td>{{ $data['unit_price'] }}</td>
                                                <td>{{ $data['subtotal'] }}</td>
                                                <td>{{ $data['date'] }}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="5"></td>
                                            <td><b>Total:</b></td>
                                            <td id="total_value" style="font-weight: bold">
                                                {{
                                                    array_reduce(
                                                        $reportData,
                                                        function ($carry, $item) {
                                                            return $carry + $item['subtotal'];
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

            @if ($reportType == 'report_on_top_drugs')
                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'bar')
                    {{-- top drugs by quantity sold Report --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Drugs (By Quantity Sold)</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                {{-- bar chart --}}
                                <div class="card-body">
                                    <div id="bar_qty_sold" style="width: 100%; height: 400px"></div>
                                </div>

                                {{-- bar chart --}}
                                <div class="card-body">
                                    <div id="bar_drug_value" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (isset($reportData[0]['graph_option']) && $reportData[0]['graph_option'] == 'pie')
                    {{-- top drugs by value Report --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">Top Drugs (By value)</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                {{-- pie chart --}}
                                <div class="card-body">
                                    <div id="pie_qty_sold" style="width: 100%; height: 400px"></div>
                                </div>

                                {{-- pie chart --}}
                                <div class="card-body">
                                    <div id="pie_drug_value" style="width: 100%; height: 400px"></div>
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

    @section('custom_js')
        <script>
            //charts
            document.addEventListener('DOMContentLoaded', function () {
                const jsonData = {!! json_encode($reportData) !!};

                const pharmaItems = jsonData.map((item) => item.pharma_item_name);
                const quantitySold = jsonData.map((item) => item.quantity_sold);
                const pharmaValues = jsonData.map((item) => item.top_value);

                if (jsonData != null && jsonData.length > 0) {
                    if (jsonData[0]['graph_option'] == 'bar') {
                        //display Bar charts
                        display_bar_chart(
                            'bar_qty_sold',
                            'Top drugs by quantity sold',
                            pharmaItems,
                            'Quantity of drugs sold',
                            'Quantity Sold',
                            quantitySold,
                        );

                        //display Bar charts
                        display_bar_chart(
                            'bar_drug_value',
                            'Top drugs by value',
                            pharmaItems,
                            'Drugs by value',
                            'Value Sold',
                            pharmaValues,
                        );
                    }

                    if (jsonData[0]['graph_option'] == 'pie') {
                        const quantitySoldData = jsonData.reduce((acc, item) => {
                            acc[item.pharma_item_name] = item.quantity_sold;
                            return acc;
                        }, {});

                        const pharmaValueData = jsonData.reduce((acc, item) => {
                            acc[item.pharma_item_name] = item.top_value;
                            return acc;
                        }, {});

                        display_pie_chart(
                            'pie_qty_sold',
                            'Top drugs by quantity sold',
                            'Quantity Sold',
                            Object.entries(quantitySoldData),
                        );

                        display_pie_chart(
                            'pie_drug_value',
                            'Top drugs by value',
                            'Value Sold',
                            Object.entries(pharmaValueData),
                        );
                    }
                }
            });
        </script>
    @endsection
@endsection
