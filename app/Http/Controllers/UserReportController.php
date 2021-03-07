<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Project;
use App\Entry;

class UserReportController extends Controller
{
    public function index(Request $request) { //oopsieee

        // weekly report
    	$projects = Project::all();
    	$weekstart = Carbon::now()->startOfWeek();

    	$eachproject = array();
    	foreach ($projects as $key => $project) {
    		$eachtime = array();
    		for ($i = 0; $i < 7; $i++) {
    			$totaltime = Entry::whereDate('created_at', $weekstart)
    				->where('project_id', $project->id)
		            ->where('user_id', $request->user()->id)->sum(DB::raw("TIME_TO_SEC(duration)"));

	            $hours = floor($totaltime / 3600);
				$minutes = floor(($totaltime / 60) % 60);
				$seconds = $totaltime % 60;

		        array_push($eachtime, "$hours:$minutes:$seconds");
		        $weekstart->addDays(1);
			}
			array_push($eachproject, [$eachtime, $project->name]);
    	};

        // monthly report
        $monthStart = Carbon::now()->startOfMonth();

        $eachmonth = array();
        foreach ($projects as $key => $project) {
            $eachtime = array();
            for ($i = 0; $i < 5; $i++) {
                $totaltime = Entry::whereBetween('created_at', [$monthStart, $monthStart->addDays(7)])
                    ->where('project_id', $project->id)
                    ->where('user_id', $request->user()->id)->sum(DB::raw("TIME_TO_SEC(duration)"));

                $hours = floor($totaltime / 3600);
                $minutes = floor(($totaltime / 60) % 60);
                $seconds = $totaltime % 60;

                array_push($eachtime, "$hours:$minutes:$seconds");
            }
            array_push($eachmonth, [$eachtime, $project->name]);
        }
    	
        return view('user/reports', compact('eachproject', 'eachmonth'));
    }
}
