<div class="modal fade" id="status{{ $template->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close statusClose{{ $template->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update this status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/template/update/status/'.$template->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="is_enable" value="{{ $template->is_enable ? 0 : 1 }}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default statusClose{{ $template->id }}" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
