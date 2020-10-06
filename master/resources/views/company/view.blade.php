@extends('company')

@section('main')

<div class="card mx-auto my-3" style="max-width: 80rem;">
    
    <div class="card-header text-white bg-primary">
        <h5>View Company {{$company->name}}</h5>
    </div>

    <form action="{{url("/company/{$company->id}")}}" method="get">
    <fieldset disabled>
    @method('GET')
    @csrf
        <div class="card-body">
            <div class="form-group row my-2">
                <div class="col">
                    <label for="code" class="col col-form-label my-1">*Company Code</label>
                    <label for="email" class="col col-form-label my-1">Email</label>
                    <label for="phone" class="col col-form-label my-1">Phone</label>
                </div>
                <div class="col">
                    <input value="{{$company->code}}" class="form-control my-2" type="text" name="code">
                    <input value="{{$company->email}}" class="form-control my-2" type="text" name="email">
                    <input value="{{$company->phone}}" class="form-control my-2" type="text" name="phone">
                </div>
                <div class="col">
                    <label for="name" class="col col-form-label my-1">*Company Name</label>
                    <label for="address" class="col col-form-label my-1">Address</label>
                </div>
                <div class="col">
                    <input value="{{$company->name}}" class="form-control my-2" type="text" name="name">
                    <textarea class="form-control" name="address">{{$company->address}}</textarea>
                </div>
            </div>
        </div>
    </fieldset>

        <div class="card-footer text-right">
            <a href="{{url("/")}}" class="btn btn-warning">Close</a>
        </div>
    
    </form>
</div>
@endsection