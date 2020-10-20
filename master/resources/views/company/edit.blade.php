@extends('company')

@section('main')
<form action="{{url("/company/{$company->id}")}}" method="POST">
@csrf
@method('PATCH')
    <div class="card mx-auto my-3" style="max-width: 80rem;">
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
                    <input class="form-control my-2" type="text" value="{{$company->code}}" name="code">
                    <input class="form-control my-2" type="text" value="{{$company->email}}" name="email">
                    <input class="form-control my-2" type="text" value="{{$company->phone}}" name="phone">
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label my-1">*Company Name</label>
                    <label for="address" class="col col-form-label my-1">Address</label>
                </div>
                <div class="col">
                    <input class="form-control my-2" type="text" value="{{$company->name}}" name="name">
                    <textarea class="form-control" name="address">{{$company->address}}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url("/company")}}" class="btn btn-warning">Cancel</a>
            <!--<button type="button" class="btn btn-warning">Cancel</button>-->
        </div>
    </div>
</form>
@endsection
