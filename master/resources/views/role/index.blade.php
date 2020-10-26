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
					@foreach ($role as $role)
					<tr>
						<td>{{$role->id}}</td>
						<td>{{$role->code}}</td>
						<td>{{$role->name}}</td>
						<td>{{$role->created_date}}</td>
						<td>{{$role->created_by}}</td>
						<td>
							<a href="{{"role/{$role->id}"}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>
							
							<a href="{{"role/{$role->id}/edit"}}" class="btn" data-toggle="modal" data-target="#editRole{{$role->id}}">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>

							<!-- Modal Edit Button -->
							<div class="modal fade" id="editRole{{$role->id}}" role="dialog">
								<div class="modal-dialog modal-md" role="document">
									<div class="modal-content">
										@include('role.edit')
									</div>
								</div>
							</div>	
							
							<form action="{{url("role/{$role->id}")}}" method="post"
								id="delete-form-{{$role->id}}" style="display: none;">
								@csrf
								@method('DELETE')
							</form>

							<a  
								href="{{url("role/{$role->id}")}}"
								onclick="event.preventDefault();
								document.getElementById('delete-form-{{$role->id}}').submit();">
								<i class="fa fa-trash" style="color:black"></i>
							</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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
    <div class="card-body mx-auto my-3" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message1')}}</strong> New role has been add with code <strong>{{$role->code}}</strong> !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif

    @if (session()->get('message2'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message2')}}</strong> Data role has been updated !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif
    
    @if (session()->get('message3'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message3')}}</strong> Data role has been deleted !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
	@endif

@endsection