<form action="{{action('App\Http\Controllers\RoleController@store')}}" method="post">
    @csrf
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h5>Add Role</h5>
            </div>
            
            <div class="card-body">
                <div class="form-group row my-2">
                    <div class="col">
                        <label for="code" class="col col-form-label my-1">*Role Code</label>
                        <label for="name" class="col col-form-label my-1">*Role Name</label>
                        <label for="description" class="col col-form-label my-1">Description</label>
                    </div>
                    <div class="col">
                        <input class="form-control my-2" type="text" name="code">
                        <input class="form-control my-2" type="text" name="name">
                        <input class="form-control my-2" type="text" name="description">
                    </div>
                </div>
            </div>
        
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>