<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
			[
				'state_code' =>2, 
				'title' => " ", 
				'footer'=> " ", 
				'year'=>0 ,
				'month' => 0 ,
				'state_name' => 'Kaduna',
				'company_code' => 0 ,
			]
		]);
    }
}
