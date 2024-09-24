<div class="modal fade" id="modal-{{ $empire->id }}" tabindex="-1" aria-labelledby="modal-label-{{ $empire->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-label-{{ $empire->id }}">Delete {{ $empire->name }}</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you certain you want to delete {{ $empire->name }}?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                <form action="{{ route('empire.delete', ['id' => $empire->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
