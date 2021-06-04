<table class="table table-bordered">
    <tr class="text-center">
        <td>No</td>
        <th colspan="3">Name</th>
        <th>Sequence Order</th>
        <th>Icon</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $category)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td colspan="3">{{ $category->name }}</td>
            <td>
                <input type="number" value="{{ $category->sequence_order }}" id="input{{$category->id}}" class="form-control">
            </td>
            <td><img src="{{ $category->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 50px; max-width: 50px"></td>
            <td>
                {{ date('d-m-Y', strtotime($category->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $category->id }}" @if($category->is_enable) checked @endif>
                @include("admin.category.status")
            </td>
            <td><a href="/admin/category/show/{{ $category->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $category->id }}">Delete</button>
                @include('admin.category.delete')
            </td>
            @empty
                <td colspan="7" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
