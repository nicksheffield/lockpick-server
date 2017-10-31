<?php

use Illuminate\Database\Seeder;

use App\Models\Client;

class ClientSeeder extends Seeder
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
		DB::table('clients')->truncate();

		$count = 20;

		$clients = [];

		for ($i=0; $i<$count; $i++) {
			$clients[] = [
				'name' => $faker->company
			];
		}

		foreach($clients as $client) {
			Client::create($client);
		}
	}
}
