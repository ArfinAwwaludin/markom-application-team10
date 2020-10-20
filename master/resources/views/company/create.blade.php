<form action="{{action('App\Http\Controllers\CompanyController@store')}}" method="post">
@csrf
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5>Add Company</h5>
        </div>
        
        <div class="card-body">
            <div class="form-group row my-2">
                <div class="col">
                    <label for="code" class="col col-form-label my-1">*Company Code</label>
                    <label for="email" class="col col-form-label my-1">Email</label>
                    <label for="phone" class="col col-form-label my-1">Phone</label>
                </div>
                <div class="col">
                    <input class="form-control my-2" type="text" name="code">
                    <input class="form-control my-2" type="text" name="email">
                    <input class="form-control my-2" type="text" name="phone">
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label my-1">*Company Name</label>
                    <label for="address" class="col col-form-label my-1">Address</label>
                </div>
                <div class="col">
                    <input class="form-control my-2" type="text" name="name">
                    <textarea class="form-control" name="address"></textarea>
                </div>
            </div>
        </div>
    
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        </div>
    </div>
</form>