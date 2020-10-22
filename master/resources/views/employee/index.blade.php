@extends('employee')

@section('main2')
	<div class="card mx-auto my-3" style="max-width: 80rem;">
		<div class="card-header text-white bg-primary">
			<h5>List Employee</h5>
		</div>

		<div class="card-body">
			<div class="card-body bg-light">
				<a href="{{url('/')}}">Home</a> <span>/</span>
				<a href="{{url('/master')}}">Master</a> <span>/</span>
				<a>List Employee</a>
			</div>

			<div class="form">
				<div class="form-row align-items-end my-3">
					<div class="col-3">
						<input class="form-control" type="text" name="" placeholder="Employee ID Number">
					</div>
					<div class="col-3.5">
						<input class="form-control" type="text" name="" placeholder="Employee Name">
					</div>
					<div class="col-3.5">
						<input class="form-control" type="text" name="" placeholder="- Select Company Name -">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created By">
					</div>

					<div class="col">
						<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-emp">Add</button>
						<button type="button" class="btn btn-warning btn-block">Search</button>
					</div>
				</div>
			</div>

			<!--table handling -->
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Employee ID Number</th>
						<th>Employee Name</th>
						<th>Company Name</th>
						<th>Created Date</th>
						<th>Created By</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($employee as $emp)
					<tr>
						<td>{{$emp->id}}</td>
						<td>{{$emp->employee_number}}</td>
						<td>{{$emp->first_name}} {{$emp->last_name}}</td>
						<td>PT. company name</td>
						<td>{{$emp->created_date}}</td>
						<td>{{$emp->created_by}}</td>
						<td>
							<a href="{{"employee/{$emp->id}"}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>
							
							<a href="{{"employee/{$emp->id}/edit"}}">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>
							
							<form action="{{url("employee/{$emp->id}")}}" method="post" 
								id="delete-form-{{$emp->id}}" style="display: none;">
								@csrf
								@method('DELETE')
							</form>

							<a  
								href="{{url("employee/{$emp->id}")}}"
								onclick="event.preventDefault();
								document.getElementById('delete-form-{{$emp->id}}').submit();">
								<i class="fa fa-trash" style="color:black"></i>
							</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<!-- Modal Add Button -->
		<div id="add-emp" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					@include('employee.create')
				</div>
			</div>
		</div>

	</div>

	
    @if (session()->get('message1'))
    <div class="card-body mx-auto my-3" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message1')}}</strong> New employee has been add with code <strong>{{$emp->employee_number}}</strong> !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif

    @if (session()->get('message2'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message2')}}</strong> Data employee has been updated !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif
    
    @if (session()->get('message3'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message3')}}</strong> Data employee has been deleted !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
	@endif

@endsection