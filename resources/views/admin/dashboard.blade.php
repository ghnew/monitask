@extends('layout.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">
    	<div class="col-lg-12">
    		@foreach($users as $index=>$user)
    		<div class="card shadow mb-4">
	            <div class="card-header py-3 d-flex justify-content-between align-items-center">
	                <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}/{{ $user->email }}</h6>
	            </div>
	            <div class="card-body">
	            	 <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>

                    <script>
                    	var bardata = {
							    labels: [
							    	@foreach($user->todays_entries as $entry)
							    		@if (!$loop->last) 
							    			"{{ $entry->name }}", 
							    		@else
							    			"{{ $entry->name }}"
							    		@endif
							    	@endforeach
							    ],
							    datasets: [{
							      label: "Duration",
							      backgroundColor: "#4e73df",
							      hoverBackgroundColor: "#2e59d9",
							      borderColor: "#4e73df",
							      data: [
							      	@foreach($user->todays_entries as $entry)
							    		@if (!$loop->last)
							    			convertTime("{{ $entry->duration }}"), 
							    		@else
							    			convertTime("{{ $entry->duration }}")
							    		@endif
							    	@endforeach
							      ],
							    }],
							  };

							  function convertTime(hms) {
								var a = hms.split(':'); // split it at the colons

								// minutes are worth 60 seconds. Hours are worth 60 minutes.
								var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
								return seconds;
							  }
                    </script>
	            </div>
	        </div>
	        @endforeach
	    </div>
	</div>
</div>
<!-- /.container-fluid -->
@endsection