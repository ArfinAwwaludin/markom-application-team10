
<form action="/" method="post" id="editForm">
@method('PATCH')
@csrf
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5>Edit Company</h5>
        </div>

        <div class="card-body">
            <div class="form-group row my-2">
                <div class="col">
                    <label for="code" class="col col-form-label my-1">*Company Code</label>
                    <label for="email" class="col col-form-label my-1">Email</label>
                    <label for="phone" class="col col-form-label my-1">Phone</label>
                </div>
                <div class="col">
                    <input value="{{$company->code}}" class="form-control my-2" type="text" name="code" id="code">
                    <input value="{{$company->email}}" class="form-control my-2" type="text" name="email" id="email">
                    <input value="{{$company->phone}}" class="form-control my-2" type="text" name="phone" id="phone">
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label my-1">*Company Name</label>
                    <label for="address" class="col col-form-label my-1">Address</label>
                </div>
                <div class="col">
                    <input value="{{$company->name}}" class="form-control my-2" type="text" name="name" id="name">
                    <textarea class="form-control" name="address" id="address">{{$company->address}}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url("/")}}" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</form>

<!--<form action="{{url("/company/{$company->id}")}}" method="post">-->
<!--<form action="{{action('App\Http\Controllers\CompanyController@update')}}" method="post">-->