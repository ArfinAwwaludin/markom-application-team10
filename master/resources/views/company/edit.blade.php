
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5>Edit Company</h5>
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
                    <input class="form-control my-2" type="text" value="{{$comp->code}}" name="code">
                    </fieldset>
                    <input class="form-control my-2" type="text" value="{{$comp->email}}" name="email">
                    <input class="form-control my-2" type="text" value="{{$comp->phone}}" name="phone">
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label my-1">*Company Name</label>
                    <label for="address" class="col col-form-label my-1">Address</label>
                </div>
                <div class="col">
                    <input class="form-control my-2" type="text" value="{{$comp->name}}" name="name">
                    <textarea class="form-control" name="address">{{$comp->address}}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <!--<button class="btn btn-primary" data-toggle="modal" data-target="#confUpdate">Update</button>-->
            <!--<button type="button" class="btn btn-warning text-white" data-dismiss="modal">Cancel</button>-->
            <a data-toggle="modal" href="#confUpdate{{$comp->id}}" class="btn btn-primary">Update</a>
            <a href="#" data-dismiss="modal" class="btn btn-warning text-white">Cancel</a>
        </div>
    </div>
