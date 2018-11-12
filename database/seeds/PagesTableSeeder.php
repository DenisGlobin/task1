<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([ 'name' => 'Product #1', 'created_at' => \Carbon\Carbon::now()]);
        DB::table('pages')->insert([ 'name' => 'Product #2', 'created_at' => \Carbon\Carbon::now()]);
        DB::table('pages')->insert([ 'name' => 'Product #3', 'created_at' => \Carbon\Carbon::now()]);
        DB::table('pages')->insert([ 'name' => 'Product #4', 'created_at' => \Carbon\Carbon::now()]);
        DB::table('pages')->insert([ 'name' => 'Product #5', 'created_at' => \Carbon\Carbon::now()]);
    }
}
