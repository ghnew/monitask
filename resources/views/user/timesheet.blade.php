@extends('layout.user')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Timesheet</h1>

    <div class="row">
    	<div class="col-lg-8">
    		<!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">New entry</h6>
	            </div>
	            <div class="card-body">
	            	<form method="post" action="/user/entry">
	            		@csrf
	            		<div class="row">
	            			<div class="col-lg-6">
			            		<div class="form-group">
								    <label for="projectInput">Project</label>
								    <select name="project" class="form-control" id="projectInput">
							    		@if(empty(Request::get('pid')))
							    			<option value="" selected disabled hidden>Choose here</option>
							    		@endif
								    	@foreach($projects as $project)
									    	@if(Request::get('pid') == $project->id)
									      		<option selected value="{{ $project->id }}">{{ $project->name }}</option>
									      	@else
									      		<option value="{{ $project->id }}">{{ $project->name }}</option>
									      	@endif
								      	@endforeach
								    </select>
								</div>
	            			</div>
	            			<div class="col-lg-6">
								<div class="form-group">
								    <label for="exampleFormControlSelect1">Task</label>
								    <select name="task" class="form-control" id="exampleFormControlSelect1">
								    	@foreach($tasks as $task)
								      	<option value="{{ $task->id }}">{{ $task->name }}</option>
								      	@endforeach
								    </select>
								</div>
	            			</div>
	            			<div class="col-lg-6">
								<div class="form-group">
							    	<label for="EntryInput">Entry name</label>
							    	<input name="name" required type="text" class="form-control" id="EntryInput">
								</div>
	            			</div>
	            			<div class="col-lg-6">
								<div class="form-group">
							    	<label for="EntryInput">Duration</label>
							    	<input name="duration" class="html-duration-picker form-control" required type="text" id="EntryInput">
								</div>
	            			</div>
	            			<div class="col-lg-12">
	            				<div class="form-group">
								    <label for="exampleFormControlTextarea1">Notes</label>
								    <textarea name="notes" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								</div>
	            			</div>
	            			<div class="col-lg-12">
	            				<button type="submit" class="btn btn-primary">Submit</button>
	            			</div>
	            		</div>
	            	</form>
	            </div>
	        </div>

	        <!-- Basic Card Example -->
	        <div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">Today's entrys</h6>
	            </div>
	            <div class="card-body">
	            	<table class="table">
					  	<thead>
					    	<tr>
					      		<th scope="col">#</th>
					      		<th scope="col">Entry</th>
					      		<th scope="col">Task</th>
					      		<th scope="col">Project</th>
					      		<th scope="col">Duration</th>
					      		<th scope="col">Notes</th>
					    	</tr>
					  	</thead>
					  	<tbody>
					  		@foreach($entries as $index=>$entry)
					    	<tr>
					      		<th scope="row">{{ $index + 1 }}</th>
					      		<td>{{ $entry->name }}</td>
					      		<td>{{ $entry->task->name }}</td>
					      		<td>{{ $entry->project->name }}</td>
					      		<td>{{ $entry->duration }}</td>
					      		<td>{{ $entry->notes }}</td>
					      	</tr>
					      	@endforeach
					    </tbody>
					</table>
					<hr>
					<div class="h5 text-right">Estimated Duration: <strong>{{ $totaltime }}</strong></div>
	            </div>
	        </div>
    	</div>
    	<div class="col-lg-4">
    		<div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">New project</h6>
	            </div>
	            <div class="card-body">
	            	<form method="post" action="/user/project">
	            		@csrf
	            		<div class="form-group">
					    	<label for="exampleInputprojectname">Project name</label>
					    	<input name="name" required type="text" class="form-control" id="exampleInputprojectname">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
	            	</form>
	            </div>
	        </div>

	        <div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">New task</h6>
	            </div>
	            <div class="card-body">
	            	<form method="post" action="/user/task">
	            		@csrf
	            		<div class="form-group">
						    <label for="exampleFormControlSelect1">Project</label>
						    <select name="project" class="form-control" id="exampleFormControlSelect1">
						    	@foreach($projects as $project)
						      	<option value="{{ $project->id }}">{{ $project->name }}</option>
						      	@endforeach
						    </select>
						</div>
	            		<div class="form-group">
					    	<label for="exampleInputprojectname">Task name</label>
					    	<input name="name" required type="text" class="form-control" id="exampleInputprojectname">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
	            	</form>
	            </div>
	        </div>
    	</div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection