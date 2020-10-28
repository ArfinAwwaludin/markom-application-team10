@extends('role')

@section('main3')
	<div class="card mx-auto my-3" style="max-width: 80rem;">
		<div class="card-header text-white bg-primary">
			<h5>List Role</h5>
		</div>

		<div class="card-body">
			<div class="card-body bg-light">
                <a href="{{url('/')}}">Home</a> <span>/</span>
				<a href="{{url('/master')}}">Master</a> <span>/</span>
				<a>List Role</a>
			</div>

			<div class="form">
				<div class="form-row align-items-end my-3">
					<div class="col-3">
						<input class="form-control" type="text" name="" placeholder="- Select Role Code -">
					</div>
					<div class="col-3.5">
						<input class="form-control" type="text" name="" placeholder="- Select Role Name -">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created By">
					</div>

					<div class="col">
						<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-role">Add</button>
						<button type="button" class="btn btn-warning btn-block">Search</button>
					</div>
				</div>
			</div>

			<!--table handling -->
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Role Code</th>
						<th>Role Name</th>
						<th>Created Date</th>
						<th>Created By</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($role as $rol)
					<tr>
						<td>{{$rol->id}}</td>
						<td>{{$rol->code}}</td>
						<td>{{$rol->name}}</td>
						<td>{{$rol->created_date}}</td>
						<td>{{$rol->created_by}}</td>
						<td>
							<a href="{{"role/{$rol->id}"}}" data-toggle="modal" data-target="#viewRole{{$rol->id}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>

							<!-- Modal View Button -->
							<div class="modal fade" id="viewRole{{$rol->id}}" role="dialog">
								<div class="modal-dialog modal-md" role="document">
									<div class="modal-content">
										@include('role.view')
									</div>
								</div>
							</div>
							
							<a href="{{"role/{$rol->id}/edit"}}" data-toggle="modal" data-target="#editRole{{$rol->id}}">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>

							<!-- Modal Edit Button -->
							<div class="modal fade" id="editRole{{$rol->id}}" role="dialog">
								<div class="modal-dialog modal-md" role="document">
									<div class="modal-content">
										@include('role.edit')
									</div>
								</div>
							</div>
							
							<a href="" data-toggle="modal" data-target="#deleteRole{{$rol->id}}">
								<i class="fa fa-trash" style="color:black"></i>
							</a>

							<!-- Modal Delete Button -->
							<div class="modal fade" id="deleteRole{{$rol->id}}" role="dialog">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										@include('role.delete')
									</div>
								</div>
							</div>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="pagination justify-content-end">
				{{$role->links()}}
			</div>

		</div>

		<!-- Modal Add Button -->
		<div class="modal fade" id="add-role" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					@include('role.create')
				</div>
			</div>
		</div>

	</div>
	
    @if (session()->get('message1'))
    <div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message1')}}</strong> New role has been add with code <strong>{{$rol->code}}</strong> !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
    @endif

    @if (session()->get('message2'))
	<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message2')}}</strong> Data role has been updated !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
    @endif
    
    @if (session()->get('message3'))
	<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
		<strong>{{session()->get('message3')}}</strong> Data role has been deleted !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

@endsection

<!--
<form action="{{url("role/{$rol->id}")}}" method="post"
	id="delete-form-{{$rol->id}}" style="display: none;">
	@csrf
	@method('DELETE')
</form>

<a  
	href="{{url("role/{$rol->id}")}}"
	onclick="event.preventDefault();
	document.getElementById('delete-form-{{$rol->id}}').submit();">
	<i class="fa fa-trash" style="color:black"></i>
</a>
-->