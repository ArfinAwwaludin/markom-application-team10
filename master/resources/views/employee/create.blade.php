<form action="{{action('App\Http\Controllers\EmployeeController@store')}}" method="post">
    @csrf
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h5>Add Employee</h5>
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
                        <label for="employee_number" class="col col-form-label my-1">*Employee ID Number</label>
                        <label for="first_name" class="col col-form-label my-1">*First Name</label>
                        <label for="last_name" class="col col-form-label my-1">Last Name</label>
                    </div>
                    <div class="col">
                        <input value="{{old('employee_number')}}" class="form-control my-2" type="text" name="employee_number" placeholder="Type Emp ID Number">
                        <input value="{{old('first_name')}}" class="form-control my-2" type="text" name="first_name" placeholder="Type First Name">
                        <input value="{{old('last_name')}}" class="form-control my-2" type="text" name="last_name" placeholder="Type Last Name">
                    </div>
                    <div class="col">
                        <label for="name" class="col col-form-label my-1">*Company Name</label>
                        <label for="email" class="col col-form-label my-1">Email</label>
                    </div>
                    <div class="col">
                        <!--<input class="form-control my-2" type="text" name="m_company_id">-->
                        <select class="custom-select my-2" id="inputGroupSelect01" type="text" name="m_company_id">
                            <option selected>- Select Company Name -</option>
                            <option value="1">PT Xsis</option>
                            <option value="2">PT Mitra</option>
                            <option value="3">PT Utama</option>
                          </select>
                        <input value="{{old('email')}}" class="form-control my-2" type="text" name="email" placeholder="Type Email">
                    </div>
                </div>
            </div>
        
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{url('/employee')}}" type="button" class="btn btn-warning">Cancel</a>
            </div>
        </div>
    </form>