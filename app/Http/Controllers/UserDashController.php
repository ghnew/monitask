<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;

use App\Project;
use App\Task;
use App\Entry;

class UserDashController extends Controller
{
    public function timesheet(Request $request) {
        $projects = Project::all();
        $tasks = Task::where('project_id', $request->input('pid'))->get();
        $entries = Entry::whereDate('created_at', Carbon::today())
            ->where('user_id', $request->user()->id)
            ->with('project')->with('task')->get();

        // get toatal time
        $totaltime = Entry::whereDate('created_at', Carbon::today())
            ->where('user_id', $request->user()->id)
            ->with('project')->sum(DB::raw("TIME_TO_SEC(duration)"));

        // set time format
        $totaltime = gmdate("h:i:s", $totaltime);

    	return view('user/timesheet', compact('projects', 'tasks', 'entries', 'totaltime'));
    }

    public function storeproject(Request $request) {
    	$request->validate([
		    'name' => 'required',
		]);

    	$project = new Project;
    	$project->name = $request->name;
        $project->save();

        return redirect()->back();
    }

    public function storetask(Request $request) {
        $request->validate([
            'project' => 'required',
            'name' => 'required',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->project_id = $request->project;
        $task->save();

        return redirect()->back();
    }

    public function storeentry(Request $request) {
        $request->validate([
            'project' => 'required',
            'task' => 'required',
            'name' => 'required',
            'duration' => 'required',
            'notes' => 'required',
        ]);

        $entry = new Entry;
        $entry->project_id = $request->project;
        $entry->task_id = $request->task;
        $entry->user_id = $request->user()->id;
        $entry->name = $request->name;
        $entry->duration = $request->duration;
        $entry->notes = $request->notes;
        $entry->status = "completed";
        $entry->save();

        return redirect('/user/timesheet');
    }
}
