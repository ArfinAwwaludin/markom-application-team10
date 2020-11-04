<form action="{{route('role.update', $rol)}}" method="POST">
@csrf
@method('PATCH')
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5>Edit Role</h5>
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
            <div class="form-group form-inline">
                <label for="code" class="col col-form-label">*Role Code</label>
                <fieldset disabled>
                    <input class="form-control" type="text" name="code" value="{{$rol->code}}">
                </fieldset>
            </div>
            <div class="form-group form-inline">
                <label for="name" class="col col-form-label">*Role Name</label>
                <input class="form-control" value="{{old('name', $rol->name)}}" type="text" name="name">
            </div>
            <div class="form-group form-inline">
                <label for="description" class="col col-form-label">Description</label>
                <input class="form-control" value="{{old('description', $rol->description)}}" type="text" name="description">
            </div>
        </div>
    
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('/role')}}" type="button" class="btn btn-warning">Cancel</a>
        </div>
    </div>
</form>
