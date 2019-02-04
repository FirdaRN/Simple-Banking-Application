<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		\App\User::create([
		        'name'  => 'admin',
		        'email' => 'admin@admin.com',
		        'phone' => '0211111',
		        'address' => 'Jalan Ir Soekarno',
		        'password'  => bcrypt('admin'),
		        'admin' => '1'
		]);        
    }
}
