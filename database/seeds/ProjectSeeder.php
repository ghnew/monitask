<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([ 'name' => 'Adipiscing elit' ]);
        DB::table('projects')->insert([ 'name' => 'Nunc sapien felis' ]);
    }
}
