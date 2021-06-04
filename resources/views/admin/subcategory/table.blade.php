<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th>Category</th>
        <th colspan="3">Description</th>
        <th>Sequence Order</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $subcategory)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>{{ $subcategory->category->name ?? '' }}</td>
            <td colspan="3">{{ $subcategory->description }}</td>
            <td>
                <input type="number" value="{{ $subcategory->sequence_order }}" id="input{{$subcategory->id}}" class="form-control">
            </td>
            <td>
                {{ date('d-m-Y', strtotime($subcategory->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $subcategory->id }}" @if($subcategory->is_enable) checked @endif>
                @include("admin.subcategory.status")
            </td>
            <td><a href="/admin/subcategory/show/{{ $subcategory->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $subcategory->id }}">Delete</button>
                @include('admin.subcategory.delete')
            </td>
            @empty
                <td colspan="6" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
