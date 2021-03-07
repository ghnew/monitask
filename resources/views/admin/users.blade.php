@extends('layout.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Users</h1>

    <div class="row">
    	<div class="col-lg-8">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul style="margin: 0">
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			@if(session()->has('success'))
			    <div class="alert alert-success">
			        {{ session()->get('success') }}
			    </div>
			@endif


			<!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="users card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">Users list</h6>
	                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  	New user
					</button>
	            </div>
	            <div class="card-body">
	                <table class="table">
						<thead>
					    	<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Type</th>
								<th scope="col" width="90px"></th>
					    	</tr>
					 	</thead>
					  	<tbody>
					  		@foreach($users as $index=>$user)
					  		<tr>
					      		<th scope="row">{{ $index + 1 }}</th>
					      		<td>{{ $user->name }}</td>
					      		<td>{{ $user->email }}</td>
					      		<td>{{ $user->type }}</td>
					      		<td>
					      			<form method="post" action="/admin/users/remove"> 
								        @method('DELETE')
	 									@csrf
	 									<input type="hidden" name="id" value="{{ $user->id }}">
								        <button 
								          type="submit"
								          class="btn btn-primary">Remove</button>
								    </form>
					      		</td>
					    	</tr>
					    	@endforeach
					  </tbody>
					</table>
	            </div>
	        </div>
    	</div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<form method="post" action="/admin/register">
				@csrf
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Create user?</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                	<div class="form-group">
	                        <label for="exampleInputName">Name</label>
	                        <input required name="name" class="form-control" id="exampleInputName">
	                    </div>
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">Email address</label>
	                        <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	                    </div>
	                    <div class="form-group">
	                        <label for="exampleInputPassword1">Password</label>
	                        <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
	                    </div>
	                    <div class="form-group">
	                        <label for="exampleInputPassworRe">Re-type password</label>
	                        <input required name="password_confirmation" type="password" class="form-control" id="exampleInputPassworRe">
	                    </div>
	                    <div class="form-group">
	                        <label for="exampleFormControlSelect1">Account type</label>
	                        <select required name="type" class="form-control" id="exampleFormControlSelect1">
						      	<option value="admin">Administrator</option>
						      	<option value="user">Normal User</option>
						    </select>
	                    </div>
	            </div>
	            <div class="modal-footer">
			        <button type="submit" class="btn btn-primary">Submit</button>
			    </div>
            </form>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
@endsection