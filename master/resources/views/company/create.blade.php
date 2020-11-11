<form action="{{action('App\Http\Controllers\CompanyController@store')}}" method="post">
    @csrf
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h5>Add Company</h5>
            </div>

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
            <div class="card-body">
                <div class="form-group row my-2">
                    <div class="col">
                        <label for="code" class="col col-form-label my-1">*Company Code</label>
                        <label for="email" class="col col-form-label my-1">Email</label>
                        <label for="phone" class="col col-form-label my-1">Phone</label>
                    </div>
                    <div class="col">
                        <fieldset disabled>
                        <input class="form-control my-2" type="text" name="code" placeholder="Auto Generated">
                        </fieldset>
                        <input value="{{old('email')}}" class="form-control my-2" type="text" name="email" placeholder="Type Email">
                        <input value="{{old('phone')}}" class="form-control my-2" type="text" name="phone" placeholder="Type Phone">
                    </div>
                    <div class="col">
                        <label for="name" class="col col-form-label my-1">*Company Name</label>
                        <label for="address" class="col col-form-label my-1">Address</label>
                    </div>
                    <div class="col">
                        <input value="{{old('name')}}" class="form-control my-2" type="text" name="name" placeholder="Type Company Name">
                        <textarea class="form-control" name="address" placeholder="Type Address">{{old('address')}}</textarea>
                    </div>
                </div>
            </div>
        
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('/company')}}" type="button" class="btn btn-warning">Cancel</a>
            </div>
        </div>
    </form>