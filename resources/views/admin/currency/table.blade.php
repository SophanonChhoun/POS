<table class="table table-bordered">
    <tr class="text-center">
        <th>Name</th>
        <th colspan="3">Price for 1 USD</th>
    </tr>
    @forelse($data as $index => $currency)
        <tr class="text-center">
            <td>{{ $currency->name }}</td>
            <td colspan="3">
                <input type="number" value="{{ $currency->price }}" id="input{{$currency->id}}" class="form-control">
            </td>
            @empty
                <td colspan="6" class="text-center">There is no value</td>
        </tr>
    @endforelse
</table>
