@props([
    'drawings' => [],
])
<div id="drawCollapse" class="collapse show bg-white rounded">
    <div class="card-body">
        <table class="table table-responsive-md table-head-custom">
            <thead>
                <tr>
                    <th class="text-muted">DATE TIME ADDED</th>
                    <th class="text-muted">ADDED BY</th>
                    <th class="text-muted">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($drawings as $drawing)
                    <tr>
                        <td>
                            {{ $drawing->created_at->format('jS F Y') }}
                            <span class="badge badge-primary badge-sm">
                                {{ $drawing->created_at->format('h:i:s A') }}
                            </span>
                        </td>
                        <td>{{ $drawing->user->full_names }}</td>
                        <td>
                            <a href="{{ json_decode($drawing->record_data)->image }}" target="_blank" title="View">
                                <i class="ri-eye-line text-primary icons-sm"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No Data Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
