<?php

use Illuminate\Database\Seeder;

class FullTextSearchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\FullTextSearch::class, 2000)->create();
    }
}
