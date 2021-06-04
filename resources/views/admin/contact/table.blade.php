<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th colspan="3">Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $contact)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td colspan="3">{{ $contact->name }}</td>
            <td>{{ $contact->phone_number }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->address }}</td>
            <td><img src="{{ $contact->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 50px; max-width: 50px"></td>
            <td>
                <input type="checkbox" id="itemStatus{{ $contact->id }}" @if($contact->is_enable) checked @endif>
                @include("admin.contact.status")
            </td>
            <td><a href="/admin/contact/show/{{ $contact->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $contact->id }}">Delete</button>
                @include('admin.contact.delete')
            </td>
            @empty
                <td colspan="10" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
