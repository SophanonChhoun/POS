<table class="table table-bordered table-hover table-responsive-lg">
    <tr class="text-center">
        <th>No</th>
        <th>Sub Category</th>
        <th colspan="3">Name</th>
        <th>Price</th>
        <th>Sequence Order</th>
        <th>Quantity</th>
        <th>Brand</th>
        <th>Type</th>
        <th>Product Origin</th>
        <th>Image</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $product)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>{{ $product->subcategory->description ?? '' }}</td>
            <td colspan="3">{{ $product->name }}</td>
            <td>
                <input type="number" value="{{ $product->price }}" id="inputPrice{{$product->id}}" class="form-control">
            </td>
            <td>
                <input type="number" value="{{ $product->sequence_order }}" id="input{{$product->id}}" class="form-control">
            </td>
            <td>
                <input type="number" value="{{ $product->quantity }}" id="inputQuantity{{$product->id}}" class="form-control">
            </td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->country }}</td>
            <td><img src="{{ $product->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 50px; max-width: 50px"></td>
            <td>
                <input type="checkbox" id="itemStatus{{ $product->id }}" @if($product->is_enable) checked @endif>
                @include("admin.product.status")
            </td>
            <td><a href="/admin/product/show/{{ $product->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" id="myBtn{{ $product->id }}">Delete</button>
                @include('admin.product.delete')
            </td>
            @empty
                <td colspan="14" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
