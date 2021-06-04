<div class="modal fade" id="arrived{{ $sale->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close arrivedClose{{ $sale->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update {{ $sale->buyer->name ?? null }} delivered status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/sale/update/delivered/'.$sale->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default arrivedClose{{ $sale->id }}" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
