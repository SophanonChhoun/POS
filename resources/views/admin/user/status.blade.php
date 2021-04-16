<div class="modal fade" id="status{{ $user->id }}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close statusClose{{ $user->id }}" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to update {{ $user->first_name . ' ' . $user->last_name ?? null }} status?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('admin/user/update/status/'.$user->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="is_enable" value="{{ $user->is_enable ? 0 : 1 }}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        <button type="button" class="btn btn-default statusClose{{ $user->id }}" data-dismiss="modal">Close</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
