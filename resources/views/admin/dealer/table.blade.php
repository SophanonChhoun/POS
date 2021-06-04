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
    @forelse($data as $index => $dealer)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>{{ $dealer->first_name . ' ' . $dealer->last_name }}</td>
            <td>{{ $dealer->phone_number }}</td>
            <td>{{ $dealer->address }}</td>
            <td><img src="{{ $dealer->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
            <td>
                {{  date('d-m-Y', strtotime($dealer->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $dealer->id }}" @if($dealer->is_enable) checked @endif>
                @include("admin.dealer.status")
            </td>
            <td><a href="/admin/dealer/show/{{ $dealer->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $dealer->id }}">Delete</button>
                @include('admin.dealer.delete')
            </td>
            @empty
                <td colspan="5" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
