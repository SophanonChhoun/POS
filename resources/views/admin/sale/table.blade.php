<table class="table table-bordered">
    <tr class="text-center">
        <th>No</th>
        <th>Total</th>
        <th>Total After Discount</th>
        <th>Buyer</th>
        <th>Delivered</th>
        <th>Paid</th>
        <th>Status</th>
        <th colspan="1" class="text-center">Action</th>
    </tr>
    @forelse($data as $index => $sale)
        <tr class="text-center">
            <td>{{ $data->firstItem() + $index }}</td>
            <td>${{ $sale->totalNotDiscount }} / Riel{{ $sale->totalNotDiscount * $sale->currency }}</td>
            <td>${{ $sale->total }} / Riel{{ $sale->total * $sale->currency }}</td>
            <td>{{ $sale->buyer->first_name ?? null }} {{ $sale->buyer->last_name ?? null }}</td>
            <td>
                @if(!$sale->delivered)
                    <input type="checkbox" id="itemArrived{{ $sale->id }}" @if($sale->delivered) checked @endif>
                    @include("admin.sale.delivered")
                @else
                    {{ $sale->delivered_at }}
                @endif
            </td>
            <td>
                @if(!$sale->paid)
                    <input type="checkbox" id="itemPaid{{ $sale->id }}" @if($sale->paid) checked @endif>
                    @include("admin.sale.paid")
                @else
                    {{ $sale->paid_at }}
                @endif
            </td>
            <td>
                <input type="checkbox" id="itemStatus{{ $sale->id }}" @if($sale->is_enable) checked @endif>
                @include("admin.sale.status")

            </td>
            <td><a href="/admin/sale/show/{{ $sale->id }}" class="btn btn-warning">Edit</a></td>

            @empty
                <td colspan="6" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
