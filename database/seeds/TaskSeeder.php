<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([ 'project_id' => 1, 'name' => 'Eleifend sit amet sapien' ]);
        DB::table('tasks')->insert([ 'project_id' => 1, 'name' => 'Praesent quam purus' ]);
        DB::table('tasks')->insert([ 'project_id' => 2, 'name' => 'Consequat eu rutrum volutpat' ]);
        DB::table('tasks')->insert([ 'project_id' => 2, 'name' => 'Suspendisse placerat maximus' ]);
    }
}
