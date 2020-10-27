<form action="{{url("company/{$company->id}")}}" method="post">
    @csrf
    @method('DELETE')
    <div class="card bg-light">
        <div>
            <button type="button" class="btn btn-danger btn-sm float-right" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <h6 class="text-center my-3">Delete Data?</h6>

        <div class="col my-2 text-center">
            <button class="btn btn-primary">Delete</button>
            <button type="button" class="btn btn-warning text-white" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</form>