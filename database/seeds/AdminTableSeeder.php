<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\{Utilisateur};

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Utilisateur::firstOrCreate([
        	'telephone' => '00000000',
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'type' => 1,
        	'uuid' => (string) Str::uuid(),
        	'password' => Hash::make('00000000'),
        ]);
    }
}
