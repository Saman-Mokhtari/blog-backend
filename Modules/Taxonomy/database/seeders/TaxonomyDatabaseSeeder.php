<?php

namespace Modules\Taxonomy\Database\Seeders;

use Illuminate\Database\Seeder;

class TaxonomyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $this->call([
             TaxonomySeeder::class,
             TermSeeder::class
         ]);
    }
}
