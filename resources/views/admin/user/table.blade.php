<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Profile</th>
        <th>Date</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $user)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td><img src="{{ $user->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
            <td>
                {{ date('d-m-Y', strtotime($user->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $user->id }}" @if($user->is_enable) checked @endif>
                @include("admin.user.status")
            </td>
            <td><a href="/admin/user/show/{{ $user->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $user->id }}">Delete</button>
                @include('admin.user.delete')
            </td>
            @empty
                <td colspan="5" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
