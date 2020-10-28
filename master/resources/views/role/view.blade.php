<form action="" method="POST">
@csrf
@method('PATCH')
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5>View Role</h5>
        </div>
        
        <div class="card-body">
            <fieldset disabled>
            <div class="form-group row my-2">
                <div class="col">
                    <label for="code" class="col col-form-label my-1">*Role Code</label>
                    <label for="name" class="col col-form-label my-1">*Role Name</label>
                    <label for="description" class="col col-form-label my-1">Description</label>
                </div>
                <div class="col">
                    <input class="form-control my-2" type="text" name="code" value="{{$rol->code}}">
                    <input class="form-control my-2" type="text" name="name" value="{{$rol->name}}">
                    <input class="form-control my-2" type="text" name="description" value="{{$rol->description}}">
                </div>
            </div>
            </fieldset>
        </div>
    
        <div class="card-footer text-right">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
    </div>
</form>