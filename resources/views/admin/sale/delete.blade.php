<div class="modal fade" id="myModal{{ $sale->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close deleteClose{{ $sale->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete {{ $sale->buyer->name ?? null }}?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/sale/delete/'.$sale->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-default deleteClose{{ $sale->id }}" >Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
