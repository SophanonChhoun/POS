<table class="table table-bordered">
    <tr class="text-center">
        <td>No</td>
        <th colspan="3">Name</th>
        <th>Order</th>
        <td>Date</td>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $faq)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td colspan="3">{{ $faq->name }}</td>
            <td>
                <input type="number" value="{{ $faq->order }}" id="input{{$faq->id}}" class="form-control">
            </td>
            <td>
                {{ date('d-m-Y', strtotime($faq->created_at)) }}
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $faq->id }}" @if($faq->is_enable) checked @endif>
                @include("admin.faq.status")
            </td>
            <td><a href="/admin/faq/show/{{ $faq->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $faq->id }}">Delete</button>
                @include('admin.faq.delete')
            </td>
            @empty
                <td colspan="8" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
