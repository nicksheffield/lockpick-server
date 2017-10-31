<?php

use Illuminate\Database\Seeder;

use App\Models\Site;
use App\Models\Client;

class SiteSeeder extends Seeder
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
		DB::table('sites')->truncate();

		$clients = Client::all();

		foreach ($clients as $client) {
			$count = rand(1, 10);
	
			$sites = [];
	
			for ($i=0; $i<$count; $i++) {
				$name = $faker->domainName;

				$realText = rand(1, 10) === 10 ? $faker->realText(40) : '';
	
				$sites[] = [
					'name' => $name,
					'url' => 'https://' . $name,
					'notes' => $realText,
					'client_id' => $client->id
				];
			}
	
			foreach($sites as $site) {
				Site::create($site);
			}
		}
	}
}
