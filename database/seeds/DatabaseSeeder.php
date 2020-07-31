<?php

use App\User;
use App\Recipe;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // factory(User::class, 1)->create(['email' => 'eddyjaair@gmail']);
        factory(Category::class, 6)->create();

        factory(User::class, 5)
        	->create()
        	->each(function (User $user) {
        		$user->recipes()->createMany(factory(Recipe::class, 20)
        				->make()
        				->toArray());
        	});

  //       $user = new User();

		// $user->recipes()->createMany(
		//     factory(Recipe::class, 20)->make()->toArray()
		// );
    }
}
