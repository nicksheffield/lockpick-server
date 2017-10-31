<?php

use Illuminate\Database\Seeder;

use App\Models\Login;
use App\Models\Site;

class LoginSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create();

		DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('logins')->truncate();

		$sites = Site::all();

		foreach ($sites as $site) {
			$count = rand(1, 3);
	
			$logins = [];
	
			for ($i=0; $i<$count; $i++) {
				$realText = rand(1, 10) === 10 ? $faker->realText(40) : '';

				$logins[] = [
					'username' => $faker->userName,
					'password' => bcrypt($faker->password),
					'notes' => $realText,
					'site_id' => $site->id
				];
			}
	
			foreach($logins as $login) {
				Login::create($login);
			}
		}
	}
}
