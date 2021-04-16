<table class="table table-bordered">
    <tr class="text-center">
        <th>Image</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $template)
        <tr class="text-center">
            <td><img src="{{ $template->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
            <td>
                <input type="checkbox" id="itemStatus{{ $template->id }}" @if($template->is_enable) checked @endif>
                @include("admin.template.status")
            </td>
            <td><a href="/admin/template/show/{{ $template->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $template->id }}">Delete</button>
                @include('admin.template.delete')
            </td>
            @empty
                <td colspan="5" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
