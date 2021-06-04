<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th colspan="3">Title</th>
        <th>Image</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $promotion)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td colspan="3">{{ $promotion->title }}</td>
            <td><img src="{{ $promotion->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 100px; max-width: 100px"></td>
            <td>
                {{ date('d-m-Y', strtotime($promotion->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $promotion->id }}" @if($promotion->is_enable) checked @endif>
                @include("admin.promotion.status")
            </td>
            <td><a href="/admin/promotion/show/{{ $promotion->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $promotion->id }}">Delete</button>
                @include('admin.promotion.delete')
            </td>
            @empty
                <td colspan="9" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
