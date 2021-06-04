<div class="modal fade" id="status{{ $import->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close statusClose{{ $import->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update {{ $import->description ?? null }} status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/import/update/status/'.$import->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="is_enable" value="{{ $import->is_enable ? 0 : 1 }}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default statusClose{{ $import->id }}" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
