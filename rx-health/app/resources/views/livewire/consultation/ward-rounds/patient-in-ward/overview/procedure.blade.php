@props([
    'procedures' => [],
])

<div id="procCollapse" class="collapse show bg-white rounded">
    <div class="card-body">
        <div class="table-responsive">
            <table
                class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
            >
                <thead class="">
                    <tr>
                        <th class="text-muted">DATE TIME ADDED</th>
                        <th class="text-muted">PROCEDURE NAME</th>
                        <th class="text-muted">PROCEDURE DATE</th>
                        <th class="text-muted">ADDED BY</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($procedures as $procedure)
                        <tr>
                            <td>
                                {{ now()->parse($procedure->created_at)->format('d-m-Y h:i A') }}
                            </td>
                            <td>
                                {{ $procedure->item->item_name }}
                            </td>
                            <td>
                                {{ now()->parse($procedure->procedure_date)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $procedure->user->full_names }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
