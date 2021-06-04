<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Profile</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $buyer)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>{{ $buyer->first_name . ' ' . $buyer->last_name }}</td>
            <td>{{ $buyer->phone_number }}</td>
            <td>{{ $buyer->address }}</td>
            <td><img src="{{ $buyer->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
            <td>
                <input type="checkbox" id="itemStatus{{ $buyer->id }}" @if($buyer->is_enable) checked @endif>
                @include("admin.buyer.status")
            </td>
            <td>
                {{ date('d-m-Y', strtotime($buyer->created_at)) }}
            </td>
            <td><a href="/admin/buyer/show/{{ $buyer->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $buyer->id }}">Delete</button>
                @include('admin.buyer.delete')
            </td>
            @empty
                <td colspan="5" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
