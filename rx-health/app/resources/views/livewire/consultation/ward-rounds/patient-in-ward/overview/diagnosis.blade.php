@props([
    'diagnoses' => [],
])

<div id="diagCollapse" class="collapse show bg-white rounded">
    <div class="card-body">
        <table
            class="table table-head-custom table-responsive-md table-responsive-sm table-responsive-lg cursor text-center"
        >
            <thead class="">
                <tr>
                    <th class="text-muted">NO</th>
                    <th class="text-muted">DATE TIME ADDED</th>
                    <th class="text-muted">DIAGNOSIS</th>
                    <th class="text-muted">Status</th>
                    <th class="text-muted">ADDED BY</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($diagnoses as $diagnosis)
                    <tr>
                        <td class="text-muted">{{ $loop->iteration }}</td>
                        <td class="text-muted">
                            {{ now()->parse($diagnosis->created_at)->format('d-m-Y') }}
                            {{ now()->parse($diagnosis->created_at)->format('h:i A') }}
                        </td>
                        <td class="text-muted">{{ $diagnosis->diagnosis->disease }}</td>
                        <td class="text-muted">
                            {{ $diagnosis->status }}
                        </td>
                        <td class="text-muted">{{ $diagnosis->user->full_names }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
