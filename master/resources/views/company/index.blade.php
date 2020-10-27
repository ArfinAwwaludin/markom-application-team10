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
					@foreach ($company as $company)
					<tr>
						<td>{{$company->id}}</td>
						<td>{{$company->code}}</td>
						<td>{{$company->name}}</td>
						<td>{{$company->created_date}}</td>
						<td>{{$company->created_by}}</td>
						<td>
							<a href="{{"company/{$company->id}"}}" data-toggle="modal" data-target="#viewComp{{$company->id}}">
								<i class="fa fa-search black" style="color:black"></i>
							</a>

							<!-- Modal View Button -->
							<div id="viewComp{{$company->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('company.view')
									</div>
								</div>
							</div>
							
							<a href="{{"company/{$company->id}/edit"}}" data-toggle="modal" data-target="#editComp{{$company->id}}">
								<i class="fa fa-pencil" style="color:black"></i>
							</a>

							<!-- Modal Edit Button -->
							<div id="editComp{{$company->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										@include('company.edit')
									</div>
								</div>
							</div>
							
							<a href="" data-toggle="modal" data-target="#deleteComp{{$company->id}}">
								<i class="fa fa-trash" style="color:black"></i>
							</a>

							<!-- Modal Delete Button -->
							<div id="deleteComp{{$company->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										@include('company.delete')
									</div>
								</div>
							</div>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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
		<strong>{{session()->get('message1')}}</strong> New company has been add with code <strong>{{$company->code}}</strong> !
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

	<!--
    <script type="text/javascript">
      $(document).ready(function(){
        var table = $('#datatable').DataTable();
    
        //start edit record
        table.on('click','.edit', function(){

			$tr = $(this).closest('tr');
			if ($($tr).hasClass('child')){
				$tr = $tr.prev('.parent');
			}
		
			var data = table.row($tr).data();
			console.log(data);
		
			$('#code').val(data[1]);
			$('#name').val(data[2]);
			$('#email').val(data[3]);
			$('#address').val(data[4]);
			$('#phone').val(data[5]);
		
			$('#editForm').attr('action','/'+data[0]);
			$('#edit-btn').modal('show');
			});
			//end edit record
      });
	</script>
	-->

@endsection