@extends('company')

@section('main')
	<div class="card mx-auto my-3" style="max-width: 80rem;">
		<div class="card-header text-white bg-primary">
			<h5>List Company</h5>
		</div>

		<div class="card-body">
			<div class="card-body bg-light">
				<a href="#">Home</a> <span>/</span>
				<a href="#">Master</a> <span>/</span>
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
						<!--<a href="{{url("company/create")}}" class="btn btn-primary btn-block">Add</a>-->
						<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-form">Add</button>
						<button type="button" class="btn btn-warning btn-block">Search</button>
					</div>
				</div>
			</div>

			<!--table handling -->
			<table class="table" id="datatable">
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
							<a href="{{url("company/{$company->id}")}}"><i class="fa fa-search black" style="color:black"></i></a>
							<a href="{{("company/{$company->id}")}}" data-toggle="modal" data-target="#edit-form" class="edit">
								<!--{{url("company/{$company->id}/edit")}}-->
								<i class="fa fa-pencil" style="color:black"></i>
							</a>
							
						<form action="{{url("company/{$company->id}")}}" method="post" 
							id="delete-form-{{$company->id}}" style="display: none;">
							@csrf
							@method('DELETE')
						</form>

						<a  
							href="{{url("company/{$company->id}")}}"
							onclick="event.preventDefault();
							document.getElementById('delete-form-{{$company->id}}').submit();">
							<i class="fa fa-trash" style="color:black"></i>
						</a>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<!-- Modal Add Button -->
		<div id="add-form" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					@include('company.create')
				</div>
			</div>
		</div>

		<!-- Modal Edit Button -->
		<div id="edit-form" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					@include('company.edit')
				</div>
			</div>
		</div>

	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			
			var table = $('#datatable').DataTable();

			//start edit record
			table.on('click','.edit',function(){

				$tr = $(this).closest('tr');
				if ($($tr).hashClass('child')){
					$tr = $tr.prev('.parent');
				}

				var data = table.row($tr).data();
				console.log(data);

				$('#code').val(data[1]);
				$('#email').val(data[2]);
				$('#phone').val(data[3]);
				$('#name').val(data[4]);
				$('#address').val(data[5]);

				$('editForm').attr('action','/'+data[0]);
				$('edit-form').modal('show');
			});
		}));

	</script>
    
    @if (session()->get('message1'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message1')}}</strong> New company has been add with code <strong>{{$company->code}}</strong> !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif

    @if (session()->get('message2'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message2')}}</strong> Data company has been updated !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    @endif
    
    @if (session()->get('message3'))
    <div class="card-body mx-auto" style="max-width: 80rem;">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session()->get('message3')}}</strong> Data company has been deleted !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
	@endif

@endsection