<form action="" method="POST">
    @csrf
    @method('PATCH')
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h5>View Employee</h5>
            </div>
            
            <div class="card-body">
                <fieldset disabled>
                <div class="form-group row my-2">
                    <div class="col">
                        <label for="employee_number" class="col col-form-label my-1">*Employee ID Number</label>
                        <label for="first_name" class="col col-form-label my-1">*First Name</label>
                        <label for="last_name" class="col col-form-label my-1">Last Name</label>
                    </div>
                    <div class="col">
                        <input class="form-control my-2" type="text" name="employee_number" value="{{$emp->employee_number}}">
                        <input class="form-control my-2" type="text" name="first_name" value="{{$emp->first_name}}">
                        <input class="form-control my-2" type="text" name="last_name" value="{{$emp->last_name}}">
                    </div>
                    <div class="col">
                        <label for="name" class="col col-form-label my-1">*Company Name</label>
                        <label for="email" class="col col-form-label my-1">Email</label>
                    </div>
                    <div class="col">
                        <input class="form-control my-2" type="text" name="name" value="Company Name" value="PT. company name">
                        <input class="form-control my-2" type="text" name="email" value="{{$emp->email}}">
                    </div>
                </div>
                </fieldset>
            </div>
        
            <div class="card-footer text-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>