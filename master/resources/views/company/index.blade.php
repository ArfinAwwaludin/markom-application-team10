@extends('company')

@section('main')
	<div class="card mx-auto my-3" style="max-width: 80rem;">
		<div class="card-header text-white bg-primary">
			<h5>List Company</h5>
		</div>

		<div class="card-body">
			<div class="card-body bg-light">
				<a href="{{url('/')}}">Home</a> <span>/</span>
				<a href="{{url('/master')}}">Master</a> <span>/</span>
				<a>List Company</a>
			</div>

			<div class="form">
				<div class="form-row align-items-end my-3">
					<div class="col-3">
						<input class="form-control" type="text" name="" placeholder="- Select Company Code -">
					</div>
					<div class="col-3">
						<input class="form-control" type="text" name="" placeholder="- Select Company Name -">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created">
					</div>
					<div class="col">
						<input class="form-control" type="text" name="" placeholder="Created By">
					</div>

					<div class="col">
						<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-btn">Add</button>
						<button type="button" class="btn btn-warning btn-block">Search</button>
					</div>
				</div>
			</div>

			<!--table handling -->
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Company Code</th>
						<th>Compay Name</th>
						<th>Created Date</th>
						<th>Created By</th>
						<th>Action</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($company as $comp)
					<tr>
						<td>{{$comp->id}}</td>
						<td>{{$comp->code}}</td>
						<td>{{$comp->name}}</td>
						<td>{{$comp->created_date}}</td>
						<td>{{$comp->created_by}}</td>
						<td>
							<!--button view-->
							<a href="{{"company/{$comp->id}"}}" data-toggle="modal" data-target="#viewComp{{$comp->id}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>

							<!-- Modal View Button -->
							<div id="viewComp{{$comp->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('company.view')
									</div>
								</div>
							</div>
							
							<!--button edit-->
							<a href="#editComp{{$comp->id}}" data-toggle="modal">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>
							
							<!--button delete-->
							<a href="" data-toggle="modal" data-target="#deleteComp{{$comp->id}}">
								<i class="fa fa-trash" style="color:black"></i>
							</a>

							<!-- Modal Delete Button -->
							<div id="deleteComp{{$comp->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										@include('company.delete')
									</div>
								</div>
							</div>

							<!-- Modal Edit Button -->
							<form action="{{route('company.update', $comp)}}" method="POST">
							@csrf
							@method('PATCH')
							<div id="editComp{{$comp->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('company.edit')
									</div>
								</div>
							</div>
	
							<!-- Modal Confirmation Update -->
							<div id="confUpdate{{$comp->id}}" class="modal fade" role="dialog" data-backdrop="static">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										<div class="card bg-light">
											<div>
												<button type="button" class="btn btn-danger btn-sm float-right" data-dismiss="modal" aria-hidden="true">×</button>
											</div>
											<h6 class="text-center my-3">Update Data?</h6>
											<div class="col my-2 text-center">
												<button type="submit" class="btn btn-primary">Update</button>
												<a href="#" type="button" class="btn btn-warning text-white" data-dismiss="modal">Cancel</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							</form>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<div class="pagination justify-content-end">
				{{$company->links()}}
			</div>

		</div>
		
		<!-- Modal Add Button -->
		<div id="add-btn" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					@include('company.create')
				</div>
			</div>
		</div>

	</div>
	
@if (session()->get('message1'))
<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
	<strong>{{session()->get('message1')}}</strong> New company has been add with code <strong>{{$comp->code}}</strong> !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->get('message2'))
<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
	<strong>{{session()->get('message2')}}</strong> Data company has been updated !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session()->get('message3'))
<div class="alert alert-info mx-auto my-3" style="max-width: 80rem;">
	<strong>{{session()->get('message3')}}</strong> Data company has been deleted !
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@endsection