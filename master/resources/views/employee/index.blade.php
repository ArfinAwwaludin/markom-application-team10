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
							<a href="{{"employee/{$emp->id}"}}" data-toggle="modal" data-target="#viewEmp{{$emp->id}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>

							<!-- Modal View Button -->
							<div id="viewEmp{{$emp->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('employee.view')
									</div>
								</div>
							</div>
							
							<a href="{{"employee/{$emp->id}/edit"}}" data-toggle="modal" data-target="#editModal{{$emp->id}}">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>

							<!-- Modal Add Button -->
							<div id="editModal{{$emp->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('employee.edit')
									</div>
								</div>
							</div>
							
							<a href="" data-toggle="modal" data-target="#deleteEmp{{$emp->id}}">
								<i class="fa fa-trash" style="color:black"></i>
							</a>

							<!-- Modal Delete Button -->
							<div class="modal fade" id="deleteEmp{{$emp->id}}" role="dialog">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										@include('employee.delete')
									</div>
								</div>
							</div>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="pagination justify-content-end">
				{{$employee->links()}}
			</div>

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
	<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message1')}}</strong> New employee has been add with code <strong>{{$emp->employee_number}}</strong> !
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
	</div>
    @endif

    @if (session()->get('message2'))
	<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message2')}}</strong> Data employee has been updated !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
    @endif
    
    @if (session()->get('message3'))
	<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message3')}}</strong> Data employee has been deleted !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

@endsection