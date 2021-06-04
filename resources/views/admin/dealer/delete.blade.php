<div class="modal fade" id="myModal{{ $dealer->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close deleteClose{{ $dealer->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete {{ $dealer->first_name . ' ' . $dealer->last_name ?? null }}?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/dealer/delete/'.$dealer->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-default deleteClose{{ $dealer->id }}" >Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
