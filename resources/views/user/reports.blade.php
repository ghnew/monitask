@extends('layout.user')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Reports</h1>

    <div class="row">
    	<div class="col-lg-12">
    		<div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">Weekly report</h6>
	            </div>
	            <div class="card-body">
	            	<table class="table">
						<thead>
					    	<tr>
					      		<th scope="col">#</th>
					      		<th scope="col">Project</th>
					      		<th scope="col">Mon</th>
					      		<th scope="col">Tue</th>
					      		<th scope="col">Wed</th>
					      		<th scope="col">Thu</th>
					      		<th scope="col">Fri</th>
					      		<th scope="col">Sat</th>
					      		<th scope="col">Sun</th>
					    	</tr>
					  	</thead>
						<tbody>
							@foreach($eachproject as $index=>$project)
						    <tr>
						      	<th scope="row">{{ $index + 1 }}</th>
						      	<td>{{ $project[1] }}</td>
						      	<td>{{ $project[0][0] }}</td>
						      	<td>{{ $project[0][1] }}</td>
						      	<td>{{ $project[0][2] }}</td>
						      	<td>{{ $project[0][3] }}</td>
						      	<td>{{ $project[0][4] }}</td>
						      	<td>{{ $project[0][5] }}</td>
						      	<td>{{ $project[0][6] }}</td>
						    </tr>
						    @endforeach
						</tbody>
					</table>
	            </div>
	        </div>

	       <div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">Monthly report</h6>
	            </div>
	            <div class="card-body">
	            	<table class="table">
						<thead>
					    	<tr>
					      		<th scope="col">#</th>
					      		<th scope="col">Project</th>
					      		<th scope="col">1st week</th>
					      		<th scope="col">2st week</th>
					      		<th scope="col">3st week</th>
					      		<th scope="col">4st week</th>
					      		<th scope="col">5st week</th>
					    	</tr>
					  	</thead>
						<tbody>
							@foreach($eachmonth as $index=>$project)
						    <tr>
						      	<th scope="row">{{ $index + 1 }}</th>
						      	<td>{{ $project[1] }}</td>
						      	<td>{{ $project[0][0] }}</td>
						      	<td>{{ $project[0][1] }}</td>
						      	<td>{{ $project[0][2] }}</td>
						      	<td>{{ $project[0][3] }}</td>
						      	<td>{{ $project[0][4] }}</td>
						    </tr>
						    @endforeach
						</tbody>
					</table>
	            </div>
	        </div>
    	</div>
	</div>    

</div>
<!-- /.container-fluid -->
@endsection