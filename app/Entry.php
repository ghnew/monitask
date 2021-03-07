<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function project() {
    	return $this->belongsTo(Project::class);
    }

    public function Task() {
    	return $this->belongsTo(Task::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
