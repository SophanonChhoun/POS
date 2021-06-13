<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th>Total</th>
        <th>Dealer</th>
        <th>Arrived</th>
        <th>Paid</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $import)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>${{ $import->total }} / Riel{{ $import->total * $import->currency }}</td>
            <td>{{ $import->dealer->first_name ?? null }} {{ $import->dealer->last_name }}</td>
            <td>
                @if(!$import->arrived)
                    <input type="checkbox" id="itemArrived{{ $import->id }}" @if($import->arrived) checked @endif>
                    @include("admin.import.delivered")
                @else
                    {{ $import->arrived_at }}
                @endif
            </td>
            <td>
                @if(!$import->paid)
                    <input type="checkbox" id="itemPaid{{ $import->id }}" @if($import->paid) checked @endif>
                    @include("admin.import.paid")
                @else
                    {{ $import->paid_at }}
                @endif
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $import->id }}" @if($import->is_enable) checked @endif>
                @include("admin.import.status")

            </td>
            <td><a href="/admin/import/show/{{ $import->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $import->id }}">Delete</button>
                @include('admin.import.delete')
            </td>

            @empty
                <td colspan="7" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
