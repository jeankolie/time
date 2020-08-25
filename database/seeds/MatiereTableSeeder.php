<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\{Matiere};

class MatiereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i < 50; $i++) { 
    		Matiere::firstOrCreate([
    			'nom' => "Matiiere $i",
    			'slug' => Str::slug("Matiiere $i")
    		]);
    	}
    }
}
