<div class="modal fade" id="paid{{ $sale->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close paidClose{{ $sale->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update {{ $sale->buyer->name ?? null }} paid status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/sale/update/paid/'.$sale->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default paidClose{{ $sale->id }}" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
